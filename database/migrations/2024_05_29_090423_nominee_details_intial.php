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
        Schema::create('nominee_details_intial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('initial_enquiry_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('age');
            $table->string('relation');
            $table->string('dob');
            $table->string('aadhar');
            $table->string('pan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nominee_details_intial');
    }
};