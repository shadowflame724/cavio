<?php

namespace App\Models\CollectionZone;

use App\Models\Collection\Collection;
use App\Models\Zone\Zone;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CollectionZone extends Model
{
    use Sluggable;

    protected $fillable = ['collection_id', 'zone_id', 'title', 'image'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function mainZones()
    {
        return $this->belongsToMany(Zone::class);
    }
}
