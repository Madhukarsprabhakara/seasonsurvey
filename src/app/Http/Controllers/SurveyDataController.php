<?php

namespace App\Http\Controllers;

use App\Models\SurveyData;
use Illuminate\Http\Request;

use App\Models\Survey;
use App\Models\SurveyLanguage;
use App\Models\Question;
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
class SurveyDataController extends Controller
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
    public function show(SurveyData $surveyData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurveyData $surveyData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SurveyData $surveyData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurveyData $surveyData)
    {
        //
    }
}
