<?php

namespace App\Models\FinishTissue;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class FinishTissue extends Model
{

    protected $fillable = ['parent_id', 'title', 'type', 'image'];

    public function parent()
    {
        return $this->belongsTo(FinishTissue::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(FinishTissue::class, 'parent_id');
    }
}
