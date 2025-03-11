@extends('layout.guest.index')

@section('content')
    <section class="p-0">
        <article class="grid service-block">
            <img src="{{ asset('assets/guest/img/g1.png') }}" alt="Service - BuildXpert template" data-aos="zoom-in" data-aos-delay="100">

            <div>
                <div class="title-corners title-left" data-aos="fade-down">
                    <span class="corner-line line1" aria-hidden="true"></span>
                    <span class="corner-line line2" aria-hidden="true"></span>
                    <span class="corner-line line3" aria-hidden="true"></span>
                    <span class="corner-line line4" aria-hidden="true"></span>

                    <h5>Küçük Başlık 1</h5>
                    <h2 class="mb-0">Başlık 1</h2>
                </div>

                <p data-aos="fade-down" data-aos-delay="200">Metin 1</p>
            </div>
        </article>

        <article class="grid service-block">
            <img src="{{ asset('assets/guest/img/g2.png') }}" alt="Service - BuildXpert template" data-aos="zoom-in" data-aos-delay="100">

            <div>
                <div class="title-corners title-left" data-aos="fade-down">
                    <span class="corner-line line1" aria-hidden="true"></span>
                    <span class="corner-line line2" aria-hidden="true"></span>
                    <span class="corner-line line3" aria-hidden="true"></span>
                    <span class="corner-line line4" aria-hidden="true"></span>

                    <h5>Küçük Başlık 2</h5>
                    <h2 class="mb-0">Başlık 2</h2>
                </div>

                <p data-aos="fade-down" data-aos-delay="100">Metin 2</p>
            </div>
        </article>
    </section>

    <section class="container">
        <div class="title-corners" data-aos="fade-up">
            <span class="corner-line line1"></span>
            <span class="corner-line line2"></span>
            <span class="corner-line line3"></span>
            <span class="corner-line line4"></span>

            <h2>Başlık 3</h2>
            <p>Metin 3</p>
        </div>

        <div class="grid gtc-3 mb-3">
            @if($categories->isNotEmpty())
                @foreach($categories as $category)
                    <div class="project" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ $category->image }}" alt="{{ $category->title }}">

                        <div class="holder">
                            <a class="btn-plus" href="{{ route('guest.hizmetler.show', $category) }}">
                                <i class="lnr lnr-cross"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="flex align-center justify-center" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('guest.hizmetler.index') }}" class="btn">Daha Fazla Göster</a>
        </div>
    </section>

    <section class="container grid">
        <div>
            <div class="title-corners title-left" data-aos="fade-down">
                <span class="corner-line line1" aria-hidden="true"></span>
                <span class="corner-line line2" aria-hidden="true"></span>
                <span class="corner-line line3" aria-hidden="true"></span>
                <span class="corner-line line4" aria-hidden="true"></span>

                <h5>Küçük Başlık 3</h5>
                <h2 class="mb-0">Başlık 4</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">Metin 4</p></p>
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

    <section class="p-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12062.051707182394!2d29.2727071!3d40.9044981!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x46bbe4b38f41a502!!5e0!3m2!1sen!2s!4v1410374156081"
            width="1120" height="360" frameborder="0" style="border:0" ´data-aos-delay="100"></iframe>
    </section>
@endsection
