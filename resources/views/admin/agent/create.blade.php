@extends('layouts.base')
@section('content')
<div class="NL">
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;"><h4 style="font-family: impact"><span class="creU"></span> Créer un Agent</h4></div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('agents.store') }}">
                {{ csrf_field() }}
                <div class="gauche">
                <div class="form-group row">
                     
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ __('Name') }}">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    
                </div>
                <div class="form-group row">

                            <input id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ old('prenom') }}" required autofocus placeholder="{{ __('prenom') }}">

                            @if ($errors->has('prenom'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('prenom') }}</strong>
                                </span>
                            @endif
                        
                </div>
                <div class="form-group row">

                            <input id="tel" type="number" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required autofocus placeholder="{{ __('tel') }}">

                            @if ($errors->has('tel'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                            @endif
                        
                </div>

                <div class="form-group row">
                        
                            <input id="nni" type="number" class="form-control{{ $errors->has('nni') ? ' is-invalid' : '' }}" name="nni" value="{{ old('nni') }}" required autofocus placeholder="{{ __('nni') }}">

                            @if ($errors->has('nni'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nni') }}</strong>
                                </span>
                            @endif
                        
                </div>

                <div class="form-group row">

                            <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus placeholder="{{ __('login') }}">

                            @if ($errors->has('login'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
                        
                </div>

            </div><!-- Fin gauche  -->
            <div class="droite">
                

                <input id="type_user" type="hidden"  name="type_user" value="agent">
                <div class="form-group row">

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        
                    </div>

                    <div class="form-group row">

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('Password') }}">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group row">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ __('Confirm Password') }}">
                            </div>

            <div class="form-group row">
                <select name="id_pnt" class="form-control">
                    @if (count($villes))
                    @foreach($villes as $row)
                    <optgroup label="{{$row->nom}}">
                        @if (count($PTransfert))
                        @foreach($PTransfert as $row2)
                            @if ($row->id_ville==$row2->id_ville)
                            <option value="{{$row2->id}}">{{$row2->nom}}</option>
                            @endif
                        @endforeach
                        @endif
                    </optgroup>            
                    @endforeach
                    @endif
                </select>
            </div>

            </div><!-- Fin droite  -->
                        </div>


                <div class="form-group" >
                    
                        <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                            Enregistrer
                        </button>                       
                        <a href="{{ route('agents.index') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Supprimer</a>
                    
                </div>
            </form>
        </div>
    </div>
 </div>
 <div id="p"></div>
@endsection
