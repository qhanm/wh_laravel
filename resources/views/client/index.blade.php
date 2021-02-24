@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ asset(route('client.create')) }}" class="btn btn-success">
                                <i class="fa fa-plus-circle"></i> Create
                            </a>
                            <button class="btn btn-success"><i class="fa fa-download"></i> Export</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="users-table" class="table table-condensed table table-bordered yajra-datatable">
                                <thead>
                                <tr>
                                    <th>Client No.</th>
                                    <th>Full Name</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('client.get') }}",
            columns: [
                {data: 'no', name: 'no'},
                {data: 'information', name: 'information'},
                {data: 'created'},
                {data: 'action'}
            ]
        });
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
