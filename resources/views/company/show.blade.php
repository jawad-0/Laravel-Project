@extends('layouts.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
 
        <div class="card-body">
        <h5 class="card-title">Name : {{ $company->name }}</h5></br>
        <h5 class="card-text">Email : {{ $company->email }}</h5></br>
        <h5 class="card-text">Logo : 
        <img src="{{ asset($company->logo) }}" width="100px" height="70px" class="img img-responsive">
        </h5></br>
        <h5 class="card-text">Website : {{ $company->website }}</h5>
  </div>
       
    </hr>
  
  </div>
</div>