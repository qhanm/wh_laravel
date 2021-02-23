@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <table id="users-table" class="table table-condensed table table-bordered yajra-datatable">
                        <thead>
                        <tr>
                            <th>Client No.</th>
                            <th>Username</th>
                            <th>Full Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
                {data: 'username', name: 'username'},
                {data: 'information', name: 'information.first_name'}
            ]
        });
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
