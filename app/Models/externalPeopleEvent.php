<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\externalPeople;
use App\Models\event;

class externalPeopleEvent extends Model
{
    use HasFactory, SoftDeletes;

    public function externalPeople(){
        return $this->belongsTo(externalPeople::class, 'externalPeople', 'id');
    }

    public function event(){
        return $this->belongsTo(event::class, 'event', 'id');
    }
}
