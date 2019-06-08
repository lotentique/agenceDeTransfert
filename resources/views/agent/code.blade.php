@extends('layouts.baseAgent')

@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6" style="text-align:center">
        <div class="card">
            <div class="card-header">
            <strong>Code De transfert</strong>
            </div>
            <div class="card-body">
            <h3>{{ $code }}</h3>
            <a href="{{ route('saisie') }}" class="btn btn-success" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">OK</a>
            </div>
        </div>
    </div>
</div>

@endsection