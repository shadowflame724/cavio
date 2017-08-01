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
        'title', 'title_ru', 'title_it', 'image',
        'name', 'name_ru', 'name_it',
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

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function mainZone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function goods()
    {
        return $this->hasMany(Good::class);
    }

    public function getImageArray($image)
    {
        return explode(',', $image);
    }
}
