<?php

namespace App\Exports;

use App\Models\SanPhamChiTiet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

class SanPhamChiTietExport implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping
{
    public function headings(): array
    {
        return [
            'sanpham_id',
            'model',
            'mausac',
            'congnghemanhinh',
            'kichthuocmanhinh',
            'dophangiai',
            'bonho',
            'chatlieu',
            'trongluong',
            'tinhtrang',
            'baohanh',

        ];
    }
    public function map($row): array
    {
        return [
            $row->sanpham_id,
            $row->model,
            $row->mausac,
            $row->congnghemanhinh,
            $row->kichthuocmanhinh,
            $row->dophangiai,
            $row->bonho,
            $row->chatlieu,
            $row->trongluong,
            $row->tinhtrang,
            $row->baohanh,

        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function collection()
    {
        return SanPhamChiTiet::all();
    }
}
