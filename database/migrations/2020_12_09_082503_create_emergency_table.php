<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_id');
            $table->foreign('emp_id')->references('id')->on('employee');
            $table->string('e_name')->nullable();
            $table->string('e_surname')->nullable();
            $table->string('e_phone');
            $table->integer('relation_id', 10);
            $table->foreign('relation_id')->references('id')->on('relation');
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
        Schema::dropIfExists('emergency');
    }
}
