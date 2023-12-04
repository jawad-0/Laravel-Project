@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header">EDIT RECORD</div>
  <div class="card-body">
      
      <form action="{{ url('company/' .$company->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$company->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$company->name}}" class="form-control"></br>
        <label>Email Address</label></br>
        <input type="text" name="email" id="email" value="{{$company->email}}" class="form-control"></br>
        <label>Logo</label></br>
        <input type="file" name="logo" id="logo" value="{{$company->logo}}" class="form-control"></br>
        <label>Website</label></br>
        <input type="text" name="website" id="website" value="{{$company->website}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
        </br></br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
   
  </div>
</div>
 
@stop