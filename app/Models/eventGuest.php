<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\guest;
use App\Models\eventGuest;

class eventGuest extends Model
{
    use HasFactory, SoftDeletes;

    public function guest(){
        return $this->belongsTo(guest::class, 'guest', 'id');
    }
    public function event(){
        return $this->belongsTo(event::class, 'event', 'id');
    }
}
