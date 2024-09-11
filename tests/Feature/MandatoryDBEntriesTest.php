<?php

use App\Models\User;
use App\Models\Survey;
use App\Models\Language;
use App\Models\QuestionType;
//use App\Database\Seeders\LanguageSeeder;
use Illuminate\Support\Facades\Artisan;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//uses(RefreshDatabase::class);


beforeEach(function () {
    // Seed the database before each test
    //$this->refreshDatabase();
    Artisan::call('migrate:fresh');
    User::factory()->withPersonalTeam()->unverified()->create();
    $this->artisan('db:seed', [
        '--class' => 'DatabaseSeeder',
    ]);
    
    
});

it('has all correct and mandatory db entries in languages table', function() {
	
	$languages_array=array(
		array(
			'title' => 'US English',
			'language_code'=> 'en'
		),
		array(
			'title' => 'Spanish',
			'language_code'=> 'es'
		),
	);
	
	$languages=Language::get(['title','language_code']);
	expect($languages)->toMatchArray($languages_array);
    //expect($english_langauge->title)->toBe('US English')->and($spanish_langauge->title)->toBe('Spanish');

});
it('has all correct and mandatory db entries in question_types table', function() {
	
	$question_type_array=array(
		array(
			'id' => 1,
			'html_code' => 'Commentfield'
		),
		array(
			'id' => 2,
			'html_code' => 'Numericbox'
		),
		array(
			'id' => 3,
			'html_code' => 'Radiohorizontal'
		),
		array(
			'id' => 4,
			'html_code' => 'Multiplechoice'
		),
		array(
			'id' => 5,
			'html_code' => 'Date'
		),
		array(
			'id' => 6,
			'html_code' => 'Nps'
		),
		array(
			'id' => 7,
			'html_code' => 'Attachment'
		),
		array(
			'id' => 8,
			'html_code' => 'Textbox'
		),

	);
	
	$question_types=QuestionType::get(['id','html_code']);
	expect($question_types)->toMatchArray($question_type_array);
	//expect($qt_cf->id)->toBe(1)->and($qt_cf->html_code)->toBe('Commentfield')->and($qt_nb->id)->roBe(2)->and;

});