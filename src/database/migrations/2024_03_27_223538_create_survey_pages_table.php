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
        Schema::create('survey_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('description')->nullable();
            $table->text('title')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->foreignId('survey_id')->constrained();
            $table->boolean('show_submit_button')->nullable();
            $table->integer('page_type')->nullable();
            $table->jsonb('conditional_logic')->nullable();
            $table->jsonb('branching_logic')->nullable();
            $table->jsonb('redirection_logic')->nullable();
            $table->boolean('is_enabled')->nullable();
            $table->integer('sort_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_pages');
    }
};
