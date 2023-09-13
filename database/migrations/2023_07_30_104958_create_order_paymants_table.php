<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_paymants', function (Blueprint $table) {
            $table->id();
            $table->string('ch_id')->nullable();
            $table->string('plot_id')->nullable();
            $table->string('q_id')->nullable();
            $table->string('code')->nullable();
            $table->string('amount')->nullable();
            $table->string('o_reference')->nullable();
            $table->string('guid')->nullable();
            $table->string('p_type')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('order_paymants');
    }
}
