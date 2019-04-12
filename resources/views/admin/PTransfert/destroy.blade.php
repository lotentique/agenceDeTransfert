@extends('layouts.base')
@section('content')
        <div class="NL">
            <div class="panel panel-default" style="background-color:none;border:none;">
        <div class="panel-heading" style="border-bottom:4px solid black;border-radius: 10px;"><h4 style="font-family: impact"><span></span> Supprimer ce point</h4></div>
        <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('PTransfert.destroy', $Point_de_transferts->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                                    Supprimer le point {{ $Point_de_transferts->nom }}
                                </button>
                                <a href="{{ route('agents.index') }}" class="btn btn-danger"style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Annuler</a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
