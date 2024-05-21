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
            $table->string('email');
            $table->string('form');
            $table->string('term');
            $table->string('class');
            $table->string('birth_cert_or_nemis');
            $table->string('address');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->integer('kcpe_marks');
            $table->integer('kcpe_year');
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('unique_id');
            $table->string('photogrsaph_path')->nullable();
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
