<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HalaqohHistory extends Model
{
    protected $table = "halaqoh_history";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'teacher_id',
        'surah_id',
        'fluency_level',
        'comment',
        'ayat_start',
        'ayat_end',
    ];

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function surahs()
    {
        return $this->hasOne(Surah::class, 'id');
    }
}
