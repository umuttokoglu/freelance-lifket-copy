@extends('layout.guest.index')

@section('content')
    <section class="p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12062.051707182394!2d29.2727071!3d40.9044981!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x46bbe4b38f41a502!!5e0!3m2!1sen!2s!4v1410374156081"
                width="1120" height="360" frameborder="0" style="border:0"´data-aos-delay="100"></iframe>
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

            <p data-aos="fade-down" data-aos-delay="100">Metin 9</p>

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
