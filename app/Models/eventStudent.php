<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\event;
use App\Models\student;

class eventStudent extends Model
{
    use HasFactory, SoftDeletes;

    public function event(){
        return $this->belongsTo(event::class, 'event', 'id');
    }

    public function student(){
        return $this->hasMany(student::class, 'student', 'id');
    }

    public function thisStudent(){
        return $this->belongsTo(student::class, 'student', 'enrollment');
    }
}
