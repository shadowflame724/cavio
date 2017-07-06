<?php

namespace App\Models\FAQ;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = ['question', 'question_ru', 'question_it',
        'answer', 'answer_ru', 'answer_it',];

}
