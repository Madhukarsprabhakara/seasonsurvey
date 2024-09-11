<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class SurveyPage extends Model
{
    use HasFactory;
    public function QuestionIds()
    {
    	return $this->hasMany(SurveyPageQuestion::class, 'survey_page_id')->with('question')->orderBy('order_no');
    }
}
