<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saldo_wallet', function (Blueprint $table) {
            //
            $table->string('saldo')->after('credit');
            $table->string('saldo_penghasilan')->after('saldo');
            $table->string('admin')->after('saldo_penghasilan');
       


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saldo_wallet', function (Blueprint $table) {
            //
        });
    }
}
