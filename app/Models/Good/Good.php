<?php

namespace App\Models\Good;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use Sluggable;

    protected $fillable=[
        'category_id',
        'collection_id',
        'zone_id',
        'code',
        'name',
        'dimensions',
        'tissue',
        'slug',
        'finish',
        'description'
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
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function collection()
    {
        return $this->belongsTo('App\Models\Collection','collection_id','id');
    }

    public function zone()
    {
        return $this->belongsTo('App\Models\Zone','zone_id','id');
    }
}
