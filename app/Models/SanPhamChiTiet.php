<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SanPhamChiTiet extends Model
{
    protected $table = 'sanphamchitiet';
    protected $fillable = [
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


    public function LoaiSanPham(): BelongsTo
    {
        return $this->belongsTo(LoaiSanPham::class, 'loaisanpham_id', 'id');
    }
    public function HangSanXuat(): BelongsTo
    {
        return $this->belongsTo(HangSanXuat::class, 'hangsanxuat_id', 'id');
    }
    function SanPham(): BelongsTo
    {
        return $this->BelongsTo(SanPham::class, 'sanpham_id', 'id');
    }
    
    
}
