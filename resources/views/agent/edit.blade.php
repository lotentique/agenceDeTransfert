@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                {{ method_field('PUT') }}
            <div class="panel panel-default">
                <div class="panel-heading">Modifier un utilisateur</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('agents.update', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @if (Auth::user()->type_user=="admin")
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Nom</label>
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
                                <label for="prenom" class="col-md-4 control-label">prenom</label>
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
                            <label for="tel" class="col-md-4 control-label">telephone</label>
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
                                <label for="nni" class="col-md-4 control-label">nni</label>
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

                        <div class="form-group">
                            <label for="login" class="col-md-4 control-label">login</label>
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
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
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
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enregistrer
                                </button>
                                <a href="{{ route('agents.index') }}" class="btn btn-danger">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
