<?php

namespace App\Models\Access\Collection;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['title', 'description', 'image'];
}
