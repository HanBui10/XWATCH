<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $fillable = [
        'anh1',
        'anh2',
        'anh3',
        'anh4',
        'anh5',
    ];
}
