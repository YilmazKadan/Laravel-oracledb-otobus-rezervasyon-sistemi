{{-- Message --}}
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Başarılı !</strong> {{ session('success') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Hata !</strong> {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Bir takım hata ile karşılaşıldı:
        @foreach($errors->all() as $error)
            </strong> {{ $error }}
        @endforeach

    </div>
@endif
