<?php

namespace App\Repositories\Backend\Product;

use App\Models\Dimensions\Dimensions;
use App\Models\Product\Product;
use App\Models\ProductsPhotos\ProductsPhotos;
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
        $product->collectionZone()->detach();
        foreach ($input['collectionZone_id'] as $collectionZone) {
            $product->collectionZone()->attach($collectionZone);
        }

        Dimensions::where('product_id', $product->id)->delete();
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

        $product->finishTissues()->detach();
        foreach ($input['finishTissues_id'] as $finishTissue) {
            $product->finishTissues()->attach($finishTissue);
        }

        ProductsPhotos::where('product_id', $product->id)->delete();
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

        DB::transaction(function () use ($product, $input) {
            if ($product->save()) {
                event(new ProductUpdated($product));

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
