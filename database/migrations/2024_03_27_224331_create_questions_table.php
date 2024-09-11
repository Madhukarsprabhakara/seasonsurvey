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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->uuid('question_uuid')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->foreignId('survey_id')->constrained();
            $table->text('help_descr')->nullable();
            $table->longText('title');
            $table->foreignId('language_id')->constrained()->default(1);
            $table->foreignId('question_type_id')->constrained();
            $table->boolean('is_mandatory')->default(0);
            $table->jsonb('conditional_logic')->nullable();
            $table->jsonb('validation_rule')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
