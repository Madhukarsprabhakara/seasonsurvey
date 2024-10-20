<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Team;
use App\Models\Survey;
class SurveyQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run(): void
    {
        //
        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,	
        	'title' => 'Please tell us about the creative project that you plan to develop through the Creatives For Our future program, and whqt you aim to achieve by the end of the program (April 2026) - please include tangible goal/outcome',
        	'language_id' => 1,
        	'question_type_id' => 1,
        	'is_mandatory' => false,
        	'validation_rule' => 'required',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
            'question_uuid'=> \Str::uuid(),
            'user_id' => User::latest()->first()->id,
            'team_id' => Team::latest()->first()->id,
            'survey_id' => Survey::latest()->first()->id,
            'title' => 'Please choose your creative medium for the project and its current phase.',
            'language_id' => 1,
            'question_type_id' => 3,
            'is_mandatory' => false,
            'validation_rule' => 'required',
            'language_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
            'question_uuid'=> \Str::uuid(),
            'user_id' => User::latest()->first()->id,
            'team_id' => Team::latest()->first()->id,
            'survey_id' => Survey::latest()->first()->id,
            'title' => 'Please choose how far along are you?',
            'language_id' => 1,
            'question_type_id' => 3,
            'is_mandatory' => false,
            'validation_rule' => 'required',
            'language_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'Approximately how many months of effort has gone into this project?',
        	'language_id' => 1,
        	'question_type_id' => 2,
        	'is_mandatory' => false,
        	'validation_rule' => 'required|numeric|between:1,24',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'Please share a rough breakdown how you intend to use the program grant, and how it will help to advance your project.',
        	'language_id' => 1,
        	'question_type_id' => 1,
        	'is_mandatory' => false,
        	'validation_rule' => 'required',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'Please tell us your rough timeline of your project development during CFOF',
        	'language_id' => 1,
        	'question_type_id' => 1,
        	'is_mandatory' => false,
        	'validation_rule' => 'required',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'How does your work align with sustainable development goals and are there specific goals that align with your creative practice?',
        	'language_id' => 1,
        	'question_type_id' => 1,
        	'is_mandatory' => false,
        	'validation_rule' => 'required',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'Are you able to commit to the program schedule from April 2025 until April 2026? We will fecilitate about 2 events (masterclass, networking events etc) every month, and your are required to  attend all sessions unless there is an emergency.',
        	'language_id' => 1,
        	'question_type_id' => 1,
        	'is_mandatory' => false,
        	'validation_rule' => 'required',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'We are hosting an in-person event to launch the program in New York in April 2025 (Exact date TBC) - if you are selected as Cohort Year 4, are you able to travel to New York at this time? Do you have a valid passport and are you eligible to enter US? The Swaroski Foundation will provide a supporting letter and cover expenses for the visa applications. For more information, visit Terms and Conditions',
        	'language_id' => 1,
        	'question_type_id' => 1,
        	'is_mandatory' => false,
        	'validation_rule' => 'required',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
            'question_uuid'=> \Str::uuid(),
            'user_id' => User::latest()->first()->id,
            'team_id' => Team::latest()->first()->id,
            'survey_id' => Survey::latest()->first()->id,
            'title' => 'How did you find out about the program application?',
            'language_id' => 1,
            'question_type_id' => 3,
            'is_mandatory' => false,
            'validation_rule' => 'required',
            'language_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('questions')->insert([
        	'question_uuid'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'Are you incorporated?',
        	'language_id' => 1,
        	'question_type_id' => 3,
        	'is_mandatory' => false,
        	'validation_rule' => 'required',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);

        //Latest 1 question survey

        // DB::table('questions')->insert([
        //     'question_uuid'=> \Str::uuid(),
        //     'user_id' => 2,
        //     'team_id' => 2,
        //     'survey_id' => Survey::latest()->first()->id,   
        //     'title' => 'Please tell us about the creative project that you plan to develop through the GC Foundation program, and what you aim to achieve by the end of the program (April 2026) - please include tangible goals/outcomes/activities',
        //     'language_id' => 1,
        //     'question_type_id' => 1,
        //     'is_mandatory' => false,
        //     'validation_rule' => 'required',
        //     'language_id' => 1,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

    }
}
