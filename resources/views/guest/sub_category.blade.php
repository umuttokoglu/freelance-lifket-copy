@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">{{ $hizmetler->title }}</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <span>{{ $hizmetler->title }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        @if($subCategories->isNotEmpty())
            @foreach($subCategories as $subCategory)
                <div class="grid gtc-2-1 mb-3">
                    <a href="{{ route('guest.urunler.index', ['sub_category' => $subCategory->id]) }}">
                        <img src="/{{ $subCategory->image }}" style="aspect-ratio: 3.06/2;"
                             alt="{{ $subCategory->title }}"
                             data-aos="fade-right" data-aos-delay="100">
                    </a>

                    <div class="grid gtc-2-1 mb-5">
                        <div data-aos="fade-down" data-aos-delay="100">
                            <h2 class="uppercase">{{ $subCategory->title }}</h2>
                            {!! $subCategory->description_tr !!}

                            <a class="btn mt-3"
                               href="{{ route('guest.urunler.index', ['sub_category' => $subCategory->id]) }}">Ürünleri
                                Gör</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Listelenecek ürün bulunmuyor.</p>
        @endif

        <div class="grid gtc-2-1 mb-5">
            <div data-aos="fade-down" data-aos-delay="100">
                <h2 class="uppercase">{{ $hizmetler->title }}</h2>
                {!! $hizmetler->description_tr !!}
            </div>
        </div>
    </section>
@endsection

