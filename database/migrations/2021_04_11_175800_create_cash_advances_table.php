<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_advances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->decimal('rate_amount',8,2);
            $table->date('date');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')
                    ->references('id')
                    ->on('employees')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('cash_advances');
    }
}
