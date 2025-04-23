@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100"
             style="--bgimage: url('../../../assets/guest/img/slide1.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">{{ __('guest/about.title') }}</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('guest/about.breadcrumb.home') }}</a>
                    <span class="breadcump-delimiter"></span>
                    <span>{{ __('guest/about.breadcrumb.current') }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container grid align-center">
        <div>
            <div class="title-corners title-left" data-aos="fade-down">
                <span class="corner-line line1"></span>
                <span class="corner-line line2"></span>
                <span class="corner-line line3"></span>

                <h2 class="mb-0">{{ __('guest/about.company_name') }}</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">
                {{ __('guest/about.paragraph1') }}
            </p>
            <p data-aos="fade-down" data-aos-delay="200">
                {{ __('guest/about.paragraph2') }}
            </p>

            <p data-aos="fade-down" data-aos-delay="100">
                {{ __('guest/about.paragraph3') }}
            </p>
            <p data-aos="fade-down" data-aos-delay="200">
                {{ __('guest/about.paragraph4') }}
            </p>

            <p data-aos="fade-down" data-aos-delay="100">
                {{ __('guest/about.paragraph5') }}
            </p>
            <p data-aos="fade-down" data-aos-delay="200">
                {{ __('guest/about.paragraph6') }}
            </p>
        </div>

        <img src="{{ asset('assets/guest/img/slide2.png') }}"
             alt="{{ config('app.name') }}"
             data-aos="zoom-in" data-aos-delay="100">
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div>
                <h2>{{ __('guest/about.cta.title') }}</h2>
                <p>{{ __('guest/about.cta.subtitle') }}</p>
            </div>
            <a href="{{ route('guest.iletisim.index', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}"
               class="btn">
                {{ __('guest/about.cta.button') }}
            </a>
        </div>
    </section>
@endsection
