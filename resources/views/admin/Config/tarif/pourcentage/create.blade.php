@extends('layouts.base')
@section('content')
<div class="NL">
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;">
            <h4 style="font-family: impact"><span class="creU"></span> ajouter un nouveau pourcentage</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('tarifPourcentage.store') }}">
                {{ csrf_field() }}
                <div class="gauche">
                    <div class="form-group row">

                        <input id="pourcentage" type="number" class="form-control{{ $errors->has('pourcentage') ? ' is-invalid' : '' }}" name="pourcentage" value="{{ old('pourcentage') }}" required autofocus placeholder="{{ __('pourcentage') }}">

                        @if ($errors->has('pourcentage'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pourcentage') }}</strong>
                        </span>
                        @endif

                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                        Enregistrer
                    </button>
                    <a href="{{ route('tarifPourcentage.liste') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Supprimer</a>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection