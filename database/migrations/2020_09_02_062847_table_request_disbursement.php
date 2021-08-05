<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRequestDisbursement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('request_disbursement', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('amount');
            $table->string('bank_code');
            $table->string('account_holder_name');
            $table->string('account_number');
            $table->string('description');
            $table->string('X-IDEMPOTENCY-KEY');
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
        Schema::dropIfExists('request_disbursement');
    }
}
