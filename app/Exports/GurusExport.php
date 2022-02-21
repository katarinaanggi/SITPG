<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;

class GurusExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guru::all();
        // return Guru::query()->get([
        //     'id',
        //     'nrg',
        //     'no_peserta',
        //     'nuptk',
        //     'no_sk',
        //     'nama',
        //     'jenjang',
        //     'tempat_tugas',
        // ]);
    }

    public function headings(): array
    {
        return [
            'NO',
            'NRG',
            'NO PESERTA',
            'NUPTK',
            'NO SK',
            'NAMA',
            'JENJANG',
            'TEMPAT TUGAS',
            'KOTA',
            'NIP',
            'NAMA BANK',
            'KANTOR CABANG',
            'NO REKENING',
            'NAMA REKENING',
            'PANGKAT/GOL',
            'MASA KERJA',
            'GAJI POKOK',
            'JAN',
            'FEB',
            'MAR',
            'APR',
            'MEI',
            'JUN',
            'JUL',
            'AGU',
            'SEP',
            'OKT',
            'NOV',
            'DES',
            'JUMLAH',
            'PAJAK',
            'NOMINAL PAJAK',
            'BPJS',
            'JUMLAH DITERIMA',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
