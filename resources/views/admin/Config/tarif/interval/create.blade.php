@extends('layouts.base')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="NL">
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;">
            <h4 style="font-family: impact"><span class="creU"></span> ajouter un nouveau tarif</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('tarifInterval.store') }}">
                {{ csrf_field() }}
                <div class="gauche">
                    <div class="form-group row">

                        <input id="min" type="number" class="form-control{{ $errors->has('min') ? ' is-invalid' : '' }}" name="min" value="{{ old('min') }}" required autofocus placeholder="{{ __('min') }}">

                        @if ($errors->has('min'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('min') }}</strong>
                        </span>
                        @endif

                    </div>
                    <div class="form-group row">

                        <input id="max" type="number" class="form-control{{ $errors->has('max') ? ' is-invalid' : '' }}" name="max" value="{{ old('max') }}" required autofocus placeholder="{{ __('max') }}">

                        @if ($errors->has('max'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('max') }}</strong>
                        </span>
                        @endif

                    </div>
                    <div class="form-group row">

                        <input id="tarif" type="number" class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}" name="tarif" value="{{ old('tarif') }}" required autofocus placeholder="{{ __('tarif') }}">

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