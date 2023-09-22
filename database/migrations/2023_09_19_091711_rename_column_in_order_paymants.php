<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInOrderPaymants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_paymants', function (Blueprint $table) {
            $table->renameColumn('ch_id', 'ref_no');
            $table->renameColumn('plot_id', 'bank_fee');
            $table->renameColumn('amount', 'amt_challan');
            $table->renameColumn('code', 'cc_response_code');
            $table->renameColumn('status', 'cc_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_paymants', function (Blueprint $table) {
            $table->renameColumn('plot_id', 'bank_fee');
            $table->renameColumn('amount', 'challan_amount');
            $table->renameColumn('status', 'cc_status');
        });
    }
}
