@extends('layouts.base')

@section('content')
    <div class="listtitre">
    <h3><span class="creU"></span> Les Points de transfert <a href="{{ route('PTransfert.create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Ajouter</a></h3>
    </div>
    <div class="scroll">
    <table class="table table-striped table-bordered tbD">
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
                    <a href="{{ route('PTransfert.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                    <a href="{{ route('PTransfert.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    </div>

@endsection
