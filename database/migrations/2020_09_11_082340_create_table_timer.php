<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTimer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_timer', function (Blueprint $table) {
            $table->id();
            $table->string('uid_customers');
            $table->string('uid_mitra');
            $table->string('id_order');
            $table->string('timer');
            $table->string('status_timer');
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
        Schema::dropIfExists('table_timer');
    }
}
