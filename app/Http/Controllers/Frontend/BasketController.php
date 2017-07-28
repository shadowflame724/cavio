<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Cart\CartContract;
use DB;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class BasketController extends Controller
{
    protected $carts;

    public function __construct(CartContract $carts)
    {
        $this->carts = $carts;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {


        // обычный запрос
        $basketGoods = $this->carts->findAll();
        $goodsIds = [];
        $goods = [];
        $summ = 0;
        if( !empty($basketGoods)){
            foreach ($basketGoods as $item) {
                array_push($goodsIds,$item['goods_id']);
                $summ = $summ + $item['count']*$item['price'];
            }
            $findGoods = DB::table('goods as t')
                ->select('t.id','t.name','t.slug','t.image','t1.slug as section_slug','t2.slug as category_slug')
                ->leftJoin('category_sections as t1','t1.id','=','t.section_id')
                ->leftJoin('categories as t2','t2.id','=','t.category_id')
                ->whereIn('t.id',$goodsIds)
                ->get();
            foreach ($findGoods as $item) {
                $goods[$item->id]['name'] = $item->name;
                $goods[$item->id]['slug'] = $item->slug;
                $goods[$item->id]['image'] = $item->image;
                $goods[$item->id]['section'] = $item->section_slug;
                $goods[$item->id]['category'] = $item->category_slug;
            }
        }


        return view('frontend.basket.index', [
            'summ' => $summ,
            'basket' => $basketGoods,
            'goods' => $goods
        ]);

    }
    /*
     * ajax запрос
     */
    public function show(Request $request){
        if($request->ajax()){
            try {
                $statusCode = 200;
                $response_cart = $this->carts->response();
                $response['items'] = $response_cart['items'];
                $response['html'] = View('frontend.basket.header',$response_cart)->render();
            } catch (Exception $e) {
                $statusCode = 400;
            } finally {
                return response()->json($response, $statusCode);
            }

        }
    }
    public function store(Request $request)
    {
        $data = [
            'price_id' => $request->input('price_id'),
            'count' => $request->input('count'),
        ];
        $item = $this->carts->create($data);

        try {
            $response = [];
            $statusCode = 200;
            $data = [
                'price_id' => $request->input('price_id'),
                'count' => $request->input('count'),
            ];
            $item = $this->carts->create($data);
            $response['item'] = $item;
//            $response['html'] = View('frontend.basket.header',$this->carts->getResult())->render();
        } catch (CException $e) {
            $statusCode = 500;
        } finally {
            return response()->json($response, $statusCode);
        }

    }

    public function update($id, $count, Request $request)
    {
        $response = [];
        try {
            $statusCode = 200;
            $data = [
                'price_id' => $id,
                'count' => $count,
            ];
            $item = $this->carts->update($id, $data);
            $response_cart = $this->carts->getResult();
//            $response['item'] = $item;
//            $response['html'] = View('frontend.basket.header',$response_cart)->render();
        } catch (CException $e) {
            $statusCode = 500;
        } finally {
            return response()->json($response, $statusCode);
        }
    }

    public function destroy($id)
    {
        $this->carts->destroy($id);
        $statusCode = 200;
        //$response['item'] = $item;
        $response['html'] = View('frontend.basket.header',$this->carts->getResult())->render();
        return response()->json($response, $statusCode);
    }

}
