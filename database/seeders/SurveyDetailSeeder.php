<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Team;
use App\Models\User;
use App\Models\Survey;


class SurveyDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('survey_details')->insert([
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'survey_id' => Survey::latest()->first()->id,
        	'title' => 'Application Form 2024',
            'language_id' => 1,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);

        // DB::table('survey_details')->insert([
        //     'user_id' => 2,
        //     'team_id' => 2,
        //     'survey_id' => Survey::latest()->first()->id,
        //     'title' => 'GC Foundation grant application',
        //     'language_id' => 1,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}
