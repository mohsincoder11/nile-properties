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
        Schema::create('other_charges_for_clients', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2);
            $table->unsignedBigInteger('charges_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('initial_inquiry_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('charges_id')->references('id')->on('charges')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('initial_inquiry_id')->references('id')->on('initial_enquiries')->onDelete('cascade');
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