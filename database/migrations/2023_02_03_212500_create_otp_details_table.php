<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtpDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otp_details', function (Blueprint $table) {
            $table->id();
            $table->string('details_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('qey_id')->nullable();
            $table->string('otp')->nullable();
            $table->string('status')->default(0);
            $table->string('send')->nullable();
            $table->string('check')->nullable();
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
        Schema::dropIfExists('otp_details');
    }
}
