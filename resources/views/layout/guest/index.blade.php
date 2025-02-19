<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicons -->
    <link rel="icon" href="./imgs/favicon.ico" />
    <link rel="apple-touch-icon" href="./imgs/favicon-192.png" />
    <meta name="author" content="Travolgi">

    <!-- title page & SEO meta -->
    <title>BuildXpert - The Ultimate HTML Template for Architects and Builders</title>
    <meta name="description" content="Versatile and powerful HTML template to quickly create a professional website for your architecture studio or construction company">
    <meta name="keywords" content="architects, builders, website, html template, website template, landing page, responsive, html5 themes, multipurpose template, html, html5, css, template, themes">

    @include('shared.guest.css')
</head>

<body>
<!-- Accessibility: Skip to content -->
<a href="#main" class="skip-to-content">Skip to content</a>
<!-- Preload page -->
<div id="preload">
    <div class="container">
        <!-- your logo here -->
        <img src="./imgs/logo.svg" width="250" alt="BuildXpert logo">
        <span>Loading...</span>
    </div>
</div>

@include('shared.guest.header')

<main id="main">
@yield('content')
</main>

@include('shared.guest.footer')

<!-- scrool to top button -->
<button id="goTop">
    <i class="lnr lnr-chevron-up"></i>
    <span class="sr-only">Scrool to top</span>
</button>

@include('shared.guest.js')
</body>
</html>
