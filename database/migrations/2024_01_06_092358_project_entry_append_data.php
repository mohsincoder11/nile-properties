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
        Schema::create('project_entry_append_data', function (Blueprint $table) {
            $table->id();
            $table->integer('product_entry_id');
            $table->integer('plot_no');
            $table->integer('plot_width');
            $table->integer('plot_length');
            $table->integer('area_sqrft');
            $table->integer('area_sqrmt');
            $table->integer('east');
            $table->integer('west');
            $table->integer('south');
            $table->integer('north');
            $table->integer('rate');
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