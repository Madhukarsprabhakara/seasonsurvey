<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Team;
use App\Models\Survey;
use App\Models\Question;
use App\Models\SurveyPage;
use App\Models\QuestionOption;
class EarlyInterestFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('surveys')->insert([
        	'global_id'=> \Str::uuid(),
        	'user_id' => 1,
        	'team_id' => 1,
        	'title' => 'Survey tool research Form',
            'language_id' => 1,
            'is_open' => true,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_languages')->insert([
        	'survey_id' => Survey::latest()->first()->id,
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('survey_details')->insert([
        	'user_id' => 1,
        	'team_id' => 1,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'Survey tool research Form',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);


        DB::table('survey_pages')->insert([
        	
        	'user_id' => 1,
        	'team_id' => 1,
        	'survey_id' => Survey::latest()->first()->id,
        	'show_submit_button' => false,
        	'sort_order' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);

        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => 1,
        	'team_id' => 1,
        	'survey_id' => Survey::latest()->first()->id,	
        	'title' => 'Email',
        	'language_id' => 1,
        	'question_type_id' => 9,
        	'is_mandatory' => false,
        	'validation_rule' => 'required|email:rfc,dns',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);

        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => 1,
        	'team_id' => 1,
        	'survey_id' => Survey::latest()->first()->id,	
        	'title' => 'Tell us about your challenges with your survey tool especially around qualitative data analysis and what tolls do you use to solve the challenges.',
        	'language_id' => 1,
        	'question_type_id' => 1,
        	'is_mandatory' => false,
        	'validation_rule' => 'required',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        // DB::table('questions')->insert([
        // 	'question_uuid'=> \Str::uuid(),
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => Survey::latest()->first()->id,	
        // 	'title' => 'What tools are you currently using to solve challenges around qualitative data analysis?',
        // 	'language_id' => 1,
        // 	'question_type_id' => 1,
        // 	'is_mandatory' => false,
        // 	'validation_rule' => 'required',
        //     'language_id' => 1,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        DB::table('questions')->insert([
            'question_uuid'=> \Str::uuid(),
            'user_id' => User::latest()->first()->id,
            'team_id' => Team::latest()->first()->id,
            'survey_id' => Survey::latest()->first()->id,
            'title' => 'Are you up for a quick call with us to explain more?',
            'language_id' => 1,
            'question_type_id' => 3,
            'is_mandatory' => false,
            'validation_rule' => 'required',
            'language_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $survey=Survey::latest()->first();
        $survey_id=$survey->id;
        $user_id=$survey->user_id;
        $team_id=$survey->team_id;
        $questions=Question::where('survey_id', $survey_id)->get();
        $survey_page_id=SurveyPage::where('survey_id', $survey_id)->first()->id;
        foreach ($questions as $question)
        {
        	DB::table('question_details')->insert([

        		'user_id' => $user_id,
        		'team_id' => $team_id,
        		'survey_id' => $survey_id,
        		'question_id' => $question['id'],
        		'title' => $question['title'],
        		'language_id' => 1,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('survey_page_questions')->insert([

        		'user_id' => $user_id,
        		'team_id' => $team_id,
        		'survey_id' => $survey_id,
        		'question_id' => $question['id'],
        		'survey_page_id' => $survey_page_id,
        		'order_no' => 1,
        		'language_id' => 1,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        }
        
    	$survey=Survey::latest()->first();
        $survey_id=$survey->id;
        $user_id=$survey->user_id;
        $team_id=$survey->team_id;
        $questions=Question::where('survey_id', $survey_id)->get();
        $survey_page_id=SurveyPage::where('survey_id', $survey_id)->first()->id;
        foreach ($questions as $question)
        {
            if ($question->question_type_id==3)
            {
                DB::table('question_options')->insert([

                    'user_id' => $user_id,
                    'team_id' => $team_id,
                    'survey_id' => $survey_id,
                    'title' => 'Yes',
                    'language_id' => 1,
                    'question_id' => $question->id,
                    'order_no' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                DB::table('question_options')->insert([

                    'user_id' => $user_id,
                    'team_id' => $team_id,
                    'survey_id' => $survey_id,
                    'title' => 'No',
                    'language_id' => 1,
                    'question_id' => $question->id,
                    'order_no' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            
        }
        $question_options=QuestionOption::where('survey_id', $survey_id)->get();
        foreach ($question_options as $question_option)
        {
            DB::table('question_option_languages')->insert([

                'user_id' => $question_option->user_id,
                'team_id' => $question_option->team_id,
                'survey_id' => $question_option->survey_id,
                'title' => $question_option->title,
                'language_id' => 1,
                'question_id' => $question_option->question_id,
                'question_option_id' => $question_option->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
}


}
