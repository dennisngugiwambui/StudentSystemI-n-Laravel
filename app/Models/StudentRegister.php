<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name', 
        'kcpe_marks',
        'form',
        'kcpe_year',
        'birthCertOrNemis',
        'tern',
        'class'
    ];

    
    public function skills()
    {
        return $this->hasMany(Skill::class, 'student_id');
    }
}
