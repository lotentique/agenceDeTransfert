@extends('layouts.base')
@section('content')
<div class="NL">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;">
            <h4 style="font-family: impact"><span class="creU"></span> Modifier un Admin</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('tarifInterval.update', $tarif_interval->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="gauche">
                    <div class="form-group">
                        <input id="min" type="number" class="form-control{{ $errors->has('min') ? ' is-invalid' : '' }}" name="min" value="{{ $tarif_interval->min }}" required autofocus>
                        @if ($errors->has('min'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('min') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="max" type="number" class="form-control{{ $errors->has('max') ? ' is-invalid' : '' }}" name="max" value="{{ $tarif_interval->max }}" required autofocus>
                        @if ($errors->has('max'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('max') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="tarif" type="number" class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}" name="tarif" value="{{ $tarif_interval->tarif }}" required autofocus>
                        @if ($errors->has('tarif'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tarif') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                        Enregistrer
                    </button>
                    <a href="{{ route('tarifInterval.liste') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Supprimer</a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection