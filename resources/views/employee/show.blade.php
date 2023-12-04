@extends('layouts.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">First Name : {{ $employee->firstname }}</h5>
        <h5 class="card-text">Last Name : {{ $employee->lastname }}</h5>
        <h5 class="card-text">Company : {{ $employee->company }}</h5>
        <h5 class="card-text">Email : {{ $employee->email }}</h5>
        <h5 class="card-text">Phone : {{ $employee->phone }}</h5>
  </div>
       
    </hr>
  
  </div>
</div>