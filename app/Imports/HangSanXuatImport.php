<?php

namespace App\Imports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class HangSanXuatImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new HangSanXuat([
            'tenhang' => $row['tenhang'],
            'tenhang_slug' => $row['tenhang_slug'],
            'hinhanh' => $row['hinhanh'],
        ]);
    }
   
}
