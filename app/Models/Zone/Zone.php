<?php

namespace App\Models\Zone;

use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use App\Models\Good\Good;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'image'];

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

    public function goods()
    {
        return $this->hasMany(Good::class);
    }

    public function collectionZones()
    {
        return $this->belongsToMany(CollectionZone::class);
    }
}
