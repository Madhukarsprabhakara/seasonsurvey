<?php

namespace App\Services;
use App\Models\SurveyPageQuestion;

class SurveyPageQuestionService {
	public function updateQuestionSortOrder(Array $orderArray) {
       	
        $status=SurveyPageQuestion::upsert($orderArray, uniqueBy: ['id'], update: ['order_no']);
        
        if (!$status)
        {
            throw new \Exception('Could not update labelled processed data'); 
        }
        return $status;
        
    }
}