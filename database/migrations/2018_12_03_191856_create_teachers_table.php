<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sex');
            $table->string('religion');
            $table->string('blood_group');
            $table->string('address');
            $table->string('phone');
            $table->string('photo');
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *`name`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `password`,
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
