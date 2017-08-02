<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Cart\CartContract;
use DB;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Http\Requests\Frontend\Basket\StoreOrderRequest;
use App\Models\Order\Order;
use App\Models\Order\OrderProduct;

use App\Events\Frontend\Auth\UserRegistered;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
//use App\Mail\OrderRegister;
use App\Notifications\Frontend\Order\OrderRegister;
use App\Notifications\Frontend\Order\NewOrder;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class BasketController extends Controller
{
    protected $carts;

    public function __construct(CartContract $carts, ProductRepository $product, UserRepository $user)
    {
        $this->carts = $carts;
        $this->product = $product;
        $this->user = $user;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $config = config('app.settings');
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
        if(isset($config['discount_data']) && !empty($config['discount_data'])){
            foreach ($config['discount_data'] as $discount_data) {
                if($summ_vat >= $discount_data['from'] && $summ_vat <= $discount_data['to']){
                    $discount = $discount_data['equal'];
                }
            }
        }

//        if($summ_vat >= 5000 && $summ_vat <= 10000){
//            $discount = 5;
//        }
//        if($summ_vat >= 10001 && $summ_vat <= 20000){
//            $discount = 10;
//        }

        $summ = [
            'summ_vat' => $summ_vat,
            'summ_default' => $summ_default,
            'discount_all' => $discount,
        ];


        return view('frontend.pages.stash', [
            'summ' => $summ,
            'config' => $config,
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
        $cart = $this->carts->destroy($id);
        $statusCode = 200;
        $response = [];
        $summ = $this->getCartTotal($cart);
        $response['html'] = View('frontend.includes.total_basket', ['summ'=>$summ])->render();
        return response()->json($response, $statusCode);
    }

    public function getCartTotal($cart)
    {
        $config = config('app.settings');
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

        if(isset($config['discount_data']) && !empty($config['discount_data'])){
            foreach ($config['discount_data'] as $discount_data) {
                if($summ_vat >= $discount_data['from'] && $summ_vat <= $discount_data['to']){
                    $discount = $discount_data['equal'];
                }
            }
        }

        $summ = [
            'summ_vat' => $summ_vat,
            'summ_default' => $summ_default,
            'discount_all' => $discount,
        ];
        return $summ;
    }


    public function orderSend(StoreOrderRequest $request, UserRepository $user)
    {
        $response = [];
        $statusCode = 500;
        $cart = $this->carts->findAll();
        $summ = $this->getCartTotal($cart)['summ_vat'];
        if(empty($cart)){
            return response()->json(['basket' => 'Basket empty'], 500);
        }
        $user_data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'region' => $request->input('region'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code'),
        ];
        $product_data = [
            'ip' => $request->ip(),
            'order_data' => $user_data,
            'product_price_ids' => $cart,
        ];
        if (!access()->user()) {
            $usr = [];
            foreach ($user_data as $key => $value) {
                if( $key == 'first_name' ||
                    $key == 'last_name' ||
                    $key == 'email' ||
                    $key == 'phone' ||
                    $key == 'region'){
                    $usr[$key] = $value;
                }
            }
            $usr['password'] = get_random_pass(10, true);

            $user = $this->user->create($usr);
            access()->login($user);
            event(new UserRegistered(access()->user()));
            $user->notify(new OrderRegister([
                'email' => $usr['email'],
                'password' => $usr['password']
            ]));
            $response['user'] = $usr['first_name'];
        }
        $user_id = access()->user()->id;
        $cnt = 0;
        foreach ($cart as $item) {
            $cnt += (int)$item['count'];
        }

        $response['order'] = 'fail';
        $order = new Order;
        $order->user_id = $user_id;
        $order->product_data = json_encode($product_data);
        $order->cnt = $cnt;
        $order->summ = $summ;
        $order->status = 0;
        if($order->save()) {
            $statusCode = 200;
            $response['order'] = 'success';
            foreach ($cart as $item) {
                $orderOne = new OrderProduct;
                $orderOne->order_id = $order->id;
                $orderOne->product_price_id = $item['price_id'];
                $orderOne->cnt = (int)$item['count'];
                $orderOne->data = '[]';
                $orderOne->save();
                $this->carts->destroy($item['price_id']);
            }
            $user->notify(new NewOrder($order));
        }

        return response()->json($response, $statusCode);

    }

}
