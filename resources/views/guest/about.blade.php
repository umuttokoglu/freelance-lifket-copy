@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100"
             style="--bgimage: url('../../../assets/bg-image.jpg');"
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

                <h5>{{ __('guest/about.company_name') }}</h5>
                <h2 class="mb-0">{{ __('guest/about.heading') }}</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">
                {{ __('guest/about.paragraph1') }}
            </p>
            <p data-aos="fade-down" data-aos-delay="200">
                {{ __('guest/about.paragraph2') }}
            </p>
            <a href="{{ route('guest.iletisim.index', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}"
               class="btn"
               data-aos="fade-down" data-aos-delay="300">
                {{ __('guest/about.contact_button') }}
            </a>
        </div>

        <img src="{{ asset('assets/guest/img/about-1.jpg') }}"
             alt="About - BuildXpert template"
             data-aos="zoom-in" data-aos-delay="100">
    </section>

    <section class="p-0">
        <article class="grid service-block">
            <img src="{{ asset('assets/guest/img/about-3.jpg') }}"
                 alt="About us idea - BuildXpert template"
                 data-aos="zoom-in" data-aos-delay="100">

            <div>
                <div class="title-corners title-left" data-aos="fade-down">
                    <span class="corner-line line1"></span>
                    <span class="corner-line line2"></span>
                    <span class="corner-line line3"></span>
                    <span class="corner-line line4"></span>

                    <h5>{{ __('guest/about.feature.small_title') }}</h5>
                    <h2 class="mb-0">{{ __('guest/about.feature.title') }}</h2>
                </div>

                <ul>
                    <li>{{ __('guest/about.feature.description') }}</li>
                </ul>
            </div>
        </article>
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
