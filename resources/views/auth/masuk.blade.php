<!DOCTYPE html>
<html lang="en">

@include('template/_head')

<body class="az-body">
    @if(session()->has('gagal'))
    <div class="alert alert-danger rounded-0 mb-0 pb-1 text-center" role="alert">
        <h4>
            <strong>{{ session()->get('gagal') }}</strong>
        </h4>
    </div>
    @endif
    <div class="az-signup-wrapper">
        <div class="az-column-signup-left">
            <div>
                <a href="{{ route('index') }}">
                    <h1 class="az-logo">{{ config('app.name') }}</h1>
                </a>
                <h5><em>"Kepulauan Yapen yang Lebih Nyaman, Lebih Maju dan Lebih Sejahtera"</em></h5>
                <hr>
                <blockquote class="blockquote">
                    <ol>
                        <li>Meningkatkan dan memantapkan tata pemerintahan yang baik,</li>
                        <li>Meningkatkan dan memantapkan tata kehidupan masyarakat yang aman, tertib, dan taat hukum,
                        </li>
                        <li>Meningkatkan dan memantapkan kualitas sumber daya manusia,</li>
                        <li>Meningkatkan dan memantapkan pengelolaan sumber daya alam secara berkelanjutan,</li>
                        <li>Menyediakan dan memantapkan infrastruktur yang memadai dan merata dengan memperhatikan
                            kerawanan bencana</li>
                        <li>Meningkatkan dan memantapkan pemberdayaan dan partisipasi masyarakat dalam pembangunan.
                        </li>
                    </ol>
                </blockquote>
            </div>
        </div>
        <div class="az-column-signup">
            <h1 class="az-logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid w-25" alt="#">
                </a>
            </h1>
            <div class="az-signup-header">
                <h2>Masuk</h2>
                <h4>Selamat Datang</h4>
                <form method="post" action="{{ route('auth.authenticate') }}">
                    @csrf
                    @include('auth/_form')
                </form>
            </div>
            <div class="az-signup-footer">
                <p>Copyright © {{ config('app.name') }}
                    {{ now()->year }}
                </p>
            </div>
        </div>
    </div>
    @include('template/_scripts')
</body>

</html>