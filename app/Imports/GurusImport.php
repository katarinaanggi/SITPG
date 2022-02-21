<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class GurusImport implements ToModel, WithUpserts, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'nrg'     => $row['nrg'] ?? null,
            'no_peserta'     => $row['no_peserta'] ?? null,
            'nuptk'     => $row['nuptk'],
            'no_sk'     => $row['no_sk'] ?? null,
            'nama'     => $row['nama'],
            'jenjang'     => $row['jenjang'] ?? null,
            'tempat_tugas'     => $row['tempat_tugas'] ?? null,
            'kota'     => $row['kota'] ?? null,
            'nip'     => $row['nip'],
            'nama_bank'     => $row['nama_bank'] ?? null,
            'kantor_cabang'     => $row['kantor_cabang'] ?? null,
            'no_rek'     => $row['no_rekening'] ?? null,
            'nama_rek'     => $row['nama_rekening'] ?? null,
            'pangkat'     => $row['pangkat'] ?? null,
            'masa_kerja'     => $row['masa_kerja'] ?? null,
            'gaji_pokok'     => $row['gaji_pokok'] ?? null,
            'jan'     => $row['jan'] ?? null,
            'feb'     => $row['feb'] ?? null,
            'mar'     => $row['mar'] ?? null,
            'apr'     => $row['apr'] ?? null,
            'mei'     => $row['mei'] ?? null,
            'jun'     => $row['jun'] ?? null,
            'jul'     => $row['jul'] ?? null,
            'agu'     => $row['agu'] ?? null,
            'sep'     => $row['sep'] ?? null,
            'okt'     => $row['okt'] ?? null,
            'nov'     => $row['nop'] ?? null,
            'des'     => $row['des'] ?? null,
            'jumlah'     => $row['jumlah'] ?? null,
            'pajak'     => $row['pajak'] ?? null,
            'nom_pajak'     => $row['nominal_pajak'] ?? null,
            'bpjs'     => $row['bpjs'] ?? null,
            'jumlah_diterima'     => $row['total'] ?? null,
        ]);
    }

     /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'nuptk';
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
