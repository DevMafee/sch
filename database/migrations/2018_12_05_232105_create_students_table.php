<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_no',100)->unique();
            $table->string('name',100);
            $table->date('birthday')->nullable();
            $table->string('gender',10)->nullable();
            $table->string('religion',15)->nullable();
            $table->string('blood_group',10)->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('phone',15)->nullable();
            $table->string('email',100)->unique();
            $table->string('password');
            $table->string('father_name',100)->nullable();
            $table->string('mother_name',100)->nullable();
            $table->tinyInteger('session_id')->nullable();
            $table->tinyInteger('class_id')->nullable();
            $table->tinyInteger('section_id')->nullable();
            $table->tinyInteger('parent_id')->nullable();
            $table->string('roll')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('students');
    }
}
