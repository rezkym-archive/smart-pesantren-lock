<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_students', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('teacher_id');

            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onDelete('cascade');

            $table->primary(['student_id', 'teacher_id'], 'teacher_has_students_student_id_teacher_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_students');
    }
}
