@extends('layout.guest.index')

@section('content')

    <!-- page title section -->
    <section class="page-title-breadcump-image px-5x100" style="--bgimage: url('../imgs/slide3.webp');"
             data-aos="fade-up" data-aos-delay="100">
        <div class="breadcump-image">
            <div class="breadcump-box">
                <h1 class="mb-1">Hakkımızda</h1>

                <div class="breadcump">
                    <a href="{{ route('guest.home') }}">Anasayfa</a>
                    <span class="breadcump-delimiter"></span>
                    <span>Hakkkımızda</span>
                </div>
            </div>
        </div>
    </section>

    <section class="container grid align-center">
        <div>
            <div class="title-corners title-left" data-aos="fade-down">
                <span class="corner-line line1" aria-hidden="true"></span>
                <span class="corner-line line2" aria-hidden="true"></span>
                <span class="corner-line line3" aria-hidden="true"></span>

                <h5>{{ config('app.name') }}</h5>
                <h2 class="mb-0">Hakkımızda</h2>
            </div>

            <p data-aos="fade-down" data-aos-delay="100">MVA MAKİNA SERVİS SAN. VE TİC. LTD. ŞTİ. sektörde 15 yıldan
                fazla süredir edinilen tecrübeler doğrultusunda bugün vinç servis ve periyodik bakım hizmetleri,
                zincirli veya halatlı vinç sistemleri satış ve kurulumu, mekanik revizyon, kumanda panosu projelendirme,
                pano tasarımı - imalatı, montaj ve sahada devreye alma işlemlerinin yanısıra, vinçlerde çarpışma
                engelleme sistemleri, vinç pano revizyonları ve modernizayon uygulamaları, kumanda hareket kısıtlama ve
                vinçlerde İSG uygulamaları gerçekleştirmektedir.</p>
            <p data-aos="fade-down" data-aos-delay="200">Gelişmiş teknolojileri tecrübe ile birleştirerek mekanik,
                elektrik ve kontrol sistemleri alanlarında müşteri odaklı özel çözümler üretmekte olup, profesyonel
                servis anlayışı ile siz değerli iş ortaklarımıza hakettiği hızlı, kaliteli ve ekonomik servis hizmetini
                vermeyi taahhüt etmektedir.</p>
            <a href="{{ route('guest.iletisim.index') }}" class="btn" data-aos="fade-down" data-aos-delay="300">Bizimle
                İletişime Geç</a>
        </div>

        <img src="./imgs/about.webp" alt="About - BuildXpert template" data-aos="zoom-in" data-aos-delay="100">
    </section>

    <section class="p-0">
        <article class="grid service-block">
            <img src="./imgs/interior.webp" alt="Interior design - BuildXpert template" data-aos="zoom-in"
                 data-aos-delay="100">

            <div>
                <div class="title-corners title-left" data-aos="fade-down">
                    <span class="corner-line line1" aria-hidden="true"></span>
                    <span class="corner-line line2" aria-hidden="true"></span>
                    <span class="corner-line line3" aria-hidden="true"></span>
                    <span class="corner-line line4" aria-hidden="true"></span>

                    <h5>Sektörde referans aldığımız temel</h5>
                    <h2 class="mb-0">DEĞERLERİMİZ</h2>
                </div>

                <ul>
                    <li><strong>İş Ahlakı:</strong> Yaptığımız servis ya da bakım hizmetini zamanında ve eksiksiz teslim
                        etmek önceliğimizdir. Bunu yaparken iş güvenliğinden taviz vermemeye ve müşterimizin iş akışını
                        aksatmamaya özen gösteririz.
                    </li>
                    <li><strong>Çözüm Odaklı Yaklaşım:</strong> Esnek çalışma prensibini ilke edinerek, ihtiyacınız olan
                        ürün ve projelere yönelik üretim planlaması yapmak temel çalışma ilkelerimizdendir.
                        İhtiyaçlarınız için akılcı çözümler üretmek ve üretim planlamalarımızda olabildiğince esnek
                        olmak için yoğun çaba sarf ediyoruz.
                    </li>
                    <li><strong>Kalite:</strong> Tasarımdan malzeme seçimine, montajdan devreye alıma kadar tüm
                        aşamalarda kaliteye önem veriyoruz. Kaliteli markalar kullanıyor, üretim sürecinde detaylı
                        çalışıyoruz. Çünkü amacımız günü kurtarmak değil, değerlerimiz ile kalıcı olabilmektir.
                    </li>
                    <li><strong>Müşteri Memnuniyeti:</strong> Teklif aşamasından işin teslimine kadar geçen sürede
                        sizlerin memnuniyetini sağlamak için çalışıyoruz. Kaliteden ödün vermeden sizlere mümkün olan en
                        uygun fiyatları sunmayı amaç ediniyor, bugüne kadar gerçekleştirdiğimiz projelerde ve sunduğumuz
                        çözümlerde bunu her zaman gözönünde bulunduruyoruz.
                    </li>
                    <li><strong>Güven:</strong> Güvenin kazanılması zor, kaybedilmesi ise bir o kadar kolay bir değer
                        olduğunu aklımızdan hiçbir zaman çıkarmıyoruz.
                    </li>
                    <li><strong>Sorumluluk Bilinci:</strong> Yaptığımız işin tehlike ve risklerinin farkındayız. Bu
                        nedenle çalışmalarımız sırasında iş güvenliği kurallarına azami dikkat ediyor ve işletmelerin bu
                        konuda yükünü hafifletiyoruz.
                    </li>
                </ul>

                <a href="{{ route('guest.hizmetler.index') }}" class="btn-arrow" data-aos="fade-down"
                   data-aos-delay="200">
                    Hizmetlerimizi Gör <i class="lnr lnr-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </article>

        <article class="grid service-block">
            <img src="./imgs/idea.webp" alt="About us idea - BuildXpert template" data-aos="zoom-in"
                 data-aos-delay="100">

            <div>
                <div class="title-corners title-left" data-aos="fade-down">
                    <span class="corner-line line1" aria-hidden="true"></span>
                    <span class="corner-line line2" aria-hidden="true"></span>
                    <span class="corner-line line3" aria-hidden="true"></span>
                    <span class="corner-line line4" aria-hidden="true"></span>

                    <h5>Servis ve bakım sektöründe</h5>
                    <h2 class="mb-0">Kalite Politikamız</h2>
                </div>

                <ul>
                    <li>
                        <strong>Önce İşçi Sağlığı ve İş Güvenliği:</strong> Yaklaşımını benimseyerek, yaptığımız işlerde
                        olası kazaları ve meslek hastalıklarını önlemeye yönelik sistemler geliştirmeyi.
                    </li>
                    <li>
                        <strong>Yasal Mevzuata Uyum:</strong> Uluslararası ve ulusal çapta yasal mevzuatlara,
                        yönetmeliklere ve ilgili standartların getirdiği kurallara uymayı.
                    </li>
                    <li>
                        <strong>Çevresel Etkiler:</strong> Olası olumsuz çevresel etkileri önlemeye yönelik tedbirler
                        almayı.
                    </li>
                    <li>
                        <strong>Kaynakların Verimli Kullanımı:</strong> Vizyon, misyon ve kalite politikalarımız
                        kapsamında belirlediğimiz hedeflere ulaşırken tüm kaynaklarımızı verimli kullanmayı.
                    </li>
                    <li>
                        <strong>Farkındalık Artırma:</strong> Mesleki eğitimlerle birlikte kalite ve iş sağlığı alanında
                        personellerimizin farkındalığını arttırmayı.
                    </li>
                    <li>
                        <strong>Sürekli İyileştirme:</strong> Hızla gelişen teknolojiyi yakından takip ederek, ürün ve
                        hizmetlerimizde sürekli iyileştirme faaliyetlerinde bulunmayı taahhüt ediyoruz.
                    </li>
                </ul>
            </div>
        </article>
    </section>

    <section class="cta" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <h3 class="mb-0">Soruların mı var? Bizimle Hemen İletişime Geç...</h3>
            <a href="{{ route('guest.iletisim.index') }}" class="btn">Bize Yaz</a>
        </div>
    </section>

    <section class="border-y">
        <div class="carousel-inline">
            <a href="#">
                <img src="./imgs/sponsor/sponsor1.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"/>
            </a>

            <a href="#">
                <img src="./imgs/sponsor/sponsor2.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="100"/>
            </a>

            <a href="#">
                <img src="./imgs/sponsor/sponsor3.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="200"/>
            </a>

            <a href="#">
                <img src="./imgs/sponsor/sponsor4.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="300"/>
            </a>

            <a href="#">
                <img src="./imgs/sponsor/sponsor5.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="400"/>
            </a>

            <a href="#">
                <img src="./imgs/sponsor/sponsor6.webp" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="500"/>
            </a>

            <a href="#">
                <img src="./imgs/logo.svg" alt="Sponsor - BuildXpert template" data-aos="fade-down"
                     data-aos-delay="600"/>
            </a>
        </div>
    </section>
@endsection
