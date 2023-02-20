<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('policy')->nullable();
            $table->string('user_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('insurance')->nullable();
            $table->string('ssn')->nullable();
            $table->string('QEY_ID')->nullable();
            $table->string('CELL_NO')->nullable();
            $table->string('RESPONSE_MESSAGE')->nullable();
            $table->string('status')->default(1);
            $table->string('email')->nullable();
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
        Schema::dropIfExists('details');
    }
}
