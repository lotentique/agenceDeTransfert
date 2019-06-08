@extends('layouts.baseAgent')

@section('content')

@if(count($errors) >0)
	@foreach($errors->all() as $error)
	<div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss='alert'>X</button>
        <strong>{{ $error }}</strong>
    </div>
	@endforeach
@endif
<table id="datatable-buttons" class="table table-striped table-bordered tbD">
    <thead>
        <tr>
            <th colspan="2">code transfert {{ $trans[0]->code_transfer}}</th>
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
                <form class="form-horizontal" method="POST" action="{{ route('retrait.confirm') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_trans" value="{{ $trans[0]->id }}">

                    <input id="nni_benef" type="number" class="form-control{{ $errors->has('nni_benef') ? ' is-invalid' : '' }}" name="nni_benef" value="{{old('nni_benef') }}" placeholder="NNi Beneficiaire" required autofocus>
                    @if ($errors->has('nni_benef'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nni_benef') }}</strong>
                    </span>
                    @endif


                    <br />
                    <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                        confirmer
                    </button>
                    <a href="{{ route('agent') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Annuler</a>

                </form>
            </td>
        </tr>
    </tbody>

</table>


@endsection