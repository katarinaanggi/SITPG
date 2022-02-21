<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nrg',
        'no_peserta',
        'nuptk',
        'no_sk',
        'nama',
        'jenjang',
        'tempat_tugas',
        'kota',
        'nip',
        'nama_bank',
        'kantor_cabang',
        'no_rek',
        'nama_rek',
        'pangkat',
        'masa_kerja',
        'gaji_pokok',
        'jan',
        'feb',
        'mar',
        'apr',
        'mei',
        'jun',
        'jul',
        'agu',
        'sep',
        'okt',
        'nov',
        'des',
        'jumlah',
        'pajak',
        'nom_pajak',
        'bpjs',
        'jumlah_diterima',
    ];
}
