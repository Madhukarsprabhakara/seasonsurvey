<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\QuestionType;
class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $count=QuestionType::count();
        if ($count==0)
        {
        	DB::table('question_types')->insert([
        		'title'=> 'Comment Field',
        		'description' => 'Used when you want to collect open ended feedback',
        		'icon' => '',
        		'html_code' => 'Commentfield',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Numeric',
        		'description' => 'Used when you want to collect numbers such as age, salary etc',
        		'icon' => '',
        		'html_code' => 'Numericbox',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Single Choice',
        		'description' => 'Used when you want to people to choose one out of multipe choices',
        		'icon' => '',
        		'html_code' => 'Radiohorizontal',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Multiple Choice',
        		'description' => 'Used when you want to people to choose multiple choices out of multipe choices',
        		'icon' => '',
        		'html_code' => 'Multiplechoice',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Date',
        		'description' => 'Used when you want to people to choose a date',
        		'icon' => '',
        		'html_code' => 'Date',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'NPS',
        		'description' => 'Used when you want to compute net promoter score',
        		'icon' => '',
        		'html_code' => 'Nps',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Attachment',
        		'description' => 'Allow users to upload pdfs, images, videos and files',
        		'icon' => '',
        		'html_code' => 'Attachment',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Textbox',
        		'description' => 'Used to gather information such as name and email',
        		'icon' => '',
        		'html_code' => 'Textbox',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
            DB::table('question_types')->insert([
                'title'=> 'EmailAddress',
                'description' => 'Used to gather email',
                'icon' => '',
                'html_code' => 'Emailaddress',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        
    }
}
