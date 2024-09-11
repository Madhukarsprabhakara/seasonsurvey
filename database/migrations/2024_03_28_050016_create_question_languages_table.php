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
        Schema::create('question_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained();
            $table->uuid('question_uuid');
            $table->foreign('question_uuid')->references('question_uuid')->on('questions');
            $table->foreignId('language_id')->constrained();
            $table->text('help_descr')->nullable();
            $table->longText('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_languages');
    }
};
