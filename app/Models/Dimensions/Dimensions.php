<?php

namespace App\Models\Dimensions;

use App\Models\Good\Good;
use Illuminate\Database\Eloquent\Model;

class Dimensions extends Model
{
    protected $fillable = ['good_id', 'length', 'width', 'height', 'mattress', 'weight'];

    public function goods()
    {
        return $this->belongsTo(Good::class);
    }
}
