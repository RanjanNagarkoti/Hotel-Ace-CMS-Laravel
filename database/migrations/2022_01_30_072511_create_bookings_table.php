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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('number')->nullable();
            $table->string('country')->nullable();
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();

            $table->unsignedBigInteger('room_no')->notnull();

            $table->string('room_type')->nullable();

            $table->enum('billing', ['Paid'=>'Paid',  'Unpaid'=>'Unpaid'])->nullable();
            $table->enum('status', ['Checked In'=>'Checked In', 'Checked Out'=> 'Checked Out', 'Pending'=>'Pending']);

            $table->string('card_holder_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('cvc_cvv')->nullable();
            $table->enum('type', ['Credit card' => 'Credit card', 'Debit card' => 'Debit card', 'Visa card' => 'Visa card', 'Master card' => 'Master card'])->nullable();
            $table->date('expiry_date')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
