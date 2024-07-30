<?php

namespace App\Exports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
class HangSanXuatExport implements FromCollection
{
    public function headings(): array
    {
    return [
            'tenhang',
            'tenhang_slug',
            'hinhanh',
            
        ];
    }
    public function map($row): array
    {
        return [
            $row->tenhang,
            $row->tenhang_slug,
            $row->hinhanh,
           
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
   
    public function collection()
    {
        return HangSanXuat::all();
    }
}
