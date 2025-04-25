@extends('layout.guest.index')

@section('content')
    <section class="hero-slider" data-aos="fade-down" data-aos-delay="100" style="padding-top: 70px;">
        <ul class="hero-slide">
            <li class="active" data-slide="1">
                <img src="{{ asset('assets/guest/img/slide1.jpg') }}" alt="{{ config('app.name') }}">

                <!-- 1. Overlay katmanı -->
                <div class="slider-overlay"></div>

                <!-- 2. Metin içeriği -->
                <div class="slide-content">
                    <h1>DELTA Elektrikli Zincirli Vinçler</h1>
                    <hr>
                    <p>Güvenlik, kalite ve profesyonellik DELTA için üç anahtar kelimedir. Her türlü kaldırma işine
                        uygun ekipmanı bulabileceğiniz geniş ürün yelpazemizi inceleyebilirsiniz.</p>
                </div>
            </li>

            <li class="" data-slide="2">
                <img src="{{ asset('assets/guest/img/slide2.png') }}" alt="{{ config('app.name') }}">

                <!-- 1. Overlay katmanı -->
                <div class="slider-overlay"></div>

                <!-- 2. Metin içeriği -->
                <div class="slide-content">
                    <h1>DELTA Ex-Proof Havalı Vinçler</h1>
                    <hr>
                    <p>Delta Havalı Ex-Proof vinçler, potansiyel olarak tehlikeli ve patlayıcı ortamlar için uygun olup
                        ATEX Zone 2 sertifikasına sahiptir.</p>
                </div>
            </li>
        </ul>

        <div class="hero-commands">
            <button id="hero-btn-prev">
                <i class="lnr lnr-chevron-left"></i>
                <span class="sr-only">Geri</span>
            </button>

            <button id="hero-btn-next">
                <i class="lnr lnr-chevron-right"></i>
                <span class="sr-only">İleri</span>
            </button>
        </div>
    </section>

    <section class="pt-3 p-5x100">
        <div class="title-corners">
            <span class="corner-line line1"></span>
            <span class="corner-line line2"></span>
            <span class="corner-line line3"></span>
            <span class="corner-line line4"></span>

            <h2>{{ __('guest/home.products.title') }}</h2>
            <p>{{ __('guest/home.products.description') }}</p>
        </div>

        <div class="grid gtc-3" style="gap: 1rem 6rem; text-align: center;">
            @foreach($categories as $category)
                <article>
                    <a href="{{ route('guest.hizmetler.show', ['locale' => app()->getLocale(), 'hizmetler' => $category]) }}">
                        <img src="{{ $category->image }}" alt="{{ $category->title }}"
                             style="padding-top: 80px; width: 70%;"
                             data-aos="zoom-in" data-aos-delay="100">

                        <h3 class="mb-0">{{ $category->title }}</h3>
                    </a>
                </article>
            @endforeach
        </div>
    </section>

    <section class="pt-3 p-5x100">
        <div>
            <div class="title-corners" data-aos="fade-up">
                <span class="corner-line line1"></span>
                <span class="corner-line line2"></span>
                <span class="corner-line line3"></span>
                <span class="corner-line line4"></span>

                <h2>{{ __('guest/about.company_name') }}</h2>
                <p>{{ __('guest/about.description') }}</p>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">
                {{ __('guest/about.paragraph1') }}
                {{ __('guest/about.paragraph2') }}
                {{ __('guest/about.paragraph3') }}
            </p>

            <p data-aos="fade-down" data-aos-delay="100">
                {{ __('guest/about.paragraph4') }}
                {{ __('guest/about.paragraph5') }}
                {{ __('guest/about.paragraph6') }}
            </p>
        </div>
    </section>

    <section class="container grid">
        <div>
            <div class="title-corners title-left" data-aos="fade-down">
                <span class="corner-line line1"></span>
                <span class="corner-line line2"></span>
                <span class="corner-line line3"></span>
                <span class="corner-line line4"></span>

                <h5>{{ __('guest/home.contact.heading_small') }}</h5>
                <h2 class="mb-0">{{ __('guest/home.contact.heading') }}</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">
                {{ __('guest/home.contact.paragraph') }}
            </p>
        </div>

        <form method="POST" action="{{ route('guest.iletisim.store') }}"
              data-aos="zoom-in" data-aos-delay="100">
            @csrf

            <input type="text" name="name" id="name"
                   placeholder="{{ __('guest/home.contact.name_placeholder') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <input type="email" name="email" id="email"
                   placeholder="{{ __('guest/home.contact.email_placeholder') }}">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <textarea name="message" id="message" rows="8"
                      placeholder="{{ __('guest/home.contact.message_placeholder') }}"></textarea>
            @error('message')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <button type="submit">{{ __('guest/home.contact.submit') }}</button>

            @if(session()->has('message'))
                <p>{{ __('guest/home.contact.success') }}</p>
            @endif
        </form>
    </section>
@endsection
