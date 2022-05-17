@extends("layouts.app")


@section('content')
    <form method="Post" action="{{route('guzergah.store')}}">
        @csrf

        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nereden</label>
            <input type="text" class="form-select form-control" name="nereden" aria-label="Default select example">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nereye</label>
            <input type="text" class="form-select form-control" name="nereye" aria-label="Default select example">
        </div>
        <button type="submit" class="btn btn-primary">Kayıt Et</button>
    </form>
@endsection

