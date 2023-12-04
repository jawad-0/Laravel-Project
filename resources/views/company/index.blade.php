@extends('layouts.layout')
@section('content')    
<html>
    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        {{-- <script src="//code.jquery.com/jquery-1.12.3.js"></script>
        <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"> --}}
    </head>
    <style>
            .table td.fit,
            .table th.fit{
                white-space: space nowrap;
                width:1%;
            }
    </style>
</html>
<body>
<div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Company</div>
                    <div class="card-body">
                        <a href="{{ url('/company/create') }}" class="btn btn-success btn-sm" title="Add New company">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Company
                        </a>&emsp;||&emsp;
                        <a href="{{ url('/employee') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Employees
                        </a>
                        <a href="{{ url('/products') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Products
                        </a>&emsp;||&emsp;
                        <a href="{{ url('/dashboard') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Dashboard
                        </a>
                        <br/>
                        <br/>
                        
                        @if(session('flash_message'))
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table" id="myTable">
                                {{-- <col style="width:100%"/>
                                <col style="width:100%"/>
                                <col style="width:100%"/>
                                <col style="width:100%"/>
                                <col style="width:100%"/>
                                <col style="width:100%"/> --}}
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email Address</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($company as $item)
                                    <tr>
                                        <td><b>{{ $loop->iteration }}</b></td>
                                        <td><b>{{ $item->name }}</b></td>
                                        <td><b>{{ $item->email }}</b></td>
                                        <td>
                                            <img src="{{ asset($item->logo) }}" width="100px" height="70px" class="img img-responsive">
                                        </td>
                                        <td><b>{{ $item->website }}</b></td>
 
                                        <td>
                                            <a href="{{ url('/company/' . $item->id) }}" title="View Company"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @can('company-edit')
                                            <a href="{{ url('/company/' . $item->id . '/edit') }}" title="Edit Company"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endcan
                                            @can('company-delete')
                                            <form method="POST" action="{{ url('/company' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                            <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
                            <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
                            <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

                            <script>
                                $(function() {
                                    $("#myTable").DataTable({
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'copyHtml5',
                                            'excelHtml5',
                                            'csvHtml5',
                                            'pdfHtml5'
                                        ]
                                    });
                                });
                                // let table = new DataTable('#myTable');
                            </script>
                            
                            {{-- {{ $company->links('pagination::bootstrap-5') }} --}}
                            {{-- Was showing large arrows --}}
                            {{-- {{ $company->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection