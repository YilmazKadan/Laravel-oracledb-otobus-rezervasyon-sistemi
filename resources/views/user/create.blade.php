@extends("layouts.app")


@section('content')
    <form method="POST" action="{{route('user.store')}}">
        @csrf
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Ad</label>
            <input type="text" name="ad"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Mail</label>
            <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Şifre</label>
            <input type="password" name="password"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
@endsection
