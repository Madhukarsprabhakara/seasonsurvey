<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Services\SurveyService;
use App\Services\QuestionService;
use App\Services\QuestionOptionService;
use App\Services\EssentialService;
use App\Services\QuestionTypeService;
use Inertia\Inertia;
use App\Models\QuestionType;
class QuestionController extends Controller
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
    public function create(Survey $survey, QuestionType $question_type, SurveyService $surveyService, QuestionService $questionService, EssentialService $essentialService) 
    {
        //
        try {
            //get the question type from ui
            //store the question without the title
            //Return the question which includes the type and id 
            //return a flag that tells the UI to show the question edit form
            //return $question_type;
            //return $survey->languages[0]->language_id;
            $edit_question_type = $question_type->html_code_edit;
            $question_array=array();
            $question_array=$essentialService->addUserIdTeamIdToArray($question_array);
            $question_array=$questionService->addMandatoryFieldsToQuestionForStoring($question_array, $surveyService->getSurveyDefaultLanguage($survey->id),  $question_type, $survey);
            $question=$questionService->storeQuestion($question_array);
            return Inertia::render('Forms/Partials/FormFields', [
                    'survey_questions' => $surveyService->getSurveyQuestions($survey->id, $surveyService->getSurveyDefaultLanguage($survey->id)),
                    'edit_question_type' => $question_type,
                    'edit_question_id' => $question->question_id,
                    'question' => $question,
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
    public function store(Request $request, QuestionService $questionService)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question, QuestionTypeService $questionTypeService, SurveyService $surveyService)
    {
        //
        $question_type=$questionTypeService->getQuestionTypeOnId($question->question_type_id);
        return Inertia::render('Forms/Partials/FormFields', [
            'survey_questions' => $surveyService->getSurveyQuestions($question->survey_id, $surveyService->getSurveyDefaultLanguage($question->survey_id)),
            'edit_question_type' => $question_type,
            'edit_question_id' => $question->id,
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question, QuestionService $questionService, QuestionOptionService $questionOptionService)
    {
        //
        
        $data=$request->all();
        $validated = $request->validate([
            'title' => 'required|string',

        ]);  
        $question->title=$data['title'];
        //return $question;
        try {
            if($questionService->updateQuestion($question))
            {   
                if ($question->question_type_id ===10) {
                    $questionOptionService->storeOptionArray($data['question_options']);
                }
                
                return to_route('forms.fields',['survey'=> $question->survey_id]); 
            }
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //delete question_details
        //delete question_options
        //delete survey_page_question
        //delete question

    }
}
