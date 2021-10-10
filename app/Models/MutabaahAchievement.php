<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutabaahAchievement extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'student_id',
        'cinta_shalat',
        'cinta_quran',
        'cinta_shaum',
        'cinta_shodaqoh',
        'cinta_dzikir',
        'expired_at',
    ];
}
