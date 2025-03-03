@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump p-5x100" data-aos="fade-up" data-aos-delay="100">
        <h1 class="mb-0">Hizmetlerimiz</h1>

        <div class="breadcump">
            <a href="{{ route('guest.home') }}">Anasayfa</a>
            <span class="breadcump-delimiter"></span>
            <span>Hizmetlerimiz</span>
        </div>
    </section>

    <section class="container">
        <div class="grid gtc-3" id="product-grid">
            @foreach($categories as $category)
                <div class="project design" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ $category->image }}" alt="{{ $category->title }}">

                    <div class="holder">
                        <a class="btn-plus" href="{{ route('guest.hizmetler.show', $category) }}">
                            <i class="lnr lnr-cross"></i>
                        </a>
                    </div>

                    <h3>{{ $category->title }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    <section class="border-y" data-aos="fade-up" data-aos-delay="100">
        <div class="container flex flex-wrap align-center md-space-between g-2">
            <div>
                <h2>MVA MAKİNA SERVİS SAN. VE TİC. LTD. ŞTİ.</h2>
                <p>Gelişmiş teknolojileri tecrübe ile birleştirerek mekanik, elektrik ve kontrol sistemleri alanlarında
                    müşteri odaklı özel çözümler üretmekte olup, profesyonel servis anlayışı ile siz değerli iş
                    ortaklarımıza hakettiği hızlı, kaliteli ve ekonomik servis hizmetini vermeyi taahhüt etmektedir.</p>
            </div>
            <a href="{{ route('guest.iletisim.index') }}" class="btn">Bizimle İletişime Geçin</a>
        </div>
    </section>
@endsection
