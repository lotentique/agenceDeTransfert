@extends('layouts.base')
@section('content')
<div class="NL">
    <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;"><h4 style="font-family: impact"><span class="creU"></span> Ajouter un Point</h4></div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('PTransfert.store') }}">
                {{ csrf_field() }}
                <div class="gauche">
                <div class="form-group row">
                     
                        <input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ old('nom') }}" required autofocus placeholder="{{ __('nom') }}">

                        @if ($errors->has('nom'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nom') }}</strong>
                            </span>
                        @endif
                    
                </div>
                <div class="form-group row">

                            <input id="cartier" type="text" class="form-control{{ $errors->has('cartier') ? ' is-invalid' : '' }}" name="cartier" value="{{ old('cartier') }}" required autofocus placeholder="{{ __('cartier') }}">

                            @if ($errors->has('cartier'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cartier') }}</strong>
                                </span>
                            @endif
                        
                </div>


                <div class="form-group row">

                            <input list="nom_ville"  type="text" class="form-control{{ $errors->has('ville') ? ' is-invalid' : '' }}" name="nom_ville"  required >
                              <datalist id="nom_ville">
                                    @if (count($villes))
                                    @foreach($villes as $row)
                                   <option value="{{$row->nom}}">{{$row->nom}}</option>
                                   @endforeach
                                   @endif
                                </datalist>
                            @if ($errors->has('ville'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ville') }}</strong>
                                </span>
                            @endif
                        
                </div>
               
                
            </div>
            <div class="droite">
              </div> 


                <div class="form-group" >
                    
                        <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                            Enregistrer
                        </button>                       
                        <a href="{{ route('agents.index') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Supprimer</a>
                    
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection
