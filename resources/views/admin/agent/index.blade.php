@extends('layouts.base')

@section('content')
    <div class="listtitre">
    <h3><span class="creU"></span> Listes Des Agents <a href="{{ route('agents.create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Ajouter</a></h3>
    </div>
    <div class="scroll">
    <table class="table table-striped table-bordered tbD">
        <thead>
            <tr>
                <th>Nom</th>
                <th>prenom</th>
                <th>tel</th>
                <th>nni</th>
                <th>login</th>
                <th>email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($users))
            @foreach($users as $row)
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->prenom}}</td>
                <td>{{$row->tel}}</td>
                <td>{{$row->nni}}</td>
                <td>{{$row->login}}</td>
                <td>{{$row->email}}</td>
                <td>
                    <a href="{{ route('agents.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                    <a href="{{ route('agents.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    </div>

@endsection
