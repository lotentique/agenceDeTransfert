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
  
    <!-- affichage des erreur de login  -->
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

<div class="container-fluid login" style="text-align: center;">

   <div class="centered" style="display: inline-block;">

    <form method="post" action="{{url('/login')}}">

      {{csrf_field()}}
      <img src="img/profile.png" class="img-responsive" style="width: 100px;height: 100px;margin-left: 60px;margin-bottom: 15px;margin-top: 10px;">
    <div class="form-group">

      <input  class="form-control" id="login" placeholder="Login" name="login" required>
    </div>
    <div class="form-group">

      <input type="password" class="form-control" id="password" placeholder="Mots de passe" name="password" required>
    </div>

    <button type="submit" class="btn cf ">CONFIRMER</button>

  </form>


   </div>
     </div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-toggle.min.js"></script>
<script src="js/fonction.js"></script>
</body>
</html>
