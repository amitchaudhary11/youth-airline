<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('seat_name')->unique();
            $table->timestamps();
        });

        DB::table('seats')->insert([
            ['seat_name' => 'A1'],
            ['seat_name' => 'A2'],
            ['seat_name' => 'A3'],
            ['seat_name' => 'A4'],
            ['seat_name' => 'A5'],
            ['seat_name' => 'A6'],
            ['seat_name' => 'A7'],
            ['seat_name' => 'A8'],
            ['seat_name' => 'A9'],
            ['seat_name' => 'A10'],
            ['seat_name' => 'A11'],
            ['seat_name' => 'A12'],
            ['seat_name' => 'A13'],
            ['seat_name' => 'A14'],
            ['seat_name' => 'A15'],
            ['seat_name' => 'A16'],
            ['seat_name' => 'A17'],
            ['seat_name' => 'A18'],
            ['seat_name' => 'A19'],
            ['seat_name' => 'A20'],
            ['seat_name' => 'A21'],
            ['seat_name' => 'A22'],
            ['seat_name' => 'A23'],
            ['seat_name' => 'A24'],
            ['seat_name' => 'A25'],
            ['seat_name' => 'A26'],
            ['seat_name' => 'A27'],
            ['seat_name' => 'A28'],
            ['seat_name' => 'A29'],
            ['seat_name' => 'A30'],
            ['seat_name' => 'A31'],
            ['seat_name' => 'A32'],
            ['seat_name' => 'A33'],
            ['seat_name' => 'A34'],
            ['seat_name' => 'A35'],
            ['seat_name' => 'A36'],
            ['seat_name' => 'A37'],
            ['seat_name' => 'A38'],
            ['seat_name' => 'A39'],
            ['seat_name' => 'A40'],
            ['seat_name' => 'A41'],
            ['seat_name' => 'A42'],
            ['seat_name' => 'A43'],
            ['seat_name' => 'A44'],
            ['seat_name' => 'A45'],
            ['seat_name' => 'A46'],
            ['seat_name' => 'A47'],
            ['seat_name' => 'A48'],
            ['seat_name' => 'A49'],
            ['seat_name' => 'A50'],
            ['seat_name' => 'A51'],
            ['seat_name' => 'A52'],
            ['seat_name' => 'A53'],
            ['seat_name' => 'A54'],
            ['seat_name' => 'A55'],
            ['seat_name' => 'A56'],
            ['seat_name' => 'A57'],
            ['seat_name' => 'A58'],
            ['seat_name' => 'A59'],
            ['seat_name' => 'A60'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
