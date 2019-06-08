@extends('layouts.baseAgent')

@section('content')

<table id="datatable-buttons" class="table table-striped table-bordered tbD">
    <thead>
        <tr>
            <th colspan="2">code transfert:  {{ $trans[0]->code_transfer}} 
                @if($trans[0]->status)
                    <span style="text-align:right;color:green; margin-left:50%;"> Status: retirais</span>
                @else
                    <span style="text-align:right;color:blue; margin-left:50%;"> Status: en cours</span>
                @endif
            </th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <th colspan="2" style="text-align: center; ">Beneficiaire</th>
        </tr>
        <tr>
            <th>Nom</th>
            <td>{{ $benef[0]->nom }}</td>
        </tr>
        <tr>
            <th>Prenom</th>
            <td>{{ $benef[0]->prenom }}</td>
        </tr>
        <tr>
            <th>Tel</th>
            <td>{{ $benef[0]->tel }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $benef[0]->email }}</td>
        </tr>
        <tr>
            <th>montant</th>
            <td>{{ $trans[0]->montant }} UM</td>
        </tr>
        <tr>

            <td colspan="2">

            </td>
        </tr>
        @if($trans[0]->status)
            <tr>
                <th>provenent de </th>
                <td>{{ $villeFrom[0]->nom }} </td>
            </tr>
            <tr>
                <th>recuperer le </th>
                <td>{{ $trans[0]->date_recuperation }} </td>
            </tr>
            <tr>
                <th>par </th>
                <td>{{ $trans[0]->nni_beneficiaire }} </td>
            </tr>
            <tr>
                <th>Dans: point/Cartie </th>
                <td>{{ $pnt1[0]->nom }}/ {{ $pnt1[0]->cartier }}</td>
            </tr>
        @endif
    </tbody>

</table>
<a href="{{ route('agent') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Retour</a>
@endsection