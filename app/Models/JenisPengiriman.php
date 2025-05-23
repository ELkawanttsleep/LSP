<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengiriman extends Model
{
    use HasFactory;

    protected $table = 'jenis_pengiriman';

    protected $fillable = [
        'jenis_kirim',
        'nama_ekspedisi',
        'logo_ekspedisi',
        'biaya'
    ];

    public const jenis_kirim = [
        'ekonomi',
        'kargo', 
        'regular',
        'same day',
        'standar'
    ];

}
