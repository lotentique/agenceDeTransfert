@extends('layouts.base')
@section('content')
<p>les point de tranfert sont ouvert de {{ $heurs[0]->debut }} a {{ $heurs[0]->fin }}</p>
<form method="post" action="{{ route('heur') }}">{{csrf_field()}}
  debut
  <input type="time" name="debut">
  fin
  <input type="time" name="fin">
  <input type="submit" value="confirmer">
</form>
@endsection