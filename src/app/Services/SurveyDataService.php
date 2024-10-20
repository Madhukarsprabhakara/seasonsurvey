<?php
namespace App\Services;
use App\Models\Survey;
use App\Models\SurveyData;
class SurveyDataService {
    public function getOneRecordForAiPreview($survey_id, $question_key) {
       
       	
    	$survey_data_array=SurveyData::where('survey_id', $survey_id)->orderBy('id', 'asc')->get(['data', 'id']);
    	foreach ($survey_data_array as $survey_data)
    	{
    		// return $survey_data;
    		$survey_data_json=json_decode($survey_data, true);
    		$record_json=json_decode($survey_data_json['data'], true);
    		$one_record['data']=$record_json[$question_key];
    		$one_record['id']=$survey_data_json['id'];
    		if (str_word_count($one_record['data'])>=1)
    		{
    			return $one_record;
    		}
    		
    	}
        throw new \Exception('There is no data to process'); 
        
    }
    public function getSurveyResponseForAiProcessing(Int $survey_data_id, String $question_key)
    {
    	$survey_data_string=SurveyData::find($survey_data_id);
    	$survey_data_json=json_decode($survey_data_string, true);
    	$record_json=json_decode($survey_data_json['data'], true);
    	$one_record['data']=$record_json[$question_key];
        if (str_word_count($one_record['data'])>10)
        {
                return $one_record;
        }

    }
    public function getSurveyDataOnId(Int $survey_data_id)
    {
        return SurveyData::find($survey_data_id);
    }
    
}