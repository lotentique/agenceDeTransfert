@extends('layouts.base')

@section('content')

<!-- affichage des erreur de login  -->
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

    {{ method_field('PUT') }}
    <div class="panel" style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);">
            <h4 style="font-family: times new roman;color: white;"><span class="creU"></span> MON PROFILE</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.profil', $user->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="gauche">
                    @if (Auth::user()->type_user=="admin")

                    <div class="form-group">
                         <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>   
                        <div class="col-md-6">

                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                       </div>
                    </div>

                    @endif

                    @if (Auth::user()->type_user=="admin")
                    <div class="form-group">
                        <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('prenom') }}</label>   
                        <div class="col-md-6">

                        <input id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ $user->prenom }}" required autofocus>
                        @if ($errors->has('prenom'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('prenom') }}</strong>
                        </span>
                        @endif
                    </div>
                    </div>

                    @endif
                    <div class="form-group">
                          <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>   
                        <div class="col-md-6">
                         
                        <input id="tel" type="number" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ $user->tel }}" required autofocus>
                        @if ($errors->has('tel'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tel') }}</strong>
                        </span>
                        @endif
                       </div>
                    </div>
                    @if (Auth::user()->type_user=="admin")
                    <div class="form-group">

                          <label for="nni" class="col-md-4 col-form-label text-md-right">{{ __('NNI') }}</label>   
                        <div class="col-md-6">
                        <input id="nni" type="number" class="form-control{{ $errors->has('nni') ? ' is-invalid' : '' }}" name="nni" value="{{ $user->nni }}" required autofocus>
                        @if ($errors->has('nni'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nni') }}</strong>
                        </span>
                        @endif
                       </div>
                    </div>
                    @endif

                </div>
                <div class="droite">


                    <div class="form-group">
                         <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('login') }}</label>   
                        <div class="col-md-6">

                        <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ $user->login }}" required autofocus>
                        @if ($errors->has('login'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('login') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group">

                         <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>   
                        <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                       </div>
                    </div>
                    <div class="form-group">
                         <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('ancien pass') }}</label>   
                        <div class="col-md-6">
                        <input id="oldPass" type="password" class="form-control{{ $errors->has('oldPass') ? ' is-invalid' : '' }}" name="oldPass" placeholder="ancien mot de passe">
                        @if ($errors->has('oldPass'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('oldPass') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>

                    <div class="form-group">
                         <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('nouveau pass') }}</label>   
                        <div class="col-md-6">
                        <input id="newpass" type="password" class="form-control{{ $errors->has('newpass') ? ' is-invalid' : '' }}" name="newpass" placeholder="nouveau mot de passe">
                        @if ($errors->has('newpass'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('newpass') }}</strong>
                        </span>
                        @endif
                    </div>
                    </div>

                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;margin-top: 10px;">
                        Enregistrer
                    </button>
                    <a href="{{ route('admin') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;margin-top: 10px;">Annuler</a>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection