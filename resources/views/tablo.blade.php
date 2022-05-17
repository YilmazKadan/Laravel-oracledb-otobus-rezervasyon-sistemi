@extends('layouts.app')


@section("css")
    <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Tablo!</h1>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Tam Ad</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th>{{$user->ad}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Tam Ad</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
@endsection





@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset("/")}}plugins/jquery/jquery.min.js"></script>
    {{--    "" burada çok önemli , diğer tüm scriptler yüklendikten sonra yükleniyor.--}}
    <script src="{{asset('/')}}plugins/datatables/jquery.dataTables.min.js" ></script>
    <script src="{{asset('/')}}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" ></script>
    <script src="{{asset('/')}}plugins/datatables-responsive/js/dataTables.responsive.min.js" ></script>
    <script src="{{asset('/')}}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}plugins/jszip/jszip.min.js" ></script>
    <script src="{{asset('/')}}plugins/pdfmake/pdfmake.min.js" ></script>
    <script src="{{asset('/')}}plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('/')}}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
@endsection

@push("page_scripts")
    <script>
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    </script>

@endpush
