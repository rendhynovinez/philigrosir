<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoMitraTableDetailMitra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_mitra', function (Blueprint $table) {
            $table->string('type_layanan')->after('question_promosi');
            $table->string('jenis_layanan')->after('type_layanan');
            $table->integer('jenis_kelamin')->after('jenis_layanan');
            $table->integer('no_mitra')->after('jenis_kelamin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_mitra', function (Blueprint $table) {
            //
        });
    }
}
