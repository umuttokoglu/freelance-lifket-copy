@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">Hizmetlerimiz</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <span>Hizmetlerimiz</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="grid gtc-3" id="product-grid">
            @if($categories->isNotEmpty())
                @foreach($categories as $category)
                    <div class="project design" data-aos="zoom-in" data-aos-delay="100">
                        <a href="{{ route('guest.hizmetler.show', $category) }}">
                            <img src="{{ $category->image }}" alt="{{ $category->title }}">
                        </a>

                        <h3>{{ $category->title }}</h3>
                    </div>
                @endforeach
            @else

            @endif
        </div>
    </section>

    <section class="border-y" data-aos="fade-up" data-aos-delay="100">
        <div class="container flex flex-wrap align-center md-space-between g-2">
            <div>
                <h2>Başlık 7</h2>
                <p>Metin 9</p>
            </div>
            <a href="{{ route('guest.iletisim.index') }}" class="btn">Bizimle İletişime Geçin</a>
        </div>
    </section>
@endsection
