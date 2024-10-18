<?php

namespace App\Http\Controllers;

use App\Models\QuestionOption;
use Illuminate\Http\Request;
use App\Services\QuestionOptionService;
use App\Services\EssentialService;
class QuestionOptionController extends Controller
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
    public function store(Request $request, QuestionOptionService $questionOptionService, EssentialService $essentialService)
    {
        //
       
        $option_to_save=$essentialService->addUserIdTeamIdToArray($request->all());
        return $options_data=$questionOptionService->storeOption($option_to_save);    

    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionOption $questionOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionOption $questionOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionOption $questionOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionOption $questionOption)
    {
        //
    }
}
