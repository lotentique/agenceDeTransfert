@extends('layouts.base')

@section('content')
<div class="NL">
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;"><h4 style="font-family: impact"><span class="creU"></span> Modifier l'Agent Bcm</h4></div>
        <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('bcm.update', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="gauche">
                        @if (Auth::user()->type_user=="admin")
                        
                            <div class="form-group">
                            
                                
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                                
                            </div>

                        @endif

                        @if (Auth::user()->type_user=="admin")
                            <div class="form-group">
                                
                                
                                    <input id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ $user->prenom }}" required autofocus>
                                    @if ($errors->has('prenom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prenom') }}</strong>
                                        </span>
                                @endif
                                </div>
                            
                        @endif
                        <div class="form-group">
                           
                            
                                <input id="tel" type="number" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ $user->tel }}" required autofocus>
                                @if ($errors->has('tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                    </div>
                    <div class="droite">
                        @if (Auth::user()->type_user=="admin")
                            <div class="form-group">
                           
                                
                                    <input id="nni" type="number" class="form-control{{ $errors->has('nni') ? ' is-invalid' : '' }}" name="nni" value="{{ $user->nni }}" required autofocus>
                                    @if ($errors->has('nni'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nni') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>
                        @endif

                        <div class="form-group">
                           
                            
                                <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ $user->login }}" required autofocus>
                                @if ($errors->has('login'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            
                            
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>
                       </div>
                        <div class="form-group" >
                    
                        <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                            Enregistrer
                        </button>                       
                        <a href="{{ route('bcm.index') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Supprimer</a>
                    
                     </div>
                    </form>
                </div>
            </div>
       </div>

@endsection
