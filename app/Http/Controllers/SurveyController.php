<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\SurveyLanguage;
use App\Models\Question;
use App\Models\SurveyData;
use App\Models\Rule;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Services\SurveyService;
use App\Services\UserService;
use App\Services\RuleService;
use App\Jobs\ProcessResponseOnRule;
use App\Jobs\ReconstructSurveyRecord;
use App\Jobs\ReconstructSurveyRecordWithLabels;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;
class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SurveyService $surveyService, UserService $userService)
    {
        //
        try {
            //return $userService->getLoggedinUserTeam();
             $surveys=$surveyService->getSurveysOnTeamId($userService->getLoggedinUserTeam());
             return Inertia::render('Forms/Forms', [
                    'surveys' => $surveys, 

                    
            ]);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RuleService $ruleService)
    {

           //sleep(10);
           $data=$request->all();
           // return $data;
           $validation_rules = array();
           foreach ($data as  $key=>$value)
           {
                $validation_rule=Question::where('id', substr($key, 2))->first('validation_rule')['validation_rule'];
                if ($validation_rule)
                {
                    $validation_rules[$key]=$validation_rule;
                }
                
                
           }
       
           //return $validation_rules;
            $validated = $request->validate($validation_rules);
            $metadata = $request->header();
            //return substr(array_keys($request->all())[0], 2);
            $survey_id=Question::where('id',substr(array_keys($request->all())[0], 2))->first('survey_id')->survey_id;
            //return Rule::where('survey_id',$survey_id)->count() ?: 0; 
           
           
            //return Survey::find($survey_id)->questions()->pluck('id','validation_rule');
            $survey_data=SurveyData::create(['survey_id'=> $survey_id, 'data' => json_encode($request->all()), 'metadata'=> json_encode($metadata)]);

            if ($survey_data)
            {
                //return $survey_data->id;
                //get jobs for rules processing
                if ($ruleService->checkRulesExistenceOnSurvey($survey_id)>0)
                {
                   //get jobs for rules processing
                    $rules=Rule::where('survey_id',$survey_id)->get();
                    foreach ($rules as $rule)
                    {
                        $jobs[] = new ProcessResponseOnRule($survey_data->id, $rule->id);
                    }
                    //return $jobs;
                    //dispatch the jobs as a chain and have a batch and a job within
                    Bus::chain([
                        Bus::batch($jobs)->allowFailures(),
                        new ReconstructSurveyRecord($survey_data->id),
                        new ReconstructSurveyRecordWithLabels($survey_data->id)
                    ])->dispatch();
                    //$batch=Bus::batch($jobs)->dispatch();

                }
                else
                {
                    Bus::chain([
                        new ReconstructSurveyRecord($survey_data->id),
                        new ReconstructSurveyRecordWithLabels($survey_data->id)
                    ])->dispatch();
                }
                //dispatch the jobs in a batch
                return \Redirect::route('surveys.thanks');
            }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($global_id, Request $request, SurveyService $surveyService)
    {
        //
        try {
            
            $survey=Survey::uuid($global_id)->open()->orWhere->opennull()->first();
            $survey_obj=Survey::find($survey->id);
            $survey_id= $survey_obj->id;
            $language_id=$surveyService->getSurveyDefaultLanguage($survey_id);
            $data=$request->all();
            if (isset($data['lang']))
            {   
               $language_id=$data['lang'];
                
            }  
            if ($survey)
            {
                return Inertia::render('Survey/Layout', [
                    'event' => $surveyService->getSurveyQuestions($survey_id, $language_id), 

                    'selected_language' => $language_id
                ]);
            }
            return "Survey is no longer open";
        }
        catch (\Exception $e)
        {
            abort(500, $e->getMessage());
        }
    }
    public function showFields(Survey $survey, SurveyService $surveyService)
    {
        try {
            
            return Inertia::render('Forms/Partials/FormFields', [
                    'survey_questions' => $surveyService->getSurveyQuestions($survey->id, $surveyService->getSurveyDefaultLanguage($survey->id)),
            ]);
            
        }
        catch (\Exception $e)
        {
            abort(500, $e->getMessage());
        }
    }
    public function thankyou(Request $request)
    {
        try {
            if($request->header('referer'))
            {
                return Inertia::render('Survey/ThankYou');
            }
            return "Trying something funny?";
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
