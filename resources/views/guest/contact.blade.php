@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100"
             style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">{{ __('guest/contact.title') }}</h1>
                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">{{ __('guest/contact.breadcrumb.home') }}</a>
                    <span class="breadcump-delimiter"></span>
                    <span>{{ __('guest/contact.breadcrumb.current') }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container grid">
        <div>
            <div class="title-corners title-left" data-aos="fade-down">
                <span class="corner-line line1"></span>
                <span class="corner-line line2"></span>
                <span class="corner-line line3"></span>
                <span class="corner-line line4"></span>

                <h5>{{ __('guest/contact.section.small_title') }}</h5>
                <h2 class="mb-0">{{ __('guest/contact.section.heading') }}</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">
                {{ __('guest/contact.section.intro') }}
            </p>

            <div class="mt-3" data-aos="fade-up" data-aos-delay="200">
                <p class="mb-1">
                    <i class="fa-light fa-location-pin"></i>
                    <a href="#">{{ __('guest/contact.details.address') }}</a>
                </p>
                <p class="mb-1">
                    <i class="fa-light fa-envelope"></i>
                    <a href="mailto:{{ __('guest/contact.details.email') }}">{{ __('guest/contact.details.email') }}</a>
                </p>
                <p class="mb-1">
                    <i class="fa-light fa-phone"></i>
                    <a href="tel:{{ __('guest/contact.details.phone') }}">{{ __('guest/contact.details.phone') }}</a>
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('guest.iletisim.store') }}"
              data-aos="zoom-in" data-aos-delay="100">
            @csrf
            @honeypot()

            <input type="text" name="name" id="name"
                   placeholder="{{ __('guest/contact.form.name_placeholder') }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <input type="email" name="email" id="email"
                   placeholder="{{ __('guest/contact.form.email_placeholder') }}">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <textarea name="message" id="message" rows="8"
                      placeholder="{{ __('guest/contact.form.message_placeholder') }}"></textarea>
            @error('message')
            <small class="text-danger">{{ $message }}</small>
            @enderror

            <button type="submit" class="btn">
                {{ __('guest/contact.form.submit') }}
            </button>

            @if(session()->has('message'))
                <p>{{ __('guest/contact.form.success') }}</p>
            @endif
        </form>
    </section>
@endsection
