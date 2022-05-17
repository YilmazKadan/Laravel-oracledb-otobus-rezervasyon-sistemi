@extends("layouts.app")


@section('content')
    <form method="Post" action="{{route('arac.update',$otobus->id)}}">
        @csrf
        @method("PUT")
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Plaka</label>
            <input type="text" name="plaka" value="{{$otobus->plaka}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
@endsection
