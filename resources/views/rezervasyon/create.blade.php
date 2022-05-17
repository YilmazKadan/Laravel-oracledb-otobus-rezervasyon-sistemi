@extends("layouts.app")


@section('content')
    <form method="Post" action="{{route('rezervasyon.store')}}">
        @csrf
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Sefer Seç</label>
            <select id="sefer" class="form-select form-control" name="sefer_id" aria-label="Default select example">
                @foreach($seferler as $sefer)
                    <option value="{{$sefer->id}}">{{$sefer->guzergah->nereden." - ".$sefer->guzergah->nereye." / ".$sefer->kalkis_tarihi}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Otobüs Seç</label>
            <select id="otobus" class="form-select form-control" name="otobus_id" aria-label="Default select example">

            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Koltuk Seç</label>
            <select id="koltuk" class="form-select form-control" name="koltuk_id" aria-label="Default select example">
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Üye Seç</label>
            <select id="uye" class="form-select form-control" name="user_id" aria-label="Default select example">
                @foreach($uyeler as $uye)
                    <option value="{{$uye->id}}">{{$uye->ad}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Kayıt Et</button>
    </form>
@endsection


@section("scripts")
    <!-- DataTables  & Plugins -->
    <script src="{{asset("/")}}plugins/jquery/jquery.min.js"></script>
    <script>
        $(function (){

            // İlk seçili olan seferin boş otobüslerini döndürmek için id.
            var seferId = $("#sefer").find(':selected')[0].value;
            console.log(seferId);
            otobusCek(seferId);

            // İlk seçili olan otobüsün boş koltuklarını döndürmek için id.
            var otobusId = $("#otobus")[0].value;
            koltukCek(otobusId);

            $(document).on("change","#otobus",function () {
                // İlk seçili olan otobüsün boş koltuklarını döndürmek için id.
                var otobusId = $("#otobus").find(':selected')[0].value;

                koltukCek(otobusId);
            });
            $(document).on("change","#sefer",function () {
                // İlk seçili olan seferin boş otobüslerini döndürmek için id.
                var seferId = $("#sefer").find(':selected')[0].value;

                otobusCek(seferId);
            });

            function  koltukCek(id){
                $.ajax({
                    type: 'GET',
                    url: "/otobus/"+ id + "/koltuk/" ,
                    success: function (data) {
                        var koltuk = $('#koltuk');
                        data = JSON.parse(data);
                        koltuk.empty();
                        for (var i = 0; i < data.length; i++) {
                            koltuk.append('<option  value=' + data[i].id + '>' + data[i].numara + '</option>');
                        }
                        koltuk.change();
                    }
                });
            }
            function  otobusCek(id){
                $.ajax({
                    type: 'GET',
                    url: "/seferotobuscek/" + id ,
                    success: function (data) {
                        var otobus = $('#otobus');
                        console.log(data);
                        data = JSON.parse(data);
                        otobus.empty();
                        otobus.append('<option  value=' + data.id + '>' + data.plaka + '</option>');
                        otobus.change();
                    }
                });
            }
        });

    </script>
@endsection
