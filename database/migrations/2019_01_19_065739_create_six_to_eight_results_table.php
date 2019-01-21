<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSixToEightResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('six_to_eight_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year');
            $table->integer('class');
            $table->integer('section');
            $table->integer('student');
            $table->integer('exam');
            $table->integer('subject');
            $table->integer('written');
            $table->integer('mcq');
            $table->integer('practical');
            $table->integer('monthly_avg');
            $table->integer('total_marks');
            $table->integer('got_grade');
            $table->string('got_gpa');
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
        Schema::dropIfExists('six_to_eight_results');
    }
}
