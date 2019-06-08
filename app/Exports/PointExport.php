<?php

namespace App\Exports;

use App\Models\Point_de_transfert;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PointExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Point_de_transfert::all();
    }
    public function headings(): array
    {
        return [
            '#', 'cartier', 'id_ville','nom','caisse'];
    }
}
