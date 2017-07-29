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

    protected $fillable = ['title', 'title_ru', 'title_it', 'image'];

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

    public function collectionZones()
    {
        return $this->hasMany(CollectionZone::class);
    }

    public function getOneImage()
    {
        $images = $this->collectionZones->first()->image;
        if(!empty($images)){
            return explode(',', $images)[0];
        }
        return '';
    }
}
