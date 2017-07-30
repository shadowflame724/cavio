<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Cart\CartContract;
use DB;
use App\Repositories\Frontend\Product\ProductRepository;
/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class BasketController extends Controller
{
    protected $carts;

    public function __construct(CartContract $carts,ProductRepository $product)
    {
        $this->carts = $carts;
        $this->product = $product;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        dd(config('app.settings'));
        // обычный запрос
        $priceIdsArr = [];
        $products = [];
        $basketGoods = $this->carts->findAll();
        if(!empty($basketGoods)){
            foreach ($basketGoods as $basketGood){
                $basketInfoArr[$basketGood['price_id']] = $basketGood['count'];
            }
            if(!empty($basketInfoArr)){
                $products = $this->product->getProductsbyPriceIds($basketInfoArr);
            }
        }

        $summ = [];
        $summ_vat = 0;
        $summ_default = 0;
        $discount = 0;
        if(!empty($products)){
            foreach ($products as $key => $product){
                $summ_vat = $summ_vat+(int)$product['price_vat'];
                $summ_default = $summ_default+(int)$product['price_new'];
            }
        }

        if($summ_vat >= 5000 && $summ_vat <= 10000){
            $discount = 5;
        }
        if($summ_vat >= 10001 && $summ_vat <= 20000){
            $discount = 10;
        }
        $summ = [
            'summ_vat' => $summ_vat,
            'summ_default' => $summ_default,
            'discount_all' => $discount,
        ];


        return view('frontend.pages.stash', [
            'summ' => $summ,
            'products' => $products
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

    public function update($id, Request $request)
    {
        $response = [];
        try {
            $statusCode = 200;
            $data = [
                'price_id' => $id,
                'count' => $request->input('count'),
            ];
            $cart = $this->carts->update($id, $data);
            $summ = $this->getCartTotal($cart);
            $response['html'] = View('frontend.includes.total_basket', ['summ'=>$summ])->render();

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
        $response = [];
        //$response['item'] = $item;
//        $response['html'] = View('frontend.basket.header',$this->carts->getResult())->render();
        return response()->json($response, $statusCode);
    }

    public function getCartTotal($cart)
    {
        // обычный запрос
        $priceIdsArr = [];
        $products = [];
        $basketGoods = $cart;

        if(!empty($basketGoods)){
            foreach ($basketGoods as $basketGood){
                $basketInfoArr[$basketGood['price_id']] = $basketGood['count'];
            }
            if(!empty($basketInfoArr)){
                $products = $this->product->getProductsbyPriceIds($basketInfoArr);
            }
        }

        $summ = [];
        $summ_vat = 0;
        $summ_default = 0;
        $discount = 0;
        if(!empty($products)){
            foreach ($products as $key => $product){
                $summ_vat = $summ_vat+(int)$product['price_vat'];
                $summ_default = $summ_default+(int)$product['price_new'];
            }
        }

        if($summ_vat >= 5000 && $summ_vat <= 10000){
            $discount = 5;
        }
        if($summ_vat >= 10001 && $summ_vat <= 20000){
            $discount = 10;
        }
        $summ = [
            'summ_vat' => $summ_vat,
            'summ_default' => $summ_default,
            'discount_all' => $discount,
        ];
        return $summ;
    }

}
