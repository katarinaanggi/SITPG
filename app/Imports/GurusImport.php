<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

HeadingRowFormatter::default('none');

class GurusImport implements ToModel, WithUpserts, WithHeadingRow, WithBatchInserts, WithChunkReading, WithCalculatedFormulas, SkipsOnError, SkipsOnFailure 
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Guru([
            'nrg'               => $row['NRG'] ?? null,
            'no_peserta'        => $row['NO.PESERTA'] ?? null,
            'nuptk'             => $row['NUPTK'],
            'no_sk'             => $row['NO.SK'] ?? null,
            'nama'              => $row['NAMA'],
            'jenjang'           => $row['JENJANG'] ?? null,
            'tempat_tugas'      => $row['TEMPAT TUGAS'] ?? null,
            'kota'              => $row['KAB/KOTA'] ?? $row['KAB/ KOTA'] ?? null,
            'nip'               => $row['NIP'],
            'nama_bank'         => $row['NAMA BANK'] ?? null,
            'kantor_cabang'     => $row['KANTOR CABANG'] ?? null,
            'no_rek'            => $row['NO.REKENING'] ?? $row['NO. REKENING'] ?? null,
            'nama_rek'          => $row['NAMA REKENING'] ?? null,
            'pangkat'           => $row['PANGKAT/GOL'] ?? $row['PANGKAT /GOL'] ?? null,
            'masa_kerja'        => $row['MASA  KERJA'] ?? $row['MASA KERJA'] ?? null,
            'gaji_pokok'        => $row['GAJI POKOK'] ?? null,
            'jan'               => $row['JAN'] ?? null,
            'feb'               => $row['FEB'] ?? null,
            'mar'               => $row['MAR'] ?? null,
            'apr'               => $row['APR'] ?? null,
            'mei'               => $row['MEI'] ?? null,
            'jun'               => $row['JUN'] ?? null,
            'jul'               => $row['JUL'] ?? null,
            'agu'               => $row['AGU'] ?? null,
            'sep'               => $row['SEP'] ?? null,
            'okt'               => $row['OKT'] ?? null,
            'nov'               => $row['NOP'] ?? null,
            'des'               => $row['DES'] ?? null,
            'jumlah'            => $row['JUMLAH'] ?? null,
            'pajak'             => $row['PAJAK (%)'] ?? $row['PAJAK(%)'] ?? null,
            'nom_pajak'         => $row['NOMINAL PAJAK'] ?? null,
            'bpjs'              => $row['BPJS Maks 1 %'] ?? null,
            'jumlah_diterima'   => $row['TOTAL'] ?? $row['YANG DITERIMA'] ?? null,
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
