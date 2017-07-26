<?php

namespace App\Repositories\Frontend\Product;

use App\Models\Dimensions\Dimensions;
use App\Models\Product\Product;
use App\Models\Product\ProductChild;
use App\Models\Product\ProductPhoto;
use App\Models\Product\ProductPrice;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

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
        $res = [];
        $model = Product::where('published',1)->orderBy($order_by, $sort)->get();

        if(isset($model)) {
            foreach ($model as $item) {
                $main_photo_data = (!empty($item->main_photo_data)) ? \GuzzleHttp\json_decode($item->main_photo_data) : [];
                $photos = (!empty($main_photo_data->photos)) ? $main_photo_data->photos : [];
                $prices = (!empty($main_photo_data->prices)) ? $main_photo_data->prices : [];
                $isDiscount = (!empty($main_photo_data->isDiscount)) ? $main_photo_data->isDiscount : false;

                $res[] = [
                  'code' => $item->code,
                  'photos' => $photos,
                  'prices' => $prices,
                  'isDiscount' => $isDiscount,
                  'slug' => $item->slug,
                  'name' => $item->name,
                  'name_ru' => $item->name_ru,
                  'name_it' => $item->name_it,
                  'prev' => $item->prev,
                  'prev_ru' => $item->prev_ru,
                  'prev_it' => $item->prev_it,
                  'title' => $item->title,
                  'title_ru' => $item->title_ru,
                  'title_it' => $item->title_it,
                  'description' => $item->description,
                  'description_ru' => $item->description_ru,
                  'description_it' => $item->description_it
                ];
            }
        }

        return $res;
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
}
