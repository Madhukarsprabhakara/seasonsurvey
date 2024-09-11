<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Language;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        
        DB::table('languages')->updateOrInsert(
            ['title'=> 'US English'],
            [
                'title'=> 'US English',
                'language_code' => 'en',
                'charset' => 'UTF-8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ]);
        DB::table('languages')->updateOrInsert(
            ['title'=> 'Spanish'],
            [
                'title'=> 'Spanish',
                'language_code' => 'es',
                'charset' => 'UTF-8',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ]);
       

        
    }
}
