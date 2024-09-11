<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\QuestionService;
use App\Services\RuleService;
use App\Models\RuleGroup;
use App\Services\EssentialService;
use App\Services\AIService;
use App\Services\SurveyDataService;
use App\Services\SurveyDataPreviewService;
class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($rule_group_id, $question_uuid, QuestionService $questionService, RuleService $ruleService)
    {
        //
        try {
            
            $question=$questionService->getQuestion($question_uuid);
            //return $ruleService->getQuestionRules($question);
            $questionWithDetails=$questionService->getQuestionWithDetails($question);
            $ruleService->getQuestionRules($question);
            $survey_id=$ruleService->getSurveyIdOnRuleGroupId($rule_group_id);
            
            return Inertia::render('Rules/Partials/CreateRuleForm', [
                'question' => $questionWithDetails,
                'survey_id' => $survey_id,
                //'rule_group' =>  $ruleService->getQuestionRules($question),

            ]);
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RuleService $ruleService, EssentialService $essentialService, AIService $aIService, QuestionService $questionService, SurveyDataService $surveyDataService)
    {
        //
        $data=$request->all();
        $rule=$essentialService->addUserIdTeamIdToArray($data);
        $rule=$ruleService->setSortOrder($rule);
        $rule=$ruleService->setColumnNameFromRuleName($rule);
        $savedRule=$ruleService->storeRule($rule);
        

        //Redirect to edit url

        return to_route('rules.edit',['rule' => $savedRule->id]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rule $rule, QuestionService $questionService, RuleService $ruleService, SurveyDataService $surveyDataService, SurveyDataPreviewService $surveyDataPreviewService)
    {
        //
        
        $question=$questionService->getQuestionOnQuestionId($rule->question_id);
        $questionWithDetails=$questionService->getQuestionWithDetails($question);
        $ruleService->getQuestionRules($question);
        //$record_for_preview=$surveyDataService->getOneRecordForAiPreview($rule->survey_id, $questionService->getQuestionKeyOnQuestionId($rule->question_id));
        $previewData=json_decode($surveyDataPreviewService->getPreviewData($rule->id));
        if ($previewData)
        {
            $previewData=json_decode($previewData[0]->processed_data);
        }
        else
        {
            $previewData='';
        }
        
        return Inertia::render('Rules/Partials/Edit/EditRuleForm', [
                'question' => $questionWithDetails,
                'survey_id' => $rule->survey_id,
                'rule' => $rule,
                'preview_data'=> $previewData,
                //'rule_group' =>  $ruleService->getQuestionRules($question),

        ]); 
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rule $rule, EssentialService $essentialService, QuestionService $questionService, RuleService $ruleService, AIService $aIService, SurveyDataService $surveyDataService, SurveyDataPreviewService $surveyDataPreviewService)
    {
        //
       
        $data=$request->all();

        $data=$essentialService->addUserIdTeamIdToArray($data);
        $latest_rule=$ruleService->updateRule($rule->id, $data);
        //return $latest_rule;
        $question=$questionService->getQuestionOnQuestionId($rule->question_id);
        $questionWithDetails=$questionService->getQuestionWithDetails($question);
        $ruleService->getQuestionRules($question);
        
        $record_for_preview=$surveyDataService->getOneRecordForAiPreview($rule->survey_id, $questionService->getQuestionKeyOnQuestionId($rule->question_id));
        if (config('services.bedrock.use'))
        {

            $ai_processed_data=$aIService->invokeAWSLlama3_70b($aIService->setPromptForLlama($questionWithDetails->question_details->title, $latest_rule->rule, $record_for_preview));
        }
        else
        {
            $ai_processed_data=$aIService->getProcessedData($aIService->setPromptForLlama($questionWithDetails->question_details->title, $latest_rule->rule, $record_for_preview));
        }
        //return $ai_processed_data;
        $previewData=$surveyDataPreviewService->getMergedPreviewDataForTableDisplay(json_encode($ai_processed_data['processed_data']), $record_for_preview,$latest_rule->survey_id, $latest_rule->id, $latest_rule->question_id);
        $surveyDataPreviewService->savePreviewData($previewData);
        //execute the rule using llama
        //return the table data
        return \Redirect::back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        //
    }
}
