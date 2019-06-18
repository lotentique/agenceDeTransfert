@extends('layouts.baseBcm')

@section('content')
<form method="post" action="{{ route('change') }}">{{csrf_field()}}
                montant
                <input type="number" name="montant">
                <input type="submit" value="confirmer">
                </form>
@endsection