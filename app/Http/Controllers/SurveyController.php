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
use App\Services\EssentialService;
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
    public function create(SurveyService $surveyService, UserService $userService)
    {
        //
        try {
            //return $userService->getLoggedinUserTeam();
             $surveys=$surveyService->getSurveysOnTeamId($userService->getLoggedinUserTeam());
             return Inertia::render('Forms/Create', [
                    'surveys' => $surveys, 

                    
            ]);
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, EssentialService $essentialService, SurveyService $surveyService)
    {

        
        $data=$request->all();
        $validated = $request->validate([
            'title' => 'required|string',

        ]);    
        $survey_to_save=$essentialService->addUserIdTeamIdToArray($data);
        $survey_to_save=$surveyService->addUuid($survey_to_save);
        //$survey_to_save=$surveyService->addDefaultlanguageId($survey_to_save);
        $status=$surveyService->storeSurvey($survey_to_save);

        if ($status)
        {
            return \Redirect::route('forms.index');
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
            if (!$survey->is_open)
            {
                return Inertia::render('Survey/ClosedSurvey');
            }
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
