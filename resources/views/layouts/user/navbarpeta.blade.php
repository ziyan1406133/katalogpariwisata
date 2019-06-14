<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


    <!-- Topbar Search -->
    <div class="row">
        <div class="col-6">
        {!! Form::open(['action' => 'MapsController@search', 'class' => 'd-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search','method' => 'POST']) !!}
            <div class="input-group">
                {!! Form::text('search', '', ['class' => 'form-control bg-light border-0 small', 'Placeholder' => 'Cari Objek Wisata', 'aria-describedby' => 'basic-addon2']) !!}
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col">
            <select name="wilayah" id="wilayah" class="form-control">
                <option value="0">Seluruh Wilayah</option>
                @foreach($wilayahs as $wilayah)
                    <option value="{{$wilayah->id}}">{{$wilayah->nama}}</option>
                @endforeach
            </select>
        </div>
        {!! Form::close() !!}
    </div>
    
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        @guest
        <li class="nav-item">
            <a class="nav-link" href="/login">
            <i class="fas fa-fw fa-sign-in-alt text-gray-600"></i>
            <span class="text-gray-600">Login</span></a>
        </li>
        @endguest
        @auth
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->username}}</span>
                <img class="img-profile rounded-circle" src="{{asset('/storage/images/avatar/'.auth()->user()->foto)}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/dashboard">
                <i class="fas fa-screwdriver fa-sm fa-fw mr-2 text-gray-400"></i>
                Dashboard
                </a>
                <a class="dropdown-item" href="/user/{{auth()->user()->id}}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
                </a>
            </div>
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Klik "Logout" di bawah jika anda yakin ingin keluar.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </li>
        @endauth
    </ul>
</nav>