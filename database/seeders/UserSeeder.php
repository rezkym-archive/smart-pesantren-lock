<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Admin;
use App\Models\Binsis;
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
        // Admin seeder
        $this->adminSeeder();

        // Teacher seeder
        $this->TeacherSeeder();

        // Binsis seeder
        $this->BinsisSeeder();

        // Student seeder
        $this->StudentSeeder();

        // Create default TeacherStudents data
        TeacherStudents::create([
            'student_id'    => $this->studentModel->id,
            'teacher_id'    => $this->teacherModel->id,
        ]);
    }

    /**
     * adminSeeder
     * 
     * @return object
     */
    protected function adminSeeder()
    {
        $this->admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@tes.com',
            'password' => Hash::make('123'),
        ]);

        $this->admin->assignRole('admin');

        return $this;
    }
    
    /**
     * TeacherSeeder
     * 
     * @return object
     */
    protected function TeacherSeeder()
    {
        $this->teacher = User::create([
            'name' => 'Teacher Role',
            'email' => 'teacher@tes.com',
            'password' => Hash::make('123'),
        ]);

        $this->teacherModel = Teacher::create([
            'user_id' => $this->teacher->id,
            'name'  => $this->teacher->name,
        ]);

        $this->teacher->assignRole('teacher');

        return $this;
    }

    /**
     * BinsisSeeder
     * 
     * @return object
     */
    protected function BinsisSeeder()
    {
        $this->binsis = User::create([
            'name' => 'Binsis Role',
            'email' => 'binsis@tes.com',
            'password' => Hash::make('123'),
        ]);

        $this->binsisModel = Binsis::create([
            'user_id' => $this->binsis->id,
            'name'  => $this->binsis->name,
        ]);

        $this->binsis->assignRole('binsis');
    }

    /**
     * StudentSeeder
     * 
     * @return object
     */
    protected function StudentSeeder()
    {
        $this->student = User::create([
            'name' => 'Rezky Maulana ~ Student',
            'email' => 'rezky@tes.com',
            'password' => Hash::make('123'),
        ]);

        $this->studentModel = Student::create([
            'user_id' => $this->student['id'],
            'name'  => $this->student['name'],
        ]);

        $this->student->assignRole('student');
    }
}
