<?php

namespace App\Http\Controllers;

use App\Models\SurveyPageQuestion;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Services\SurveyPageQuestionService;
class SurveyPageQuestionController extends Controller
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
    public function show(SurveyPageQuestion $surveyPageQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurveyPageQuestion $surveyPageQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey, SurveyPageQuestionService $surveyPageQuestionService)
    {
        //
        //return $request->all();
        $status=$surveyPageQuestionService->updateQuestionSortOrder($request->all());
        return $status;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurveyPageQuestion $surveyPageQuestion)
    {
        //
    }
}
