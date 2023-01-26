<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class projectStudent extends Model
{
    use HasFactory, SoftDeletes;

    public function project()
    {
        //de la tabla propia - de la otra tabla PK
        return $this->belongsTo(project::class, 'project', 'id');
    }
}
