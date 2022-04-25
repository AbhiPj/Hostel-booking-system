<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('street');
            $table->string('city');
            $table->string('checkout_status')->nullable();
            $table->date('checkout_date')->nullable();
            $table->foreignId('roomId')->constrained('rooms');
            $table->foreignId('hostelId')->constrained('hostels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
