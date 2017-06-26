<?php

namespace App\Models\Page;

use App\Models\Block\Block;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Sluggable;

    protected $fillable = ['pageKey', 'title', 'description', 'prev', 'body', 'image'];

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
