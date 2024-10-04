<?php
namespace App\Services;
use App\Models\Survey;
use App\Models\SurveyLanguage;
use App\Models\SurveyDetail;
use App\Models\Language;
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
    public function addUuid(Array $survey_data)
    {
        $survey_data['global_id']=\Str::uuid();
        return $survey_data;
    }
    public function storeSurvey(Array $survey_to_save)
    {
        $survey_to_save['language_id']=$this->addDefaultlanguageId($survey_to_save);
        $survey=Survey::create($survey_to_save);
        $survey_fresh=$survey->fresh();
        $survey_detail=$this->storeSurveyDetail($survey_fresh);
        $survey_language=$this->storeSurveyLanguage($survey_fresh);

        if ($survey && $survey_detail && $survey_language)
        {
            return true;
        }
        throw new \Exception('Something went wrong, could not save your survey. Please try again.' ); 
    }
    public function storeSurveyDetail(Survey $survey_fresh)
    {
        
        $survey_details['user_id']=$survey_fresh->user_id;
        $survey_details['team_id']=$survey_fresh->team_id;
        $survey_details['survey_id']=$survey_fresh->id;
        $survey_details['title']=$survey_fresh->title;
        $survey_details['language_id']=$survey_fresh->language_id;
        $survey_detail=SurveyDetail::create($survey_details);
        if ($survey_detail)
        {
            return true;
        }
        throw new \Exception('Something went wrong, could not save your survey detail. Please try again.' );

    }
    public function storeSurveyLanguage(Survey $survey_fresh)
    {
        $survey_languages['survey_id']=$survey_fresh->id;
        $survey_languages['language_id']=$survey_fresh->language_id;
        $survey_languages['is_default']=1;
        $survey_language=SurveyLanguage::create($survey_languages);
        if ($survey_language)
        {
            return true;
        }
        throw new \Exception('Something went wrong, could not save your survey language. Please try again.' );


    }
    public function addDefaultlanguageId($survey_data)
    {
        return Language::where('is_default', true)->first()['id'];
        
        
    }
    
}