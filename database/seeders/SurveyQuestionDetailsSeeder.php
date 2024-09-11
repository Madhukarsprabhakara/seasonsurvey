<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Survey;
use App\Models\Question;
use App\Models\SurveyPage;
class SurveyQuestionDetailsSeeder extends Seeder
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
        // DB::table('question_details')->insert([
        	
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => 4,
        // 	'question_id' => 10,
        // 	'title' => 'Please tell us about the creative project that you plan to develop through the Creatives For Our future program, and whqt you aim to achieve by the end of the program (April 2026) - please include tangible goal/outcome',
        //     'language_id' => 1,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_details')->insert([
        	
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => 4,
        // 	'title' => 'Please choose your creative medium for the project and its current phase',
        // 	'language_id' => 1,
        // 	'question_id' => 11,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_details')->insert([
        	
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => 4,
        // 	'title' => 'Please share a rough breakdown how you intend to use the program grant, and how it will help to advance your project.',
        // 	'language_id' => 1,
        // 	'question_id' => 12,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_details')->insert([
        	
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => 4,
        // 	'title' => 'Please tell us your rough timeline of your project development during CFOF',
        // 	'language_id' => 1,
        // 	'question_id' => 13,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_details')->insert([
        	
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => 4,
        // 	'title' => 'How does your work align with sustainable development goals and are there specific goals that align with your creative practice?',
        // 	'language_id' => 1,
        // 	'question_id' => 14,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_details')->insert([
        	
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => 4,
        // 	'title' => 'Are you able to commit to the program schedule from April 2025 until April 2026? We will fecilitate about 2 events (masterclass, networking events etc) every month, and your are required to  attend all sessions unless there is an emergency.',
        // 	'language_id' => 1,
        // 	'question_id' => 15,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_details')->insert([
        	
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => 4,
        // 	'title' => 'We are hosting an in-person event to launch the program in New York in April 2025 (Exact date TBC) - if you are selected as Cohort Year 4, are you able to travel to New York at this time? Do you have a valid passport and are you eligible to enter US? The Swaroski Foundation will provide a supporting letter and cover expenses for the visa applications. For more information, visit Terms and Conditions',
        // 	'language_id' => 1,
        // 	'question_id' => 16,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
        // DB::table('question_details')->insert([
        	
        // 	'user_id' => 1,
        // 	'team_id' => 1,
        // 	'survey_id' => 4,
        // 	'title' => 'How did you find out about the program application?',
        // 	'language_id' => 1,
        // 	'question_id' => 17,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);
    }
}
