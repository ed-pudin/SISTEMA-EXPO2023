<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\company;

class guest extends Model
{
    use HasFactory, SoftDeletes;

    public function company()
    {
        //de la tabla propia - de la otra tabla PK
        return $this->belongsTo(company::class, 'company', 'id');
    }

}
