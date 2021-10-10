<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'name',

    ];

    public function students()
    {
        return $this->hasManyThrough(
            // required
            \App\Models\Student::class, // the related model
            \App\Models\TeacherStudents::class, // the pivot model

            // optional
            'teacher_id', // the current model id in the pivot
            'id', // the id of related model
            'id', // the id of current model
            'student_id' // the related model id in the pivot
        );
    }
    
    public function HalaqohHistorys()
    {
        return $this->hasMany(HalaqohHistory::class, 'teacher_id', 'id');
    }
}
