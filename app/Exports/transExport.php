<?php

namespace App\Exports;

use App\models\transfert;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class transExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return transfert::all();
    }
    public function headings(): array
    {
        return [
            '#','montant', 'tarif','code_transfer',  'status', 'date_recuperation', 'effectue_par', 'modifier_par',
        'nni_beneficiaire', 'id_expediteur', 'id_beneficiaire', 'id_ville', 'id_pnt'
        ];
    }
}
