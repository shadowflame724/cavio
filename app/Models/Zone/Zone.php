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

    protected $fillable = ['title', 'title_ru', 'title_it', 'image'
        , 'name', 'name_ru', 'name_it',
        'description', 'description_ru', 'description_it'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function collectionZones()
    {
        return $this->hasMany(CollectionZone::class);
    }
}
