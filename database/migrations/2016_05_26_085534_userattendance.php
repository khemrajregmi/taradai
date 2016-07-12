<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Userattendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('userAttendance', function (Blueprint $table) {
            $table->increments('attendance_id', true);
            $table->integer('user_id')->unsigned();
            $table->string('login_time');
            $table->string('logout_time');
            $table->string('IPaddress');
            $table->string('attendance_status')
            $table->timestamps();
            // $table->foreign('user_id')->references('attendance_id')->on('userInfo');
        });

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userAttendance');
    }
}
