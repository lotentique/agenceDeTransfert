<?php

namespace App\Exports;

use App\Models\transfert;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Config;
class suspect implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $heur = Config::get();
        $montant=$heur[0]->montant;
        $Transfertelever = Transfert::where('montant','>=', $montant)->get();
        return $Transfertelever;
    }
    public function headings(): array
    {
        return [
            '#','montant', 'tarif','code_transfer',  'status', 'date_recuperation', 'effectue_par', 'modifier_par',
        'nni_beneficiaire', 'id_expediteur', 'id_beneficiaire', 'id_ville', 'id_pnt'
        ];
    }
}