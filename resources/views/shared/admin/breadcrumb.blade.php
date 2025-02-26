<div class="page-meta">
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li @class(['breadcrumb-item', 'active' => !request()->routeIs('admin.dashboard')])>
                @if(request()->routeIs('admin.dashboard'))
                    {{ __('admin/dashboard.title') }}
                @else
                    <a href="{{ route('admin.dashboard') }}">
                        {{ __('admin/dashboard.title') }}
                    </a>
                @endif
            </li>

            @yield('adminBreadcrumb')
        </ol>
    </nav>
</div>
