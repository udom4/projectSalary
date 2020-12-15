<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary', function (Blueprint $table) {
            $table->id();
            $table->integer('salary_rate_id');
            //$table->unsignedBigInteger('emp_id');
            //$table->foreign('emp_id')->references('id')->on('employee');
            $table->foreignId('emp_id')->constrained('employee');
            $table->date('salary_month');
            $table->decimal('position_price',10, 2);
            $table->decimal('ppt_price',10, 2);
            $table->decimal('commission_price',10, 2);
            $table->decimal('booth_price',10, 2);
            $table->decimal('active_price',10, 2);
            $table->decimal('goal_price',10, 2);
            $table->decimal('ot_price',10, 2);
            $table->decimal('other_1',10, 2);
            $table->decimal('pragun_price',10, 2);
            $table->decimal('tax_price',10, 2);
            $table->decimal('absent_price',10, 2);
            $table->decimal('late_price',10, 2);
            $table->decimal('leave_price',10, 2);
            $table->decimal('other_2',10, 2);
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
        Schema::dropIfExists('salary');
    }
}
