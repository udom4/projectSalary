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
            $table->id();
            $table->string('emp_id', 10);
            $table->string('emp_name', 30);
            $table->string('emp_surname', 50);
            $table->string('emp_en_name', 30);
            $table->string('emp_en_surname', 50);
            $table->string('emp_nickname', 20);
            $table->date('emp_start_work');
            $table->date('emp_start_emp');
            $table->foreignId('dept_id')->constrained('department');
            $table->foreignId('team_id')->constrained('team');
            $table->foreignId('pos_id')->constrained('position');
            $table->date('emp_birthday');
            $table->string('emp_numberID', 13);
            $table->string('emp_bankID', 20);
            $table->foreignId('bank_id')->constrained('bank');
            $table->string('emp_phone', 10);
            $table->string('emp_address');
            $table->string('current_address');
            $table->string('emp_e_mail');
            $table->string('comp_e_mail');
            $table->foreignId('type_emp_id')->constrained('type_employee');
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
