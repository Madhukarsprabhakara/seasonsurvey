<?php

namespace App\Services;

class UserService {
	public function getLoggedinUserTeam() {
       	
       	return \Auth::user()->currentTeam;
       	
        //throw new \Exception('Survey is no longer active'); 
        
    }
}