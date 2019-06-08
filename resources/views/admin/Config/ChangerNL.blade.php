@extends('layouts.base')
@section('content')
<div class="NL">
  <div class="panel " style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);"><h4 style="font-family:  times new roman;text-transform: uppercase;color: white;">CONFIGURATION</h4></div>
        <div class="panel-body">
  <div class="gauche">
    <form method="post" action="{{ route('changerNom') }}">{{csrf_field()}}
      <div class="form-group">
       <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('changer le nom ') }}</label>   
                        <div class="col-md-6"> 
        <input class="form-control" id="NouveauN" placeholder="Nouveau nom" name="NouveauN" required>
        </div>
      </div>

      <div class="form-group">
        
        <input type="hidden" class="form-control" value="{{ config('app.name', 'Laravel') }}" name="AncienN">
      
      </div>
      <button type="submit" class="btn cf btn-success" style="margin-top: 5px;">CONFIRMER</button>
    </form>
    <form method="post" action="{{ route('changerLogo') }}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('changer le logo') }}</label>   
        <div class="col-md-6"> 
        <input type="file" name="logo" required>
         </div>
         
      </div>

      <button type="submit" class="btn cf btn-success" style="margin-top: 5px;">CONFIRMER</button>
    </form>

    @if(count($errors) >0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>
  <div class="droite">
    <div><a href="{{ route('tarification') }}" class="btn btn-success">la tarification</a></div>
  </div>
</div>
</div>
</div>

@endsection