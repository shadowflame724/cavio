<?php

namespace App\Models\Collection;

use App\Models\Marker\Marker;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['title', 'description', 'image'];

    public function markers()
    {
        return $this->hasMany(Marker::class);
    }
}
