@extends('layout.guest.index')

@section('content')
    <!-- page title section -->
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../imgs/slide1.webp');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <!-- title -->
                <h1 class="mb-1">Sayfa Bulunamadı</h1>

                <!-- breadcump links -->
                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <span>404</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <!-- title wrapper with corners -->
        <div class="title-corners title-left" data-aos="fade-down">
            <!-- corners line -->
            <span class="corner-line line1" aria-hidden="true"></span>
            <span class="corner-line line2" aria-hidden="true"></span>
            <span class="corner-line line3" aria-hidden="true"></span>
            <span class="corner-line line4" aria-hidden="true"></span>
            <!-- title -->
            <h1>404</h1>
            <h2>Oppsss! Sayfa Bulunamadı</h2>
        </div>

        <p data-aos="fade-down" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing eli doloremque
            laudantium illum eos.</p>
        <a href="{{ route('guest.home') }}" class="btn" data-aos="fade-down" data-aos-delay="200">Anasayfaya Dön</a>
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div>
                <h2>Merak Ettikleriniz İçin</h2>
                <p>Bizimle İletişime Geçin</p>
            </div>
            <a href="{{ route('guest.iletisim.index', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="btn">Mesaj Gönder</a>
        </div>
    </section>
@endsection
