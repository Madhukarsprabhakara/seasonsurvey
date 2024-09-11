<?php

namespace App\Services;
use App\Models\TempProcessedSurveyData;
use Illuminate\Support\Arr;
class TempDataService {
	public function getTempDataFromAiProcessedData($ai_processed_data, $rule_key) {
       	
       	$ai_processed_data_json = json_decode($ai_processed_data, true);
       	$exists = Arr::exists($ai_processed_data_json, 'prompt_response');
       	if ($exists)
       	{
       		
       		$merged_data[$rule_key]=$ai_processed_data_json['prompt_response'];	
       	}
       	else {
       		$merged_data[$rule_key]=$ai_processed_data_json[0]['prompt_response'];
       	}
        
        return $merged_data;
        

    }
    public function saveTempData($survey_id, $rule_id, $question_id, $survey_data_id, Array $temp_processed_data)
    {
    	  $reference['survey_id']=$survey_id;
        $reference['survey_data_id']=$survey_data_id;
        $reference['question_id']=$question_id;
        $reference['rule_id']=$rule_id;
        $data_preview['temp_processed_data']=json_encode($temp_processed_data);
        $data_preview['survey_id']=$survey_id;
        $data_preview['survey_data_id']=$survey_data_id;
        $data_preview['rule_id']=$rule_id;
        $data_preview['question_id']=$question_id;
        $status=TempProcessedSurveyData::updateOrCreate($reference, $data_preview);
        if (!$status)
        {
            throw new \Exception('Could not save or update data preview'); 
        }
        return $status;
    }
    public function getTempDataForReconstruction(Int $survey_data_id)
    {
    	return TempProcessedSurveyData::where('survey_data_id', $survey_data_id)->get();
    }
}