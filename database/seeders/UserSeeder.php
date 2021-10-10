<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\TeacherStudents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@tes.com',
            'password' => Hash::make('123'),
        ]);

        $admin->assignRole('admin');

        $teacher = User::create([
            'name' => 'Teacher Role',
            'email' => 'teacher@tes.com',
            'password' => Hash::make('123'),
        ]);

        $teacher_model = Teacher::create([
            'user_id' => $teacher->id,
            'name'  => $teacher->name,
        ]);

        $teacher->assignRole('teacher');

        $student = User::create([
            'name' => 'Student Role',
            'email' => 'user@tes.com',
            'password' => Hash::make('123'),
        ]);

        $student = User::create([
            'name' => 'Rezky Maulana ~ Student',
            'email' => 'rezky@tes.com',
            'password' => Hash::make('123'),
        ]);

        $student_model = Student::create([
            'user_id' => $student->id,
            'name'  => $student->name,
        ]);

        $student->assignRole('student');

        TeacherStudents::create([
            'student_id'    => $student_model->id,
            'teacher_id'    => $teacher_model->id,
        ]);
    }
}
