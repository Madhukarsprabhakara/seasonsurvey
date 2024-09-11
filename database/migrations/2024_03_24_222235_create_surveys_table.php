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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->uuid('global_id')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->text('logo')->nullable();
            $table->text('public_url')->nullable();
            $table->boolean('is_open')->nullable();
            $table->boolean('is_public')->nullable();
            $table->foreignId('language_id')->constrained()->nullable();
            $table->boolean('is_archived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
