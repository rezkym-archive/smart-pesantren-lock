<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateNewMutabaahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutabaahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->text('shalat_fardhu', 150)->nullable();
            $table->text('shalat_rawatib', 50)->nullable();
            $table->text('shalat_tahajjud', 50)->nullable();
            $table->text('shalat_dhuha', 50)->nullable();
            $table->text('odoj', 50)->nullable();
            $table->text('shaum', 100)->nullable();
            $table->text('shodaqoh', 50)->nullable();
            $table->text('dzikir', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_new_mutabaahs');
    }
}
