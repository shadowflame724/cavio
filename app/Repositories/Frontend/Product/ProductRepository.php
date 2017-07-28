<?php

namespace App\Repositories\Frontend\Product;

use App\Models\Dimensions\Dimensions;
use App\Models\Category\Category;
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

    public function getCatBySlug($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        if(!isset($category)){
            abort(404);
        }

        return $category;
    }

    public function catOne($slug)
    {
        $categoryModel = $this->getCatBySlug($slug);

        if(!empty($categoryModel->product_ids)){
            $res = [];
            $prodIds = explode(',',$categoryModel->product_ids);
            $model = Product::whereIn('id',$prodIds)->where('published',1)->get();

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

        return [];
    }

    public function getBySlug($slug, $with = null)
    {
        $model = [];
        $collIds = [];
        $photosArr = [];
        $childs = [];
        $res = [];
        if($with){
            $model = $model->with($with);
        }
        $model = Product::where(['slug'=>$slug,'published'=>1])->with('childs','photos','photos.prices','photos.prices.child')->first();
//dd($model);
        if($model){

            $res = [
                'code' => $model->code,
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
                        $childs[$child->id] = [
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
            $prices = [];
            $photos = [];
            if(isset($model->photos) && !empty($model->photos)){
                foreach ($model->photos as $photo) {
                    if($photo->published){
                        $prices_data = (!empty($photo->prices_data)) ? \GuzzleHttp\json_decode($photo->prices_data) : [];
                        $photos = (!empty($photo->photos)) ? explode(',',$photo->photos) : [];

                        $finish = [];
                        $finish_ids = (!empty($photo->finish_ids)) ? explode(',',$photo->finish_ids) : [];
                        $finishModel = FinishTissue::whereIn('id',$finish_ids)->get();
                        foreach ($finishModel as $item) {
                            $finish[] = $item->title;
                        }

                        $tissue = [];
                        $tissue_ids = (!empty($photo->tissue_ids)) ? explode(',',$photo->tissue_ids) : [];
                        $tissueModel = FinishTissue::whereIn('id',$tissue_ids)->get();
                        foreach ($tissueModel as $item) {
                            $tissue[] = $item->title;
                        }

                        $collection = null;
                        $collection_ids = (!empty($photo->collection_ids)) ? explode(',',$photo->collection_ids) : [];
                        $collectionModel = CollectionZone::whereIn('id',$collection_ids)->get();
                        foreach ($collectionModel as $item) {
                            $collection = explode(',',$item->image);
                        }

                        //prices
                        if(isset($photo->prices) && !empty($photo->prices)){
                            foreach ($photo->prices as $price) {
                                if($price->published){
                                    $nativePrice = $price->price;
                                    $discountPrice = 0;
                                    if($price->discount > 0){
                                        $nativePrice = round($nativePrice*((100-$price->discount)/100));
                                    }
                                    $vatPrice = round($nativePrice*1.22);

                                    $prices[] = [
                                        'id' => $price->id,
                                        'price_old' => $price->price,
                                        'price_new' => $nativePrice,
                                        'discount' => $price->discount,
                                        'price_vat' => $vatPrice,
                                        'discount_price' => $discountPrice,
                                        'product_child_id' => $price->product_child_id,
                                        'product_photo_id' => $price->product_photo_id,
                                        'custom' => $price->custom
                                    ];
                                }
                            }
                        }

                        $photosArr[$photo->id] = [
                            'id' => $photo->id,
                            'product_id' => $photo->product_id,
                            'photos' => $photos,
                            'collection' => $collection,
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
//            dd($prices);

            $newPhoto = [];
            $newChilds = [];
            if (!empty($prices)){
                foreach ($prices as $key => $price) {
                    $prices[$key]['photosArr'] = $photosArr[$price['product_photo_id']];
                    $prices[$key]['childsArr'] = $childs[$price['product_child_id']];
                }
            }
            $res['photos'] = $photosArr;
            $res['childs'] = $childs;
            $res['prices'] = $prices;
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
//        dd($res);
        return $res;
    }
}
