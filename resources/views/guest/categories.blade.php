@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">Ürünlerimiz</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <span>Ürünlerimiz</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="grid" id="product-grid">
            @if($categories->isNotEmpty())
                @foreach($categories as $category)
                    <div class="project design" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ route('guest.hizmetler.show', $category) }}">
                            <img src="{{ $category->image }}" alt="{{ $category->title }}">
                        </a>

                        <h3>{{ $category->title }}</h3>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div>
                <h2>Merak Ettikleriniz İçin</h2>
                <p>Bizimle İletişime Geçin</p>
            </div>
            <a href="{{ route('guest.iletisim.index') }}" class="btn">Mesaj Gönder</a>
        </div>
    </section>
@endsection
