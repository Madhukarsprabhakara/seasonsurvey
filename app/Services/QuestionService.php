<?php

namespace App\Services;

use App\Models\Question;
use App\Models\SurveyPageQuestion;
class QuestionService {
	public function getQuestion($question_uuid) {
        $question=Question::where('question_uuid', $question_uuid)->first();
        if ($question)
        {
            return $question_id=$question;
        }
        throw new \Exception('Could not get the question'); 
        
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