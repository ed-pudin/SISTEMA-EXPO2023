<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class externalPeople extends Model
{
    use HasFactory, SoftDeletes;

    public function getFullName(){
        return strtoupper($this->fullName);
    }
}
