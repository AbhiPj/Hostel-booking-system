<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('userId')->constrained('users');
            $table->foreignId('roomId')->constrained('rooms')->onDelete('cascade');
            $table->foreignId('hostelId')->constrained('hostels');

            $table->integer('price');
            $table->string('paymentStatus');

            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('address');
            $table->string('street');
            $table->string('district');
            $table->string('province');
            $table->integer('zipCode');
            $table->string('city');
            $table->bigInteger('phoneNumber');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
