@extends('layouts.base')

@section('content')
<div class="NL">
    <div class="panel " style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);">
            <h4 style="font-family:  times new roman;text-transform: uppercase;color: white;"></span> Modifier le Pourcentage</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('tarifPourcentage.update', $tarif_pourcentage->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="gauche">

                    <div class="form-group">

                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Pourcentage') }}</label>   
                        <div class="col-md-6">
                        <input id="pourcentage" type="number" class="form-control{{ $errors->has('pourcentage') ? ' is-invalid' : '' }}" name="pourcentage" value="{{ $tarif_pourcentage->pourcentage }}" required autofocus>
                        @if ($errors->has('pourcentage'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pourcentage') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                        Enregistrer
                    </button>
                    <a href="{{ route('tarifPourcentage.liste') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Annuler</a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection