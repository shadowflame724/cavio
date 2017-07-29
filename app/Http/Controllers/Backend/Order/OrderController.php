<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Order\UpdateOrderRequest;
use App\Models\Order\Order;
use App\Repositories\Backend\Order\OrderRepository;
use Illuminate\Http\Request;
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
     *
     * @return mixed
     */
    public function table()
    {
        return Datatables::of($this->order->getForDataTable())
            ->addColumn('actions', function ($order) {
                return '<a href="' . route('admin.orders.edit', array('order' => $order->id)) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="' . route('admin.orders.destroy', array('order' => $order->id)) . '"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="' . csrf_token() . '">
</form>
</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     *
     *
     * @return mixed
     */
    public function update(Order $order, UpdateOrderRequest $request)
    {
        $this->order->update($order, $request->all());

        return redirect()->route('admin.template-messages.index')->withFlashSuccess(trans('alerts.backend.templateMessage.updated'));
    }

}
