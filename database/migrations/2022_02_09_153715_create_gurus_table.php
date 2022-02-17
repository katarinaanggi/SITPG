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
            $table->string('nrg');
            $table->string('no_peserta');
            $table->string('nuptk');
            $table->string('no_sk');
            $table->string('nama');
            $table->string('jenjang');
            $table->string('tempat_tugas');
            $table->string('kota');
            $table->string('nip');
            $table->string('nama_bank');
            $table->string('kantor_cabang');
            $table->string('no_rek');
            $table->string('nama_rek');
            $table->string('pangkat');
            $table->integer('masa_kerja');
            $table->integer('gaji_pokok');
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
            $table->integer('pajak');
            $table->integer('nom_pajak');
            $table->integer('bpjs');
            $table->integer('jumlah_diterima');
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
        Schema::dropIfExists('gurus');
    }
}
