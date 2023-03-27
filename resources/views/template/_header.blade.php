<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            <ul class="nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('index') }}" class="nav-link">
                        MENU
                    </a>
                </li>
                @auth
                @can('dinkes')
                <li class="nav-item {{ Request::is('dinkes') || Request::is('dinkes/*') ? 'active' : '' }}">
                    <a href="{{ route('dinkes.index') }}" class="nav-link">
                        DINKES
                    </a>
                </li>
                @endcan
                @can('pupr')
                <li class="nav-item {{ Request::is('pupr') || Request::is('pupr/*') ? 'active' : '' }}">
                    <a href="{{ route('pupr.index') }}" class="nav-link">
                        PU & PR
                    </a>
                </li>
                @endcan
                @can('dinpend')
                <li class="nav-item {{ Request::is('dinpend') || Request::is('dinpend/*') ? 'active' : '' }}">
                    <a href="{{ route('dinpend.index') }}" class="nav-link">
                        DINPEND
                    </a>
                </li>
                @endcan
                @can('satpolpp')
                <li class="nav-item {{ Request::is('satpolpp') || Request::is('satpolpp/*') ? 'active' : '' }}">
                    <a href="{{ route('satpolpp.index') }}" class="nav-link">
                        SATPOL PP
                    </a>
                </li>
                @endcan
                @can('dinsos')
                <li class="nav-item {{ Request::is('dinsos') || Request::is('dinsos/*') ? 'active' : '' }}">
                    <a href="{{ route('dinsos.index') }}" class="nav-link">
                        DINSOS
                    </a>
                </li>
                @endcan
                @can('kabag')
                <li class="nav-item {{ Request::is('kabag') || Request::is('kabag/*') ? 'active' : '' }}">
                    <a href="{{ route('kabag.index') }}" class="nav-link">
                        KEPALA BAGIAN
                    </a>
                </li>
                <li class="nav-item {{ Request::is('berkas') || Request::is('berkas/*') ? 'active' : '' }}">
                    <a href="{{ route('berkas.index') }}" class="nav-link">
                        BERKAS
                    </a>
                </li>
                <li class="nav-item {{ Request::is('pengguna') || Request::is('pengguna/*') ? 'active' : '' }}">
                    <a href="{{ route('pengguna.index') }}" class="nav-link">
                        PENGGUNA
                    </a>
                </li>
                @endcan
                @can('sekda')
                <li class="nav-item {{ Request::is('sekda') || Request::is('sekda/*') ? 'active' : '' }}">
                    <a href="{{ route('sekda.index') }}" class="nav-link">
                        SEKRETARIS DAERAH
                    </a>
                </li>
                @endcan
                @endauth
            </ul>
        </div><!-- az-header-menu -->
        <div class="az-header-right">
            <div class="dropdown az-profile-menu">
                <a href="#" class="az-img-user"><img src="{{ asset('img/logo.png') }}" alt="#"></a>
                <div class="dropdown-menu">
                    <div class="az-dropdown-header d-sm-none">
                        <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    @guest
                    <a href="{{ route('login') }}" class="dropdown-item">Masuk</a>
                    @endguest
                    @auth
                    <div class="az-header-profile text-center">
                        <div class="az-img-user">
                            <img src="{{ asset('img/logo.png') }}" alt="#">
                        </div><!-- az-img-user -->
                        <h6>{{ Auth::user()->peran }}</h6>
                        <span>{{ Auth::user()->nama_pengguna }}</span>
                    </div><!-- az-header-profile -->
                    <a href="{{ route('auth.keluar') }}" class="dropdown-item">Keluar</a>
                    @endauth
                </div><!-- dropdown-menu -->
            </div>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->