<?php

namespace App\Services;
use App\Models\Language;
class EssentialService {
	public function addUserIdTeamIdToArray($array) {
       	
       	$array['user_id']=\Auth::id();
       	$array['team_id']=\Auth::user()->currentTeam->id;
       	return $array;
        //throw new \Exception('Survey is no longer active'); 
        
    }
    public function getDefaultLanguageId()
    {
        return Language::where('is_default', true)->first('id');
    }
}