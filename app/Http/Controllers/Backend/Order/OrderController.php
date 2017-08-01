<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Order\ManageOrderRequest;
use App\Http\Requests\Backend\Order\UpdateOrderRequest;
use App\Models\Access\User\User;
use App\Models\Order\Order;
use App\Repositories\Backend\Order\OrderRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Facades\Datatables;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $order;

    /**
     * @param OrderRepository $order
     */
    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    /**
     *
     * @return mixed
     */
    public function index()
    {
        return view('backend.orders.index');
    }

    /**
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function table(ManageOrderRequest $request)
    {
        return Datatables::of($this->order->getForDataTable())
            ->editColumn('created_at', function ($order) {
                return $order->created_at ? with(new Carbon($order->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('user_id', function ($order) {
                return $order->user_id ? with(User::find($order->user_id)->email) : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($order) {
                return '<a href="' . route('admin.orders.edit', array('order' => $order->id)) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
            ';
            })
            ->editColumn('status', '
            @if($status == 0)
            <span class="label label-danger">New</span>
            @elseif($status == 1)
            <span class="label label-success">Sent</span>
            @elseif($status == 2)
            <span class="label label-primary">Delivering</span>
            @elseif($status == 3)
            <span class="label label-default">Closed</span>
            @endif
            ')
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    /**
     * @param Order $order
     * @param ManageOrderRequest $request
     *
     * @return mixed
     */
    public function edit(Order $order, ManageOrderRequest $request)
    {
        $productData = json_decode($order->product_data);

        $products = DB::table('product_prices')
            ->join('product_photos', 'product_prices.product_photo_id', '=', 'product_photos.id')
            ->join('product_childs', 'product_prices.product_child_id', '=', 'product_childs.id')
            //->join('products', 'product_childs.product_id', '=', 'products.id')
            ->whereIn('product_prices.id', $productData->product_price_ids)
            ->get();

        return view('backend.orders.edit', [
            'order' => $order,
            'products' => $products
        ]);
    }

    /**
     *
     *
     * @return mixed
     */
    public function update(Order $order, UpdateOrderRequest $request)
    {
        $this->order->update($order, $request->all());

        return redirect()->route('admin.orders.index')->withFlashSuccess(trans('alerts.backend.orders.updated'));
    }

}
