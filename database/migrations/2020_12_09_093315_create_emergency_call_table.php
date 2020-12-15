<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_call', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained('employee');
            $table->string('e_name')->nullable();
            $table->string('e_surname')->nullable();
            $table->string('e_nickname')->nullable();
            $table->string('e_phone', 10);
            $table->foreignId('relation_id')->constrained('relation');
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
        Schema::dropIfExists('emergency_call');
    }
}
