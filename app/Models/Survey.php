<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Survey extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function scopeUuid(Builder $query, string $global_id): void
    {
        $query->where('global_id', $global_id);
    }
    public function scopeOpen(Builder $query)
    {
        $query->where('is_open', 1);
    }
    public function scopeOpennull(Builder $query)
    {
        $query->where('is_open', Null);
    }
    public function pages()
    {
    	return $this->hasMany(SurveyPage::class, 'survey_id')->orderBy('sort_order')
                ->with('QuestionIds');
    }
    public function languages()
    {
    	return $this->hasMany(SurveyLanguage::class, 'survey_id')->with('LanguageDetail'); 
    }
    public function SurveyDetail()
    {
        return $this->hasOne(SurveyDetail::class, 'survey_id', 'id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'survey_id');
    }
    public function SurveyData()
    {
        return $this->hasMany(SurveyData::class, 'survey_id');
    }
    public function rules()
    {
        return $this->hasMany(Rule::class, 'survey_id');
    }
}
