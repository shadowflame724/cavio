<?php

namespace App\Models\Page;

use App\Models\Block\Block;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Sluggable;

    protected $fillable = ['pageKey',
        'title', 'title_ru', 'title_it',
        'description', 'description_ru', 'description_it',
        'prev', 'prev_ru', 'prev_it',
        'body', 'body_ru', 'body_it',
        'image', 'notRemoved'];

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

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }
}
