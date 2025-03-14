@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../../../assets/bg-image.jpg');" data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">Ürünler</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <a href="{{ route('guest.hizmetler.show', $category->parent_id) }}">{{ $category->title }}</a>
                    <span class="breadcump-delimiter"></span>
                    <span>{{ 'Ürünler' }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="title-corners" data-aos="fade-down">
            <span class="corner-line line1" aria-hidden="true"></span>
            <span class="corner-line line2" aria-hidden="true"></span>
            <span class="corner-line line3" aria-hidden="true"></span>
            <span class="corner-line line4" aria-hidden="true"></span>

            <h2>{{ $category->title }}</h2>
            {!! $category->description_tr !!}
        </div>

        <div class="grid gtc-3">
            @if($products->isNotEmpty())
                @foreach($products as $product)
                    <article class="post" data-aos="fade-right" data-aos-delay="100">
                        <a href="{{ route('guest.urunler.show', $product->id) }}">
                            <img src="/{{ $product->images->first()->path }}" alt="{{ $product->title }}">
                        </a>

                        <h3>
                            <a href="{{ route('guest.urunler.show', $product->id) }}">{{ $product->title }}</a>
                        </h3>

                        <a href="{{ route('guest.urunler.show',$product->id ) }}" class="btn-arrow">Ürünü İncele <i class="lnr lnr-arrow-right" aria-hidden="true"></i></a>
                    </article>
                @endforeach
            @else
                <p>Listelenecek ürün bulunmuyor.</p>
            @endif
        </div>
    </section>

    <section class="border-y" data-aos="fade-up" data-aos-delay="100">
        <div class="container flex flex-wrap align-center md-space-between g-2">
            <div>
                <h2>Başlık 9</h2>
                <p>Metin 11</p>
            </div>
            <a href="{{ route('guest.iletisim.index') }}" class="btn">Bizimle İletişime Geçin</a>
        </div>
    </section>
@endsection

