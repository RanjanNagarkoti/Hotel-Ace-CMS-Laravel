<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerDetailToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->after('email')->nullable();
            $table->string('contact')->after('email')->nullable();
            $table->string('country')->after('email')->nullable();
            $table->enum('gender', ['m'=>'male', 'f'=>'female', 'o'=>'others'])->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'contact', 'country', 'gender', ]);
        });
    }
}
