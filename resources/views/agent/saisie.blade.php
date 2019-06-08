@extends('layouts.baseAgent')

@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card">
        <div class="card-header">Numéro de telephone</div>
        <div class="card-body card-block">
            <form class="form-horizontal" method="POST" action="{{ route('saisie.confirm') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Tel Expediteur:</label> <input id="tel_expe" type="text" class="form-control{{ $errors->has('tel_expe') ? ' is-invalid' : '' }}" name="tel_expe" required placeholder="" value="{{ old('tel_expe') }}" autofocus>
                    @if ($errors->has('tel_expe'))
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tel_expe') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Tel Beneficiaire:</label> <input id="tel_benef" type="text" class="form-control{{ $errors->has('tel_benef') ? ' is-invalid' : '' }}" name="tel_benef" required placeholder="" value="{{ old('tel_benef') }}" autofocus>
                    @if ($errors->has('tel_benef'))
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tel_benef') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-actions form-group" style=" text-align:center;">
                    <button type="submit" class="btn btn-success btn-sm" style="border-radius: 25px; text-align:center;">
                        Comfirmer</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection