<?php

namespace App\Imports;

use App\Models\SPBE;
use Maatwebsite\Excel\Concerns\ToModel;

class SPBE_imports implements ToModel
{
    public function model(array $row)
    {
        return new SPBE([
            'nama_pt' => $row[0],
            'kode_spbe' => $row[1],
            'alamat' => $row[2],
            'kota' => $row[3],
            'no_ref' => $row[4],
            'cust_no' => $row[5],
            'patra_ref' => $row[6],
        ]);
    }
}

