<?php

namespace App\Repositories\Backend\Product;

use App\Models\Dimensions\Dimensions;
use App\Models\Product\Product;
use App\Models\Product\ProductChild;
use App\Models\Product\ProductPhoto;
use App\Models\Product\ProductPrice;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Product\ProductCreated;
use App\Events\Backend\Product\ProductDeleted;
use App\Events\Backend\Product\ProductUpdated;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Product::class;

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'sort', $sort = 'asc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->get();
    }
    public function getOne($id, $with = null)
    {
        $model = $this->query();
        if($with){
            $model = $model->with($with);
        }
        $model = $model->findOrFail($id);

        return $model;
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('product_table') . '.id',
                config('product_table') . '.code',
                config('product_table') . '.slug',
                config('product_table') . '.name',
                config('product_table') . '.created_at',
            ]);
    }


    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        dd($input);
        DB::transaction(function () use ($input) {
            $product = self::MODEL;
            $product = new $product();
            $product->save();

            foreach ($input['collectionZone_id'] as $collectionZone) {
                $product->collectionZone()->attach($collectionZone);
            }

            foreach ($input['dimensions'] as $dimension) {
                Dimensions::create([
                    'product_id' => $product->id,
                    'length' => $dimension['length'],
                    'width' => $dimension['width'],
                    'height' => $dimension['height'],
                    'mattress' => $dimension['mattress'],
                    'weight' => $dimension['weight']
                ]);
            }

            foreach ($input['finishTissues_id'] as $finishTissue) {
                $product->finishTissues()->attach($finishTissue);
            }

            foreach ($input['images'] as $photo) {
                ProductsPhotos::create([
                    'product_id' => $product->id,
                    'image' => $photo,
                    'type' => 0
                ]);
            }

            $product->category_id = $input['category_id'];
            $product->code = $input['code'];
            $product->price = $input['price'];
            $product->name = $input['name'];
            $product->name_ru = $input['name_ru'];
            $product->name_it = $input['name_it'];
            $product->description = $input['description'];
            $product->description_ru = $input['description_ru'];
            $product->description_it = $input['description_it'];

            if ($product->save()) {
                event(new ProductCreated($product));

                return true;
            }

            $product->delete();

            throw new GeneralException(trans('exceptions.backend.product.create_error'));
        });
    }

    /**
     * @param Model $product
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $product, array $input)
    {
        $allData = [
            'childs' => [],
            'photos' => [],
            'prices' => [],
        ];

        $product->category_ids = implode(',', $input['category_ids']);
        $product->code = $input['code'];
        $product->slug = $input['slug'];
        $product->name = $input['name'];
        $product->name_ru = $input['name_ru'];
        $product->name_it = $input['name_it'];
        $product->prev = $input['prev'];
        $product->prev_ru = $input['prev_ru'];
        $product->prev_it = $input['prev_it'];
        $product->published = isset($input['published']) ? 1 : 0;

        $newChildData = [];
        $childCodes = [];
        foreach ($input['child'] as $ch_id => $item) {
            $newChildData[$ch_id] = [
                'product_id'        => $product->id,
                'code'              => $item['code'],
                'name'              => $item['name'],
                'name_ru'           => $item['name_ru'],
                'name_it'           => $item['name_it'],
                'prev'              => $item['prev'],
                'prev_ru'           => $item['prev_ru'],
                'prev_it'           => $item['prev_it'],
                'dimensions'        => $item['dimensions'],
                'published'         => isset($item['published']) ? 1 : 0,
            ];
            $childCodes[$item['code']] = $ch_id;
        }
        $newPhotoData = [];
        $newPriceData = [];
        $mainPrices = [
            0 => 99999999, // 'min'
            1 => -1, // 'max'
        ];
        foreach ($input['photo'] as $ph_id => $item) {
            $isMainPhoto = isset($item['main']) ? 1 : 0;
            $newPhotoData[$ph_id] = [
                'product_id'        => $product->id,
                'photos'            => implode(',', $item['photos']),
                'prices_data'       => $item['prices_data'],
                'finish_ids'        => implode(',', $item['finish_ids']),
                'tissue_ids'        => implode(',', $item['tissue_ids']),
                'collection_ids'    => implode(',', $item['collection_ids']),
                'prev'              => $item['prev'],
                'prev_ru'           => $item['prev_ru'],
                'prev_it'           => $item['prev_it'],
                'main'              => $isMainPhoto,
                'published'         => isset($item['published']) ? 1 : 0
            ];
            foreach ($item['price'] as $pr_id => $prOne) {
                $ch_id = isset($childCodes[$prOne['child_code']]) ? $childCodes[$prOne['child_code']] : false;
                if ($ch_id) {
                    $discount = (int)$prOne['discount'];
                    $def_price = (int)$prOne['def_price'];
                    $cus_price = (int)$prOne['cus_price'];
                    $price = (int)$prOne['price'];
                    $publish = true;
                    $custom = isset($prOne['custom']) ? 1 : 0;
                    // если не стоит кастом и не ввели значение def_price
                    // или стоит кастом и не ввели значение price
                    // делаем цену неактивной
                    if( (!($def_price > 0) && !$custom) || (!($price > 0) && $custom)) {
                        $publish = false;
                    } else {
                        $price = ($custom) ? $cus_price : $def_price;
                    }
                    if ($publish) {
                        if($mainPrices[0] > $price) $mainPrices[0] = $price; // min
                        if($mainPrices[1] < $price) $mainPrices[1] = $price; // max
                    }
                    $newPriceData[$pr_id] = [
                        'product_child_id'  => $ch_id,
                        'product_photo_id'  => $ph_id,
                        'discount'          => $discount,
                        'def_price'         => $def_price,
                        'cus_price'         => $cus_price,
                        'price'             => $price,
                        'custom'            => $custom,
                        'published'         => $publish
                    ];
                }
            }
            if($isMainPhoto){
                $mainPhoto = isset($item['photos'][0]) ? $item['photos'][0] : '';
                $mainPhotoData['photos'] = $mainPhoto;
            }
        }

        $mainPhotoData['prices'] = implode(' — ', [
            $mainPrices[0].' €',
            $mainPrices[1].' €'
        ]);

        $product->main_photo_data = json_encode($mainPhotoData);

        $allData['childs'] = $newChildData;
        $allData['photos'] = $newPhotoData;
        $allData['prices'] = $newPriceData;
//        dd($allData);
//        dd($input);


        DB::transaction(function () use ($product, $allData) {
            // ProductChilds
            foreach ($allData['childs'] as $ch_id => $childOne) {
                $child = ProductChild::find($ch_id);
//                dd($child);
                $child->update($childOne);
            }
            // ProductPhotos
            foreach ($allData['photos'] as $ph_id => $photoOne) {
                $photo = ProductPhoto::find($ph_id);
                $photo->update($photoOne);
            }
            // ProductPrices
            foreach ($allData['prices'] as $pr_id => $priceOne) {
                $price = ProductPrice::find($pr_id);
                $price->update($priceOne);
            }
            if ($product->save()) {
//                event(new ProductUpdated($product));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.product.update_error'));
        });
    }

    /**
     * @param Model $product
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $product)
    {
        DB::transaction(function () use ($product) {
            if ($product->delete()) {
                event(new ProductDeleted($product));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.product.delete_error'));
        });
    }
}
