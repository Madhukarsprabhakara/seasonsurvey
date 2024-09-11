<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Batchable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Rule;
use App\Models\SurveyData;
use App\Models\ProcessedSurveyData;
use App\Models\TempProcessedSurveyData;
use App\Models\Question;
use App\Models\AILog;
use App\Services\QuestionService;
use App\Services\RuleService;
use App\Services\SurveyDataService;
use App\Services\AIService;
use App\Services\TempDataService;
use App\Services\AILogService;

class ProcessResponseOnRule implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    /**
     * Create a new job instance.
     */
    public $tries = 3;
    public $timeout = 240;
    //public $backoff = [45, 90, 120];
    public $survey_data_id, $rule_id;
    public function __construct(Int $survey_data_id, Int $rule_id)
    {
        //
        $this->survey_data_id=$survey_data_id;
        $this->rule_id=$rule_id;
    }

    /**
     * Execute the job.
     */
    public function handle(QuestionService $questionService, RuleService $ruleService, SurveyDataService $surveyDataService, AIService $aIService, TempDataService $tempDataService, AILogService $aILogService): void
    {
        //
        //$this->fail();
        //get the rule
       
        $rule=Rule::find($this->rule_id);
        //get the question id
        //get the question
        //$question=Question::where('id', $rule->question_id)->get();
        $question=$questionService->getQuestionOnQuestionId($rule->question_id);
        $questionWithDetails=$questionService->getQuestionWithDetails($question);
        //construct the key
        $question_key=$questionService->getQuestionKeyOnQuestionId($rule->question_id);
        $rule_key=$ruleService->getRuleKey($this->rule_id, $question_key);

        //get the actual response
        $formResponse=$surveyDataService->getSurveyResponseForAiProcessing($this->survey_data_id, $question_key);
        $prompt=$aIService->setPromptForLlama($questionWithDetails->question_details->title, $rule->rule, $formResponse);
        if (config('services.bedrock.use'))
        {
            $ai_processed_data=$aIService->invokeAWSLlama3_70b($prompt);
        }
        else
        {
            $ai_processed_data=$aIService->getProcessedData($prompt);
        }
        
        //dd($ai_processed_data['processed_data']);
        $aILogService->logAiProcessedData(['survey_data_id'=>$this->survey_data_id, 'prompt'=> $prompt, 'prompt_response_raw'=> json_encode($ai_processed_data)]);

        $temp_data=$tempDataService->getTempDataFromAiProcessedData(json_encode($ai_processed_data['processed_data']), $rule_key);
        $tempDataService->saveTempData($rule->survey_id, $this->rule_id, $rule->question_id, $this->survey_data_id, $temp_data);
        
        //send it to llama for processing
        //get the output and store it on temp_processed_data in temp_processed_survey_data table
    }
}
