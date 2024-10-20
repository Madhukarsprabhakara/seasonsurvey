<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Survey;
use App\Models\Question;
use App\Models\SurveyData;
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




it('cannot submit data without passing field is required validation', function() {

	$form=[];
	$survey_id = Survey::latest()->first()->id;
	$questions=Question::where('survey_id', $survey_id)->get();
	foreach ($questions as $question)
	{
		if ($question->question_type_id==1)
		{
			$form['a_'. (string)$question->id]='Project Title: "Echoes of Resilience" - A Multimedia Art Installation
Project Description: "Echoes of Resilience" is an immersive art installation that explores the intersection of climate change, mental health, and community resilience. Through a combination of visual art, soundscapes, and interactive technology, I aim to create a poignant and thought-provoking experience that inspires empathy, sparks conversations, and fosters a sense of collective responsibility.
Goals and Outcomes by April 2026:
Completion of the Art Installation: I aim to design and build a large-scale, interactive art piece that incorporates recycled materials, LED lights, and sensor technology. The installation will be showcased in a public art space, accessible to a diverse audience.
Community Engagement: I plan to collaborate with local climate activists, mental health professionals, and community members to collect personal stories and experiences related to climate change and mental wellbeing. These stories will be integrated into the installation as audio narratives, creating a powerful and emotive experience.
Workshop Series: I will develop and facilitate a series of workshops, focusing on art, storytelling, and climate resilience. These workshops will provide a safe space for participants to share their experiences, build connections, and develop creative skills.
Online Platform: I aim to create a dedicated website and social media channels to document the projecs progress, share stories, and provide resources on climate change and mental health.
Impact Evaluation: By April 2026, I aim to have engaged at least 500 community members, collected over 100 personal stories, and received feedback from 80% of workshop participants, indicating increased empathy and understanding of the intersection of climate change and mental health.
Tangible Outcomes:
A fully realized art installation, exhibited in a public art space
A collection of 100+ personal stories and experiences, archived on the project website
A series of 6 workshops, with a total of 120 participants
A dedicated website and social media channels, with a combined following of 1,000+
A comprehensive evaluation report, detailing project impact and outcomes
By achieving these goals, I hope to contribute to a deeper understanding of the complex relationships between climate change, mental health, and community resilience, inspiring creative solutions and collective action towards a more sustainable and compassionate future.';
		}
		
		
	}
	$form['a_1']='';
	$response=$this->post('storesurvey', $form);
	$errorBag=$response->getSession()->get('errors');
	$message = $errorBag->get('a_1')[0];
	expect($message)->toBe('The field is required.');
	//
	

});

it('cannot submit data without passing field is numeric validation', function() {

	$form=[];
	$survey_id = Survey::latest()->first()->id;
	$questions=Question::where('survey_id', $survey_id)->get();
	foreach ($questions as $question)
	{
		if ($question->question_type_id==1)
		{
			$form['a_'. (string)$question->id]='Project Title: "Echoes of Resilience" - A Multimedia Art Installation
Project Description: "Echoes of Resilience" is an immersive art installation that explores the intersection of climate change, mental health, and community resilience. Through a combination of visual art, soundscapes, and interactive technology, I aim to create a poignant and thought-provoking experience that inspires empathy, sparks conversations, and fosters a sense of collective responsibility.
Goals and Outcomes by April 2026:
Completion of the Art Installation: I aim to design and build a large-scale, interactive art piece that incorporates recycled materials, LED lights, and sensor technology. The installation will be showcased in a public art space, accessible to a diverse audience.
Community Engagement: I plan to collaborate with local climate activists, mental health professionals, and community members to collect personal stories and experiences related to climate change and mental wellbeing. These stories will be integrated into the installation as audio narratives, creating a powerful and emotive experience.
Workshop Series: I will develop and facilitate a series of workshops, focusing on art, storytelling, and climate resilience. These workshops will provide a safe space for participants to share their experiences, build connections, and develop creative skills.
Online Platform: I aim to create a dedicated website and social media channels to document the projecs progress, share stories, and provide resources on climate change and mental health.
Impact Evaluation: By April 2026, I aim to have engaged at least 500 community members, collected over 100 personal stories, and received feedback from 80% of workshop participants, indicating increased empathy and understanding of the intersection of climate change and mental health.
Tangible Outcomes:
A fully realized art installation, exhibited in a public art space
A collection of 100+ personal stories and experiences, archived on the project website
A series of 6 workshops, with a total of 120 participants
A dedicated website and social media channels, with a combined following of 1,000+
A comprehensive evaluation report, detailing project impact and outcomes
By achieving these goals, I hope to contribute to a deeper understanding of the complex relationships between climate change, mental health, and community resilience, inspiring creative solutions and collective action towards a more sustainable and compassionate future.';
		}
		if ($question->question_type_id==2)
		{
			$form['a_'. (string)$question->id]='wewew';
		}
		
		
	}
	//$form['a_1']='';
	$response=$this->post('storesurvey', $form);
	$errorBag=$response->getSession()->get('errors');
	$message = $errorBag->get('a_4')[0];
	//expect($message)->dd();
	expect($message)->toBe('The field must be a number.');
	//
	

});

