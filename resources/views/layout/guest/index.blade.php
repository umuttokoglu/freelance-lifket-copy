<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicons -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}" />
    <meta name="author" content="{{ config('app.name') }}">

    <!-- title page & SEO meta -->
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Versatile and powerful HTML template to quickly create a professional website for your architecture studio or construction company">
    <meta name="keywords" content="architects, builders, website, html template, website template, landing page, responsive, html5 themes, multipurpose template, html, html5, css, template, themes">

    @include('shared.guest.css')
</head>

<body>
<a href="#main" class="skip-to-content">Skip to content</a>

<div id="preload">
    <div class="container">
        <img src="{{ asset('assets/admin/img/mva-makina.svg') }}" width="250" alt="{{ config('app.name') }} logo">
        <span>Yükleniyor...</span>
    </div>
</div>

@include('shared.guest.header')

<main id="main">
@yield('content')
</main>

@include('shared.guest.footer')

<button id="goTop">
    <i class="lnr lnr-chevron-up"></i>
    <span class="sr-only">Yukarıya Dön</span>
</button>

@include('shared.guest.js')
</body>
</html>
