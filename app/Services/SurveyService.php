<?php
namespace App\Services;
use App\Models\Survey;
use App\Models\SurveyLanguage;
use App\Models\Team;
class SurveyService {
    public function getSurveysOnTeamId(Team $team)
    {
        
        return $team->surveys;
    }

    public function getSurveyId($global_id) {
        $survey=Survey::uuid($global_id)->open()->orWhere->opennull()->first();
        if ($survey)
        {
            $survey_obj=Survey::find($survey->id);
            return $survey_id= $survey_obj->id;
        }
        throw new \Exception('Survey is no longer active'); 
        
    }
    public function getSurveyDefaultLanguage(Int $survey_id)
    {
        $survey_lang=SurveyLanguage::where('survey_id', $survey_id)->where('is_default', true)->first();
        return $language_id=$survey_lang->language_id;
    }
    public function getSurveyQuestions(Int $survey_id, Int $language_id)
    {
        $survey_obj=Survey::find($survey_id);
        return $survey_obj
                    ->with(['SurveyDetail' => function ($query) use ($language_id) {
                            $query->where('language_id', $language_id);
                    } ,'languages','pages', 'pages.QuestionIds.question.QuestionDetails' => function ($query) use ($language_id) {
                            $query->where('language_id', $language_id);
                    }, 'pages.QuestionIds.question.RuleGroup','pages.QuestionIds.question.QuestionOptionIds.OptionDetail' => function($query) use ($language_id) {
                        $query->where('language_id', $language_id);
        }])->find($survey_obj->id);
        
    }
    
}