<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            LanguageSeeder::class,
            QuestionTypeSeeder::class,
            SurveySeeder::class,
            SurveyLanguagesSeeder::class,
            SurveyDetailSeeder::class,
            SurveyPagesSeeder::class,
            SurveyQuestionsSeeder::class,
            SurveyQuestionDetailsSeeder::class,
            QuestionOptionsSeeder::class,
            QuestionOptionLanguagesSeeder::class,
            // SurveyPageQuestionsSeeder::class,
            // QuestionOptionsSeeder::class,
            // QuestionOptionLanguagesSeeder::class,
        ]);
    }
}
