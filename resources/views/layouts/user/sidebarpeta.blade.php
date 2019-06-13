<ul class="sidebar navbar-nav nav-list">
    <hr>
    <li class="nav-item active">
    <a class="nav-link" href="/peta">
        <span>&nbsp; Seluruh Wilayah</span>
    </a>
    </li>
    @foreach($wilayahs as $wilayah)
    <li class="nav-item active">
    <a class="nav-link" href="/peta/{{$wilayah->id}}">
        <span>&nbsp; {{$wilayah->nama}}</span></a>
    </li>
    @endforeach
</ul>
