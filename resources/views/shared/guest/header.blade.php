<header data-aos="zoom-out">
    <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
        <i class="lnr lnr-menu" aria-hidden="true"></i>
    </button>

    <a href="{{ route('guest.home') }}" class="logo">
        <img src="{{ asset('assets/mva-makina.svg') }}" alt="{{ config('app.name') }} logo">
    </a>

    <nav id="navbar" data-visible="false">
        <ul>
            <li><a href="{{ route('guest.home') }}">Anasayfa</a></li>
            <li><a href="{{ route('guest.about') }}">Hakkımızda</a></li>
            <li><a href="{{ route('guest.hizmetler.index') }}">Ürünler</a></li>
            <li><a href="{{ route('guest.iletisim.index') }}">İletişim</a></li>
        </ul>
    </nav>
</header>
