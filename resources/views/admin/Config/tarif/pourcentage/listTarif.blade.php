@extends('layouts.base')
@section('content')
<div class="listtitre">
    <h3>
        {{ $title }}@if (! count($pourcentages))
        <a href="{{ route('tarifPourcentage.create') }}" class="btn bajouter"><i class="fa fa-plus"></i> Ajouter </a>
        @endif
    </h3>
</div>
<div class="scroll">
    <table id="datatable-buttons" class="table table-striped table-bordered tbD">
        <thead>
            <tr>
                <th>pourcentage</th>
                <th>Date Debut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($pourcentages))
            @foreach($pourcentages as $row)
            <tr>
                <td>{{$row->pourcentage}} %</td>
                <td>{{$row->date_debut}}</td>

                <td>
                    <a href="{{ route('tarifPourcentage.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection