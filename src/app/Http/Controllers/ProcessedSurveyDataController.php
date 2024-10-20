<?php

namespace App\Http\Controllers;

use App\Models\ProcessedSurveyData;
use Illuminate\Http\Request;
use App\Services\SurveyService;
use App\Services\ProcessedSurveyDataService;

use Inertia\Inertia;
class ProcessedSurveyDataController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($global_id, Request $request, SurveyService $surveyService, ProcessedSurveyDataService $processedSurveyDataService)
    {
        //
        // try {
            $survey_id=$surveyService->getSurveyId($global_id);
            $latest_record_for_columns=json_decode($processedSurveyDataService->getLatestProcessedDataOnSurveyId($survey_id), true);
            $column_keys=json_decode($latest_record_for_columns['survey_questions_key'], true);
            $column_headers=json_decode($latest_record_for_columns['survey_questions_label'], true);
            //return $columns_array['survey_questions_key'];
            return Inertia::render('Forms/Data/Data', [
                'columns'=>$column_keys,
                'table_header'=>$column_headers,
                'survey_id' => $survey_id,

            ]);
        // }
        // catch (\Exception $e)
        // {
        //     return $e->getMessage();
        // }
    }
    public function fetchdata(Int $survey_id, ProcessedSurveyDataService $processedSurveyDataService)
    {
        try {
            //return $request->user()->tokenCan('post:update')
            $final=array();
             $processed_survey_data=json_decode($processedSurveyDataService->getAllProcessedDataOnSurveyId($survey_id), true);

             foreach ($processed_survey_data as $item)
             {
                $final['data'][]=json_decode(stripslashes($item['survey_data_processed_label']), true);
             }
             return $final;
             
             
            // $data=json_decode($flattened_data[0], true);
            // return $data['processed_survey_data_labels'];
            // return $data['data']=$data['survey_data_processed_label'];
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcessedSurveyData $processedSurveyData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProcessedSurveyData $processedSurveyData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcessedSurveyData $processedSurveyData)
    {
        //
    }
}
