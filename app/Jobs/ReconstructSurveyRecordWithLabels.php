<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\SurveyData;
use App\Services\ProcessedSurveyDataService;
use App\Services\SurveyService;
use App\Services\SurveyDataService;
use App\Services\QuestionService;
use App\Services\RuleService;
use App\Services\QuestionOptionService;
class ReconstructSurveyRecordWithLabels implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $survey_data_id;
    public function __construct(Int $survey_data_id)
    {
        //
        $this->survey_data_id=$survey_data_id;
    }

    /**
     * Execute the job.
     */
    public function handle(SurveyService $surveyService, SurveyDataService $surveyDataService, ProcessedSurveyDataService $processedSurveyDataService, QuestionService $questionService, RuleService $ruleService, QuestionOptionService $questionOptionService): void
    {
            $survey_data_processed_label=array();
            $survey_questions_label=array();
            $survey_questions_key=array();
            $processed_survey_data_labels=array();
            $survey_data_id=$this->survey_data_id;


            $survey_data_obj=$processedSurveyDataService->getProcessedSurveyData($survey_data_id);
            $survey_data=json_decode($survey_data_obj->processed_survey_data, true);
            $survey_id=$survey_data_obj->survey_id;
        //process this per survey_data_id
        //get all the questions with details for a survey (columns data)
            $default_language_id=$surveyService->getSurveyDefaultLanguage($survey_id);
            $survey=$surveyService->getSurveyQuestions($survey_id, $default_language_id);
            $questions=json_decode($survey['pages'][0], true);
            foreach ($questions['question_ids'] as $question)
            {
                $question_label=$question['question']['question_details']['short_name'];
                $question_key=$questionService->getQuestionKeyOnQuestionId($question['question']['question_details']['question_id']);

                //create question key
                //use question label as key
                if ($question['question']['question_type_id']===3)
                {
                    $survey_data_processed_label[$question_key]=$questionOptionService->getOptionLabel($survey_data[$question_key]);
                    $survey_data_processed_label['id']=$survey_data_id;
                    $survey_questions_key[]['data']=$question_key;
                    array_push($survey_questions_label,$question_label);
                }
                else
                {
                    $survey_data_processed_label[$question_key]=$survey_data[$question_key];
                    $survey_data_processed_label['id']=$survey_data_id;
                    array_push($survey_questions_label,$question_label);
                    $survey_questions_key[]['data']=$question_key;
                    if ($question['question']['rule_group'])
                    {
                        if (count($question['question']['rule_group']['rules'])>0)
                        {
                            foreach ($question['question']['rule_group']['rules'] as $rule)
                            {
                                $rule_key=$ruleService->getRuleKey($rule['id'], $question_key);
                                if (isset($survey_data[$rule_key]))
                                {
                                    $survey_data_processed_label[$rule_key]=$survey_data[$rule_key];
                                    array_push($survey_questions_label,$question_label.'_r'.$rule['id'].'_('.$rule['name'].')');
                                    $survey_questions_key[]['data']=$rule_key;
                                }
                                else
                                {
                                    $survey_data_processed_label[$rule_key]=null;
                                    array_push($survey_questions_label,$question_label.'_r'.$rule['id'].'_('.$rule['name'].')');
                                    $survey_questions_key[]['data']=$rule_key;
                                }
                                
                            }
                            
                        }
                    }

                }
                
                    

                //fetch data from survey data using the key
                //create a rule key if rule exists
                //create question and rule label as key
                //fetch data based on rukle key 
            }
            //$processed_survey_data_labels['survey_data_processed_label']=$survey_data_processed_label;
            //$processed_survey_data_labels['survey_questions_label']=$survey_questions_label;
            //$processed_survey_data_labels['survey_questions_key']=$survey_questions_key;
            $status=$processedSurveyDataService->updateProcessedData($survey_data_processed_label,$survey_questions_label, $survey_questions_key, $survey_id, $survey_data_id); //save this in the processed survey data table with labels
    }
}
