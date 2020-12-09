<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoOtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('do_ot', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_id');
            $table->foreign('emp_id')->references('id')->on('employee');
            $table->integer('ot_rate_id')->unsigned();
            $table->foreign('ot_rate_id')->references('id')->on('ot_rate');
            $table->date('do_ot_date');
            $table->integer('hours');
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
        Schema::dropIfExists('do_ot');
    }
}
