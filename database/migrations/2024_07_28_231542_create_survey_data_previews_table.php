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
        Schema::create('survey_data_previews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained();
            $table->foreignId('rule_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->unsignedBigInteger('survey_data_id')->nullable();
            $table->foreign('survey_data_id')->references('id')->on('survey_data');
            $table->jsonb('processed_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_data_previews');
    }
};
