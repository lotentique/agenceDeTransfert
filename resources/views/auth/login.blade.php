<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	  <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="{{asset('css/bootstrap-animation.min.css')}}" rel="stylesheet">
       <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
       <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
       <link href="{{asset('css/bootstrap-toggle.min.css')}}" rel="stylesheet">
       <link  href="{{asset('css/style4.css')}}" rel="stylesheet"/>
</head>
<body>
  
<h1 class="la-anim-12" data-content="{{ config('app.name', 'Laravel') }}" >{{ config('app.name', 'Laravel') }}</h1>
<div class="container-fluid login">

  <div class="centered" >

    <form method="post" action="{{url('/login')}}">

      {{csrf_field()}}
      <img src="img/profile.png" class="img-responsive" style="width: 100px;height: 100px;margin-left: 60px;margin-bottom: 15px;margin-top: 10px;">
    <div class="form-group">

      <input  class="form-control" id="login" placeholder="Login" name="login" required>
      @if ($errors->has('login'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('login') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">

      <input type="password" class="form-control" id="password" placeholder="Mots de passe" name="password" required>
      @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    <button type="submit" class="btn cf " dusk="confir">CONFIRMER</button>
    </form>
  </div>
</div>
<div class="slogan">
<h1><span>S</span>écurisé, <span>E</span>fficace et <span>R</span>apide.</h1>
</div>

        

      
        


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('js/fonction.js')}}"></script>
<script src="{{asset('js/classie.js')}}"></script>
    <script>
    
      var inProgress = false;
      var continu=true;
        

        window.addEventListener( 'load', function() {
          
          var animEl = document.querySelector( '.la-anim-12'  );
          do{
          if( inProgress ) return false;
          inProgress = true;
          classie.add( animEl, 'la-animate' );


          setTimeout( function() {
            classie.remove( animEl, 'la-animate' );
            
            inProgress = false;
          }, 2000 );
          }while(continu);
        } );
      
    </script>
</body>
</html>
