<?php

namespace App\Http\Controllers;

use App\Models\TestDataPost;
use Illuminate\Http\Request;

class TestDataPostController extends Controller
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
        try {
            // iBUAoAsRe15yvaFa0unp1Klye1sHN716PXISSMSy641bd5dc I3ZUMzKfScuCRDlKnXmpx2LRkUuFFGHsF2IYH5O9771aff98
            $data=$request->all();
            $status=TestDataPost::create($data);
            if ($status)
            {
               return  $status;
            }
            return "Somthing went wrong";
             
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TestDataPost $testDataPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestDataPost $testDataPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestDataPost $testDataPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestDataPost $testDataPost)
    {
        //
    }
}
