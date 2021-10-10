<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutabaah extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'student_id',
        'shalat_fardhu',
        'shalat_rawatib',
        'shalat_tahajjud',
        'shalat_dhuha',
    ];
}
