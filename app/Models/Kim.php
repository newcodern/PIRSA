<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kim extends Model
{
    use HasFactory;

    protected $table = 'kims';

    protected $fillable = [
        'urut',
        'nopol',
        'kaspasitas_tangki',
        'jenis_produk',
        'nama_pt',
        'masa_berlaku',
    ];
}
