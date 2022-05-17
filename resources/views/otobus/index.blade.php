@extends('layouts.app')


@section("css")
    <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Otobüsler!</h1>
        <div class="card d-flex justify-content-end">
            <div class="card-header ">
                <h3 class="card-title">Otobüsler</h3>
                <div class="text-right">
                    <a href="{{route("arac.create")}}" class="btn btn-success">Yeni Ekle</a>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Otobüs ID:</th>
                        <th>Otobüs Plakası:</th>
                        <th>Sefer Durumu:</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($otobusler as $otobus)
                        <tr>
                            <td>{{$otobus->id}}</td>
                            <td>{{$otobus->plaka}}</td>
                            <td>{!! ($otobus->musait_durum) ? "<span class = 'text-success'> Müsait </span>" : "<span class = 'text-danger'> Seferde / Sefere gidecek </span>"   !!}</td>
                            <td class="d-flex justify-content-spacebetween">
                                <a href="{{route("arac.edit",["otobus" => $otobus->id])}}" class="btn btn-primary">Güncelle</a>
                                <form method="POST" action="{{route("arac.destroy",["otobus" => $otobus->id])}}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
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
