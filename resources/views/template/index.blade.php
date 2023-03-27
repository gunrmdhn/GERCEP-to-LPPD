<!DOCTYPE html>
<html lang="en">
@include('template/_head')

<body>
    @include('template/_header')
    @if ($errors->any())
    <div class="alert alert-danger rounded-0 mb-0 pb-1 text-center" role="alert">
        <h4>
            <strong>Data gagal ditambahkan!</strong>
        </h4>
    </div>
    @elseif (session()->has('berhasil'))
    <div class="alert alert-success rounded-0 mb-0 pb-1 text-center" role="alert">
        <h4>
            <strong>{{ session()->get('berhasil') }}</strong>
        </h4>
    </div>
    @endif
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title mb-0">
                    <div>
                        <h2 class="az-dashboard-title">GERCEP to LPPD</h2>
                        <p class="az-dashboard-text">AKSI PERUBAHAN</p>
                    </div>
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                                <label>{{ now()->format('d/m/Y') }}</label>
                                <h6>GERCEPtoLPPD</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                    </div>
                </div><!-- az-dashboard-one-title -->
                <div class="az-dashboard-nav">
                    <nav class="nav">
                        <a class="nav-link active" data-toggle="tab" href="#">
                            <h3>@yield('title')</h3>
                        </a>
                    </nav>
                    <nav class="nav">
                    </nav>
                </div>
                <div class="row row-sm">
                    <div class="col-lg-12">
                        @if (Route::currentRouteName()=='index')
                        @yield('slot')
                        @else
                        <div class="card card-dashboard-one">
                            <div class="card-body p-4">
                                @yield('slot')
                            </div>
                        </div><!-- card -->
                        @endif
                    </div><!-- col -->
                    {{-- @yield('slot') --}}
                </div><!-- row -->
            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
    @include('template/_footer')
    @include('template/_scripts')
</body>

</html>