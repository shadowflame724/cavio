<?php

namespace App\Models\Showroom;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $fillable = ['country', 'name', 'address', 'phone', 'phone2', 'fax', 'email', 'x', 'y'];
}
