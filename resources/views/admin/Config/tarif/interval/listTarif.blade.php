@extends('layouts.base')
@section('content')
<div class="listtitre">
    <h3>{{ $title }} <a href="{{ route('tarifInterval.create') }}" class="btn bajouter"><i class="fa fa-plus"></i> Ajouter </a></h3>
</div>
<div class="scroll">
    <table id="datatable-buttons" class="table table-striped table-bordered tbD">
        <thead>
            <tr>
                <th>Min</th>
                <th>Max</th>
                <th>Tarif</th>
                <th>Date Debut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($tarifs))
            @foreach($tarifs as $row)
            <tr>
                <td>{{$row->min}}</td>
                <td>{{$row->max}}</td>
                <td>{{$row->tarif}}</td>
                <td>{{$row->date_debut}}</td>

                 @if($row->min==$row->max)
                <td>
                    <a disabled="disabled" href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                </td>
                @else
                <td>
                    <a href="{{ route('tarifInterval.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                </td>
                @endif
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection