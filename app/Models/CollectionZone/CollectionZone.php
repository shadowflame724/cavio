<?php

namespace App\Models\CollectionZone;

use App\Models\Collection\Collection;
use App\Models\Good\Good;
use App\Models\Zone\Zone;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CollectionZone extends Model
{
    use Sluggable;

    protected $fillable = ['collection_id', 'zone_id',
        'title', 'title_ru', 'title_it', 'image'];

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

    public function goods()
    {
        return $this->hasMany(Good::class);
    }
}
