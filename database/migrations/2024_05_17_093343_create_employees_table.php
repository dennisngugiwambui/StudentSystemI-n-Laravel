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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');

            $table->string('designation');
            $table->string('department');
            $table->string('employment_type');
            $table->date('date_of_joining');
            $table->decimal('salary', 8, 2);

            $table->string('highest_degree');
            $table->string('institution_name');
            $table->year('year_of_completion');

            $table->string('previous_employer')->nullable();
            $table->string('previous_designation')->nullable();
            $table->date('employment_start_date')->nullable();
            $table->date('employment_end_date')->nullable();

            $table->string('government_id');
            $table->string('social_security_number');

            $table->boolean('criminal_record_check')->default(false);
            $table->string('reference_contact_name')->nullable();
            $table->string('reference_contact_phone')->nullable();

            $table->string('bank_account_number');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('payment_method');

            $table->text('medical_history')->nullable();
            $table->string('disability_status')->nullable();

            $table->text('skills_certifications')->nullable();
            $table->string('language_proficiency')->nullable();
            $table->string('photograph_path')->nullable();
            $table->string('unique_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
