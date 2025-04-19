@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100"
             style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">{{ $hizmetler->title }}</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">
                        {{ __('guest/sub_category.breadcrumb.home') }}
                    </a>
                    <span class="breadcump-delimiter"></span>
                    <span>
                        {{ __('guest/sub_category.breadcrumb.current', ['category' => $hizmetler->title]) }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        @if($subCategories->isNotEmpty())
            @foreach($subCategories as $subCategory)
                <div class="grid gtc-2-1 mb-3">
                    <a href="{{ route('guest.urunler.index', ['locale' => \Illuminate\Support\Facades\App::getLocale(), 'sub_category' => $subCategory->id]) }}">
                        <img src="{{ asset($subCategory->image) }}"
                             alt="{{ $subCategory->title }}"
                             style="aspect-ratio: 3.06/2;"
                             data-aos="fade-right" data-aos-delay="100">
                    </a>

                    <div class="grid gtc-2-1 mb-5">
                        <div data-aos="fade-down" data-aos-delay="100">
                            <h2 class="uppercase">{{ $subCategory->title }}</h2>
                            {!! $subCategory->description !!}

                            <a class="btn mt-3"
                               href="{{ route('guest.urunler.index', ['locale' => \Illuminate\Support\Facades\App::getLocale(), 'sub_category' => $subCategory->id]) }}">
                                {{ __('guest/sub_category.view_products') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>{{ __('guest/sub_category.no_products') }}</p>
        @endif

        <div class="grid gtc-2-1 mb-5">
            <div data-aos="fade-down" data-aos-delay="100">
                <h2 class="uppercase">{{ $hizmetler->title }}</h2>
                {!! $hizmetler->{'description_'.app()->getLocale()} !!}
            </div>
        </div>
    </section>
@endsection
