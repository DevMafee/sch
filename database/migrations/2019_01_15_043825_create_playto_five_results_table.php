<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaytoFiveResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playto_five_results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year');
            $table->integer('class');
            $table->integer('section');
            $table->integer('student');
            $table->integer('exam');
            $table->integer('subject');
            $table->decimal('total_marks');
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
        Schema::dropIfExists('playto_five_results');
    }
}
