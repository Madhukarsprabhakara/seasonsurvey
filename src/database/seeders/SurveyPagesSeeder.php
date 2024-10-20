<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Team;
use App\Models\Survey;
class SurveyPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('survey_pages')->insert([
        	
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'show_submit_button' => false,
        	'sort_order' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);

        //   DB::table('survey_pages')->insert([
            
        //     'user_id' => 2,
        //     'team_id' => 2,
        //     'survey_id' => Survey::latest()->first()->id,
        //     'show_submit_button' => false,
        //     'sort_order' => 1,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}
