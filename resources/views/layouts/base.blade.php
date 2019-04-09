<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{asset('css/bootstrap-animation.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-toggle.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

  <link href="{{asset('css/style3.css')}}" rel="stylesheet" />

</head>

<body>
  <div class="container-fluid">

    <div class="row r">
      <div class="as">
        <div class="col-xs-7">
          <div class="titre">
            <h1>{{ config('app.name', 'Laravel') }}</h1>
          </div>
        </div>
        <div class="col-xs-5">
          <div class="logo">
            <img src="{{asset('img/logo.png')}}" class="img-responsive">
          </div>
        </div>
      </div>
      <div class="profile">
        <img src="{{asset('img/profile.jpg')}}" class="img-responsive">

        <div class="bmenu">
          <a class="menu-button "><i class="glyphicon glyphicon-th-list"></i> MENU </a>
        </div>
      </div>
      <ul class="menu-bar" style="font-weight: bold;">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span> ACCUEIL</a></li>
        <li><a href="{{ route('admin.index')}}"><span class="glyphicon glyphicon-user"></span>Admin</a>
        <li><a href="{{ route('agents.index')}}"><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span><span class="glyphicon glyphicon-user"></span> Agents</a>
        </li>
        <li><a href="{{ route('bcm.index')}}"><span class="glyphicon glyphicon-stats"></span> BCM</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-equalizer"></span> Points de tranfert</a></li>
        <li><a href="{{ route('admin.edit', ['id' => auth()->user()->id ]) }}"><span class="glyphicon glyphicon-pencil"></span> Mon profile</a></li>
        <li><a href="{{ route('ChangerNL')}}"><span class="glyphicon glyphicon-cog"></span> configuration</a></li>
        <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
      </ul>

    </div>

  </div>
  <div class="container-fluid contenu">

    @yield('content')

  </div>


  <script src="{{asset('js/jquery.min.js') }}"></script>
  <script src="{{asset('js/bootstrap.min.js') }}"></script>
  <script src="{{asset('js/bootstrap-toggle.min.js') }}"></script>
  <script src="{{asset('js/fonction.js') }}"></script>

</body>

</html>