it('cannot submit data without passing field should be between this range validation', function() {
	$form=[];
	$survey_id = Survey::latest()->first()->id;
	$questions=Question::where('survey_id', $survey_id)->get();
	foreach ($questions as $question)
	{
		if ($question->question_type_id==1)
		{
			$form['a_'. (string)$question->id]='Project Title: "Echoes of Resilience" - A Multimedia Art Installation
Project Description: "Echoes of Resilience" is an immersive art installation that explores the intersection of climate change, mental health, and community resilience. Through a combination of visual art, soundscapes, and interactive technology, I aim to create a poignant and thought-provoking experience that inspires empathy, sparks conversations, and fosters a sense of collective responsibility.
Goals and Outcomes by April 2026:
Completion of the Art Installation: I aim to design and build a large-scale, interactive art piece that incorporates recycled materials, LED lights, and sensor technology. The installation will be showcased in a public art space, accessible to a diverse audience.
Community Engagement: I plan to collaborate with local climate activists, mental health professionals, and community members to collect personal stories and experiences related to climate change and mental wellbeing. These stories will be integrated into the installation as audio narratives, creating a powerful and emotive experience.
Workshop Series: I will develop and facilitate a series of workshops, focusing on art, storytelling, and climate resilience. These workshops will provide a safe space for participants to share their experiences, build connections, and develop creative skills.
Online Platform: I aim to create a dedicated website and social media channels to document the projecs progress, share stories, and provide resources on climate change and mental health.
Impact Evaluation: By April 2026, I aim to have engaged at least 500 community members, collected over 100 personal stories, and received feedback from 80% of workshop participants, indicating increased empathy and understanding of the intersection of climate change and mental health.
Tangible Outcomes:
A fully realized art installation, exhibited in a public art space
A collection of 100+ personal stories and experiences, archived on the project website
A series of 6 workshops, with a total of 120 participants
A dedicated website and social media channels, with a combined following of 1,000+
A comprehensive evaluation report, detailing project impact and outcomes
By achieving these goals, I hope to contribute to a deeper understanding of the complex relationships between climate change, mental health, and community resilience, inspiring creative solutions and collective action towards a more sustainable and compassionate future.';
		}
		if ($question->question_type_id==2)
		{
			$form['a_'. (string)$question->id]=500;
		}
		
		
	}
	//$form['a_1']='';
	$response=$this->post('storesurvey', $form);
	$errorBag=$response->getSession()->get('errors');
	$message = $errorBag->get('a_4')[0];
	// expect($message)->dd();
	expect($message)->toBe('The field must be between 1 and 24.');
});

it('Can submit data on a public survey link', function(){
	
	//get the survey id
	//get the survey question id's and type
	//create the form props array
	//create responses based on the type
	//post the form to the endpoint
	//assert that the data was entered in teh database
	//assert that the user was redirected to the thankyou page
	$form=[];
	$survey_id = Survey::latest()->first()->id;
	$questions=Question::where('survey_id', $survey_id)->get();
	foreach ($questions as $question)
	{
		if ($question->question_type_id==1)
		{
			$form['a_'. (string)$question->id]='Project Title: "Echoes of Resilience" - A Multimedia Art Installation
Project Description: "Echoes of Resilience" is an immersive art installation that explores the intersection of climate change, mental health, and community resilience. Through a combination of visual art, soundscapes, and interactive technology, I aim to create a poignant and thought-provoking experience that inspires empathy, sparks conversations, and fosters a sense of collective responsibility.
Goals and Outcomes by April 2026:
Completion of the Art Installation: I aim to design and build a large-scale, interactive art piece that incorporates recycled materials, LED lights, and sensor technology. The installation will be showcased in a public art space, accessible to a diverse audience.
Community Engagement: I plan to collaborate with local climate activists, mental health professionals, and community members to collect personal stories and experiences related to climate change and mental wellbeing. These stories will be integrated into the installation as audio narratives, creating a powerful and emotive experience.
Workshop Series: I will develop and facilitate a series of workshops, focusing on art, storytelling, and climate resilience. These workshops will provide a safe space for participants to share their experiences, build connections, and develop creative skills.
Online Platform: I aim to create a dedicated website and social media channels to document the projecs progress, share stories, and provide resources on climate change and mental health.
Impact Evaluation: By April 2026, I aim to have engaged at least 500 community members, collected over 100 personal stories, and received feedback from 80% of workshop participants, indicating increased empathy and understanding of the intersection of climate change and mental health.
Tangible Outcomes:
A fully realized art installation, exhibited in a public art space
A collection of 100+ personal stories and experiences, archived on the project website
A series of 6 workshops, with a total of 120 participants
A dedicated website and social media channels, with a combined following of 1,000+
A comprehensive evaluation report, detailing project impact and outcomes
By achieving these goals, I hope to contribute to a deeper understanding of the complex relationships between climate change, mental health, and community resilience, inspiring creative solutions and collective action towards a more sustainable and compassionate future.';
		}
		if ($question->question_type_id==2)
		{
			$form['a_'. (string)$question->id]=12;
		}
		if ($question->question_type_id==3)
		{
			$form['a_'. (string)$question->id]=1;
		}
		
	}
	$response=$this->post('storesurvey', $form);
	$survey_data=SurveyData::latest()->first();
	expect($survey_data->id)->toBe(1);
	//->and($name)->toBe('Nuno')
	// $this->assertDatabaseHas('survey_data', [
	//     'id' => 1
	//   ]);
    

});
