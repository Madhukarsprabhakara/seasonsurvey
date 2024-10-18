<?php

namespace App\Services;
use App\Models\QuestionOptionLanguage;
use App\Models\QuestionOption;
class QuestionOptionService {
	public function getOptionLabel(Int $optionId) {
       	
       	return QuestionOptionLanguage::where('question_option_id', $optionId )->first()->title;
        //throw new \Exception('Survey is no longer active'); 
        
    }
    public function storeOption(Array $option)
    {
        //store in QuestionOption
        $option_data=QuestionOption::create($option);
        
        $option_data_language['user_id']=$option_data->user_id;
        $option_data_language['team_id']=$option_data->team_id;
        $option_data_language['survey_id']=$option_data->survey_id;
        $option_data_language['question_id']=$option_data->question_id;
        $option_data_language['question_option_id']=$option_data->id;
        $option_data_language['title']=$option_data->title;
        $option_data_language['language_id']=$option_data->language_id;
        $option_data_lang=QuestionOptionLanguage::create($option_data_language);
        //store in QuestionOptionLanguage
        //$option_data['option_detail']=$option_data_lang;
        return $option_data;
    }
    public function storeOptionArray(Array $options)
    {
        
        $option_update_status=QuestionOption::upsert($options, uniqueBy: ['id'], update: ['question_id','survey_id','team_id','title','language_id','user_id','order_no']);
        $option_language_update_status=QuestionOptionLanguage::upsert($this->replaceIdWithOptionId($options), uniqueBy: ['question_option_id','language_id'], update: ['question_id','survey_id','team_id','title','language_id','user_id','question_option_id']);
        
        if ($option_update_status && $option_language_update_status)
        {
            return true;
            
        }
        throw new \Exception('Could not update questions order'); 
    }
    public function replaceIdWithOptionId(Array $options)
    {
        $array = array_map(function($item) {
                $item['question_option_id'] = $item['id'];
                unset($item['id']);
                unset($item['order_no']);
                return $item;
            }, $options);
        return $array;
    }
}