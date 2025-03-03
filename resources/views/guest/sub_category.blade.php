@extends('layout.guest.index')

@section('content')
    <section class="container page-title-breadcump" data-aos="fade-up" data-aos-delay="100">
        <h1 class="mb-0">{{ $hizmetler->title }}</h1>

        <div class="breadcump">
            <a href="{{ route('guest.home') }}">Anasayfa</a>
            <span class="breadcump-delimiter"></span>
            <a href="{{ route('guest.hizmetler.index') }}">Hizmetlerimiz</a>
            <span class="breadcump-delimiter"></span>
            <span>{{ $hizmetler->title }}</span>
        </div>
    </section>

    <section class="container">
        @foreach($subCategories as $subCategory)
            <div class="grid gtc-2-1 mb-3">
                <img src="/{{ $subCategory->image }}" style="aspect-ratio: 3.06/2;" alt="{{ $subCategory->title }}"
                     data-aos="fade-right" data-aos-delay="100">

                <div class="grid gtc-1">
                    <img src="./imgs/idea.webp" class="square ratio-5-3 object-cover"
                         alt="Project details - BuildXpert template" data-aos="fade-right" data-aos-delay="300">
                    <img src="./imgs/interior.webp" class="square ratio-5-3 object-cover"
                         alt="Project details - BuildXpert template" data-aos="fade-right" data-aos-delay="300">
                </div>
            </div>
        @endforeach

        <div class="grid gtc-2-1 mb-5">
            <div data-aos="fade-down" data-aos-delay="100">
                <h2 class="uppercase">{{ $hizmetler->title }}</h2>
                {!! $hizmetler->description_tr !!}
            </div>
        </div>
    </section>
@endsection

