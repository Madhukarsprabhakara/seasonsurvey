<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Team;
class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        //
        DB::table('surveys')->insert([
        	'global_id'=> \Str::uuid(),
        	'user_id' => User::latest()->first()->id,
        	'team_id' => Team::latest()->first()->id,
        	'title' => 'Creatives Application Form 2024',
            'language_id' => 1,
            'is_open' => true,
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now(),
        ]);

        // DB::table('surveys')->insert([
        // 	'global_id'=> \Str::uuid(),
        // 	'user_id' => User::latest()->first()->id,
        // 	'team_id' => Team::latest()->first()->id,
        // 	'title' => 'GC Foundation grant application',
        //     'language_id' => 1,
        //     'is_open' => true,
        // 	'created_at' => Carbon::now(),
        // 	'updated_at' => Carbon::now(),
        // ]);

    }
}
