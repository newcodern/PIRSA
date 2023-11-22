<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPBE extends Model
{
    use HasFactory;
    protected $table = 'spbes';

    protected $fillable = [
        'nama_pt',
        'kode_spbe',
        'alamat',
        'kota',
        'no_ref',
        'cust_no',
        'patra_ref',
    ];
}
