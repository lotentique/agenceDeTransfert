@extends('layouts.base')

@section('content')
    <div class="listtitre">
    <h3>Points de transfert <a href="{{ route('PTransfert.create') }}" class="btn bajouter"><i class="fa fa-plus"></i> Ajouter</a>   <a href="{{ route('listePoint') }}" class="btn btn-primary"><i class="fa fa-export"></i> exporter</a></h3>

    </div>
    <div class="scroll" style="box-shadow: 1px 0px 0px 2px gray;">
    <table class="table table-striped table-bordered tbD" id="PTable">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Cartier</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($PTransfert))
            @foreach($PTransfert as $row)
            <tr>

                <td>{{$row->nom}}</td>
                <td>{{$row->cartier}}</td>

                  @if (count($PTransfert))
                  @foreach($villes as $row2)
                      @if ($row->id_ville==$row2->id_ville)
                      <td>{{$row2->nom}}</td>
                      @endif
                  @endforeach
                  @endif



                <td>
                    <button data-toggle="modal" data-target="#classModal" data-original-title class="btn btn-success btn-xs infPt" id="{{$row->nom}}"><i class="fa fa-eye" title="visioner"></i> </button>
                    <a dusk="edit" href="{{ route('PTransfert.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                    <a href="{{ route('PTransfert.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                    <input type="hidden" class="{{$row->nom}}caisse" id="{{$row->caisse}}">
                    <input type="hidden" class="{{$row->nom}}InfPtID" id="{{$row->id}}">
                </td>
            </tr>
            
            @endforeach
            @endif
        </tbody>
    </table>
    </div>
        <!-- modal -->
        <div id="classModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          ×
                        </button>
                         <h4 class="modal-title" id="classModalLabel">
                          Operation Effectuee Dans Ce Point
                         </h4>
                    </div>
                  <div class="modal-body">
                    <div class="listtitre" style="margin-left: 0;width: 20%;float: left;">
                        <h4 id="infPtitre"></h4>
                    </div>
                    <div class="listtitre" style="margin-left: 0;width: 80%;float: right;background-image: none;border: none;">
                        <h4 id="caisseD" style="color: black;"></h4>
                    </div>
                        <div class="scroll" style="box-shadow: 1px 0px 0px 2px gray; width: 100%;">
                        <table class="table table-striped table-bordered tbD" id="infPTable">
                            <thead>
                                <tr>
                                    <th>Operation</th>
                                    <th>Effectuee Par</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody id="infoHC">
                            </tbody>
                        </table>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                      Fermer
                    </button>
                  </div>
                </div>
            </div>
        </div>
        <!-- fin modal -->
        

        
@endsection
