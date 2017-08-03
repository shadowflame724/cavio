<?php

namespace App\Repositories\Frontend\Order;

use App\Models\Dimensions\Dimensions;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\Zone\Zone;
use App\Models\CollectionZone\CollectionZone;
use App\Models\Product\Product;
use App\Models\Product\ProductChild;
use App\Models\Product\ProductPhoto;
use App\Models\Order\Order;
use App\Models\Order\OrderProduct;
use App\Models\Product\ProductPrice;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\FinishTissue\FinishTissue;

/**
 * Class ProductRepository.
 */
class OrderRepository extends BaseRepository
{
    public function getProductsbyPriceId($price_id)
    {
        $res = [];
        $products = [];


        $prod = ProductPrice::where('id', $price_id)
            ->where('published', 1)
            ->first();

        if(!empty($prod)){
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

            $res = [
                'id' => $prod->id,
                'price_old' => $prod->price,
                'price_new' => $nativePrice,
                'price_vat' => $vatPrice,
                'price_vat_def' => $vatPrice,
                'discount' => $prod->discount,
                'productChilds' => $productChildsRes,
                'productPhotos' => $productPhotosArrRes,
                'collections' => $collsRes
            ];
        }

        return $res;
    }

    public function getByUserId($user_id)
    {
        $statusArr = [
            0 => 'new',
            1 => 'sent',
            2 => 'delivered',
            3 => 'done',
        ];
        $orders = [];
        $model = Order::where('user_id',$user_id)->get();

        if(empty($model)) return [];

        foreach ($model as $order){
            $date = $order->created_at->format('d.m.Y');

            $orderProductArr = [];
            $orderProductModel = OrderProduct::where('order_id',$order->id)->get();
            if(!empty($orderProductModel)){
                foreach ($orderProductModel as $product){
                    $prod = $this->getProductsbyPriceId($product->product_price_id);
                    $orderProductArr[] = [
                        'product' => $prod,
                        'count' => $product->cnt
                    ];
                }
            }

            $orders[] = [
                'id' => $order->id,
                'uid' => $order->uid,
                'user_id' => $order->user_id,
                'status' => $statusArr[$order->status],
                'date' => $date,
                'orderProduct' => $orderProductArr,
            ];
        }

        return $orders;
    }

}
