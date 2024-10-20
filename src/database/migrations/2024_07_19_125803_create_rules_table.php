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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('rule_group_id')->constrained();
            $table->longText('rule');
            $table->string('column');
            $table->integer('sort_order');
            $table->boolean('dependent')->default(false);
            $table->bigInteger('dependent_rule_id')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->foreignId('survey_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_archived')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
