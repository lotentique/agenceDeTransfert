@extends('layouts.base')

@section('content')
<div class="NL">
    <div class="panel " style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);">
        <h4 style="font-family:  times new roman;text-transform: uppercase;color: white;">Modifier ce Point</h4></div>
        <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('PTransfert.update', $Point_de_transferts->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="gauche">
                        @if (Auth::user()->type_user=="admin")
                        
                            <div class="form-group">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>   
                                    <div class="col-md-6">
                                
                                    <input type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" value="{{ $Point_de_transferts->nom }}" required autofocus>
                                    @if ($errors->has('nom'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nom') }}</strong>
                                        </span>
                                   @endif
                                </div>
                            </div>

                        @endif

                        @if (Auth::user()->type_user=="admin")
                            <div class="form-group">
                                
                                 <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cartier') }}</label>   
                        <div class="col-md-6">
                                    <input type="text" class="form-control{{ $errors->has('cartier') ? ' is-invalid' : '' }}" name="cartier" value="{{ $Point_de_transferts->cartier }}" required autofocus>
                                    @if ($errors->has('cartier'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cartier') }}</strong>
                                        </span>
                                     @endif
                                </div>
                                </div>
                            
                        @endif

                          <div class="form-group row">
                               
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>   
                        <div class="col-md-6">
                                    @if (count($villes))
                                    @foreach($villes as $row)
                                       @if ($Point_de_transferts->id_ville==$row->id_ville)
                                         <input list="nom_ville"  type="text" class="form-control{{ $errors->has('ville') ? ' is-invalid' : '' }}" name="nom_ville"  required  value="{{$row->nom}}">
                                                                        
                                       @endif
                                        
                                   @endforeach
                                <datalist id="nom_ville">
                                    @foreach($villes as $row)
                                       <option value="{{$row->nom}}">{{$row->nom}}</option>
                                    @endforeach
                                   @endif
                                </datalist>
                          </div>
                          </div>

                       
                    </div>
                    <div class="droite">
                       
                        

                       </div>
                        <div class="form-group" >
                    
                        <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                            Enregistrer
                        </button>                       
                        <a href="{{ route('PTransfert.index') }}" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Annuler</a>
                    
                     </div>
                    </form>
                </div>
            </div>
       </div>

@endsection
