<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nrg')->nullable();
            $table->string('no_peserta')->nullable();
            $table->string('nuptk')->unique();
            $table->string('no_sk')->nullable();
            $table->string('nama');
            $table->string('jenjang')->nullable();
            $table->string('tempat_tugas')->nullable();
            $table->string('kota')->nullable();
            $table->string('nip')->unique();
            $table->string('nama_bank')->nullable();
            $table->string('kantor_cabang')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('nama_rek')->nullable();
            $table->string('pangkat')->nullable();
            $table->integer('masa_kerja')->nullable();
            $table->integer('gaji_pokok')->nullable();
            $table->integer('jan')->nullable();
            $table->integer('feb')->nullable();
            $table->integer('mar')->nullable();
            $table->integer('apr')->nullable();
            $table->integer('mei')->nullable();
            $table->integer('jun')->nullable();
            $table->integer('jul')->nullable();
            $table->integer('agu')->nullable();
            $table->integer('sep')->nullable();
            $table->integer('okt')->nullable();
            $table->integer('nov')->nullable();
            $table->integer('des')->nullable();
            $table->integer('jumlah')->nullable();
            $table->integer('pajak')->nullable();
            $table->integer('nom_pajak')->nullable();
            $table->integer('bpjs')->nullable();
            $table->integer('jumlah_diterima')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
