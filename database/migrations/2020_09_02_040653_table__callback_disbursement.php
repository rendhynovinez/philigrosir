<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCallbackDisbursement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('callback_disbursement', function (Blueprint $table) {
            $table->id();
            $table->string('id_disburse');
            $table->string('user_id');
            $table->string('external_id');
            $table->string('amount');
            $table->string('bank_code');
            $table->string('account_holder_name');
            $table->string('transaction_id');
            $table->string('transaction_sequence');
            $table->string('disbursement_id');
            $table->string('disbursement_description');
            $table->string('failure_code');
            $table->string('is_instant');
            $table->string('status');
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
        Schema::dropIfExists('callback_disbursement');
    }
}
