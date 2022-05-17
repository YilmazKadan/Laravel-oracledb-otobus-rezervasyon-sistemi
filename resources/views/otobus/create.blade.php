@extends("layouts.app")


@section('content')
    <form method="Post" action="{{route('arac.store')}}">
        @csrf
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Plaka</label>
            <input type="text" name="plaka" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Kayıt Et</button>
    </form>
@endsection
