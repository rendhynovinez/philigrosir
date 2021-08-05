<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRequestVa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('request_va', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('bank_code');
            $table->string('name');
            $table->string('is_closed');
            $table->string('expected_amount');
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
        Schema::dropIfExists('request_va');
    }
}
