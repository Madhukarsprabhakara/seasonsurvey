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
    Route::get('/bedrock', function() {
        # The different model providers have individual request and response formats.
        # For the format, ranges, and default values for Meta Llama 2 Chat, refer to:
        # https://docs.aws.amazon.com/bedrock/latest/userguide/model-parameters-meta.html
        $bedrockClient = new BedrockRuntimeClient([
            'version' => 'latest',
            'region' => config('services.bedrock.region'), // Replace with your region
            'credentials' => [
                'key' => config('services.bedrock.key'),
                'secret' => config('services.bedrock.secret'),
            ],
        ]);
        $completion = "";

        try {
            $modelId = 'meta.llama3-1-70b-instruct-v1:0';

            $body = [
                'prompt' => 'What is godfather and who made it?',
                'temperature' => 0.5,
                'max_gen_len' => 512,
            ];

            $result = $bedrockClient->invokeModel([
                'contentType' => 'application/json',
                'body' => json_encode($body),
                'modelId' => $modelId,
            ]);

            $response_body = json_decode($result['body']);

            $completion = $response_body->generation;
        } catch (Exception $e) {
            echo "Error: ({$e->getCode()}) - {$e->getMessage()}\n";
        }

        return $completion;
    });
    Route::get('/questionarraytest', function(SurveyService $surveyService, SurveyDataService $surveyDataService, ProcessedSurveyDataService $processedSurveyDataService, QuestionService $questionService, RuleService $ruleService, QuestionOptionService $questionOptionService){
        try {
            $survey_data_processed_label=array();
            $survey_questions_label=array();
            $survey_questions_key=array();
            $processed_survey_data_labels=array();
            $survey_data_id=128;
            //ReconstructSurveyRecordWithLabels::dispatch($survey_data_id);
            
            
                // Bus::chain([
                        
                //         new ReconstructSurveyRecord($survey_data_id),
                //         new ReconstructSurveyRecordWithLabels($survey_data_id)
                //     ])->dispatch();

                $rules=Rule::where('survey_id',6)->get();
                    foreach ($rules as $rule)
                    {
                        $jobs[] = new ProcessResponseOnRule($survey_data_id, $rule->id);
                    }
                    //return $jobs;
                    //dispatch the jobs as a chain and have a batch and a job within
                    Bus::chain([
                        Bus::batch($jobs)->allowFailures(),
                        new ReconstructSurveyRecord($survey_data_id),
                        new ReconstructSurveyRecordWithLabels($survey_data_id)
                    ])->dispatch();
            
            return;
            // ReconstructSurveyRecord::dispatch($survey_data_id);
            //     ReconstructSurveyRecordWithLabels::dispatch($survey_data_id);
            // return;
            
            
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
        
        
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
   
   #Tables API

   Route::get('/table', function() {
        return Inertia::render('Forms/Data/Data');
   })->name('data.show');
   Route::get('/sdtable/{global_id}',[App\Http\Controllers\ProcessedSurveyDataController::class, 'show'])->name('surveytable.show');
   Route::get('/sd/{survey_id}',[App\Http\Controllers\ProcessedSurveyDataController::class, 'fetchdata'])->name('surveydata.show');
    
   
    
});

//Public survey link
Route::get('/s/{global_id}',[App\Http\Controllers\SurveyController::class, 'show'])->name('surveys.show');
Route::get('/thankyou',[App\Http\Controllers\SurveyController::class, 'thankyou'])->name('surveys.thanks');
Route::post('/storesurvey', [App\Http\Controllers\SurveyController::class, 'store']);
