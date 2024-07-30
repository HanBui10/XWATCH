<?php

namespace App\Imports;

use App\Models\LoaiSanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class LoaiSanPhamImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new LoaiSanPham([
            'tenloai' => $row['tenloai'],
            'tenloai_slug' => $row['tenloai_slug'],
            
        ]);
    }
}
