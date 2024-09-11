<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyLanguage extends Model
{
    use HasFactory;
    public function LanguageDetail()
    {
    	return $this->hasOne(Language::class,  'id','language_id');
    }
    
}
