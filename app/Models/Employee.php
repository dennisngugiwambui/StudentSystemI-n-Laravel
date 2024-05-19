<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'date_of_birth',
        'gender',
        'nationality',
        'address',
        'phone_number',
        'email',
        'emergency_contact_name',
        'emergency_contact_phone',
        'designation',
        'department',
        'employment_type',
        'date_of_joining',
        'salary',
        'highest_degree',
        'institution_name',
        'year_of_completion',
        'previous_employer',
        'previous_designation',
        'employment_start_date',
        'employment_end_date',
        'government_id',
        'social_security_number',
        'criminal_record_check',
        'reference_contact_name',
        'reference_contact_phone',
        'bank_account_number',
        'bank_name',
        'branch_name',
        'payment_method',
        'medical_history',
        'disability_status',
        'skills_certifications',
        'language_proficiency',
        'photograph_path',
    ];
}
