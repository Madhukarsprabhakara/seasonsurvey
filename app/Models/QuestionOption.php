<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;
    public function OptionDetail()
    {
    	return $this->hasOne(QuestionOptionLanguage::class, 'question_option_id');
    }
}
