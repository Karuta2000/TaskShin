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
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->unsignedBigInteger('color_id')->default(1)->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->string('color', 8)->nullable();
            $table->dropColumn('color_id');
        });
    }
};
