<?php

namespace App\Exports;


use App\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    public function headings(): array
    {
        return [
            '#','name', 'prenom', 'tel', 'nni', 'login', 'type_user', 'email', 'id_pnt'];
    }
}
