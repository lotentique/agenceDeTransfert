@extends('layouts.baseAgent')

@section('content')
<div class="NL">
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;">
            <h4 style="font-family: impact"><span class="creU"></span> Code De transfert</h4>
        </div>
        <div class="panel-body">
            <h3>{{ $code }}</h3>
            <a href="{{ route('trensfert') }}" class="btn btn-success" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">OK</a>
        </div>
        </form>
    </div>
</div>
</div>
@endsection