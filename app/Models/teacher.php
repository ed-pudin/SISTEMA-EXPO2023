<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class teacher extends Model
{
    use HasFactory, SoftDeletes;

    /**
    * Get the user that owns the teacher.
    */
    //mismo nombre que la columna
    public function user()
    {
        //de la tabla propia - de la otra tabla PK
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
