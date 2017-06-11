<?php

namespace App\Models\Page;

use App\Models\Block\Block;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['pageKey', 'title', 'description', 'prev', 'body', 'image'];

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }
}
