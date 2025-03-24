@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">Hakkımızda</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <span>Hakkkımızda</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container grid align-center">
        <div>
            <div class="title-corners title-left" data-aos="fade-down">
                <span class="corner-line line1" aria-hidden="true"></span>
                <span class="corner-line line2" aria-hidden="true"></span>
                <span class="corner-line line3" aria-hidden="true"></span>

                <h5>Delta Vinç</h5>
                <h2 class="mb-0">Hakkımızda</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipiscing elit egestas, dictum quis sed ad justo aliquet vivamus,
                torquent nascetur diam montes eget lobortis euismod. Rutrum sapien pretium mollis sociis laoreet fames
                dignissim aliquet scelerisque proin per lacinia nullam faucibus.</p>
            <p data-aos="fade-down" data-aos-delay="200">Lorem ipsum dolor sit amet consectetur adipiscing elit egestas, dictum quis sed ad justo aliquet vivamus,
                torquent nascetur diam montes eget lobortis euismod. Rutrum sapien pretium mollis sociis laoreet fames
                dignissim aliquet scelerisque proin per lacinia nullam faucibus.</p>
            <a href="{{ route('guest.iletisim.index') }}" class="btn" data-aos="fade-down" data-aos-delay="300">Bizimle
                İletişime Geç</a>
        </div>

        <img src="{{ asset('assets/guest/img/about-1.jpg') }}" alt="About - BuildXpert template" data-aos="zoom-in" data-aos-delay="100">
    </section>

    <section class="p-0">

        <article class="grid service-block">
            <img src="{{ asset('assets/guest/img/about-3.jpg') }}" alt="About us idea - BuildXpert template" data-aos="zoom-in"
                 data-aos-delay="100">

            <div>
                <div class="title-corners title-left" data-aos="fade-down">
                    <span class="corner-line line1" aria-hidden="true"></span>
                    <span class="corner-line line2" aria-hidden="true"></span>
                    <span class="corner-line line3" aria-hidden="true"></span>
                    <span class="corner-line line4" aria-hidden="true"></span>

                    <h5>Küçük Başlık 5</h5>
                    <h2 class="mb-0">Başlık 6</h2>
                </div>

                <ul>
                    <li>
                        Lorem ipsum dolor sit amet consectetur adipiscing elit egestas, dictum quis sed ad justo aliquet vivamus,
                        torquent nascetur diam montes eget lobortis euismod. Rutrum sapien pretium mollis sociis laoreet fames
                        dignissim aliquet scelerisque proin per lacinia nullam faucibus.
                    </li>
                </ul>
            </div>
        </article>
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <h3 class="mb-0">Soruların mı var? Bizimle Hemen İletişime Geç...</h3>
            <a href="{{ route('guest.iletisim.index') }}" class="btn">Bize Yaz</a>
        </div>
    </section>
@endsection
