<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailMitra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_mitra', function (Blueprint $table) {
            $table->id();
            $table->string('kota');
            $table->string('alamat_lengkap');
            $table->string('kecamatan');
            $table->string('no_hp', 20);
            $table->string('nik', 16);
            $table->date('tgl_lahir');
            $table->string('question_profesi');
            $table->string('question_institusi');
            $table->integer('status_kerabat');
            $table->string('question_kerabat');
            $table->string('question_lainnya');
            $table->string('question_aplikasi_lain');
            $table->string('question_peraturan');
            $table->string('question_promosi');
            $table->longText('chooseFileKtp');
            $table->longText('chooseFileSertifikat');
            $table->longText('chooseFileSelfie');
            $table->rememberToken();
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
        Schema::dropIfExists('detail_mitra');
    }
}
