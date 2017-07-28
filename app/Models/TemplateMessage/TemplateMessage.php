<?php

namespace App\Models\TemplateMessage;

use Illuminate\Database\Eloquent\Model;

class TemplateMessage extends Model
{
    protected $fillable = [
        'title', 'title_ru', 'title_it',
        'body', 'body_ru', 'body_it'];
}
