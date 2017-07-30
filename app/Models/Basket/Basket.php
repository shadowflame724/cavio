<?php

namespace App\Models\Basket;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = ['user_id', 'data', 'summ', 'count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
