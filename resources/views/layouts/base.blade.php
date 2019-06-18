<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta http-equiv="Refresh" content="300">
  <link href="{{asset('css/bootstrap-animation.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-toggle.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

  <link href="{{asset('css/style3.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>
  @mapstyles
</head>

<body>
  <div class="container-fluid">

    <div class="row r">
      <div class="as">
        <div class="col-xs-8">
          <div class="titre">
            <h1>{{ config('app.name', 'Laravel') }}</h1>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="logo">
            <img src="{{asset('img/logo.PNG')}}" class="img-responsive">
          </div>
        </div>
      </div>
     <div class="profile">
        <div class="nomUtiissateur" style="float: right;">
          <span style="margin-right: 30px;font-weight: bold;">{{Auth::user()->email}}<br><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></span>
        </div>
        <img src="{{asset('img/avatar.png')}}" class="img-responsive">

        <div class="bmenu">
          <a class="menu-button "><i class="glyphicon glyphicon-th-list"></i> MENU </a>
        </div>
      </div>
      <ul class="menu-bar open" style="font-weight: bold;">
        <li><a href="{{ route('admin')}}" class="{{ request()->is('admin') ? 'active' : '' }}"><span class="glyphicon glyphicon-home" ></span> ACCUEIL</a></li>
        <li><a href="{{ route('Utilisateurs.index')}}" class="{{ request()->is('Utilisateurs') ? 'active' : '' }}"><span class="glyphicon glyphicon-user"></span>Utilisateurs</a>
        <li><a href="{{ route('PTransfert.index')}}" class="{{ request()->is('admin/PTransfert') ||request()->is('admin/PTransfert/*') ? 'active' : '' }}"><span class="glyphicon glyphicon-equalizer"></span> Points de transfert</a></li>
        <li><a href="{{ route('admin.edit', ['id' => auth()->user()->id ]) }}" class="{{ request()->is('admin/admin/*/edit') ? 'active' : '' }}"><span class="glyphicon glyphicon-pencil"></span> Mon profil</a></li>


        <li><a href="{{ route('Transaction.index')}}" class="{{ request()->is('admin/Transaction') ? 'active' : '' }}"><span class="glyphicon glyphicon-transfer"></span> transactions</a></li>

        <!--<li><a href="{{ route('ChangerNL')}}" class="{{ request()->is('conf') ? 'active' : '' }}"><span class="glyphicon glyphicon-cog"></span> configurations</a></li>
        <li><a href="{{ route('carte.index')}}" class="{{ request()->is('admin/carte') ? 'active' : '' }}"><span class="glyphicon glyphicon-cog"></span> Carte</a></li>-->
         <li>
          <div class="dropdown show">
           <a dusk="config" class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-cog"></span> configurations <span class="caret"></span></a>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="{{ route('config') }}">plage horaire</a>
              <a dusk="nom" class="dropdown-item" href="#" data-toggle="modal" data-target="#ChangerNom" data-original-title>Changer Le Nom</a>
              <a dusk="logo" class="dropdown-item" href="#" data-toggle="modal" data-target="#ChangerLogo" data-original-title>Changer Le Logo</a>
              <a class="dropdown-item" href="{{ route('tarification') }}">Tarification</a>
            </div>
          </div>
         </li>
      </ul>

    </div>

  </div>
  <div class="container-fluid contenu open2">

    @yield('content')

  </div>
  <!-- modal du changment du nom -->
  <div class="modal fade" id="ChangerNom">
    <div class="modal-dialog">
      <div class="panel " style="border:none;">
          <div class="panel-heading" style=" background-image: -moz-linear-gradient(70deg, SlateBlue 0%, gray 100%);
             background-image: -webkit-linear-gradient(70deg, SlateBlue 0%, gray 100%);
             background-image: -ms-linear-gradient(70deg, SlateBlue 0%, gray 100%);">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="panel-title" style="color: white;text-shadow: 1px 1px 1px black;text-align: center;" >Changer le nom de l'agence</h4>
          </div>
        
          <div class="modal-body">
              <form method="post" action="{{ route('changerNom') }}">{{csrf_field()}}
            <div class="form-group">
             <label for="name" >{{ __('changer le nom ') }}:</label>   
                              
              <input class="form-control" id="NouveauN" placeholder="Nouveau nom" name="NouveauN" required>
             
            </div>

            <div class="form-group">
              
              <input type="hidden" class="form-control" value="{{ config('app.name', 'Laravel') }}" name="AncienN">
            
            </div>
            
       
          </div>
          <div class="panel-footer " style="margin-bottom:-14px;">
              <button type="submit" class="btn cf btn-success">CONFIRMER</button>
              <button  class="btn btn-danger " data-dismiss="modal" >Annuler</button>     
          </div>  
          </form>    
      </div>
    </div>
  </div>
<!-- fin -->
<!-- modal du changment du logo -->
  <div class="modal fade" id="ChangerLogo">
    <div class="modal-dialog">
      <div class="panel " style="border:none;">
          <div class="panel-heading" style=" background-image: -moz-linear-gradient(70deg, SlateBlue 0%, gray 100%);
             background-image: -webkit-linear-gradient(70deg, SlateBlue 0%, gray 100%);
             background-image: -ms-linear-gradient(70deg, SlateBlue 0%, gray 100%);">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="panel-title" style="color: white;text-shadow: 1px 1px 1px black;text-align: center;" >Changer Le Logo de L'agence</h4>
          </div>
        
          <div class="modal-body">
              <form method="post" action="{{ route('changerLogo') }}" enctype="multipart/form-data">{{csrf_field()}}
            <div class="form-group">
             <label for="name" >{{ __('Changer Le Logo ') }}:</label>   
                              
             <input type="file" name="logo" required>

             @if(count($errors) >0)
              <div class="alert alert-danger erreurlogo" id='{{count($errors)}}'>
                <button type='button' class='close' data-dismiss='alert'>X</button>
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
             
            </div>

            <div class="form-group">
              
              <input type="hidden" class="form-control" value="{{ config('app.name', 'Laravel') }}" name="AncienN">
            
            </div>
            
       
          </div>
          <div class="panel-footer " style="margin-bottom:-14px;">
              <button type="submit" class="btn cf btn-success">CONFIRMER</button>
              <button  class="btn btn-danger " data-dismiss="modal" >Annuler</button>     
          </div>  
          </form>    
      </div>
    </div>
  </div>
<!-- fin -->

  <script src="{{asset('js/jquery.min.js') }}"></script>
  <script src="{{asset('js/bootstrap.min.js') }}"></script>
  <script src="{{asset('js/bootstrap-toggle.min.js') }}"></script>
  <script src="{{asset('js/fonction.js') }}"></script>
  <script src="{{asset('js/cacher.js') }}"></script>
  <script src="{{asset('js/active.js') }}"></script>
  
  <script type="text/javascript" src="{{asset('DataTables/datatables.min.js') }}"></script>
@mapscripts
</body>

</html>
