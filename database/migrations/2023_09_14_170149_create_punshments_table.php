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
        Schema::create('punshments', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_RegNo');
            $table->string('form');
            $table->string('reason');
            $table->string('from');
            $table->string('to');
            $table->string('status')->default('unverified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punshments');
    }
};
