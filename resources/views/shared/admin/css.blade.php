<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/admin/css/light/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/admin/css/dark/plugins.css') }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@yield('adminPageCss')
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<style>
    body.dark .layout-px-spacing, .layout-px-spacing {
        min-height: calc(100vh - 155px) !important;
    }
</style>
