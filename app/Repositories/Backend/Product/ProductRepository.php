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
     * @param $input array
     * @param $productId int
     * @param $isInsert bool
     *
     * @throws GeneralException
     *
     * @return array
     */
    public function implodeData($input = [], $productId = null, $isInsert = false)
    {
        $allData = [
            'childs' => [],
            'photos' => [],
            'prices' => [],
        ];

        $newChildData = [];
        $childCodes = [];
        foreach ($input['child'] as $ch_id => $item) {
            $newChildData[$ch_id] = [
                'product_id'        => $productId,
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
//        dd($input);
        $keyPrice = 0;
        foreach ($input['photo'] as $ph_id => $item) {
            $isMainPhoto = isset($item['main']) ? 1 : 0;
            $phOnePhotos = isset($item['photos']) ? implode(',', $item['photos']) : '';
            $phOneFinish = isset($item['finish_ids']) ? implode(',', $item['finish_ids']) : '';
            $phOneTissue = isset($item['tissue_ids']) ? implode(',', $item['tissue_ids']) : '';
            $phOneCollection = isset($item['collection_ids']) ? implode(',', $item['collection_ids']) : '';
            $newPhotoData[$ph_id] = [
                'product_id'        => $productId,
                'photos'            => $phOnePhotos,
                'prices_data'       => $item['prices_data'],
                'finish_ids'        => $phOneFinish,
                'tissue_ids'        => $phOneTissue,
                'collection_ids'    => $phOneCollection,
                'prev'              => $item['prev'],
                'prev_ru'           => $item['prev_ru'],
                'prev_it'           => $item['prev_it'],
                'main'              => $isMainPhoto,
                'published'         => isset($item['published']) ? 1 : 0
            ];
            foreach ($item['price'] as $pr_id => $prOne) {
                $ch_id = isset($childCodes[$prOne['child_code']]) ? $childCodes[$prOne['child_code']] : '';
                if (!empty($ch_id) && $pr_id !== 'KEY') {
                    $discount = (int)$prOne['discount'];
                    $def_price = (int)$prOne['def_price'];
                    $cus_price = (int)$prOne['cus_price'];
                    $price = (int)$prOne['price'];
                    $publish = true;
                    $custom = isset($prOne['custom']) ? 1 : 0;
                    // если не стоит кастом и не ввели значение def_price
                    // или стоит кастом и не ввели значение price
                    // делаем цену неактивной
                    if ((!($def_price > 0) && !$custom) || (!($cus_price > 0) && $custom)) {
                        $publish = false;
                    } else {
                        $price = ($custom) ? $cus_price : $def_price;
                    }
                    // если кто-то у радителей неопубликован - цена недоступна
                    $publChild = (isset($newChildData[$ch_id]['published']) && $newChildData[$ch_id]['published'] == 1) ? true : false;
                    $publPhoto = (isset($newPhotoData[$ph_id]['published']) && $newPhotoData[$ph_id]['published'] == 1) ? true : false;
                    if (!$publChild || !$publPhoto) {
                        $publish = false;
                    }
                    if ($publish) {
                        if($mainPrices[0] > $price) $mainPrices[0] = $price; // min
                        if($mainPrices[1] < $price) $mainPrices[1] = $price; // max
                    }
                    $newPriceData[$keyPrice] = [
                        'product_child_id'  => $ch_id,
                        'product_photo_id'  => $ph_id,
                        'discount'          => $discount,
                        'def_price'         => $def_price,
                        'cus_price'         => $cus_price,
                        'price'             => $price,
                        'custom'            => $custom,
                        'published'         => $publish
                    ];
//                    echo 'keyPrice: '.$keyPrice.'<br>';
                    $keyPrice++;
                }
//                echo '_______________<br>';
            }
            if($isMainPhoto){
                $mainPhoto = isset($item['photos'][0]) ? $item['photos'][0] : '';
                $mainPhotoData['photos'] = $mainPhoto;
            }
        }
        $mainPhotoData['prices'] = false;
        if ($mainPrices[0] == 99999999 || $mainPrices[1] == -1) { // нету min или max
            if ($mainPrices[0] == 99999999 && $mainPrices[1] == -1) { // нету min и max
                $mainPhotoData['prices'] = '';
            } elseif ($mainPrices[0] == 99999999) { // нету min
                $mainPhotoData['prices'] = $mainPrices[1].' €';
            } elseif ($mainPrices[1] == -1) { // нету max
                $mainPhotoData['prices'] = $mainPrices[0].' €';
            }
        } else { // есть и min и max
            $mainPhotoData['prices'] = implode(' — ', [
                $mainPrices[0].' €',
                $mainPrices[1].' €'
            ]);
        }

        $allData['childs'] = $newChildData;
        $allData['photos'] = $newPhotoData;
        $allData['prices'] = $newPriceData;
        $allData['main_photo_data'] = $mainPhotoData;

        return $allData;
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
        $product = self::MODEL;
        $product = new $product();
        $product->category_ids = implode(',', $input['category_ids']);
        $product->code = $input['code'];
        $link = $input['name'];
        $product->slug = isset($input['slug']) ? $input['slug'] : $link;
        $product->name = $input['name'];
        $product->name_ru = $input['name_ru'];
        $product->name_it = $input['name_it'];
        $product->title = $input['name'];
        $product->title_ru = $input['name_ru'];
        $product->title_it = $input['name_it'];
        $product->prev = $input['prev'];
        $product->prev_ru = $input['prev_ru'];
        $product->prev_it = $input['prev_it'];
        $product->description = $input['prev'];
        $product->description_ru = $input['prev_ru'];
        $product->description_it = $input['prev_it'];
        $product->published = isset($input['published']) ? 1 : 0;
        $product->save();

        $allData = $this->implodeData($input, $product->id, false);
//        dd($allData);
        DB::transaction(function () use ($product, $allData) {
            $product->main_photo_data = json_encode($allData['main_photo_data']);
            if(!isset($allData['main_photo_data']['photos'])){
                $product->published = 0;
            }
            $oldChildIds = [];
            foreach ($allData['childs'] as $ch_id => $childOne) {
                $one = $childOne;
                $child = ProductChild::create($one);
                $oldChildIds[$ch_id] = $child->id;
            }
            // ProductPhotos
            $oldPhotoIds = [];
            foreach ($allData['photos'] as $ph_id => $photoOne) {
                $one = $photoOne;
                $photo = ProductPhoto::create($one);
                $oldPhotoIds[$ph_id] = $photo->id;
            }
            // ProductPrices
            foreach ($allData['prices'] as $pr_id => $priceOne) {
                $chKey = $priceOne['product_child_id'];
                $phKey = $priceOne['product_photo_id'];
                $chNewKey = isset($oldChildIds[$chKey]) ? $oldChildIds[$chKey] : false;
                $phNewKey = isset($oldPhotoIds[$phKey]) ? $oldPhotoIds[$phKey] : false;
                if($chNewKey && $phNewKey){
                    $one = $priceOne;
                    $one["product_child_id"] = $chNewKey;
                    $one["product_photo_id"] = $phNewKey;
                    ProductPrice::create($one);
                }
            }
            if ($product->save()) {
//                event(new ProductUpdated($product));

                return true;
            }

            $product->delete();
            return false;
        });
    }

    public function update(Model $product, array $input)
    {
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

        $allData = $this->implodeData($input, $product->id, false);

        $product->main_photo_data = json_encode($allData['main_photo_data']);
        if(!isset($allData['main_photo_data']['photos'])){
            $product->published = 0;
        }

//        dd($allData);
//        dd($input);

        DB::transaction(function () use ($product, $allData) {
            // ProductChilds
            foreach ($allData['childs'] as $ch_id => $childOne) {
                $child = ProductChild::find($ch_id);
                $child->update($childOne);
            }
            // ProductPhotos
            foreach ($allData['photos'] as $ph_id => $photoOne) {
                $photo = ProductPhoto::find($ph_id);
                $photo->update($photoOne);
            }
            // ProductPrices
            foreach ($allData['prices'] as $pr_id => $priceOne) {
                $chKey = $priceOne['product_child_id'];
                $phKey = $priceOne['product_photo_id'];
                $ch_id = isset($allData['childs'][$chKey]) ? $chKey : false;
                $ph_id = isset($allData['photos'][$phKey]) ? $phKey : false;
                if($ch_id && $ph_id){
                    ProductPrice::where([
                        'product_child_id' => $ch_id,
                        'product_photo_id' => $ph_id
                    ])->update($priceOne);
                }
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
