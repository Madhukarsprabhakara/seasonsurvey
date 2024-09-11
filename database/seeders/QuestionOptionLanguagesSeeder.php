<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\QuestionOption;
use App\Models\Survey;
class QuestionOptionLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $question_options=QuestionOption::where('survey_id', Survey::latest()->first()->id)->get();
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
        
        // DB::table('question_option_languages')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'Concept Fully Developed',
        // 	'language_id' => 1,
        // 	'question_id' => 2,
        // 	'question_option_id' => 2,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_option_languages')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'Research and development Stage',
        // 	'language_id' => 1,
        // 	'question_id' => 2,
        // 	'question_option_id' => 3,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_option_languages')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'Deveoping prototype',
        // 	'language_id' => 1,
        // 	'question_id' => 2,
        // 	'question_option_id' => 4,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_option_languages')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'SF Newsletter',
        // 	'language_id' => 1,
        // 	'question_id' => 8,
        // 	'question_option_id' => 5,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_option_languages')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'SF Instagram',
        // 	'language_id' => 1,
        // 	'question_id' => 8,
        // 	'question_option_id' => 6,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_option_languages')->insert([
        	
        // 	'user_id' => 26,
        // 	'team_id' => 14,
        // 	'survey_id' => 1,
        // 	'title' => 'Google search',
        // 	'language_id' => 1,
        // 	'question_id' => 8,
        // 	'question_option_id' => 7,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
    }
}
