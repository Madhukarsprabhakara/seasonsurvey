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
        Schema::table('processed_survey_data', function (Blueprint $table) {
            //
            $table->jsonb('survey_data_processed_label')->nullable();
            $table->jsonb('survey_questions_label')->nullable();
            $table->jsonb('survey_questions_key')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('processed_survey_data', function (Blueprint $table) {
            //
        });
    }
};
