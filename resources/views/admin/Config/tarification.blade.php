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
    <div class="panel" style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);">
            <h4 style="font-family:  times new roman;text-transform: uppercase; color: white;">tarifications</h4>
        </div>
        <div class="panel-body">
            @if (! count($parametres))
            <p>auccun parametre n est applique</p>
            @else
            <h4 style="border-bottom: 1px solid gray;color: black;font-family:  times new roman;">Le parametre applique est la tarifaction par {{ $parametres[0]->description }}</h4>
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
                            <legend style="background-color:black;color: white;"><h4>Modifier La Regle Appliquee</h4></legend>
                            <div class="form-group">
                                @if (! count($parametres))
                                    <div class="col-md-6" > 
                                     <i class="fa fa-toggle-on btarifns " id="1"></i>
                                    </div>
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Tarif par interval</label> 
                                @elseif($parametres[0]->regle==1)
                                    <div class="col-md-6" > 
                                    <i class="fa fa-toggle-on btarifns  btarifs " id="1"></i>
                                    </div>
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Tarif par interval</label> 
                                    @else
                                    <div class="col-md-6" > 
                                     <i class="fa fa-toggle-on btarifns" id="1"></i>
                                    </div>
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Tarif par interval</label>
                                @endif
                            </div>
                            <div class="form-group">
                                @if (! count($parametres))
                                    <div class="col-md-6"> 
                                     <i class="fa fa-toggle-on btarifns " id="2"></i>
                                   </div>
                                   <label for="name" class="col-md-4 col-form-label text-md-right">Tarif par pourcentage</label>
                                @elseif($parametres[0]->regle==2)
                                    <div class="col-md-6"> 
                                    <i class="fa fa-toggle-on btarifns  btarifs " id="2"></i>
                                   </div>
                                   <label for="name" class="col-md-4 col-form-label text-md-right">Tarif par pourcentage</label>
                                   @else
                                   <div class="col-md-6"> 
                                     <i class="fa fa-toggle-on btarifns" id="2"></i>
                                   </div>
                                   <label for="name" class="col-md-4 col-form-label text-md-right">Tarif par pourcentage</label>
                                @endif
                            </div>
                            <input type="hidden" name="mode" class="param">
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
                <div><a href="{{ route('tarifInterval.liste') }}" class="btn btn-primary">Liste Des Tarif Par Interval</a></div><br />
                <div><a href="{{ route('tarifPourcentage.liste') }}" class="btn btn-primary">Pourcentage Applique</a></div><br />
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
                            <input type="submit" name="regele" value="pourcentage">
                        </form>
                    </div>
                </div>
                @endif

        </div>
    </div>
</div>

@endsection