@extends('layouts.base')
@section('content')
        <div class="NL">
            <div class="panel " style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);"><h4 style="font-family: times new roman;text-transform: uppercase;color: white;">Supprimer ce point</h4></div>
        <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('PTransfert.destroy', $Point_de_transferts->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;">
                                    Supprimer le point {{ $Point_de_transferts->nom }}
                                </button>
                                <a href="{{ route('PTransfert.index')}}" class="btn btn-danger"style="border-radius: 25px;box-shadow: 1px 0 8px pink;">Annuler</a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
