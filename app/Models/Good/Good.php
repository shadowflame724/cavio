<?php

namespace App\Models\Good;

use App\Models\Category\Category;
use App\Models\CollectionZone\CollectionZone;
use App\Models\Dimensions\Dimensions;
use App\Models\FinishTissue\FinishTissue;
use App\Models\GoodsPhotos\GoodsPhotos;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use Sluggable;

    protected $fillable = [
        'category_id',
        'collection_id',
        'code',
        'price',
        'name',
        'name_ru',
        'name_it',
        'slug',
        'description',
        'description_ru',
        'description_it',

    ];

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function collectionZone()
    {
        return $this->belongsToMany(CollectionZone::class);
    }

    public function dimensions()
    {
        return $this->hasMany(Dimensions::class);
    }

    public function finishTissues()
    {
        return $this->belongsToMany(FinishTissue::class);
    }

    public function photos()
    {
        return $this->hasMany(GoodsPhotos::class);
    }
}
