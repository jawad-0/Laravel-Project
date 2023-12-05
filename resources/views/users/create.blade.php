@extends('layouts.app')
@section('content')
<div style="margin-left:350px">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="margin-left:200px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-weight:bold;">Create New User</h2>
        </div>
        <div class="pull-right">
            <a style="margin-left:10px;" class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
<br>
{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div style="margin-left:10px;" class="form-group">
            <strong style="margin-left:10px;">Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'style' => 'width: 600px' )) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div  style="margin-left:10px;" class="form-group">
            <strong style="margin-left:10px;">Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'style' => 'width: 600px' )) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div style="margin-left:10px;" class="form-group">
            <strong style="margin-left:10px;">Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control', 'style' => 'width: 600px' )) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div style="margin-left:10px;" class="form-group">
            <strong style="margin-left:10px;">Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control', 'style' => 'width: 600px' )) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div style="margin-left:10px;" class="form-group">
            <strong style="margin-left:10px;">Role:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple', 'style' => 'width: 600px' )) !!}
        </div>
    </div>
    <div style="margin-left:10px;" class="col-xs-12 col-sm-12 col-md-12 text-left">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
{!! Form::close() !!}
{{-- <p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p> --}}
@endsection
