<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Order\OrderRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{

    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = access()->user()->id;
        $config = config('app.settings');

        $orders = $this->orders->getByUserId(23);


        if(!empty($orders)){
            foreach ($orders as $keyO => $order){
                $summ = [];
                $summ_vat = 0;
                $summ_default = 0;
                $discount = 0;

                foreach ($order['orderProduct'] as $keyP => $product){
                    if(!empty($product['product'])){
                        $summ_vat = $summ_vat+((int)$product['product']['price_vat']*$product['count']);
                        $summ_default = $summ_default+((int)$product['product']['price_new']*$product['count']);
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

                $orders[$keyO]['sum'] = $summ;
            }

        }


        return view('frontend.user.dashboard',[
            'orders' => $orders
        ]);
    }
}
