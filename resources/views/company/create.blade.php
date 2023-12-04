@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header">CREATE RECORD</div>
  <div class="card-body">
      
      <form action="{{ url('company') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Logo</label></br>
        <input type="file" name="logo" id="logo" class="form-control"></br>
        <label>Website</label></br>
        <input type="text" name="website" id="website" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
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