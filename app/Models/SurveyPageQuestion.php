<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyPageQuestion extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function question()
    {
    	return $this->hasOne(Question::class, 'id', 'question_id')->with('QuestionOptionIds','QuestionDetails','QuestionType')->where('is_hidden', 0)->where('is_archived', 0);
    }
}
