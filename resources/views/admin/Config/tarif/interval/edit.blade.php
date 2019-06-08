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
    <div class="panel"  style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);">
            <h4 style="font-family:  times new roman;text-transform: uppercase;color: white;"></span> Modifier le Tarif</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('tarifInterval.update', $tarif_interval->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="gauche">
                    <div class="form-group">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Minimum') }}</label>   
                        <div class="col-md-6">
                        <input id="min" type="number" class="form-control{{ $errors->has('min') ? ' is-invalid' : '' }}" name="min" value="{{ $tarif_interval->min }}" required autofocus>
                        @if ($errors->has('min'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('min') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Maximum') }}</label>   
                        <div class="col-md-6">
                        <input id="max" type="number" class="form-control{{ $errors->has('max') ? ' is-invalid' : '' }}" name="max" value="{{ $tarif_interval->max }}" required autofocus>
                        @if ($errors->has('max'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('max') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tarif') }}</label>   
                        <div class="col-md-6">
                        <input id="tarif" type="number" class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}" name="tarif" value="{{ $tarif_interval->tarif }}" required autofocus>
                        @if ($errors->has('tarif'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tarif') }}</strong>
                        </span>
                        @endif
                       </div>
                    </div>
                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                        Enregistrer
                    </button>
                    <a href="{{ route('tarifInterval.liste') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Annuler</a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection