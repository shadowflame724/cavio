<?php

namespace App\Models\Access\Block;

use App\Models\Access\Page\Page;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['title', 'body', 'image', 'page_id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
