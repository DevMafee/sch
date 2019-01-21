<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_no',50);
            $table->tinyInteger('sessions_id');
            $table->tinyInteger('classes_id');
            $table->tinyInteger('sections_id');
            $table->string('student_name',150);
            $table->date('student_dob');
            $table->string('student_gender',15);
            $table->string('student_phone',15);
            $table->string('student_address1');
            $table->string('student_address2');
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('student_registrations');
    }
}
