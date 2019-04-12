@extends('layouts.baseAgent')

@section('content')
<div class="NL">
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;">
            <h4 style="font-family: impact"><span class="creU"></span> Transfert</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('trensfert.store') }}">
                {{ csrf_field() }}
                <input type="hidden" name="nom_expediteur" value="{{ $expe['nom'] }}">
                <input type="hidden" name="prenom_expediteur" value="{{ $expe['prenom'] }}">
                <input type="hidden" name="tel_expediteur" value="{{ $expe['tel'] }}">
                <input type="hidden" name="nni_expediteur" value="{{ $expe['nni'] }}">
                <input type="hidden" name="email_expediteur" value="{{ $expe['email'] }}">
                <input type="hidden" name="nom_beneficiaire" value="{{ $benef['nom'] }}">
                <input type="hidden" name="prenom_beneficiaire" value="{{ $benef['prenom'] }}">
                <input type="hidden" name="tel_beneficiaire" value="{{ $benef['tel'] }}">
                <input type="hidden" name="email_beneficiaire" value="{{ $benef['email'] }}">
                <input type="hidden" name="tarif" value="{{ $tarif }}">
                <input type="hidden" name="id_ville" value="{{ $ville[0]->id_ville }}">
                <input type="hidden" name="montant" value="{{ $montant }}">

                <table id="datatable-buttons" class="table table-striped table-bordered tbD">
                    <thead>
                        <tr>
                            <th colspan="2">les donnee du transfert <span style="text-align:right;color:blue; margin-left:50%;"> Tarif: {{ $tarif }} UM</span> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="2" style="text-align: center; ">Expediteur</th>
                        </tr>
                        <tr>
                            <th>Nom</th>
                            <td>{{ $expe['nom'] }}</td>
                        </tr>
                        <tr>
                            <th>Prenom</th>
                            <td>{{ $expe['prenom'] }}</td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                            <td>{{ $expe['tel'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $expe['email'] }}</td>
                        </tr>
                        <tr>
                            <th>NNi</th>
                            <td>{{ $expe['nni'] }}</td>
                        </tr>
                        <tr>
                            <th colspan="2" style="text-align: center; ">Beneficiaire</th>
                        </tr>
                        <tr>
                            <th>Nom</th>
                            <td>{{ $benef['nom'] }}</td>
                        </tr>
                        <tr>
                            <th>Prenom</th>
                            <td>{{ $benef['prenom'] }}</td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                            <td>{{ $benef['tel'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $benef['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Ville</th>
                            <td>{{ $ville[0]->nom }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <th>montant</th>
                        </tr>
                        <tr>
                            <th></th>
                            <td>{{ $montant }} UM</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                        confirmer
                    </button>
                    <a href="{{ route('home') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Annuler</a>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection