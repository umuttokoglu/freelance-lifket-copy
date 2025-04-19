@extends('layout.guest.index')

@section('content')
    <section class="page-title-breadcump-image px-5x100"
             style="--bgimage: url('../../../assets/bg-image.jpg');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">{{ $product->title }}</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">
                        {{ __('guest/product.breadcrumb.home') }}
                    </a>
                    <span class="breadcump-delimiter"></span>
                    <a href="{{
                        route('guest.hizmetler.show', ['hizmetler' => $product->category->parent_id])
                    }}">
                        {{ __('guest/product.breadcrumb.category', ['category' => $product->category->title]) }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="a">
            <!-- Üst Satır: Slider ve Başlık -->
            <div class="top-row">
                <div class="left-col">
                    <div class="slider-container">
                        <div class="slider">
                            @foreach($product->images as $image)
                                <div class="slide">
                                    <img src="{{ asset($image->path) }}"
                                         alt="{{ __('guest/product.slider_image_alt', ['index' => $loop->iteration]) }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="prev">&#10094;</button>
                        <button class="next">&#10095;</button>
                    </div>
                    <div class="dots-container">
                        @foreach($product->images as $image)
                            <span class="dot" data-index="{{ $loop->index }}"></span>
                            @if($loop->index > 4)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="right-col">
                    <h2 data-aos="fade-down" data-aos-delay="100">{{ $product->title }}</h2>

                    <h4 style="font-weight:bold; margin: 10px 0;">
                        {{ __('guest/product.key_features') }}
                    </h4>

                    @if($product->features->isNotEmpty())
                        <ul class="list-group" data-aos="fade-down" data-aos-delay="100">
                            @foreach($product->features as $feature)
                                <li class="list-group-item">» {{ $feature->feature }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <!-- Alt Satır: Ürün Açıklaması -->
            <div class="bottom-row" data-aos="fade-down" data-aos-delay="300">
                {!! $product->{ 'description_' . app()->getLocale() } !!}
            </div>
        </div>

        <div class="p-5x100">
            @if($similarProducts->isNotEmpty())
                <h2 class="mt-5" data-aos="fade-down" data-aos-delay="100">
                    {{ __('guest/product.similar_products') }}
                </h2>

                <div class="grid gtc-4 mt-3">
                    @foreach($similarProducts as $item)
                        <article class="post" data-aos="fade-right" data-aos-delay="100">
                            <a href="{{ route('guest.urunler.show', ['locale' => \Illuminate\Support\Facades\App::getLocale(), 'urunler' => $item->id] ) }}">
                                <img src="{{ asset($item->firstImage->path) }}"
                                     alt="{{ $item->title }}">
                            </a>

                            <h3>
                                <a href="{{ route('guest.urunler.show', ['locale' => \Illuminate\Support\Facades\App::getLocale(), 'urunler' => $item->id]) }}">
                                    {{ $item->title }}
                                </a>
                            </h3>

                            <a href="{{ route('guest.urunler.show', ['locale' => \Illuminate\Support\Facades\App::getLocale(), 'urunler' => $item->id]) }}"
                               class="btn-arrow">
                                {{ __('guest/product.view_product') }}
                                <i class="lnr lnr-arrow-right" aria-hidden="true"></i>
                            </a>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div>
                <h2>{{ __('guest/product.cta.title') }}</h2>
                <p>{{ __('guest/product.cta.subtitle') }}</p>
            </div>
            <a href="{{ route('guest.iletisim.index', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="btn">
                {{ __('guest/product.cta.button') }}
            </a>
        </div>
    </section>
@endsection

@section('pageCss')
    <style>
        /* Genel container için */
        .a {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Satırlar arası boşluk */
        }

        /* İlk satır: Slider ve başlık */
        .top-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .left-col {
            flex: 0 0 calc(50% - 10px); /* 50% genişlikten, gap yarısı kadar çıkarıyoruz */
        }

        .right-col {
            flex: 0 0 calc(50% - 10px);
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Başlık dikeyde ortalanır */
            justify-content: center;
        }

        /* Liste Grubu Container'ı */
        .right-col .list-group {
            margin: 0;
            padding: 0;
            list-style: square; /* Noktalı liste işaretlerini kaldırır */
        }

        /* Liste Grubu Öğesi */
        .right-col .list-group-item {
            display: block;
            padding: 12px 16px;
            border-bottom: 1px solid #ccc;
            background-color: #fff;
            transition: background-color 0.2s ease;
        }

        /* Son Öğede Alt Kenar Çizgisi Kaldırılır */
        .right-col .list-group-item:last-child {
            border-bottom: none;
        }

        /* Hover Efekti */
        .right-col .list-group-item:hover {
            background-color: #f8f8f8;
        }

        /* Aktif (Seçili) Öğe Stili */
        .right-col .list-group-item.active {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        /* İkinci satır: Ürün açıklaması tam genişlik */
        .bottom-row {
            width: 100%;
        }

        /* Slider kapsayıcısı */
        .slider-container {
            position: relative;
            max-width: 600px;
            margin: auto;
            overflow: hidden;
        }

        /* Slider (slide'ların bulunduğu alan) */
        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }

        /* Her bir slide */
        .slide {
            min-width: 100%;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slide img {
            width: 100%;
            display: block;
            object-fit: contain;
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 2;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.6);
        }

        /* Dot indikatörler */
        .dots-container {
            text-align: center;
            margin-top: 10px;
        }

        .dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            margin: 5px;
            background: #ccc;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .dot.active {
            background: #333;
        }

        @media(max-width: 600px) {
            .left-col {
                flex: 0 0 calc(100% - 10px); /* 50% genişlikten, gap yarısı kadar çıkarıyoruz */
            }

            .right-col {
                flex: 0 0 calc(100% - 10px);
                display: flex;
                flex-direction: column;
                align-items: flex-start; /* Başlık dikeyde ortalanır */
                justify-content: center;
            }
        }
    </style>
@endsection

@section('pageJs')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            var currentSlide = 0;
            var slides = $('.slide');
            var totalSlides = slides.length;

            function goToSlide(index) {
                if (index < 0) {
                    index = totalSlides - 1;
                }
                if (index >= totalSlides) {
                    index = 0;
                }
                currentSlide = index;
                // Slider alanını sola kaydırarak ilgili slide'ı gösteriyoruz
                $('.slider').css('transform', 'translateX(' + (-currentSlide * 100) + '%)');
                // Dot'lardan aktif olanı güncelle
                $('.dot').removeClass('active');
                $('.dot[data-index="' + currentSlide + '"]').addClass('active');
            }

            // Önceki buton tıklaması
            $('.prev').click(function () {
                goToSlide(currentSlide - 1);
            });
            // Sonraki buton tıklaması
            $('.next').click(function () {
                goToSlide(currentSlide + 1);
            });
            // Dot tıklaması
            $('.dot').click(function () {
                var index = $(this).data('index');
                goToSlide(index);
            });

            // İlk slide'ı göster
            goToSlide(0);
        });
    </script>
@endsection
