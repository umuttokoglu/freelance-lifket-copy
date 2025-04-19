<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="navbar-nav theme-brand flex-row text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets/admin/img/mva-makina.svg') }}" class="navbar-logo" alt="logo">
                    </a>
                </div>
            </div>

            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>

        <div class="profile-info">
            <div class="user-info">
                <div class="profile-img">
                    <img src="{{ asset('favicon.ico') }}" alt="avatar">
                </div>

                <div class="profile-content">
                    <h6 class="">{{ auth()->user()->name }}</h6>
                    <p class="">Admin</p>
                </div>
            </div>
        </div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li @class(['menu', 'active' => request()->routeIs('admin.dashboard')])">
            <a href="{{ route('admin.dashboard') }}" aria-expanded="{{ request()->routeIs('admin.dashboard') }}"
               class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>

                    <span>{{ __('admin/sidebar.dashboard') }}</span>
                </div>
            </a>
            </li>

            <li @class(['menu', 'active' => request()->routeIs('admin.category.*')])">
            <a href="{{ route('admin.category.index') }}" aria-expanded="{{ request()->routeIs('admin.category.*') }}"
               class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-layers">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>

                    <span>{{ __('admin/sidebar.categories') }}</span>
                </div>
            </a>
            </li>

            <li @class(['menu', 'active' => request()->routeIs('admin.sub-category.*')])">
            <a href="{{ route('admin.sub-category.index') }}"
               aria-expanded="{{ request()->routeIs('admin.sub-category.*') }}"
               class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-copy">
                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                    </svg>

                    <span>{{ __('admin/sidebar.sub_categories') }}</span>
                </div>
            </a>
            </li>

            <li @class(['menu', 'active' => request()->routeIs('admin.products.*', 'admin.similar-products.*', 'admin.product.feature.*')])">
            <a href="{{ route('admin.products.index') }}"
               aria-expanded="{{ request()->routeIs('admin.products.*', 'admin.similar-products.*', 'admin.product.feature.*') }}"
               class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>

                    <span>{{ __('admin/sidebar.products') }}</span>
                </div>
            </a>
            </li>

            <li @class(['menu', 'active' => request()->routeIs('admin.contact.*')])">
            <a href="{{ route('admin.contact.index') }}" aria-expanded="{{ request()->routeIs('admin.contact.*') }}"
               class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-inbox">
                        <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                        <path
                            d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                    </svg>
                    <span>{{ __('admin/sidebar.contacts') }}</span>
                </div>
            </a>
            </li>

            <!--
            <li class="menu menu-heading">
                <div class="heading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>MENU LEVELS</span>
                </div>
            </li>

            <li class="menu">
                <a href="#home" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-hash">
                            <line x1="4" y1="9" x2="20" y2="9"></line>
                            <line x1="4" y1="15" x2="20" y2="15"></line>
                            <line x1="10" y1="3" x2="8" y2="21"></line>
                            <line x1="16" y1="3" x2="14" y2="21"></line>
                        </svg>
                        <span>Level 1</span>
                    </div>

                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>

                <ul class="collapse submenu list-unstyled" id="home" data-bs-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> Level 2a </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);"> Level 2b </a>
                    </li>

                    <li>
                        <a href="#level-three" data-bs-toggle="collapse" aria-expanded="false"
                           class="dropdown-toggle collapsed"> Level 2c
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>

                        <ul class="collapse list-unstyled sub-submenu" id="level-three" data-bs-parent="#pages">
                            <li>
                                <a href="javascript:void(0);"> Level 3a </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Level 3b </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Level 3c </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            -->
        </ul>
    </nav>
</div>
