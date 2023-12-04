@extends('layouts.layout')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
                    <div class="card-header">Employee</div>
                    <div class="card-body">
                        <a href="{{ url('/employee/create') }}" class="btn btn-success btn-sm" title="Add New employee">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Employee
                        </a>&emsp;||&emsp;
                        <a href="{{ url('/company') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Companies
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
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($employee as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->firstname }}</td>
                                        <td>{{ $item->lastname }}</td>
                                        <td>{{ $item->company }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <a href="{{ url('/employee/' . $item->id) }}" title="View Employee"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @can('employee-edit')
                                            <a href="{{ url('/employee/' . $item->id . '/edit') }}" title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endcan
                                            @can('employee-delete')
                                            <form method="POST" action="{{ url('/employee' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete employee" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
                            {{-- {{ $employee->links('pagination::bootstrap-5') }} --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
