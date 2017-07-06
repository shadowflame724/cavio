<?php

namespace App\Models\FinishTissue;

use App\Models\Good\Good;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class FinishTissue extends Model
{
    protected $fillable = ['parent_id', 'title', 'title_ru', 'title_it', 'type', 'image'];

    public function parent()
    {
        return $this->belongsTo(FinishTissue::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(FinishTissue::class, 'parent_id');
    }

    public function goods()
    {
        return $this->belongsToMany(Good::class);
    }
}
