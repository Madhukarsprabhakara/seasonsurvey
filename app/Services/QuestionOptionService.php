<?php

namespace App\Services;
use App\Models\QuestionOptionLanguage;
class QuestionOptionService {
	public function getOptionLabel(Int $optionId) {
       	
       	return QuestionOptionLanguage::where('question_option_id', $optionId )->first()->title;
        //throw new \Exception('Survey is no longer active'); 
        
    }
}