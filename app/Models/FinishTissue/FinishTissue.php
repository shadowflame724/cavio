<?php

namespace App\Models\FinishTissue;

use Illuminate\Database\Eloquent\Model;

class FinishTissue extends Model
{
    protected $fillable = ['parent_id', 'title', 'title_ru', 'title_it', 'type', 'image', 'comment', 'short'];

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
