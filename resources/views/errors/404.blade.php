@extends('layout.guest.index')

@section('content')
    <!-- page title section -->
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../imgs/slide1.webp');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <!-- title -->
                <h1 class="mb-1">Page not found</h1>

                <!-- breadcump links -->
                <div class="breadcump">
                    <a href="/">Home</a>
                    <span class="breadcump-delimiter"></span>
                    <span>404 error</span>
                </div>
            </div>
        </div>
    </section>


    <!-- services section -->
    <section class="container">
        <!-- title wrapper with corners -->
        <div class="title-corners title-left" data-aos="fade-down">
            <!-- corners line -->
            <span class="corner-line line1" aria-hidden="true"></span>
            <span class="corner-line line2" aria-hidden="true"></span>
            <span class="corner-line line3" aria-hidden="true"></span>
            <span class="corner-line line4" aria-hidden="true"></span>
            <!-- title -->
            <h1>404 ERROR</h1>
            <h2>Oppsss! Page not found</h2>
        </div>

        <p data-aos="fade-down" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing eli doloremque
            laudantium illum eos.</p>
        <a href="/" class="btn" data-aos="fade-down" data-aos-delay="200">Back to home</a>
    </section>


    <!-- cta section -->
    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div>
                <h2>Create your architecture website in just a few clicks</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, nam modinam quibusdam quidem
                    nobis.</p>
            </div>
            <a href="./contact.html" class="btn">Contact us</a>
        </div>
    </section>
@endsection
