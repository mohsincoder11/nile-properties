<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('entry_level_lead_manage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('whatsapp_no')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->text('address')->nullable();
            $table->string('source_lead');
            $table->timestamps();

            // Foreign key constraints (assuming employees and cities tables exist)
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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