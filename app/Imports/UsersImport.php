<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'=> $row[1],
            'prenom'=> $row[2],
            'password'=>bcrypt($row[3]),
            'tel'=> $row[4],
            'nni'=> $row[5],
            'login'=> $row[6],
            'email'=> $row[7],
        ]);
    }
}
