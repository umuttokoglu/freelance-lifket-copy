
<!-- footer -->
<footer>
    <div class="container flex flex-wrap align-center space-between g-2">
        <!-- your logo here -->
        <a href="{{ route('guest.home') }}" class="logo">
            <img src="{{ asset('assets/mva-makina.svg') }}" alt="{{ config('app.name') }} logo">
        </a>

        <nav>
            <ul class="flex align-center justify-center flex-wrap uppercase">
                <li><a href="{{ route('guest.home') }}">Anasyfa</a></li>
                <li><a href="{{ route('guest.home') }}">Hakkımızda</a></li>
                <li><a href="{{ route('guest.iletisim.index') }}">İletişim</a></li>
            </ul>
        </nav>

        <!-- info -->
        <div>
            <p class="mb-1">
                <i class="fa-light fa-location-pin"></i>

                <a href="#">
                    Şeyhli Mah. Vadi Sok. No:6 Aktürk Sanayi Sitesi - A46 34906 Pendik/İstanbul/Türkiye
                </a>
            </p>
            <p class="mb-1">
                <i class="fa-light fa-envelope"></i>
                <a href="mailto:info@mvamakina.com">
                    info@mvamakina.com
                </a>
            </p>

            <p class="mb-1">
                <i class="fa-light fa-phone"></i>
                <a href="tel:+90 (216) 378 16 13">
                    +90 (216) 378 16 13
                </a>
            </p>
        </div>
    </div>

    <div class="copy">
        <div class="container flex flex-wrap align-center md-space-between justify-center">
            <!-- copyrights -->
            <p class="txt-center mb-0">&copy; MVA Makina 2018-<span id="thisYear"></span>. Tüm Hakları Saklıdır. Developed by <a href="https://github.com/umuttokoglu">umuttokoglu</a>.</p>

            <!-- social links -->
            <ul class="flex align-center justify-center">
                <li>
                    <a href="#" target="_self">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="#" target="_self">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#" target="_self">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#" target="_self">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
