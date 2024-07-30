<?php

namespace App\Imports;

use App\Models\SanPhamChiTiet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SanPhamChiTietImport implements ToModel, WithHeadingRow

{
    
    public function model(array $row)
    {
        return new SanPhamChiTiet([
            'sanpham_id' => $row['sanpham_id'],
            'model' => $row['model'],
            'mausac' => $row['mausac'],
            'congnghemanhinh' => $row['congnghemanhinh'],
            'kichthuocmanhinh' => $row['kichthuocmanhinh'],
            'dophangiai' => $row['dophangiai'],
            'bonho' => $row['bonho'],
            'chatlieu' => $row['chatlieu'],
            'trongluong' => $row['trongluong'],
            'tinhtrang' => $row['tinhtrang'],
            'baohanh' => $row['baohanh'],
        ]);
    }
}
