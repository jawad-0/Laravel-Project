@extends('layouts.app')
@section('content')
<style>
    .table1 {
        width: 50%;
        margin : 0 auto;
        border: 5px groove black;
    }
    .table1 th{
        background-color: white;
    }
    .table1 th, .table1 td {
        font-weight: bold;
        text-align: center;
        padding: 5px;
        border: 2px dashed black;
    }

</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-align: center;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-weight:bold;">ROLES MANAGEMENT</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a style="margin-left:65%;" class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
        </div>
    </div>
</div>
</br>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table1">
    <tr>
        <th>No</th>
        <th>Role Name</th>
        <th width="300px">Actions</th>
    </tr>

    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger' , 'onclick' => "return confirm('Are you sure you want to delete this role?')" ]) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>
{{-- {!! $roles->render() !!} --}}
@endsection
