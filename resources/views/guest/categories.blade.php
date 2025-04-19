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
        <div class="grid" id="product-grid">
            @foreach($categories as $category)
                <div class="project design" data-aos="zoom-in" data-aos-delay="100">
                    <a href="{{ route('guest.hizmetler.show', ['locale' => \Illuminate\Support\Facades\App::getLocale(), 'hizmetler' => $category]) }}">
                        <img src="{{ asset($category->image) }}" alt="{{ $category->title }}">
                    </a>
                    <h3>{{ $category->title }}</h3>
                </div>
            @endforeach
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
