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
    width: 25%;
    }

</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-align:center;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-weight:bold;">SHOW USER</h2>
        </div>
    </div>
</div>
</br>
<div class="data">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <span class="badge rounded-pill bg-success text-white">{{ $v }}</span>
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="pull-right">
    <a style="margin-left:510px;margin-top:30px;" class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
</div>
@endsection
