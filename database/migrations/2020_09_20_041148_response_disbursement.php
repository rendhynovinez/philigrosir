<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResponseDisbursement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('response_disbursement', function (Blueprint $table) {
            //
            $table->id();
            $table->integer('status');
            $table->string('user_id');
            $table->string('external_id');
            $table->string('amount');
            $table->string('bank_code');
            $table->string('account_holder_name');
            $table->string('disbursement_description');
            $table->string('uid');
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
        Schema::dropIfExists('response_va');
    }
}
