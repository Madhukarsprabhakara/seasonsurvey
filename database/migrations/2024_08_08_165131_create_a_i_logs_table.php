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
        Schema::create('a_i_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_data_id')->nullable();
            $table->longText('prompt')->nullable();
            $table->longText('prompt_response_raw')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_i_logs');
    }
};
