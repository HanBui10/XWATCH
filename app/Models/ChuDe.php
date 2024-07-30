<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChuDe extends Model
{
    protected $table = 'chude';
    protected $fillable = [
        'id',
        'tenchude',
        'tenchude_slug',
        

    ];
    public function BaiViet(): HasMany
    {
        return $this->hasMany(BaiViet::class, 'chude_id', 'id');
    }
}
