@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                   <form method="POST" action="{{ route('register.store') }}">
                       @csrf
                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('prenom') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" name="prenom" value="{{ old('prenom') }}" required autofocus>

                                    @if ($errors->has('prenom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('prenom') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('tel') }}</label>

                                <div class="col-md-6">
                                    <input id="tel" type="number" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required autofocus>

                                    @if ($errors->has('tel'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tel') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="nni" class="col-md-4 col-form-label text-md-right">{{ __('nni') }}</label>

                                <div class="col-md-6">
                                    <input id="nni" type="number" class="form-control{{ $errors->has('nni') ? ' is-invalid' : '' }}" name="nni" value="{{ old('nni') }}" required autofocus>

                                    @if ($errors->has('nni'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nni') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('login') }}</label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>

                                    @if ($errors->has('login'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('login') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="type_user" class="col-md-4 col-form-label text-md-right">{{ __('type_user') }}</label>

                                <div class="col-md-6">
                                    <input id="type_user" type="text" class="form-control{{ $errors->has('type_user') ? ' is-invalid' : '' }}" name="type_user" value="{{ old('type_user') }}" required autofocus>

                                    @if ($errors->has('type_user'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type_user') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                       <button>ajouter</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
