@extends('layouts.app')
@section('content')
<style>
    .data{
    margin: 0 auto;
    color: white;
    padding: 20px;
    background-color: black;
    border: 3px solid blue;
    border-radius: 25px;
    width: 30%;
    }

</style>
<div class="data">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-align:center;"> SHOW ROLE</h2>
        </div>
        <div class="pull-right">
            <a style="margin-left:20px;" class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
        </div>
    </div>
</div>
<br>
<div style="margin-left:10px;" class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" style="font-size: 25px;">
            <strong style="text-decoration: underline">Name</strong>
            &emsp;" {{ $role->name }} "
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group" style="font-size: 25px;">
            <strong style="text-decoration: underline">Permissions</strong><br><br>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label><br>
                @endforeach
            @endif
        </div>
    </div>
</div>
</div>
@endsection
