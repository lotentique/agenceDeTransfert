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
    <script text="type/javascript">
        function appPourcentage() {
            var checkBox = document.getElementById("fin");
            var text = document.getElementById("pourcentage");
            var text2 = document.getElementById("lpourcentage");
            if (checkBox.checked == true) {
                text.style.display = "block";
                text2.style.display = "block";
            } else {
                text.style.display = "none";
                text2.style.display = "none";
            }
        }
    </script>
    @if(isset($intervalPasCouvert))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss='alert'>X</button>
        <strong>{{ $intervalPasCouvert }}</strong>

    </div>
    @endif
    <div class="panel " style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);">
            <h4 style="font-family:  times new roman;text-transform: uppercase;color: white;"></span> Ajouter un tarif</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('tarifInterval.store') }}">
                {{ csrf_field() }}
                <div class="gauche">
                    <div class="form-group row">
                        <input type="hidden" name="min" value="{{ $mintr }}">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tarif') }}</label>   
                        <div class="col-md-6"> 
                        <input id="min1" type="number" class="form-control{{ $errors->has('min1') ? ' is-invalid' : '' }}" name="min1" value="{{ $mintr }}" placeholder="{{ __('$mintr') }}" disabled="disabled">

                        @if ($errors->has('min'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('min') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Maximum') }}</label>   
                        <div class="col-md-6"> 
                        <input id="max" type="number" class="form-control{{ $errors->has('max') ? ' is-invalid' : '' }}" name="max" value="{{ old('max') }}" required autofocus placeholder="{{ __('max') }}">

                        @if ($errors->has('max'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('max') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tarif') }}</label>   
                        <div class="col-md-6"> 
                        <input id="tarif" type="number" class="form-control{{ $errors->has('tarif') ? ' is-invalid' : '' }}" name="tarif" value="{{ old('tarif') }}" required autofocus placeholder="{{ __('tarif') }}">

                        @if ($errors->has('tarif'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tarif') }}</strong>
                        </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right" id="lpourcentage" style="display:none">{{ __('Pourcentage') }}</label>   
                        <div class="col-md-6"> 
                        <input style="display:none" id="pourcentage" type="number" class="form-control{{ $errors->has('pourcentage') ? ' is-invalid' : '' }}" name="pourcentage" value="{{ old('pourcentage') }}" autofocus placeholder="{{ __('pourcentage') }}">
                    </div>
                    </div>
                    <fieldset>
                        <input type="checkbox" name="fin" id="fin" value="1" onclick="appPourcentage()">fin des intervals<br>

                    </fieldset><br />

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