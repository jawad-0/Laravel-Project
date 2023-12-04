@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header">EDIT RECORD</div>
  <div class="card-body">
      
      <form action="{{ url('employee/' .$employee->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$employee->id}}" id="id" />
        <label>First Name</label></br>
        <input type="text" name="firstname" id="firstname" value="{{$employee->firstname}}" class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="lastname" id="lastname" value="{{$employee->lastname}}" class="form-control"></br>
        <label>Company</label></br>
        <input type="text" name="company" id="company" value="{{$employee->company}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$employee->email}}" class="form-control"></br>
        <label>Phone</label></br>
        <input type="text" name="phone" id="phone" value="{{$employee->phone}}" class="form-control"></br>
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