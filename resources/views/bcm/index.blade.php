@extends('layouts.base')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Listes Des Utilisateurs <a href="{{ route('bcm.create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>name</th>
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
                                <a href="{{ route('bcm.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                <a href="{{ route('bcm.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
