<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";

    protected $fillable = [
        'title',
        'start_date',
        'start_time'
    ];

    public function students() {
        return $this->hasMany(Student::class);
    }
}
