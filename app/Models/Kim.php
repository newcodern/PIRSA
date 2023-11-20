<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kim extends Model
{
    use HasFactory;

    protected $table = 'kims';

    protected $fillable = [
        'nama',
        'berlaku',
        'ttl',
        'jenis_kelamin',
        'tinggi',
        'noKIM',
        'foto',
    ];
}
