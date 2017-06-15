<?php

namespace App\Models\Block;

use App\Models\Page\Page;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['title', 'preview', 'body', 'image', 'page_id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
