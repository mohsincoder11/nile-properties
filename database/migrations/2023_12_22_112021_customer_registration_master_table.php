<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_registration_master', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->string('occupation_id');
            $table->string('email');
            $table->string('contact');
            $table->string('city');
            $table->integer('pin_code');
            $table->string('address');
            $table->integer('age');
            $table->date('dob');
            $table->date('marriage_date');
            $table->string('branch');
            $table->string('aadhar');
            $table->integer('aadhar_no');
            $table->string('pan');
            $table->string('pan_no');
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
        //
    }
};
