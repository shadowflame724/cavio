<?php

namespace App\Models\Collection;

use App\Models\CollectionZone\CollectionZone;
use App\Models\Good\Good;
use App\Models\Marker\Marker;
use App\Models\Zone\Zone;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'title_ru', 'title_it',
        'description', 'description_ru', 'description_it',
        'image'];

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

    public function markers()
    {
        return $this->hasMany(Marker::class);
    }

    public function collectionZones()
    {
        return $this->hasMany(CollectionZone::class);
    }

}
