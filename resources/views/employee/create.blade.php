@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header">CRAETE RECORD</div>
  <div class="card-body">
      
      <form action="{{ url('employee') }}" method="post">
        {!! csrf_field() !!}
        <label>First Name</label></br>
        <input type="text" name="firstname" id="firstname" class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="lastname" id="lastname" class="form-control"></br>
        <label>Company</label></br>
        <input type="text" name="company" id="company" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Phone</label></br>
        <input type="number" name="phone" id="phone" class="form-control"></br>
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