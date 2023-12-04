@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div style="margin-left:10px;" class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div style="margin-left:10px;" class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
</br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div style="margin-left:10px;" class="form-group">
                    <strong>Name:</strong>
                    <input style="width:300px;" type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div style="margin-left:10px;" class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px;width:300px;" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div style="margin-left:10px;" class="col-xs-12 col-sm-12 col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection