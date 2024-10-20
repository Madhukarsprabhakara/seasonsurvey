<?php

namespace App\Services;

use App\Models\Question;
use App\Models\Survey;
use App\Models\QuestionDetail;
use App\Models\SurveyPageQuestion;
use App\Models\QuestionType;
use App\Models\SurveyPage;
class QuestionService {
	public function getQuestion($question_uuid) {
        $question=Question::where('question_uuid', $question_uuid)->first();
        if ($question)
        {
            return $question_id=$question;
        }
        throw new \Exception('Could not get the question'); 
        
    }
    public function updateQuestion(Question $question)
    {
        $question->save();
        $question->QuestionDetails()->updateOrInsert(['question_id' => $question->id], ['title'=>$question->title, 'short_name' => $question->title]);
        return true;

    }
    public function getQuestionOnQuestionId(Int $questionId)
    {
    	return Question::find($questionId);
    }
    public function getQuestionId($question_uuid) {
        $question=Question::where('question_uuid', $question_uuid)->first();
        if ($question)
        {
            return $question_id=$question->id;
        }
        throw new \Exception('Could not get question id'); 
        
    }
    public function addMandatoryFieldsToQuestionForStoring(Array $question_array, $language_id, QuestionType $question_type, Survey $survey)
    {
        $question_array['language_id']=$language_id;
        $question_array['question_uuid']=\Str::uuid();
        $question_array['question_type_id']=$question_type->id;
        $question_array['survey_id']=$survey->id;
        $question_array['title']='Untitled';
        return $question_array;
    }
    public function storeQuestion(Array $question_array)
    {
        $question=Question::create($question_array);
        $question_detail=new QuestionDetail;
        //$question_detail->question_uuid=$question->question_uuid;
        $question_detail->question_id=$question->id;
        $question_detail->user_id=$question->user_id;
        $question_detail->team_id=$question->team_id;
        $question_detail->survey_id=$question->survey_id;
        $question_detail->language_id=$question->language_id;
        $question_detail->title=$question->title;
        $question_detail->short_name=$question->title;
        $question_detail_saved=$question_detail->save();
        if($question_detail_saved)
        {
            SurveyPageQuestion::where('survey_id', $question->survey_id)->increment('order_no');
        
            $survey_page_question=new SurveyPageQuestion;
            $survey_page_question->user_id=$question->user_id;  
            $survey_page_question->team_id=$question->team_id; 
            $survey_page_question->survey_id=$question->survey_id;
            $survey_page_question->question_id=$question->id;
            $survey_page_question->survey_page_id=SurveyPage::where('survey_id', $question->survey_id)->get(['id'])[0]['id'];
            $survey_page_question->order_no=1;
            $survey_page_question->language_id=$question_detail->language_id;
            $survey_page_question->save();
            
        }
        return $question_detail;




    }
    public function getQuestionWithDetails(Question $question)
    {
    	$question['question_details']=$question->QuestionDetails;
    	return $question;
    }
    public function getSurveyIdOnQuestionId(Int $question_id)
    {
    	$survey_id=SurveyPageQuestion::where('question_id', $question_id)->first()->survey_id;
    	return $survey_id;
    }
    public function getQuestionKeyOnQuestionId(Int $questionId)
    {
    	return $questionKey='a_'.$questionId;

    }
    
}