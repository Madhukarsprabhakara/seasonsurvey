<?php

namespace App\Http\Controllers;

use App\Models\QuestionType;
use Illuminate\Http\Request;
use App\Services\QuestionTypeService;
class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(QuestionTypeService $questionTypeService)
    {
        //
        return $questionTypeService->getQuestionTypes();
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
    public function show(QuestionType $questionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionType $questionType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionType $questionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionType $questionType)
    {
        //
    }
}
