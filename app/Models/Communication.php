<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient_group',
        'form_group',
        'event_name',
        'other_event_name',
        'event_date',
        'event_time',
        'message_content',
    ];
}
