<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\SurveyData;
use App\Services\ProcessedSurveyDataService;
use App\Services\SurveyService;
use App\Services\SurveyDataService;
use App\Services\QuestionService;
use App\Services\RuleService;
use App\Services\QuestionOptionService;
use App\Jobs\ReconstructSurveyRecordWithLabels;
use App\Jobs\ReconstructSurveyRecord;
use App\Jobs\ProcessResponseOnRule;
use App\Models\Rule;
 use Aws\BedrockRuntime\BedrockRuntimeClient;
Route::get('/', function () {
    if (\Auth::check())
    {
        return to_route('forms.index');
    }
    return Inertia::render('HomePage', [
        'canLogin' => Route::has('login'),
        // 'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/rules', function () {
        return Inertia::render('Rules/Show');
    })->name('rules.index');
    Route::get('/skipquestion', function () {
        return Inertia::render('Validate/SkipLogicQuestion');
    })->name('skipquestion');
    Route::get('/skipui', function() {
        return Inertia::render('Validate/SkipUI');
    })->name('skipui');
    Route::get('/testaapi', function() {
        return "good";
    });
    
    #Rules API

   Route::get('/s/{global_id}/q/{question_uuid}/rules',[App\Http\Controllers\RuleGroupController::class, 'index'])->name('qrules.index');
   Route::post('/storerulegroup', [App\Http\Controllers\RuleGroupController::class, 'store'])->name('groups.store');
   Route::get('/createrule/rg/{rule_group_id}/q/{question_uuid}', [App\Http\Controllers\RuleController::class, 'create'])->name('rules.create');
   Route::post('/storerules', [App\Http\Controllers\RuleController::class, 'store'])->name('rules.store');
   Route::get('/rules/{rule}/edit', [App\Http\Controllers\RuleController::class, 'edit'])->name('rules.edit');
   Route::put('/rules/{rule}', [App\Http\Controllers\RuleController::class, 'update'])->name('rules.update');


   #Forms API

   Route::get('/forms', [App\Http\Controllers\SurveyController::class, 'index'])->name('forms.index');
   Route::get('/forms/{survey}/fields', [App\Http\Controllers\SurveyController::class, 'showFields'])->name('forms.fields');
   Route::get('/forms/create', [App\Http\Controllers\SurveyController::class, 'create'])->name('forms.create');
   Route::get('/forms/{survey}/edit', [App\Http\Controllers\SurveyController::class, 'edit'])->name('forms.edit');
   Route::put('/forms/{survey}', [App\Http\Controllers\SurveyController::class, 'update'])->name('forms.update');
   Route::post('/forms', [App\Http\Controllers\SurveyController::class, 'store'])->name('forms.store');
   //Route::delete('/forms/{survey}/update', [App\Http\Controllers\SurveyController::class, 'update'])->name('forms.update');
   #Tables API
   Route::put('/questionorder/{survey}', [App\Http\Controllers\SurveyPageQuestionController::class, 'update'])->name('questionorder.update');
   Route::get('/questions/{survey}/{question_type}/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('questions.create');
   Route::post('/questions', [App\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');
   Route::get('/questions/{question}/edit', [App\Http\Controllers\QuestionController::class, 'edit'])->name('questions.edit');
   Route::put('/questions/{question}', [App\Http\Controllers\QuestionController::class, 'update'])->name('questions.update');
   

   #Question Options API

   Route::post('/questionoption', [App\Http\Controllers\QuestionOptionController::class, 'store'])->name('questionoptions.store');

   Route::get('/questiontypes', [App\Http\Controllers\QuestionTypeController::class, 'index'])->name('questiontypes.index');

   Route::get('/table', function() {
        return Inertia::render('Forms/Data/Data');
   })->name('data.show');
   Route::get('/sdtable/{global_id}',[App\Http\Controllers\ProcessedSurveyDataController::class, 'show'])->name('surveytable.show');
   Route::get('/sd/{survey_id}',[App\Http\Controllers\ProcessedSurveyDataController::class, 'fetchdata'])->name('surveydata.show');
    
   
    
});

//Public survey link
Route::get('/s/{global_id}',[App\Http\Controllers\SurveyController::class, 'show'])->name('surveys.show');
Route::get('/thankyou',[App\Http\Controllers\SurveyController::class, 'thankyou'])->name('surveys.thanks');
Route::post('/storesurvey', [App\Http\Controllers\SurveyDataController::class, 'store']);
