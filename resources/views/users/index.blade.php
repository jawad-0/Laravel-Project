@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-align: center;">USERS MANAGEMENT</h2>
        </div>
        <div class="pull-right">
            <a style="margin-left:10px;" class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>
</br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="300px">Action</th>
    </tr>
@foreach ($data as $key => $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-success text-white">{{ $v }}</span>
                @endforeach
            @endif
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
            @can('user-edit')
            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            @endcan
            @can('user-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger' , 'onclick' => "return confirm('Are you sure you want to delete this user?')" ]) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
@endforeach
</table>
{{-- {!! $data->render() !!} --}}
{{-- <p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p> --}}
@endsection