<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_employee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employee')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('authen_date');
            $table->datetime('time_in');
            $table->datetime('time_out');
            $table->integer('total_hours');
            $table->string('notes');
            $table->timestamps();
        });

        // Schema::table('data_employee', function (Blueprint $table) {
        //     $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_employee');
    }
}
