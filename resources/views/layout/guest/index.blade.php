<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicons -->
    <link rel="icon" href="{{ asset('favicon.svg') }}" />
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}" />
    <meta name="author" content="{{ config('app.name') }}">

    <!-- title page & SEO meta -->
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="{{ __('guest/layout.meta.description') }}">
    <meta name="keywords" content="{{ __('guest/layout.meta.keywords') }}">

    @include('shared.guest.css')
</head>

<body>
<a href="#main" class="skip-to-content">
    {{ __('guest/layout.skip_to_content') }}
</a>

<div id="preload">
    <div class="container">
        <img src="{{ asset('assets/admin/img/logo-no-bg.png') }}"
             width="250"
             alt="{{ config('app.name') }} logo">
        <span>{{ __('guest/layout.loading') }}</span>
    </div>
</div>

@include('shared.guest.header')

<main id="main">
    @yield('content')
</main>

@include('shared.guest.footer')

<button id="goTop">
    <i class="lnr lnr-chevron-up"></i>
    <span class="sr-only">
        {{ __('guest/layout.go_top') }}
    </span>
</button>

@include('shared.guest.js')
</body>
</html>
