<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function MutabaahAchievements()
    {
        return $this->hasMany(MutabaahAchievement::class);
    }
}
