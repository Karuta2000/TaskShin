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
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default(1)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->text('banner')->nullable();
            $table->string('sex')->nullable();
            $table->text('description')->nullable();
            $table->date('birthday')->nullable();
            $table->unsignedBigInteger('color_id')->default(1)->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_settings');
    }
};
