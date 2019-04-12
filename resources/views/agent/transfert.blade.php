@extends('layouts.baseAgent')

@section('content')

<div class="NL">
    @if($message=Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss='alert'>X</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if(count($errors) >0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- -->

    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;">
            <h4 style="font-family: impact"> Effetue un transfer</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('trensfert.confirm') }}">
                {{ csrf_field() }}
                <div class=" gauche">
                    <fieldset>
                        <legend>Expediteur</legend>
                        <div class="form-group">
                            <input id="nom_expediteur" type="text" class="form-control{{ $errors->has('nom_expediteur') ? ' is-invalid' : '' }}" name="nom_expediteur" required placeholder="nom Expediteur" autofocus>
                            @if ($errors->has('nom_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nom_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="prenom_expediteur" type="text" class="form-control{{ $errors->has('prenom_expediteur') ? ' is-invalid' : '' }}" name="prenom_expediteur" required placeholder="prenom expediteur" autofocus>
                            @if ($errors->has('prenom_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prenom_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="tel_expediteur" type="number" class="form-control{{ $errors->has('tel_expediteur') ? ' is-invalid' : '' }}" name="tel_expediteur" required placeholder="tel expediteur" autofocus>
                            @if ($errors->has('tel_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tel_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="nni_expediteur" type="number" class="form-control{{ $errors->has('nni_expediteur') ? ' is-invalid' : '' }}" name="nni_expediteur" required placeholder="nni expediteur" autofocus>
                            @if ($errors->has('nni_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nni_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="email_expediteur" type="email" class="form-control{{ $errors->has('email_expediteur') ? ' is-invalid' : '' }}" name="email_expediteur" placeholder="email expediteur" autofocus>
                            @if ($errors->has('email_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                        <br />
                    </fieldset>
                </div>
                <div class="droite">
                    <fieldset>
                        <legend>Beneficiaire</legend>
                        <div class="form-group">
                            <input id="nom_beneficiaire" type="text" class="form-control{{ $errors->has('nom_beneficiaire') ? ' is-invalid' : '' }}" name="nom_beneficiaire" required placeholder="nom beneficiaire" autofocus>
                            @if ($errors->has('nom_beneficiaire'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nom_beneficiaire') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="prenom_beneficiaire" type="text" class="form-control{{ $errors->has('prenom_beneficiaire') ? ' is-invalid' : '' }}" name="prenom_beneficiaire" required placeholder="prenom beneficiaire" autofocus>
                            @if ($errors->has('prenom_beneficiaire'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prenom_beneficiaire') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="tel_beneficiaire" type="number" class="form-control{{ $errors->has('tel_beneficiaire') ? ' is-invalid' : '' }}" name="tel_beneficiaire" required placeholder="tel beneficiaire" autofocus>
                            @if ($errors->has('tel_beneficiaire'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tel_beneficiaire') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="email_beneficiaire" type="email" class="form-control{{ $errors->has('email_beneficiaire') ? ' is-invalid' : '' }}" name="email_beneficiaire" placeholder="email beneficiaire" autofocus>
                            @if ($errors->has('email_beneficiaire'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email_beneficiaire') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <select class="form-control" id="ville" name="ville">
                                @foreach($villes as $ville)
                                <option value="{{ $ville->id_ville }}">{{ $ville->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                </div><br />
                <div class="form-group">
                    <input id="montant" type="number" class="form-control{{ $errors->has('montant') ? ' is-invalid' : '' }}" name="montant" required placeholder="montant a transfere" autofocus>
                    @if ($errors->has('montant'))
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $errors->first('montant') }}</strong>
                    </span>
                    @endif
                </div><br />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                        Enregistrer
                    </button>
                    <a href="{{ route('admin.index') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Supprimer</a>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection