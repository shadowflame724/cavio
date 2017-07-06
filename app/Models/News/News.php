<?php

namespace App\Models\News;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use Sluggable;

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

    protected $fillable = ['title', 'title_ru', 'title_it',
        'description', 'description_ru', 'description_it',
        'preview', 'preview_ru', 'preview_it',
        'body', 'body_ru', 'body_it',
        'image'];
}
