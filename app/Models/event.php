<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\guest;

class event extends Model
{
    use HasFactory, SoftDeletes;

    public function guest(){
        return $this->belongsTo(guest::class, 'guest', 'id');
    }
}
