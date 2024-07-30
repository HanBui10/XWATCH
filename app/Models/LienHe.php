<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class LienHe extends Model
{
    use HasFactory;

    protected $table = 'lienhe'; // Xác định tên bảng cần được sử dụng bởi model

    protected $fillable = [ // Xác định các trường có thể gán dữ liệu bởi Mass Assignment
        'name',
        'email',
        'subject',
        'message',
        'kiemduyet',
       
    ];
    protected $primaryKey = 'id';
}
