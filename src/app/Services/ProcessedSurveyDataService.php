<?php

namespace App\Services;
use App\Models\ProcessedSurveyData;
class ProcessedSurveyDataService {
	public function addProcessedDataToSurveyData(Array $survey_data, $rule_key, $processed_data,  $pos) {
       	
       	//Find index of question key
		//$addArray[$rule_key]=$processed_data;
       	return array_merge( array_slice( $survey_data, 0, $pos ), array($rule_key=>$processed_data), array_slice( $survey_data, $pos ) );
       	//add the array next to index of question key
       	//return resultant array
        //throw new \Exception('Survey is no longer active'); 
        
    }
    public function getPosToInsertProcessedData(Array $survey_data, String $question_key)
    {
    	$keys = array_keys( $survey_data );
        $index = array_search( $question_key, $keys );
        $pos = false === $index ? count( $survey_data ) : $index + 1;
        return $pos;
    }
    public function storeProcessedData(Array $processed_data, Int $survey_id, Int $survey_data_id)
    {
    	$reference['survey_id']=$survey_id;
        $reference['survey_data_id']=$survey_data_id;
        $data['survey_id']=$survey_id;
        $data['survey_data_id']=$survey_data_id;
        $data['processed_survey_data']=json_encode($processed_data);
    	$status=ProcessedSurveyData::updateOrCreate($reference, $data);
    	if (!$status)
        {
            throw new \Exception('Could not save or update processed data'); 
        }
        return $status;
    }
    public function updateProcessedData(Array $survey_data_processed_label, Array $survey_questions_label, Array $survey_questions_key, Int $survey_id, Int $survey_data_id)
    {
        $reference['survey_id']=$survey_id;
        $reference['survey_data_id']=$survey_data_id;
        //$data['processed_survey_data_labels']=json_encode($processed_data);
        $data['survey_data_processed_label']=$survey_data_processed_label;
        $data['survey_questions_label']=$survey_questions_label;
        $data['survey_questions_key']=$survey_questions_key;
        $status=ProcessedSurveyData::updateOrCreate($reference, $data);
        if (!$status)
        {
            throw new \Exception('Could not update labelled processed data'); 
        }
        return $status;
    }
    public function getProcessedSurveyData(Int $survey_data_id)
    {
        return ProcessedSurveyData::where('survey_data_id', $survey_data_id)->first();
    }
    public function getAllProcessedDataOnSurveyId(Int $survey_id)
    {
        return ProcessedSurveyData::where('survey_id', $survey_id)->whereNotNull('survey_data_processed_label')->orderBy('created_at', 'desc')->get();
    }
    
    public function getLatestProcessedDataOnSurveyId(Int $survey_id)
    {
        return ProcessedSurveyData::where('survey_id', $survey_id)
                ->latest()
                ->first(['survey_questions_key','survey_questions_label']);
    }
}