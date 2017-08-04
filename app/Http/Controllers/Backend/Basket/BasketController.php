<?php

namespace App\Http\Controllers\Backend\Basket;

use App\Models\Basket\Basket;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Models\Settings\Settings;
use App\Repositories\Backend\Product\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class BasketController extends Controller
{
    public function index()
    {
        return view('backend.baskets.index');
    }

    public function table()
    {
        return Datatables::of(Basket::all())
            ->editColumn('created_at', function ($basket) {
                return $basket->created_at ? with(new Carbon($basket->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('user_id', function ($basket) {
                return $basket->user_id ? with(User::find($basket->user_id)->email) : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->editColumn('updated_at', function ($basket) {
                return $basket->updated_at ? with(new Carbon($basket->updated_at))->format('m/d/Y') : '';
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($basket) {
                return '<a href="' . route('admin.baskets.show', array('basket' => $basket->id)) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"></i></a>
            ';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }

    /**
     * @param Basket $basket
     *
     * @return mixed
     */
    public function show(Basket $basket)
    {
        $productData = json_decode($basket->data);
        $iDs = [];
        $settings = Settings::find(1)->first();

        foreach ($productData->product_price_ids as $productPrice) {
            $iDs[] = $productPrice->price_id;
        }
        $langSuf = $this->getLangSuf();

        $products = ProductRepository::getProdsDataByPriceIds($iDs, $langSuf);

        return view('backend.baskets.show', [
            'basket' => $basket,
            'products' => $products,
            'vat' => $settings->vat_data
        ]);
    }
}
