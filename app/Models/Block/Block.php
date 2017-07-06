<?php

namespace App\Models\Block;

use App\Models\Page\Page;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['title', 'title_ru', 'title_it',
        'preview', 'preview_ru', 'preview_it',
        'body', 'body_ru', 'body_it',
        'image', 'page_id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
