<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToOrderPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_payments', function (Blueprint $table) {
            $table->string('amt_paid');
            $table->string('cc_response_message');
            $table->string('pms_response_message');
            $table->string('pms_response_code');
            $table->string('pms_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_payments', function (Blueprint $table) {
            $table->string('amt_paid');
            $table->string('cc_response_message');
            $table->string('pms_response_message');
            $table->string('pms_response_code');
            $table->string('pms_status');
        });
    }
}
