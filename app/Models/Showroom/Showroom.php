<?php

namespace App\Models\Showroom;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $fillable = ['country', 'name', 'address',
        'country_ru', 'name_ru', 'address_ru',
        'country_it', 'name_it', 'address_it',
        'phone', 'phone2', 'fax', 'email', 'x', 'y'];
}
