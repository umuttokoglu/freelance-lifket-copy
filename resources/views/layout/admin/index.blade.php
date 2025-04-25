<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('adminPageTitle') | Delta Vinç</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.svg') }}"/>

    @include('shared.admin.loader_css')

    @include('shared.admin.css')
</head>
<body class="layout-boxed" page="starter-pack">
@include('shared.admin.loader')

@if(request()->routeIs('admin.showLoginForm'))
    <div class="auth-container d-flex">
        <div class="container mx-auto align-self-center">
            @yield('content')
        </div>
    </div>
@else
    @include('shared.admin.navbar')

    <div class="main-container " id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('shared.admin.sidebar')

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    @include('shared.admin.breadcrumb')

                    <div class="row layout-top-spacing">
                        @yield('content')
                    </div>
                </div>
            </div>

            @include('shared.admin.footer')
        </div>
    </div>
@endif

@include('shared.admin.js')
</body>
</html>
