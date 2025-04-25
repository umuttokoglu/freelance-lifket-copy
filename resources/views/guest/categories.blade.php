@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100"
             style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">{{ __('guest/categories.title') }}</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">
                        {{ __('guest/categories.breadcrumb.home') }}
                    </a>
                    <span class="breadcump-delimiter"></span>
                    <span>{{ __('guest/categories.breadcrumb.current') }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="grid gtc-3" id="product-grid">
            @foreach($products as $product)
                <div class="project design" data-aos="zoom-in" data-aos-delay="100">
                    <a href="{{ route('guest.urunler.show', ['locale' => \Illuminate\Support\Facades\App::getLocale(), 'urunler' => $product]) }}">
                        <img src="{{ asset($product->firstImage->path) }}" alt="{{ $product->title }}">
                    </a>
                    <h3>{{ $product->title }}</h3>
                </div>
            @endforeach
        </div>

        <div class="pagination-wrapper" data-aos="fade-up" data-aos-delay="100">
            {{ $products->links() }}
        </div>
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div>
                <h2>{{ __('guest/categories.cta.title') }}</h2>
                <p>{{ __('guest/categories.cta.subtitle') }}</p>
            </div>
            <a href="{{ route('guest.iletisim.index', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="btn">
                {{ __('guest/categories.cta.button') }}
            </a>
        </div>
    </section>
@endsection
