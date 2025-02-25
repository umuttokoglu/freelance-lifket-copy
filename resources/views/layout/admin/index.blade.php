<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('adminPageTitle') | MVA Makina</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>

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

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('shared.admin.sidebar')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    @yield('content')
                </div>
            </div>

            @include('shared.admin.footer')
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
@endif

@include('shared.admin.js')
</body>
</html>
