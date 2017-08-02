<?php

namespace App\Models\Order;

use App\Models\Access\User\User;
use App\Models\Order\Order;
use App\Models\Product\ProductPrice;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;
    protected $table = 'order_products';
    protected $fillable = [
        'order_id',
        'product_price_id',
        'cnt',
        'data'
    ];

    public function orderOne()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function priceOne()
    {
        return $this->belongsTo(ProductPrice::class, 'product_price_id');
    }
}
