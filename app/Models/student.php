<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'enrollment';

    protected $fillable = [
        'enrollment',
        'fullName'
    ];

    public function getFullName(){
        return strtoupper($this->fullName);
    }
}