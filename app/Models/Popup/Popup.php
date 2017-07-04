<?php

namespace App\Models\Popup;

use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    protected $fillable = ['title', 'body', 'image', 'link', 'show'];
}
