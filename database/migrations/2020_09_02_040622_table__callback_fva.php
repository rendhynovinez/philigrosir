<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCallbackFva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('callback_fva', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('callback_virtual_account_id');
            $table->string('payment_id');
            $table->string('external_id');
            $table->string('account_number');
            $table->string('merchant_code');
            $table->string('bank_code');
            $table->string('transaction_timestamp');
            $table->string('currency');
            $table->string('created');
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
        Schema::dropIfExists('callback_fva');
    }
}
