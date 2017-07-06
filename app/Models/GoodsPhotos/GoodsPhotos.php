<?php

namespace App\Models\GoodsPhotos;

use App\Models\Good\Good;
use Illuminate\Database\Eloquent\Model;

class GoodsPhotos extends Model
{
    protected $fillable = ['good_id', 'image', 'type'];

    public function goods()
    {
        return $this->belongsTo(Good::class);
    }
}
