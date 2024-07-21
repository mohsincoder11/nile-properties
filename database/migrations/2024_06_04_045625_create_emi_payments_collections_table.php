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
        Schema::create('emi_payments_collections', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inst_no');
            $table->decimal('inst_amt', 10, 2);
            $table->string('status');
            $table->decimal('paid_amt', 10, 2);
            $table->decimal('rem_amt', 10, 2);
            $table->date('edop');
            $table->date('pay_date')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('ifsc')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('emi_payments_collections');
    }
};