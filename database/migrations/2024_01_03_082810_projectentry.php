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
        Schema::create('projectentry', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('project_code');
            $table->string('project_name');
            $table->string('mobile_number');
            $table->string('whatsapp_number');
            $table->string('email');
            $table->string('mauja');
            $table->string('kh_no');
            $table->string('phn');
            $table->string('taluka');
            $table->string('district');
            $table->integer('no_of_plots');
            $table->integer('areasqrft_manual');
            $table->integer('areasqrmt_manual');
            $table->unsignedBigInteger('sale_status_id');
            $table->string('layout_description');
            $table->string('layout_image');
            $table->string('layout_feature');
            $table->integer('area_plottable');
            $table->integer('amenities');
            $table->integer('open_space');
            $table->integer('dev_charge');
            $table->integer('other_charges_percentage');
            $table->string('site_map');
            $table->string('brochure');
            $table->string('embadded_map');
            $table->string('youtube_url');
            $table->string('status');
            $table->integer('latitude');
            $table->integer('longitude');

            $table->string('agent_name');
            $table->string('agent_designation');
            $table->string('profile_picture');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('instagram');


            // // Additional columns for the "Plot Entry" section
            // $table->integer('plot_no');
            // $table->integer('plot_width');
            // $table->integer('plot_length');
            // $table->integer('plot_area_sq_ft');
            // $table->integer('plot_area_sq_mt');
            // $table->integer('east');
            // $table->integer('west');
            // $table->integer('north');
            // $table->integer('south');
            // $table->integer('rate_sq_ft');

            // Foreign key relationships
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('sale_status_id')->references('id')->on('plot_sale_status')->onDelete('cascade');

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
