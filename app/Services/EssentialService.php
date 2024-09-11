<?php

namespace App\Services;

class EssentialService {
	public function addUserIdTeamIdToArray($array) {
       	
       	$array['user_id']=\Auth::id();
       	$array['team_id']=\Auth::user()->currentTeam->id;
       	return $array;
        //throw new \Exception('Survey is no longer active'); 
        
    }
}