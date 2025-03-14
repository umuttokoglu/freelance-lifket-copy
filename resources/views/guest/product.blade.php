@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../../../assets/bg-image.jpg');" data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">Ürün</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <a href="{{ route('guest.hizmetler.show', $product->category->parent_id) }}">{{ $product->category->title }}</a>
                    <span class="breadcump-delimiter"></span>
                    <span>{{ $product->title }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="post-d-flex">
            <img src="/{{ $product->image }}" class="mb-1 post-img" alt="{{ $product->title }}" data-aos="zoom-in" data-aos-delay="100">

            <div>
                <h2 data-aos="fade-down" data-aos-delay="100">{{ $product->title }}</h2>

                <div data-aos="fade-down" data-aos-delay="300">
                    {!! $product->description_tr !!}
                </div>
            </div>
        </div>

        <div class="p-5x100">@if($similarProducts->isNotEmpty())
                <h2 class="mt-5" data-aos="fade-down" data-aos-delay="100">{{ 'Benzer Ürünler' }}</h2>

                <div class="grid gtc-4 mt-3">
                    @foreach($similarProducts as $product)
                        <article class="post" data-aos="fade-right" data-aos-delay="100">
                            <a href="{{ route('guest.urunler.show', $product->id) }}">
                                <img src="/{{ $product->image }}" alt="{{ $product->title }}">
                            </a>

                            <h3>
                                <a href="{{ route('guest.urunler.show', $product->id) }}">{{ $product->title }}</a>
                            </h3>

                            <a href="{{ route('guest.urunler.show', $product->id) }}" class="btn-arrow">Ürünü İncele <i class="lnr lnr-arrow-right" aria-hidden="true"></i></a>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="border-y" data-aos="fade-up" data-aos-delay="100">
        <div class="container flex flex-wrap align-center md-space-between g-2">
            <div>
                <h2>Başlık 8</h2>
                <p>Metin 10</p>
            </div>
            <a href="{{ route('guest.iletisim.index') }}" class="btn">Bizimle İletişime Geçin</a>
        </div>
    </section>
@endsection

