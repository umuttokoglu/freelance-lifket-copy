<header>
    <button class="mobile-nav-toggle" aria-controls="navbar" aria-expanded="false">
        <i class="lnr lnr-menu" aria-hidden="true"></i>
    </button>

    <a href="{{ route('guest.home', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="logo">
        <img src="{{ asset('assets/logo-no-bg.png') }}" alt="{{ config('app.name') }} logo">
    </a>

    <nav id="navbar" data-visible="false">
        <ul>
            <li><a href="{{ route('guest.home', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('guest/header.home') }}</a></li>
            <li><a href="{{ route('guest.about', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('guest/header.about') }}</a></li>
            <li><a href="{{ route('guest.urunler.all', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('guest/header.products') }}</a></li>
            <li><a href="{{ route('guest.iletisim.index', ['locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ __('guest/header.contact') }}</a></li>
        </ul>
    </nav>

    <ul class="lang-switcher">
        @foreach(['tr'=>'tr','en'=>'us'] as $code => $flag)
            <li class="lang-switcher__item {{ app()->getLocale()===$code ? 'active' : '' }}">
                <a href="{{ route(\Route::currentRouteName(), array_merge(request()->route()->parameters(), ['locale'=>$code])) }}">
                    <span class="fi fi-{{ $flag }}"></span>
                </a>
            </li>
        @endforeach
    </ul>
</header>
