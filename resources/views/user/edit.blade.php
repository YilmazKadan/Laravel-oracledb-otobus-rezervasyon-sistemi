@extends("layouts.app")


@section('content')
    <form method="Post" action="{{route('user.update',$user->id)}}">
        @csrf
        @method("PUT")
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Plaka</label>
            <input type="text" name="ad" value="{{$user->ad}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Plaka</label>
            <input type="text" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
@endsection
