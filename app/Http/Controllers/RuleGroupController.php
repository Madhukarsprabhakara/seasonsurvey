<?php

namespace App\Http\Controllers;

use App\Models\RuleGroup;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Survey;
use App\Services\SurveyService;
use App\Services\QuestionService;
use App\Services\RuleService;
use App\Services\EssentialService;
class RuleGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($global_id, $question_uuid, SurveyService $surveyService, QuestionService $questionService, RuleService $ruleService)
    {
        //
        try {
            //get survey id based on global id
            //get all survey questions
            //get question id based on question_uuid
            //get rule group id 
            //get rules based on rule group id
            $survey_id= $surveyService->getSurveyId($global_id);
            $language_id=$surveyService->getSurveyDefaultLanguage($survey_id);
            $surveyQuestions=$surveyService->getSurveyQuestions($survey_id, $language_id);
            $question=$questionService->getQuestion($question_uuid);
            $rules=$ruleService->getQuestionRules($question);
            $question['question_details']=$question->QuestionDetails;
            return Inertia::render('Rules/Show',[
                'survey_questions' => $surveyQuestions,
                'rule_group' => $rules,
                'question' => $question,

            ]);
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {

        }
        catch (\Exception $e)
        {
            abort(500, $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RuleService $ruleService, EssentialService $essentialService)
    {
        //
        $data=$request->all();
        $ruleGroup=$essentialService->addUserIdTeamIdToArray($data);
        $ruleService->storeRuleGroup($ruleGroup);
        return \Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(RuleGroup $ruleGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RuleGroup $ruleGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RuleGroup $ruleGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RuleGroup $ruleGroup)
    {
        //
    }
}
