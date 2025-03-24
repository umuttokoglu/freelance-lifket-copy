@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">İletişim</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <span>İletişim</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container grid">
        <div>
            <div class="title-corners title-left" data-aos="fade-down">
                <span class="corner-line line1" aria-hidden="true"></span>
                <span class="corner-line line2" aria-hidden="true"></span>
                <span class="corner-line line3" aria-hidden="true"></span>
                <span class="corner-line line4" aria-hidden="true"></span>

                <h5>Bir Mesaj Yazın</h5>
                <h2 class="mb-0">Bizimle İletişime Geçin</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipiscing elit egestas,
                dictum quis sed ad justo aliquet vivamus,
                torquent nascetur diam montes eget lobortis euismod. Rutrum sapien pretium mollis sociis laoreet fames
                dignissim aliquet scelerisque proin per lacinia nullam faucibus.</p>

            <div class="mt-3" data-aos="fade-up" data-aos-delay="200">
                <p class="mb-1">
                    <i class="fa-light fa-location-pin"></i>

                    <a href="#">
                        Şeyhli Mah. Vadi Sok. No:6 Aktürk Sanayi Sitesi - A46 34906 Pendik/İstanbul/Türkiye
                    </a>
                </p>

                <p class="mb-1">
                    <i class="fa-light fa-envelope"></i>
                    <a href="mailto:info@mvamakina.com">
                        info@mvamakina.com
                    </a>
                </p>

                <p class="mb-1">
                    <i class="fa-light fa-phone"></i>
                    <a href="tel:+90 (216) 378 16 13">
                        +90 (216) 378 16 13
                    </a>
                </p>
            </div>
        </div>

        <form method="post" action="{{ route('guest.iletisim.store') }}" data-aos="zoom-in" data-aos-delay="100">
            @csrf

            <input type="text" name="name" id="name" placeholder="Adınız...">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <input type="email" name="email" id="email" placeholder="E-posta adresiniz...">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <textarea name="message" id="message" rows="8" placeholder="Mesjınız..."></textarea>
            @error('message')
            <small class="text-danger">{{ $message }}</small>
            @enderror
            <button type="submit" style="margin-left: 5px;">Gönder</button>

            @if(session()->has('message'))
                <p> {{ session('message') }} </p>
            @endif
        </form>
    </section>
@endsection
