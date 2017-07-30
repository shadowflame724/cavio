<?php

namespace App\Repositories\Backend\Order;

use App\Models\Order\Order;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Order\OrderDeleted;
use App\Events\Backend\Order\OrderUpdated;

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Order::class;

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'sort', $sort = 'asc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('orders_table') . '.id',
                config('orders_table') . '.user_id',
                config('orders_table') . '.summ',
                config('orders_table') . '.status',
                config('orders_table') . '.created_at',
            ]);
    }


    /**
     * @param Model $order
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $order, array $input)
    {
        DB::transaction(function () use ($order, $input) {
            $order->status = $input['status'];

            if ($order->save()) {

                event(new OrderUpdated($order, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.order.update_error'));
        });
    }

//    /**
//     * @param Model $order
//     *
//     * @throws GeneralException
//     *
//     * @return bool
//     */
//    public function delete(Model $order)
//    {
//        DB::transaction(function () use ($order) {
//
//            if ($order->delete()) {
//                event(new OrderDeleted($order));
//
//                return true;
//            }
//
//            throw new GeneralException(trans('exceptions.backend.order.delete_error'));
//        });
//    }
}
