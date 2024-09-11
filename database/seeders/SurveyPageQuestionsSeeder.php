<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class SurveyPageQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('survey_page_questions')->insert([
        	
        	'user_id' => 26,
        	'team_id' => 14,
        	'survey_id' => 1,
        	'question_id' => 1,
        	'survey_page_id' => 1,
        	'order_no' => 1,
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_page_questions')->insert([
        	
        	'user_id' => 26,
        	'team_id' => 14,
        	'survey_id' => 1,
        	'survey_page_id' => 1,
        	'order_no' => 2,
        	'language_id' => 1,
        	'question_id' => 2,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_page_questions')->insert([
        	
        	'user_id' => 26,
        	'team_id' => 14,
        	'survey_id' => 1,
        	'survey_page_id' => 1,
        	'order_no' => 3,
        	'language_id' => 1,
        	'question_id' => 3,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_page_questions')->insert([
        	
        	'user_id' => 26,
        	'team_id' => 14,
        	'survey_id' => 1,
        	'survey_page_id' => 1,
        	'order_no' => 4,
        	'language_id' => 1,
        	'question_id' => 4,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_page_questions')->insert([
        	
        	'user_id' => 26,
        	'team_id' => 14,
        	'survey_id' => 1,
        	'survey_page_id' => 1,
        	'order_no' => 5,
        	'language_id' => 1,
        	'question_id' => 5,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_page_questions')->insert([
        	
        	'user_id' => 26,
        	'team_id' => 14,
        	'survey_id' => 1,
        	'survey_page_id' => 1,
        	'order_no' => 6,
        	'language_id' => 1,
        	'question_id' => 6,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_page_questions')->insert([
        	
        	'user_id' => 26,
        	'team_id' => 14,
        	'survey_id' => 1,
        	'survey_page_id' => 1,
        	'order_no' => 7,
        	'language_id' => 1,
        	'question_id' => 7,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_page_questions')->insert([
        	
        	'user_id' => 26,
        	'team_id' => 14,
        	'survey_id' => 1,
        	'survey_page_id' => 1,
        	'order_no' => 8,
        	'language_id' => 1,
        	'question_id' => 8,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
    }
}
