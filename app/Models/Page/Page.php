<?php

namespace App\Models\Page;

use App\Models\Block\Block;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'name_ru', 'name_it',
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
                'source' => 'name'
            ]
        ];
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }
}
