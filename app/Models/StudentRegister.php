<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'email',
        'form',
        'term',
        'class',
        'birth_cert_or_nemis',
        'address',
        'date_of_birth',
        'gender',
        'kcpe_marks',
        'kcpe_year',
        'parent_name',
        'parent_phone',
    ];


    public function skills()
    {
        return $this->hasMany(Skill::class, 'student_id');
    }
}
