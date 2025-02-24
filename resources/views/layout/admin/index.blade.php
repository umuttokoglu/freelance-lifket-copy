<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Empty Page | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="../../src/assets/img/favicon.ico"/>

    @include('shared.admin.loader_css')

    @include('shared.admin.css')
</head>
<body class="layout-boxed" page="starter-pack">

@include('shared.admin.loader')

@include('shared.admin.navbar')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container " id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    @include('shared.admin.header')

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

@include('shared.admin.js')
</body>
</html>
