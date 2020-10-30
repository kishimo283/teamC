<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'student_name',
        'status',
        'event_id'
    ];

    public function events() {
        return $this->belongsTo(Event::class);
    }
}
