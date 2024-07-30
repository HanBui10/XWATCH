<?php

namespace App\Exports;

use App\Models\LoaiSanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;
class LoaiSanPhamExport implements FromCollection
{
    public function headings(): array
    {
    return [
            'tenloai',
            'tenloai_slug',
       
            
        ];
    }
    public function map($row): array
    {
        return [
            $row->tenloai,
            $row->tenloai_slug,
           
           
        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
   
    public function collection()
    {
        return LoaiSanPham::all();
    }
}
