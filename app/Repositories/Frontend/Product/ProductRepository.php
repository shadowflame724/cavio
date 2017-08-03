<?php

namespace App\Repositories\Frontend\Product;

use App\Models\Dimensions\Dimensions;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\Zone\Zone;
use App\Models\CollectionZone\CollectionZone;
use App\Models\Product\Product;
use App\Models\Product\ProductChild;
use App\Models\Product\ProductPhoto;
use App\Models\Product\ProductPrice;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
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

    public function getCollZones($colls = null, $zones = null)
    {
        $res = [];
        $cIds = [];
        $zIds = [];
        if(!empty($colls)){
            $modelColls = Collection::select('id','slug')
                ->whereIn('slug', $colls)
                ->orderBy('sort', 'desc')
                ->get();
            foreach ($modelColls as $coll){
                $cIds[$coll->id] = $coll->id;
            }
        }
        if(!empty($zones)){
            $modelZones = Zone::select('id','slug')
                ->whereIn('slug', $zones)
                ->orderBy('sort', 'desc')
                ->get();
            foreach ($modelZones as $zone){
                $zIds[$zone->id] = $zone->id;
            }
        }
        if(!empty($cIds) || !empty($zIds)){
            $modelOne = CollectionZone::select('id','product_ids')
                ->where(function ($query) use ($cIds,$zIds){
                    if(count($cIds) > 0 && count($zIds) > 0){
                        $query
                            ->whereIn('collection_id', $cIds)
                            ->whereIn('zone_id', $zIds);
                    }elseif(count($cIds) > 0){
                        $query
                            ->whereIn('collection_id', $cIds);
                    }elseif(count($zIds) > 0){
                        $query
                            ->whereIn('zone_id', $zIds);
                    }
                })
                ->orderBy('sort', 'desc')
                ->get();
            foreach ($modelOne as $item) {
                $product_ids = explode(',', $item->product_ids);
                foreach ($product_ids as $product_id) {
                    $pr_id = (int)$product_id;
                    if ($pr_id > 0) {
                        $res[$pr_id] = $pr_id;
                    }
                }
            }
        }

        return $res;
    }

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'sort', $sort = 'asc', $paginCnt = 0, $data = [])
    {
        $res = [];
        $col_zon_prods = [];
        if(isset($data['colls']) || isset($data['zones'])){
            $col_zon_prods = $this->getCollZones($data['colls'], $data['zones']);
        }
//        dd($col_zon_prods);
        if($paginCnt > 0) {
            $model = Product::where('published', 1)
                ->orderBy($order_by, $sort)
                ->paginate($paginCnt);
        } else {
            $model = Product::where('published', 1)
                ->orderBy($order_by, $sort)
                ->get();
        }

        if(isset($model)) {
            return $model;
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

    public function getProductsbyPriceIds($basketInfoArr)
    {
        $res = [];
        $ids = [];
        $products = [];

        foreach ($basketInfoArr as $price_id => $count){
            $ids[] = $price_id;
        }
        if(!empty($ids)){
            $products = ProductPrice::whereIn('id', $ids)
                ->where('published', 1)
                ->get();
        }

        if(!empty($products)){
            foreach ($products as $prod){
                $nativePrice = $prod->price;
                $discountPrice = 0;
                if($prod->discount > 0){
                    $nativePrice = round($nativePrice*((100-$prod->discount)/100));
                }
                $vatPrice = round($nativePrice*1.22);

                //Photo
                $productPhoto = ProductPhoto::where('id',$prod->product_photo_id)->first();
                if($productPhoto->published){
                    $productPhotos = (!empty($productPhoto->photos)) ? explode(',',$productPhoto->photos) : [];

                    $finish = [];
                    $finish_ids = (!empty($productPhoto->finish_ids)) ? explode(',',$productPhoto->finish_ids) : [];
                    $finishModel = FinishTissue::whereIn('id',$finish_ids)->get();
                    foreach ($finishModel as $item) {
                        $finish[] = $item->title;
                    }

                    $tissue = [];
                    $tissue_ids = (!empty($productPhoto->tissue_ids)) ? explode(',',$productPhoto->tissue_ids) : [];
                    $tissueModel = FinishTissue::whereIn('id',$tissue_ids)->get();
                    foreach ($tissueModel as $item) {
                        $tissue[] = $item->title;
                    }

                    $productPhotosArrRes = [
                        'id' => $productPhoto->id,
                        'product_id' => $productPhoto->product_id,
                        'photos' => $productPhotos,
                        'finish' => $finish,
                        'tissue' => $tissue,
                        'prev' => $productPhoto->prev,
                        'prev_ru' => $productPhoto->prev_ru,
                        'prev_it' => $productPhoto->prev_it,
                        'main' => $productPhoto->main,
                    ];
                    $ids = explode(',',$productPhoto->collection_ids);
                    $colsArrModel = CollectionZone::whereIn('id',$ids)->with('collection')->get();
                    $collsRes = [];

                    if(!empty($colsArrModel)){
                        foreach ($colsArrModel as $colsArr){
                            $collsRes['zone'][] = $colsArr->title;

                            if(isset($colsArr->collection)){
                                $collsRes['collection'][] = $colsArr->collection->title;
                            }
                        }
                    }

                }

                //Childs
                $productChildsRes = [];
                $productChild = ProductChild::where('id',$prod->product_child_id)->first();
                if($productChild->published){
                    $dimensions = (!empty($productChild->dimensions)) ? \GuzzleHttp\json_decode($productChild->dimensions) : [];
                    $productChildsRes = [
                        'id' => $productChild->id,
                        'product_id' => $productChild->product_id,
                        'code' => $productChild->code,
                        'name' => $productChild->name,
                        'name_ru' => $productChild->name_ru,
                        'name_it' => $productChild->name_it,
                        'prev' => $productChild->prev,
                        'prev_ru' => $productChild->prev_ru,
                        'prev_it' => $productChild->prev_it,
                        'dimensions' => $dimensions
                    ];
                }

                $res[] = [
                    'id' => $prod->id,
                    'price_old' => $prod->price*$basketInfoArr[$prod->id],
                    'count' => $basketInfoArr[$prod->id],
                    'price_new' => $nativePrice*$basketInfoArr[$prod->id],
                    'price_vat' => $vatPrice*$basketInfoArr[$prod->id],
                    'price_vat_def' => $vatPrice,
                    'discount' => $prod->discount,
                    'productChilds' => $productChildsRes,
                    'productPhotos' => $productPhotosArrRes,
                    'collections' => $collsRes
                ];
            }
        }

        return $res;
    }

    public function catOne($slug, $order_by = 'sort', $sort = 'asc', $paginCnt = 0, $data = [])
    {
        $categoryModel = $this->getCatBySlug($slug);

        $product_ids = '';
        if($categoryModel->parent_id == null){
            $ids = [];
            foreach($categoryModel->children as $child){
                if(!empty($child->product_ids)){
                    $prIds = explode(',',$child->product_ids);
                    foreach ($prIds as $prId) {
                        $id = (int)$prId;
                        if($id > 0){
                            $ids[$id] = $id;
                        }
                    }
                }
            }
            $product_ids = implode(',', $ids);
        } elseif(!empty($categoryModel->product_ids)) {
            $product_ids = $categoryModel->product_ids;
        }

        if(!empty($product_ids)){
            $res = [];
            $prodIds = explode(',',$product_ids);
            if($paginCnt > 0) {
                $model = Product::whereIn('id', $prodIds)
                    ->where('published', 1)
                    ->paginate($paginCnt);
            } else {
                $model = Product::whereIn('id', $prodIds)->where('published', 1)->get();
            }

            if(isset($model)) {
                return $model;
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
        $model = Product::where([
            'slug'=>$slug,
            'published'=>1
        ])
            ->with('childs','photos','photos.prices','photos.prices.child')
            ->first();
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

                        //CollectionZone
                        $ids = explode(',',$photo->collection_ids);
                        $colsArrModel = CollectionZone::whereIn('id',$ids)->with('collection')->get();
                        $collsNameRes = [];

                        if(!empty($colsArrModel)){
                            foreach ($colsArrModel as $colsArr){
                                $collsNameRes['zone'][] = $colsArr->title;

                                if(isset($colsArr->collection)){
                                    $collsNameRes['collection'][] = $colsArr->collection->title;
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
                            'colls_name' => $collsNameRes,
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

    public function whereInIds($ids = [])
    {
        $res = [];
        $products = Product::whereIn('id', $ids)
            ->where('published',1)
            ->get();

        foreach ($products as $product) {
            $data = json_decode($product->main_photo_data);
            $photo = '';
            if(isset($data->prices)) {
                $photo = explode(',', $data->photos)[0];
            }
            $prices = '';
            if(isset($data->prices)){
                $prices = $data->prices;
            }
            $discount = false;
            if(isset($data->isDiscount)){
                $discount = $data->isDiscount;
            }

            $res[$product->id] = [
                'isDiscount' => $discount,
                'image' => $photo,
                'prices' => $prices,
                'code' => $product->code,
                'slug' => $product->slug,
                'name' => $product->name,
                'size' => '',
                'name_ru' => $product->name_ru,
                'name_it' => $product->name_it,
            ];
        }

        return $res;
    }
}
