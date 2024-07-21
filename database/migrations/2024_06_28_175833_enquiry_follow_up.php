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
        Schema::create('enquiry_follow_up', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enquiry_id');
            $table->unsignedBigInteger('status_id');
            $table->date('follow_up_next_date');
            $table->text('remark')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('enquiry_id')->references('id')->on('enquiries')->onDelete('cascade');
            // Replace 'statuses' with your actual table name for status
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
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