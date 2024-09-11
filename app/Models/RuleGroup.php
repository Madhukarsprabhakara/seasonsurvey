<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuleGroup extends Model
{
    use HasFactory;
    protected $guarded = []; 
    public function Rules()
    {
    	return $this->hasMany(Rule::class, 'rule_group_id')->orderBy('sort_order');
    }
}
