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
        Schema::create('initial_enquiries_clients', function (Blueprint $table) {
            $table->id();
            $table->string('project_id');
            $table->string('measurement');
            $table->string('square_meter');
            $table->string('square_ft');
            $table->string('rate');
            $table->decimal('total_cost', 10, 2);
            $table->string('discount_amount');
            $table->string('discount_type');
            $table->decimal('final_amount', 10, 2);
            $table->string('down_payment');
            $table->decimal('balance_amount', 10, 2);
            $table->string('tenure');
            $table->decimal('emi_amount', 10, 2);
            $table->date('booking_date');
            $table->date('agreement_date');
            $table->string('status_token');
            $table->date('emi_start_date');
            $table->string('plot_sale_status');
            $table->string('a_rate');
            $table->string('source_type');
            $table->text('remark')->nullable();
            $table->string('mauja');
            $table->string('kh_no');
            $table->string('phn');
            $table->string('taluka');
            $table->string('district');
            $table->string('east');
            $table->string('west');
            $table->string('north');
            $table->string('south');
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
        Schema::dropIfExists('initial_enquiries_clients');
    }
};