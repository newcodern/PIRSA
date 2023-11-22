<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdDriver extends Model
{
    use HasFactory;

    protected $table = 'id_drivers';

    protected $fillable = [
        'nama', 'ttl', 'foto', 'id_driver'
    ];
}
