<?php
namespace App\Services;

use App\Models\Survey;
use App\Models\Question;
use App\Models\RuleGroup;
use App\Models\Rule;
class RuleService {

	public function getQuestionRules(Question $question) {

		$rules=$question->RuleGroup;
        if ($rules)
        {   
            return $rules;
        }
        return '';
        
        
    }
    public function storeRuleGroup($ruleGroup) {
    	
    	if (RuleGroup::create($ruleGroup))
    	{
    		return true;
    	}
    	throw new \Exception('something went wrong, could not store rule group' ); 
    }
    public function setSortOrder($rule)
    {
    	$latest_rule=Rule::where('rule_group_id', $rule['rule_group_id'])->orderBy('sort_order', 'desc')->first();
    	if ($latest_rule)
    	{

    		$rule['sort_order']=$latest_rule['sort_order']+1;
    		
    	}
    	else
    	{
    		$rule['sort_order']=1;
    	}
    	return $rule;
    }

    public function storeRule($rule)
    {
    	$newRule=Rule::create($rule);
    	if ($newRule)
    	{
    		return $newRule;
    	}
    	throw new \Exception('something went wrong, could not store rule group' ); 
    }
    public function updateRule($rule_id, $data)
    {
    	//return $data['rule'];

    	$rule=Rule::find($rule_id);
    	$rule->name=$data['name'];
    	$rule->rule=nl2br($data['rule']);
    	$rule->column=$data['column'];
    	$rule->sort_order=$data['sort_order'];
    	$status=$rule->save();
    	
    	if ($status)
    	{

    		return $rule->fresh();
    	}
    	throw new \Exception('something went wrong, could not store rule group' ); 
    }
    public function getSurveyIdOnRuleGroupId($ruleGroup)
    {
    	return RuleGroup::find($ruleGroup)->survey_id;
    	
    }
    public function setColumnNameFromRuleName($rule)
    {
    	// Remove special characters
    	$rule['column'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $rule['name']);

  // Convert to lower case
    	$rule['column'] = strtolower($rule['column']);

  // Replace white spaces with underscores
    	$rule['column'] = str_replace(' ', '_', $rule['column']);

  // Check if first character is a number and remove it if so
    	if (ctype_digit($rule['column'][0])) {
    		$rule['column'] = substr($rule['column'], 1);
    	}
  
  		return $rule;
    	
    }
    public function checkRulesExistenceOnSurvey(Int $surveyId)
    {
    	$count=Rule::where('survey_id',$surveyId)->count();
    	if ($count)
    	{
    		return $count;
    	}
    	return 0;
    }
    public function getRuleKey(Int $rule_id, String $question_key)
    {
    	return $ruleKey=$question_key.'_r_'.$rule_id;
    }


}