@extends('layouts.base')

@section('content')
<div class="NL">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;">
            <h4 style="font-family: impact"> Les tarifactions</h4>
        </div>
        <div class="panel-body">
            @if (! count($parametres))
            <p>auccun parametre n est applique</p>
            @else
            <h4>le parametre applique est la tarifaction par {{ $parametres[0]->description }}</h4>
            @endif
            @if (! count($parametres))
            <form class="form-horizontal" method="GET" action="{{ route('trensfert') }}">
                @else
                <form class="form-horizontal" method="POST" action="{{ route('tarification.update', $parametres[0]->id) }}">
                    @endif
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="gauche">
                        <fieldset>
                            <legend>modifier la regele applique</legend>
                            <input type="radio" name="mode" value="1" checked>Tarif par interval<br>
                            <input type="radio" name="mode" value="2">Tarif par pourcentage<br>
                            <input type="hidden" name="tes" value="3">
                        </fieldset><br />
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                                modifier
                            </button>
                        </div>
                    </div>
                </form>
                <br />
                <div><a href="{{ route('tarifInterval.liste') }}" class="btn btn-info">liste des tarif par interval</a></div><br />
                <div><a href="{{ route('tarifPourcentage.liste') }}" class="btn btn-info">pourcentage applique</a></div><br />
                <!-- Large button groups (default and split) -->
                @if (! count($parametres))
                <div class="btn-group">
                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        applique une regele de tarifaction
                    </button>
                    <div class="dropdown-menu">
                        <form method="POST" action="{{ route('tarification.store') }}">
                            {{ csrf_field() }}
                            <input type="submit" name="regele" value="interval"><br>
                            <input type="submit" name="regele" value="poursentage">
                        </form>
                    </div>
                </div>
                @endif

        </div>
    </div>
</div>

@endsection