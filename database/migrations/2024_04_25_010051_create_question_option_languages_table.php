<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('question_option_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->foreignId('survey_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->foreignId('question_option_id')->constrained();
            $table->text('help_descr')->nullable();
            $table->text('title');
            $table->foreignId('language_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_option_languages');
    }
};
