<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setresults', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grade',20);
            $table->decimal('point_lowest',5,2);
            $table->decimal('point_highest',5,2);
            $table->tinyInteger('markrange_lowest');
            $table->tinyInteger('markrange_highest');
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
        Schema::dropIfExists('setresults');
    }
}
