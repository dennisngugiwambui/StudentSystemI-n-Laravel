<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentRegNo',
        'studentName',
        'Role',
        'From',
        'To',
        'status',
        'remarks',
        'warning',
        'disciplined',
    ];
}
