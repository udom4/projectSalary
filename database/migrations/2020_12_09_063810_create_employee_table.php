<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('emp_name', 30);
            $table->string('emp_surname', 50);
            $table->string('emp_en_name', 30);
            $table->string('emp_en_surname', 50);
            $table->string('emp_nickname', 20);
            $table->date('emp_start_work');
            $table->date('emp_start_emp');
            $table->integer('dept_id')->unsigned(); 
            $table->foreign('dept_id')->references('id')->on('department');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('team');
            $table->integer('pos_id')->unsigned();
            $table->foreign('pos_id')->references('id')->on('position');
            $table->date('emp_birthday');
            $table->string('emp_numberID', 13);
            $table->string('emp_bankID', 20);
            $table->integer('bank_id')->unsigned(); 
            $table->foreign('bank_id')->references('id')->on('bank');
            $table->string('emp_phone', 10);
            $table->string('emp_address');
            $table->string('current_address');
            $table->string('emp_e_mail');
            $table->string('comp_e_mail');
            $table->integer('type_emp_id')->unsigned(); 
            $table->foreign('type_emp_id')->references('id')->on('type_employee');
            $table->decimal('salary', 10 , 2);
            $table->string('other');
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
        Schema::dropIfExists('employee');
    }
}
