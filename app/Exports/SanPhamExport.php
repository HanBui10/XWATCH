<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

class SanPhamExport implements FromCollection, WithHeadings, WithCustomStartCell, WithMapping
{
   public function headings(): array
   {
       return [
           'loaisanpham_id',
           'hangsanxuat_id',
           'tensanpham',
           'tensanpham_slug',
           'soluong',
           'giamoi',
           'giacu',
           'doinetsanpham',
           'motasanpham',
           'hinhanh',
           'hinhanh1',
           'hinhanh2',
         
       ];
   }

   public function map($row): array
   {
       return [
           $row->loaisanpham_id,
           $row->hangsanxuat_id,
           $row->tensanpham,
           $row->tensanpham_slug,
           $row->soluong,
           $row->giamoi,
           $row->giacu,
           $row->doinetsanpham,
           $row->motasanpham,
           $row->hinhanh,
           $row->hinhanh1,
           $row->hinhanh2,
          
       ];
   }

   public function startCell(): string
   {
       return 'A1';
   }

   public function collection()
   {
       return SanPham::all();
   }
}

