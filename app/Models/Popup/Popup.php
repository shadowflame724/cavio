<?php

namespace App\Models\Popup;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $fillable = ['title', 'title_ru', 'title_it',
        'body', 'body_ru', 'body_it',
        'image', 'link', 'show'];
}
