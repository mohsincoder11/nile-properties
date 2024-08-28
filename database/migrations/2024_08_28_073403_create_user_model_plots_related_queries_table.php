<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_model_plots_related_queries', function (Blueprint $table) {
            $table->id();
            $table->integer('firm_id');
            $table->integer('project_id');
            $table->integer('plot_no');
            $table->integer('client_id');
            $table->text('query');
            $table->timestamps();

            // Foreign keys (assuming you have related tables)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_model_plots_related_queries');
    }
};
