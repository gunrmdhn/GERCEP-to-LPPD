@extends('template/index')
@section('slot')
<div class="row d-flex  justify-content-center">
    <div class="col-sm-3 mb-4">
        <div class="card card-dashboard-one text-center p-3">
            <img class="card-img-top" src="{{ asset('img/bapak1.png') }}" style="height: 300px;" alt="#">
            <hr>
            <div class="card-body">
                <h5 class="card-title">Pj. Bupati Kepulauan Yapen</h5>
                <p class="card-text">Cyfrianus Y Mambay, S.Pd, M.si</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mb-4 text-center">
        <img src="{{ asset('img/logo.png') }}" class="img-fluid" style="height: 300px;" alt="#">
    </div>
    <div class="col-sm-3 mb-4">
        <div class="card card-dashboard-one text-center p-3">
            <img class="card-img-top" src="{{ asset('img/sek.png') }}" style="height: 300px;" alt="#">
            <hr>
            <div class="card-body">
                <h5 class="card-title">Sekretaris Daerah</h5>
                <p class="card-text">Erny Renny Tania, S.Ip</p>
            </div>
        </div>
    </div>
    <div class="col-sm-12 mb-4">
        <div class="card card-dashboard-one">
            <div class="card-body p-1">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" style="height: 600px;" src="{{ asset('img/carousel1.jpeg') }}"
                                alt="#">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 600px;" src="{{ asset('img/carousel2.jpeg') }}"
                                alt="#">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 600px;" src="{{ asset('img/carousel3.jpeg') }}"
                                alt="#">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Sebelumnya</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Selanjutnya</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 mb-4">
        <div class="card card-dashboard-one text-center">
            <div class="card-body p-4">
                <p class="display-4">Visi & Misi</p>
                <hr>
                <blockquote class="blockquote">
                    <strong>VISI</strong><br>
                    <em>"Kepulauan Yapen yang Lebih Nyaman, Lebih Maju dan Lebih Sejahtera"</em><br>
                    <strong>MISI</strong><br>
                    <ul class="list-unstyled">
                        <li>1. Meningkatkan dan memantapkan tata pemerintahan yang baik,</li>
                        <li>2. Meningkatkan dan memantapkan tata kehidupan masyarakat yang aman, tertib, dan taat hukum,
                        </li>
                        <li>3. Meningkatkan dan memantapkan kualitas sumber daya manusia,</li>
                        <li>4. Meningkatkan dan memantapkan pengelolaan sumber daya alam secara berkelanjutan,</li>
                        <li>5. Menyediakan dan memantapkan infrastruktur yang memadai dan merata dengan memperhatikan
                            kerawanan bencana</li>
                        <li>6. Meningkatkan dan memantapkan pemberdayaan dan partisipasi masyarakat dalam pembangunan.
                        </li>
                    </ul>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-sm-12 mb-4">
        <div class="card card-dashboard-one text-center">
            <div class="card-body p-4">
                <p class="display-4">Aksi Perubahan</p>
                <hr>
                <blockquote class="blockquote">
                    PELATIHAN KEPEMIMPINAN ADMINISTRATOR (PKA)<br>
                    ANGKATAN IV TAHUN 2022<br>
                    PROVINSI PAPUA<br>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="col-sm-12 mb-4">
        <div class="card card-dashboard-one text-center">
            <div class="card-body p-4">
                <p class="display-4">Kontak</p>
                <hr>
                <blockquote class="blockquote">
                    Jln. Irian, Nomor 1 Serui, Papua<br>
                    Email : santelkepyapen@gmail.com<br>
                    Website : www.kepyapenkap.go.id<br>
                    Kode Pos : 98211<br>
                </blockquote>
                {{-- <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-sm-3">
                        <img class="card-img-top" src="{{ asset('img/bapak2.jpeg') }}" alt="#">
                    </div>
                    <div class="col-sm-9">
                        <blockquote class="blockquote">
                            Jln. Irian, Nomor 1 Serui, Papua<br>
                            Email : santelkepyapen@gmail.com<br>
                            Website : www.kepyapenkap.go.id<br>
                            Kode Pos : 98211<br>
                        </blockquote>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>




@endsection