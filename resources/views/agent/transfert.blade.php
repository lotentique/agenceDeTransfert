@extends('layouts.baseAgent')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header" style="text-align:center;"> 
            <h4>Transfer <span style="text-align:right;color:red; float: right;"> * Obligatoire</span></h4>
        </div>
         <form class="form-horizontal" method="POST" action="{{ route('trensfert.confirm') }}">
                {{ csrf_field() }}
            <fieldset style="padding:15px;">
                <legend style="text-align:center;">Expediteur</legend>
                <div class="card-body card-block" style="margin:0px; padding:0px;">
                    <div class="row form-group">
                        <div class="col col-md-6">
                           <label>Nom Expediteur<span style="color:red; "> *</span></label><input id="nom_expediteur" type="text" class="form-control{{ $errors->has('nom_expediteur') ? ' is-invalid' : '' }}" name="nom_expediteur" required placeholder=""  value="<?php if(isset($expe) && count($expe)>0){echo($expe[0]->nom);}else{ echo(old('nom_expediteur'));} ?>" autofocus>
                            @if ($errors->has('nom_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nom_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col col-md-6">
                            <label>Prenom Expediteur<span style="color:red; "> *</span></label>
                            <input id="prenom_expediteur" type="text" class="form-control{{ $errors->has('prenom_expediteur') ? ' is-invalid' : '' }}" name="prenom_expediteur" required placeholder="" value="<?php if(isset($expe) && count($expe)>0){echo($expe[0]->prenom);}else{ echo(old('prenom_expediteur'));} ?>" autofocus>
                            @if ($errors->has('prenom_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prenom_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body card-block" style="margin:0px; padding:0px;">
                    <div class="row form-group" >
                        <div class="col col-md-6">
                            <label>Tel Expediteur<span style="color:red; "> *</span></label>
                            <input id="tel_expediteur" type="number" class="form-control{{ $errors->has('tel_expediteur') ? ' is-invalid' : '' }}" name="tel_expediteur" required placeholder="" value="<?php if(isset($expe) && count($expe)>0){echo($expe[0]->tel);}else{ echo(old('tel_expediteur'));} ?>" autofocus>
                            @if ($errors->has('tel_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tel_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col col-md-6">
                            <label>NNI Expediteur<span style="color:red; "> *</span></label> 
                            <input id="nni_expediteur" type="number" class="form-control{{ $errors->has('nni_expediteur') ? ' is-invalid' : '' }}" name="nni_expediteur" required placeholder="" autofocus value="<?php if(isset($expe) && count($expe)>0){echo($expe[0]->nni);}else{ echo(old('nni_expediteur'));} ?>">
                            @if ($errors->has('nni_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nni_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body card-block" style="margin:0px; padding:0px;">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label>Email Expediteur</label>  
                            <input id="email_expediteur" type="email" class="form-control{{ $errors->has('email_expediteur') ? ' is-invalid' : '' }}" name="email_expediteur" placeholder="" autofocus value="<?php if(isset($expe) && count($expe)>0){echo($expe[0]->email);}else{ echo(old('email_expediteur'));} ?>">
                            @if ($errors->has('email_expediteur'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email_expediteur') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col col-md-6">
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset style="padding:15px;">
                <legend style="text-align:center;">Beneficiaire</legend>
                <div class="card-body card-block" style="margin:0px; padding:1px;">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <LABEL>Nom Beneficiaire<span style="color:red; "> *</span></LABEL> 
                            <input id="nom_beneficiaire" type="text" class="form-control{{ $errors->has('nom_beneficiaire') ? ' is-invalid' : '' }}" name="nom_beneficiaire" required placeholder="" autofocus value="<?php if(isset($benef) && count($benef)>0){echo($benef[0]->nom);}else{ echo(old('nom_beneficiaire'));} ?>">
                            @if ($errors->has('nom_beneficiaire'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nom_beneficiaire') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col col-md-6">
                            <label>Prenom Beneficiaire<span style="color:red; "> *</span></label> 
                            <input id="prenom_beneficiaire" type="text" class="form-control{{ $errors->has('prenom_beneficiaire') ? ' is-invalid' : '' }}" name="prenom_beneficiaire" required placeholder="" autofocus value="<?php if(isset($benef) && count($benef)>0){echo($benef[0]->prenom);}else{ echo(old('prenom_beneficiaire'));} ?>">
                            @if ($errors->has('prenom_beneficiaire'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prenom_beneficiaire') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body card-block" style="margin:0px; padding:1px;">
                    <div class="row form-group">
                        <div class="col col-md-6">
                             <label>Tel Beneficiaire<span style="color:red; "> *</span></label> 
                             <input id="tel_beneficiaire" type="number" class="form-control{{ $errors->has('tel_beneficiaire') ? ' is-invalid' : '' }}" name="tel_beneficiaire" required placeholder="" autofocus value="<?php if(isset($benef) && count($benef)>0){echo($benef[0]->tel);}else{ echo(old('tel_beneficiaire'));} ?>">
                            @if ($errors->has('tel_beneficiaire'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tel_beneficiaire') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col col-md-6">
                           <label>Email Beneficiaire </label>
                           <input id="email_beneficiaire" type="email" class="form-control{{ $errors->has('email_beneficiaire') ? ' is-invalid' : '' }}" name="email_beneficiaire" placeholder="" autofocus value="<?php if(isset($benef) && count($benef)>0){echo($benef[0]->email);}else{ echo(old('email_beneficiaire'));} ?>">
                            @if ($errors->has('email_beneficiaire'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email_beneficiaire') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body card-block" style="margin:0px; padding:1px;">
                    <div class="row form-group">
                        <div class="col col-md-6">
                            <label for="ville">Ville</label>
                            <select class="form-control" id="ville" name="ville">
                                @foreach($villes as $ville)
                                <option value="{{ $ville->id_ville }}">{{ $ville->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col col-md-6">
                            <label>Montant A Transferé<span style="color:red; "> *</span></label>
                            <input id="montant" type="number" class="form-control{{ $errors->has('montant') ? ' is-invalid' : '' }}" name="montant" required placeholder="" value="{{ old('montant') }}" autofocus>
                            @if ($errors->has('montant'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('montant') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="card-footer" style="text-align:center;">
                <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                   Comfirmer 
                </button>
                <a href="{{ route('saisie') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Annuler</a>
            </div>
        </form>
    </div>
</div>

@endsection