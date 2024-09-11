<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\TempProcessedSurveyData;
use App\Models\SurveyData;
use App\Services\TempDataService;
use App\Services\SurveyDataService;
use App\Services\ProcessedSurveyDataService;
use App\Services\QuestionService;
use App\Services\RuleService;
class ReconstructSurveyRecord implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $tries = 3;
    public $timeout = 240;

    public $survey_data_id;
    public function __construct(Int $survey_data_id)
    {
        //
        $this->survey_data_id=$survey_data_id;

    }

    /**
     * Execute the job.
     */
    public function handle(TempDataService $tempDataService, SurveyDataService $surveyDataService, ProcessedSurveyDataService $processedSurveyDataService, QuestionService $questionService, RuleService $ruleService): void
    {
        //

        //get all the arrays based on survey data id from temp data
        $temp_data_array=$tempDataService->getTempDataForReconstruction($this->survey_data_id);
        $survey_data=$surveyDataService->getSurveyDataOnId($this->survey_data_id);
        $processed_merged_array=json_decode($survey_data->data, true);
        if ($temp_data_array)
        {

        //get question key
        //dd($survey_data);
            foreach ($temp_data_array as $temp_data)
            {

                $question_key=$questionService->getQuestionKeyOnQuestionId($temp_data->question_id);
                $rule_key=$ruleService->getRuleKey($temp_data->rule_id, $question_key);
                $processed_data_array=json_decode($temp_data->temp_processed_data, true);
                $processed_data=$processed_data_array[$rule_key];
                $pos=$processedSurveyDataService->getPosToInsertProcessedData($processed_merged_array, $question_key);
                $processed_merged_array=$processedSurveyDataService->addProcessedDataToSurveyData($processed_merged_array, $rule_key, $processed_data, $pos);


            }
            $processedSurveyDataService->storeProcessedData($processed_merged_array, $survey_data->survey_id, $survey_data->id);
        }
        else
        {
            $processedSurveyDataService->storeProcessedData($processed_merged_array, $survey_data->survey_id, $survey_data->id);
        }
        
        //$question_key=$questionService->getQuestionKeyOnQuestionId()
        //get the actual data
        //get the question key index
        //iterate over the temp data and fit it into the array
        //merge the actual data with all the arrays that was fetched previously

    }
}
