@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100"
             style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">{{ __('guest/products.title') }}</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home', ['locale' => app()->getLocale()]) }}">
                        {{ __('guest/products.breadcrumb.home') }}
                    </a>
                    <span class="breadcump-delimiter"></span>
                    <a href="{{ route('guest.urun.show', [
                            'locale'    => app()->getLocale(),
                            'urun' => $category->parent_id
                        ]) }}">
                        {{ $category->title }}
                    </a>
                    <span class="breadcump-delimiter"></span>
                    <span>{{ __('guest/products.breadcrumb.current') }}</span>
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
            {!! $category->description !!}
        </div>

        <div class="grid gtc-3">
            @if($products->isNotEmpty())
                @foreach($products as $product)
                    <article class="post" data-aos="fade-right" data-aos-delay="100">
                        <a href="{{ route('guest.urunler.show', [
                                'locale'  => app()->getLocale(),
                                'urunler' => $product->id
                            ]) }}">
                            <img src="{{ asset($product->images->first()->path) }}"
                                 alt="{{ $product->title }}">
                        </a>

                        <h3>
                            <a href="{{ route('guest.urunler.show', [
                                    'locale'  => app()->getLocale(),
                                    'urunler' => $product->id
                                ]) }}">
                                {{ $product->title }}
                            </a>
                        </h3>

                        <a href="{{ route('guest.urunler.show', [
                                'locale'  => app()->getLocale(),
                                'urunler' => $product->id
                            ]) }}"
                           class="btn-arrow">
                            {{ __('guest/products.view_product') }}
                            <i class="lnr lnr-arrow-right" aria-hidden="true"></i>
                        </a>
                    </article>
                @endforeach
            @else
                <p>{{ __('guest/products.no_products') }}</p>
            @endif
        </div>
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div>
                <h2>{{ __('guest/products.cta.title') }}</h2>
                <p>{{ __('guest/products.cta.subtitle') }}</p>
            </div>
            <a href="{{ route('guest.iletisim.index', ['locale' => app()->getLocale()]) }}"
               class="btn">
                {{ __('guest/products.cta.button') }}
            </a>
        </div>
    </section>
@endsection
