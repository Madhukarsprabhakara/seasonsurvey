<?php

namespace App\Services;
use App\Models\AILog;
class AILogService {
	public function logAiProcessedData($ai_log) {
       	
       	if ($ai_log_saved=AILog::create($ai_log))
       	{
       		return $ai_log_saved;
       	}
        throw new \Exception('Could not save the log'); 
        
    }
}