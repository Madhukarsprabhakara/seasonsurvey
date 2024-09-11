<?php
namespace App\Services;
use App\Models\Survey;
use App\Models\SurveyData;
use App\Models\SurveyDataPreview;
use Illuminate\Support\Arr;
class SurveyDataPreviewService {
    // public function getOneRecordForAiPreview($survey_id, $question_key) {
       
       	
    // 	$survey_data_array=SurveyData::where('survey_id', $survey_id)->get(['data', 'id']);
    // 	foreach ($survey_data_array as $survey_data)
    // 	{
    // 		// return $survey_data;
    // 		$survey_data_json=json_decode($survey_data, true);
    // 		$record_json=json_decode($survey_data_json['data'], true);
    // 		$one_record['data']=$record_json[$question_key];
    // 		$one_record['id']=$survey_data_json['id'];
    // 		if (str_word_count($one_record['data'])>=1)
    // 		{
    // 			return $one_record;
    // 		}
    		
    // 	}
    //     throw new \Exception('There is no data to process'); 
        
    // }
    public function getMergedPreviewDataForTableDisplay($ai_processed_data, $record_for_preview, Int $survey_id, Int $rule_id, Int $question_id)
    {
        $ai_processed_data_json = json_decode($ai_processed_data, true);
        $exists = Arr::exists($ai_processed_data_json, 'prompt_response');
        if ($exists)
        {
            
            $merged_data['processed_data']=$ai_processed_data_json['prompt_response']; 
        }
        else {
            $merged_data['processed_data']=$ai_processed_data_json[0]['prompt_response'];
        }
        
        $merged_data['survey_id']=$survey_id;
        $merged_data['rule_id']=$rule_id;
        $merged_data['question_id']=$question_id;
        $merged_data['survey_data_id']=$record_for_preview['id'];
        $merged_data['original_response']=$record_for_preview['data'];
        return $merged_data;
        //$merged_data['question_response']=$ai_processed_data_json[0]['evaluation_result'];
        throw new \Exception('Cannot merge records'); 
    }
    public function savePreviewData(Array $previewData)
    {
        $reference['survey_id']=$previewData['survey_id'];
        $reference['survey_data_id']=$previewData['survey_data_id'];
        $reference['question_id']=$previewData['question_id'];
        $reference['rule_id']=$previewData['rule_id'];
        $data_preview['processed_data']=json_encode($previewData);
        $data_preview['survey_id']=$previewData['survey_id'];
        $data_preview['survey_data_id']=$previewData['survey_data_id'];
        $data_preview['rule_id']=$previewData['rule_id'];
        $data_preview['question_id']=$previewData['question_id'];
        $status=SurveyDataPreview::updateOrCreate($reference, $data_preview);
        if (!$status)
        {
            throw new \Exception('Could not save or update data preview'); 
        }
        return $previewData;
    }
    public function getPreviewData(Int $rule_id)
    {
        return SurveyDataPreview::where('rule_id', $rule_id)->latest()
                         ->get(['processed_data']);
    }
    
}