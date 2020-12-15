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
            $table->id();
            $table->foreignId('emp_id')->constrained('employee');
            $table->foreignId('ot_rate_id')->constrained('ot_rate');
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
