<?php

namespace App\Http\Livewire\Teacher\Halaqoh;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

/* Model */
use App\Models\Teacher;

class GetListTeacherBasedStudentName extends Component
{
    public $ottPlatform = '';
 
    public $data;
    

    private static function getStudentName()
    {
        $teacher = Teacher::where('user_id', Auth::id())->first();
        return $teacher->students;
    }
    
    public function render()
    {
        $this->data = self::getStudentName();
        return view('livewire.teacher.halaqoh.get-list-teacher-based-student-name');
    }
}
