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
use App\Models\CollectionZone\CollectionZone;
use App\Models\FinishTissue\FinishTissue;

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
    public function getBySlug($slug, $with = null)
    {
        $model = [];
        $collIds = [];
        $res = [];
        if($with){
            $model = $model->with($with);
        }
        $model = Product::where(['slug'=>$slug,'published'=>1])->with('childs','photos','photos.prices')->first();
        if($model){
            $main_photo_data = (!empty($model->main_photo_data)) ? \GuzzleHttp\json_decode($model->main_photo_data) : [];
            $photos = (!empty($main_photo_data->photos)) ? $main_photo_data->photos : [];
            $prices = (!empty($main_photo_data->prices)) ? $main_photo_data->prices : [];
            $isDiscount = (!empty($main_photo_data->isDiscount)) ? $main_photo_data->isDiscount : false;

            $res = [
                'code' => $model->code,
                'photos' => $photos,
                'prices' => $prices,
                'isDiscount' => $isDiscount,
                'slug' => $model->slug,
                'name' => $model->name,
                'name_ru' => $model->name_ru,
                'name_it' => $model->name_it,
                'prev' => $model->prev,
                'prev_ru' => $model->prev_ru,
                'prev_it' => $model->prev_it,
                'title' => $model->title,
                'title_ru' => $model->title_ru,
                'title_it' => $model->title_it,
                'description' => $model->description,
                'description_ru' => $model->description_ru,
                'description_it' => $model->description_it
            ];

            //childs
            if(isset($model->childs) && !empty($model->childs)){
                foreach ($model->childs as $child) {
                    if($child->published){
                        $dimensions = (!empty($child->dimensions)) ? \GuzzleHttp\json_decode($child->dimensions) : [];
                        $res['childs'][] = [
                            'id' => $child->id,
                            'product_id' => $child->product_id,
                            'code' => $child->code,
                            'name' => $child->name,
                            'name_ru' => $child->name_ru,
                            'name_it' => $child->name_it,
                            'prev' => $child->prev,
                            'prev_ru' => $child->prev_ru,
                            'prev_it' => $child->prev_it,
                            'dimensions' => $dimensions
                        ];
                    }
                }
            }

            //photos
            if(isset($model->photos) && !empty($model->photos)){
                foreach ($model->photos as $photo) {
                    if($photo->published){
                        $prices_data = (!empty($photo->prices_data)) ? \GuzzleHttp\json_decode($photo->prices_data) : [];
                        $photosArr = (!empty($photo->photos)) ? explode(',',$photo->photos) : [];

                        $finish_ids = (!empty($photo->finish_ids)) ? explode(',',$photo->finish_ids) : [];
                        $finishModel = FinishTissue::whereIn('id',$finish_ids)->get();
                        $finish = $finishModel->title;

                        $tissue_ids = (!empty($photo->tissue_ids)) ? explode(',',$photo->tissue_ids) : [];
                        $tissueModel = FinishTissue::whereIn('id',$tissue_ids)->get();
                        $tissue = $tissueModel->title;

                        //prices
                        $prices = [];
                        if(isset($photo->prices) && !empty($photo->prices)){
                            foreach ($photo->prices as $price) {
                                if($price->published){
                                    $prices[] = [
                                        'price' => $price->price,
                                        'discount' => $price->discount,
                                        'custom' => $price->custom
                                    ];
                                }
                            }
                        }

                        $res['photosArr'][] = [
                            'id' => $photo->id,
                            'product_id' => $photo->product_id,
                            'photos' => $photosArr,
                            'prices_data' => $prices_data,
                            'finish' => $finish,
                            'tissue' => $tissue,
                            'prev' => $photo->prev,
                            'prev_ru' => $photo->prev_ru,
                            'prev_it' => $photo->prev_it,
                            'main' => $photo->main,
                            'prices' => $prices
                        ];

                        $ids = explode(',',$photo->collection_ids);
                        $collIds = array_merge($ids,$collIds);
                    }
                }
            }
            //collections
            $collIds = array_unique($collIds);
            $colsArrModel = CollectionZone::whereIn('id',$collIds)->get();
            $collsRes = [];
            foreach ($colsArrModel as $cols){
                if(!empty($cols->image)){
                    $colsImages = explode(',',$cols->image);
                    $collsRes = array_merge($colsImages,$collsRes);
                }
            }
            $collsRes = array_unique($collsRes);
            $res['collection'] = $collsRes;
        }

        return $res;
    }
}
