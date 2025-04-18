@extends('layout.guest.index')

@section('content')
    <section class="hero-slider" data-aos="fade-down" data-aos-delay="100">
        <ul class="hero-slide">
            <li class="active" data-slide="1">
                <img src="{{ asset('assets/guest/img/slide1.jpg') }}" alt="{{ config('app.name') }}">

                <div class="hero-box" data-aos="fade-down">
                    <h2>Slider 1</h2>
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross" aria-hidden="true"></i>
                    </a>
                </div>
            </li>

            <li data-slide="2">
                <img src="{{ asset('assets/guest/img/slide2.jpg') }}" alt="{{ config('app.name') }}">

                <div class="hero-box" data-aos="fade-down">
                    <h2>Slider 2</h2>
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross" aria-hidden="true"></i>
                    </a>
                </div>
            </li>

            <li data-slide="3">
                <img src="{{ asset('assets/guest/img/slide3.jpg') }}" alt="{{ config('app.name') }}">

                <div class="hero-box" data-aos="fade-down">
                    <h2>Slider 3</h2>
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross" aria-hidden="true"></i>
                    </a>
                </div>
            </li>
        </ul>

        <div class="hero-commands">
            <button id="hero-btn-prev">
                <i class="lnr lnr-chevron-left" aria-hidden="true"></i>
                <span class="sr-only">Geri</span>
            </button>

            <button id="hero-btn-next">
                <i class="lnr lnr-chevron-right" aria-hidden="true"></i>
                <span class="sr-only">İleri</span>
            </button>
        </div>
    </section>

    <section class="pt-3">
        <div class="title-corners" data-aos="fade-up">
            <span class="corner-line line1"></span>
            <span class="corner-line line2"></span>
            <span class="corner-line line3"></span>
            <span class="corner-line line4"></span>

            <h2>Ürünlerimiz</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, quos obcaecati. Tempora laborum pariatur deserunt, reprehenderit illum voluptate.</p>
        </div>

        @if($categories->isNotEmpty())
            @foreach($categories as $category)
                <article class="grid service-block">
                    <a href="{{ route('guest.hizmetler.show', $category) }}">
                        <img src="{{ $category->image }}" alt="{{ $category->title }}"
                             style="padding-top: 80px;"
                             data-aos="zoom-in" data-aos-delay="100">
                    </a>

                    <div>
                        <div class="title-corners title-left" data-aos="fade-down">
                            <span class="corner-line line1" aria-hidden="true"></span>
                            <span class="corner-line line2" aria-hidden="true"></span>
                            <span class="corner-line line3" aria-hidden="true"></span>
                            <span class="corner-line line4" aria-hidden="true"></span>

                            <h3 class="mb-0">{{ $category->title }}</h3>
                        </div>

                        <div data-aos="fade-down" data-aos-delay="200">{!! $category->description_tr !!}</div>
                    </div>
                </article>
            @endforeach
        @endif
    </section>

    <section class="container grid">
        <div>
            <div class="title-corners title-left" data-aos="fade-down">
                <span class="corner-line line1" aria-hidden="true"></span>
                <span class="corner-line line2" aria-hidden="true"></span>
                <span class="corner-line line3" aria-hidden="true"></span>
                <span class="corner-line line4" aria-hidden="true"></span>

                <h5>Merak Ettikleriniz İçin</h5>
                <h2 class="mb-0">Bizimle İletişime Geçin</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipiscing elit egestas,
                dictum quis sed ad justo aliquet vivamus,
                torquent nascetur diam montes eget lobortis euismod. Rutrum sapien pretium mollis sociis laoreet fames
                dignissim aliquet scelerisque proin per lacinia nullam faucibus.</p></p>
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
