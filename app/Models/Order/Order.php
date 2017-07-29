<?php

namespace App\Models\Order;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_data', 'cnt', 'summ', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
