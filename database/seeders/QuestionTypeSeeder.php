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
                'default_validation' => 'string',
                'html_code_edit' => 'Commentfielde',
                'is_active' => true,
                'sort_order' =>2,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Numeric',
        		'description' => 'Used when you want to collect numbers such as age, salary etc',
        		'icon' => '',
        		'html_code' => 'Numericbox',
                'default_validation' => 'numeric',
                'html_code_edit' => 'Numericboxe',
                'is_active' => true,
                'sort_order' =>1,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Single Choice',
        		'description' => 'Used when you want to people to choose one out of multipe choices',
        		'icon' => '',
        		'html_code' => 'Radiohorizontal',
                'default_validation' => 'string',
                'html_code_edit' => 'Radiohorizontale',
                'is_active' => true,
                'sort_order' =>3,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Multiple Choice',
        		'description' => 'Used when you want to people to choose multiple choices out of multipe choices',
        		'icon' => '',
        		'html_code' => 'Multiplechoice',
                'default_validation' => 'string',
                'html_code_edit' => 'Multiplechoicee',
                'is_active' => false,
                'sort_order' =>8,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Date',
        		'description' => 'Used when you want to people to choose a date',
        		'icon' => '',
        		'html_code' => 'Date',
                'default_validation' => 'date',
                'html_code_edit' => 'Datee',
                'is_active' => false,
                'sort_order' =>9,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'NPS',
        		'description' => 'Used when you want to compute net promoter score',
        		'icon' => '',
        		'html_code' => 'Nps',
                'default_validation' => 'numeric',
                'html_code_edit' => 'Npse',
                'is_active' => false,
                'sort_order' =>6,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Attachment',
        		'description' => 'Allow users to upload pdfs, images, videos and files',
        		'icon' => '',
        		'html_code' => 'Attachment',
                'default_validation' => 'file',
                'html_code_edit' => 'Attachmente',
                'is_active' => false,
                'sort_order' =>7,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
        	DB::table('question_types')->insert([
        		'title'=> 'Textbox',
        		'description' => 'Used to gather information such as name and email',
        		'icon' => '',
        		'html_code' => 'Textbox',
                'default_validation' => 'string',
                'html_code_edit' => 'Textboxe',
                'is_active' => true,
                'sort_order' =>4,
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	]);
            DB::table('question_types')->insert([
                'title'=> 'Email',
                'description' => 'Used to gather email',
                'icon' => '',
                'html_code' => 'Emailaddress',
                'default_validation' => 'email:rfc,dns',
                'html_code_edit' => 'Emailaddresse',
                'is_active' => true,
                'sort_order' =>5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        
    }
}
