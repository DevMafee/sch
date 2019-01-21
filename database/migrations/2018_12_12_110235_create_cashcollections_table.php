<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashcollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashcollections', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('student');
            $table->tinyInteger('class');
            $table->tinyInteger('feetype');
            $table->decimal('amount',10,2);
            $table->string('month',20);
            $table->string('year',4);
            $table->string('status',20);
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
        Schema::dropIfExists('cashcollections');
    }
}
