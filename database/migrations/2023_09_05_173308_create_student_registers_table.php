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
        Schema::create('student_registers', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('kcp_marks');
            $table->string('form');
            $table->string('kcpe_year');
            $table->string('birthCertOrNemis');
            $table->string('term');
            $table->string('class');
            $table->string('parent_phone');
            $table->string('unique_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registers');
    }
};
