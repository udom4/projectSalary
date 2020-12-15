<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working', function (Blueprint $table) {
            $table->id();
            //$table->string('emp_id');
            //$table->foreign('emp_id')->references('id')->on('employee');
            $table->foreignId('emp_id')->constrained('employee');
            $table->date('date_working');
            $table->time('start_working');
            $table->time('finish_working');
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
        Schema::dropIfExists('working');
    }
}
