<footer>
    <div class="container flex flex-wrap align-center space-between g-2">
        <a href="{{ route('guest.home', ['locale' => app()->getLocale()]) }}" class="logo">
            <img src="{{ asset('assets/logo-beyaz-no-bg.png') }}" alt="{{ config('app.name') }} logo">
        </a>

        <nav>
            <ul class="flex align-center justify-center flex-wrap uppercase">
                <li><a href="{{ route('guest.home', ['locale' => app()->getLocale()]) }}">{{ __('guest/footer.nav.home') }}</a></li>
                <li><a href="{{ route('guest.about', ['locale' => app()->getLocale()]) }}">{{ __('guest/footer.nav.about') }}</a></li>
                <li><a href="{{ route('guest.urunler.all', ['locale' => app()->getLocale()]) }}">{{ __('guest/footer.nav.products') }}</a></li>
                <li><a href="{{ route('guest.iletisim.index', ['locale' => app()->getLocale()]) }}">{{ __('guest/footer.nav.contact') }}</a></li>
            </ul>
        </nav>

        <div>
            <p class="mb-1">
                <i class="fa-light fa-location-pin"></i>
                <a href="#">
                    {{ __('guest/footer.contact.address') }}
                </a>
            </p>
            <p class="mb-1">
                <i class="fa-light fa-envelope"></i>
                <a href="mailto:{{ __('guest/footer.contact.email') }}">
                    {{ __('guest/footer.contact.email') }}
                </a>
            </p>
            <p class="mb-1">
                <i class="fa-light fa-phone"></i>
                <a href="tel:{{ __('guest/footer.contact.phone') }}">
                    {{ __('guest/footer.contact.phone') }}
                </a>
            </p>
        </div>
    </div>

    <div class="copy">
        <div class="container flex flex-wrap align-center md-space-between justify-center">
            <p class="txt-center mb-0">
                {!! __('guest/footer.copyright', [ 'year' => date('Y'),'developer' => '<a href="https://github.com/umuttokoglu">umuttokoglu</a>']) !!}
            </p>

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
