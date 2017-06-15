<?php

namespace App\Models\Marker;

use App\Models\Collection\Collection;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    protected $fillable = ['title', 'code', 'collection_id', 'x', 'y'];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
