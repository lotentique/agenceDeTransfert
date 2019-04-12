@extends('layouts.base')
@section('content')
<div class="NL">
  <div class="gauche">
    <form method="post" action="{{ route('changerNom') }}">{{csrf_field()}}
      <div class="form-group">

        <input class="form-control" id="NouveauN" placeholder="Nouveau nom" name="NouveauN" required>
      </div>
      <div class="form-group">

        <input type="hidden" class="form-control" value="{{ config('app.name', 'Laravel') }}" name="AncienN">
      </div>
      <button type="submit" class="btn cf ">CONFIRMER</button>
    </form>
  </div>
  <div class="droite">
    <form method="post" action="{{ route('changerLogo') }}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">

        <input type="file" name="logo" required>
      </div>

      <button type="submit" class="btn cf ">CONFIRMER</button>
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
</div>
<div><a href="{{ route('tarification') }}" class="btn btn-primary">la tarification</a></div>
@endsection