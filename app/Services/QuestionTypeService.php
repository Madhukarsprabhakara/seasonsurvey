<?php

namespace App\Services;

use App\Models\QuestionType;
class QuestionTypeService {
	public function getQuestionTypes() {
       	
       return QuestionType::where('is_active', true)->orderBy('sort_order', 'ASC')->get();
        
    }
}