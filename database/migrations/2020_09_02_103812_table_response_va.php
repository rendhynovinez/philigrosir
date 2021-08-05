<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableResponseVa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('response_va', function (Blueprint $table) {
            //
            $table->id();
            $table->string('status');
            $table->string('currency');
            $table->string('owner_id');
            $table->string('external_id');
            $table->string('bank_code');
            $table->string('is_closed');
            $table->string('name');
            $table->string('account_number');
            $table->string('is_single_use');
            $table->string('expiration_date');
            $table->string('id_va');
            $table->integer('uid');
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
