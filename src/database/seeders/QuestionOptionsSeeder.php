<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Survey;
use App\Models\Question;
use App\Models\SurveyPage;
class QuestionOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
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
        
        // DB::table('question_options')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'Concept Fully Developed',
        // 	'language_id' => 1,
        // 	'question_id' => 2,
        // 	'order_no' => 2,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_options')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'Research and development Stage',
        // 	'language_id' => 1,
        // 	'question_id' => 2,
        // 	'order_no' => 3,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_options')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'Deveoping prototype',
        // 	'language_id' => 1,
        // 	'question_id' => 2,
        // 	'order_no' => 4,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_options')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'SF Newsletter',
        // 	'language_id' => 1,
        // 	'question_id' => 8,
        // 	'order_no' => 1,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_options')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'SF Instagram',
        // 	'language_id' => 1,
        // 	'question_id' => 8,
        // 	'order_no' => 2,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_options')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'Google search',
        // 	'language_id' => 1,
        // 	'question_id' => 8,
        // 	'order_no' => 3,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
    }
}
