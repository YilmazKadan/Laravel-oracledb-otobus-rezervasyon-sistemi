@extends("layouts.app")


@section('css')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endsection
@section('content')
    <form method="Post" action="{{route('sefer.store')}}">
        @csrf
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Otobüs Seç</label>
            <select id="otobus" class="form-select form-control" name="otobus_id" aria-label="Default select example">
                @foreach($otobusler as $otobus)
                    <option value="{{$otobus->id}}">{{$otobus->plaka}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Güzergah Seç</label>
            <select id="otobus" class="form-select form-control" name="guzergah_id" aria-label="Default select example">
                @foreach($guzergahlar as $guzergah)
                    <option value="{{$guzergah->id}}">{{$guzergah->nereden." - ".$guzergah->nereye}}</option>
                @endforeach
            </select>
        </div>

        <!-- Date and time -->
        <div class="form-group col-md-4">
            <label>Sefer Kalkış Tarihi:</label>
            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                <input type="text" value="{{old("kalkis_tarihi") ?? ""}}" name="kalkis_tarihi" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Kayıt Et</button>
    </form>
@endsection


@section("scripts")
    <!-- DataTables  & Plugins -->
    <script src="{{asset("/")}}plugins/jquery/jquery.min.js"></script>
    <!-- InputMask -->
    <script src="{{asset("/")}}plugins/moment/moment.min.js"></script>
    <script src="{{asset("/")}}plugins/moment/moment-with-locales.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset("/")}}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js" defer></script>
    <script>

        $(function(){
            $('#reservationdatetime').datetimepicker({
                icons: { time: 'far fa-clock' },
                locale : "tr"
            });
        });


    </script>

@endsection
