<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'phone',
        'created_at',
        'updated_at'
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'client_id', 'id');
    }

}
