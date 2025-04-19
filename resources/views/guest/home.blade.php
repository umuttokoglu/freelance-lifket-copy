@extends('layout.guest.index')

@section('content')
    <section class="hero-slider" data-aos="fade-down" data-aos-delay="100">
        <ul class="hero-slide">
            <li class="active" data-slide="1">
                <img src="{{ asset('assets/guest/img/slide1.jpg') }}"
                     alt="{{ config('app.name') }}">
                <div class="hero-box" data-aos="fade-down">
                    <h2>{{ __('guest/home.slider.1') }}</h2>
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
            </li>
            <li data-slide="2">
                <img src="{{ asset('assets/guest/img/slide2.jpg') }}"
                     alt="{{ config('app.name') }}">
                <div class="hero-box" data-aos="fade-down">
                    <h2>{{ __('guest/home.slider.2') }}</h2>
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
            </li>
            <li data-slide="3">
                <img src="{{ asset('assets/guest/img/slide3.jpg') }}"
                     alt="{{ config('app.name') }}">
                <div class="hero-box" data-aos="fade-down">
                    <h2>{{ __('guest/home.slider.3') }}</h2>
                    <a class="btn-plus" href="#">
                        <i class="lnr lnr-cross"></i>
                    </a>
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

    <section class="pt-3">
        <div class="title-corners" data-aos="fade-up">
            <span class="corner-line line1"></span>
            <span class="corner-line line2"></span>
            <span class="corner-line line3"></span>
            <span class="corner-line line4"></span>

            <h2>{{ __('guest/home.products.title') }}</h2>
            <p>{{ __('guest/home.products.description') }}</p>
        </div>

        @foreach($categories as $category)
            <article class="grid service-block">
                <a href="{{ route('guest.hizmetler.show', ['locale' => \Illuminate\Support\Facades\App::getLocale(), 'hizmetler' => $category]) }}">
                    <img src="{{ $category->image }}" alt="{{ $category->title }}"
                         style="padding-top: 80px;"
                         data-aos="zoom-in" data-aos-delay="100">
                </a>
                <div>
                    <div class="title-corners title-left" data-aos="fade-down">
                        <span class="corner-line line1"></span>
                        <span class="corner-line line2"></span>
                        <span class="corner-line line3"></span>
                        <span class="corner-line line4"></span>
                        <h3 class="mb-0">{{ $category->title }}</h3>
                    </div>
                    <div data-aos="fade-down" data-aos-delay="200">
                        {!! $category->description !!}
                    </div>
                </div>
            </article>
        @endforeach
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
