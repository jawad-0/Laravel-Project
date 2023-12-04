@extends('layouts.app')
@section('content')
<div style="margin-left:450px">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="margin-left:130px;">Create New Role</h2>
        </div>
        <div class="pull-right">
            <a style="margin-left:10px;" class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
</br>
{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div style="margin-left:10px;" class="form-group">
            <strong style="margin-left:10px;">Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Role Name','class' => 'form-control', 'style' => 'width: 200px' )) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong style="margin-left:20px;">Permissions:</strong>
            <br/>
            @foreach($permission as $value)
                <label style="margin-left:20px;">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
        <button style="margin-left:20px;" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
{!! Form::close() !!}
{{-- <p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p> --}}
@endsection