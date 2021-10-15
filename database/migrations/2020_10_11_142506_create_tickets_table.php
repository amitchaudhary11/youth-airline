<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->unique();
            $table->date('date_of_reservation');
            $table->string('booking_status');
            $table->integer('no_of_passenger');
            $table->string('payment_id');
            $table->string('flight_no');
            $table->date('journey_date');
            $table->foreignId('customer_id');
            $table->timestamps();

            $table->foreign('customer_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
