<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BaiViet extends Model
{
    protected $table = 'baiviet';

    protected $fillable = [
        'id',
        'chude_id',
        'nguoidung_id',
        'tieude',
        'tieude_slug',
        'tomtat',
        'noidung',
        'luotxem',
        'kiemduyet',
       
    ];
    public function ChuDe(): BelongsTo
    {
        return $this->belongsTo(ChuDe::class, 'chude_id', 'id');
    }
    public function NguoiDung(): BelongsTo
    {
        return $this->belongsTo(NguoiDung::class, 'nguoidung_id', 'id');
    }
    
}
