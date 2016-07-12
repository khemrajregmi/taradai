<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Userinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('userInfo', function (Blueprint $table) {
            $table->increments('user_id', true);
            $table->string('username');
            $table->string('password');
            $table->string('fullname');
            $table->string('address');
            $table->string('dob');
            $table->string('phone');
            $table->string('email');
            $table->enum('IsSuperAdmin', ['Y','N'])->default('N');
            $table->enum('status', ['Y', 'N'])->default('N');
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
        Schema::drop('userInfo');
    }
}
