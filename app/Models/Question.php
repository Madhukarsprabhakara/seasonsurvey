<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function QuestionOptionIds()
    {
    	return $this->hasMany(QuestionOption::class, 'question_id')->with('OptionDetail')->orderBy('order_no');
    }
    public function QuestionDetails()
    {
    	return $this->hasOne(QuestionDetail::class, 'question_id');
    }
    public function QuestionType()
    {
    	return $this->hasOne(QuestionType::class, 'id','question_type_id');
    }
    public function RuleGroup()
    {
    	return $this->hasOne(RuleGroup::class, 'question_id')->with('Rules');
    }
}
