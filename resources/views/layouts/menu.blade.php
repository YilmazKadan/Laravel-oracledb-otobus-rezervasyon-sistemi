<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Anasayfa</p>
    </a>
    <a href="{{route("rezervasyon.index")}}" class="nav-link {{ Request::is('rezervasyon') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Rezervasyonlar</p>
    </a>
    <a href="{{route("guzergah.index")}}" class="nav-link {{ Request::is('guzergah') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Güzergahlar</p>
    </a>
    <a href="{{route("sefer.index")}}" class="nav-link {{ Request::is('sefer') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Seferler</p>
    </a>
    <a href="{{route("arac.index")}}" class="nav-link {{ Request::is('arac') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Otobüs</p>
    </a>

    @if(auth()->user()->yetki >= 2)
    <a href="{{route("yetkiliste")}}" class="nav-link {{ Route::is('yetkiliste') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Yetkilendirme</p>
    </a>
     <a href="{{route("user.index")}}" class="nav-link {{ Route::is('user.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>User İşlemleri</p>
     </a>
    @endif
</li>
