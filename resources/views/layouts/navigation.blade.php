<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto mr-0 ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">{{Auth::user()->username}}</i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="flex  nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                        <div class="flex  nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <x-nav-link :href="route('car_category')" :active="request()->routeIs('car_category')">
                                {{ __('Car Category') }}
                            </x-nav-link>
                        </div>
                        <div class="flex  nav-link">
                            <div class="sb-nav-link-icon"><i class="fab fa-car-side"></i></i></div>
                            <x-nav-link :href="route('car')" :active="request()->routeIs('car')">
                                {{ __('Car') }}
                            </x-nav-link>
                        </div>

                        <div class="flex  nav-link">
                            <div class="sb-nav-link-icon"><i class="fab fa-car-side"></i></i></div>
                            <x-nav-link :href="route('category')" :active="request()->routeIs('category')">
                                {{ __('Category') }}
                            </x-nav-link>
                        </div>
                        <div class="flex  nav-link">
                            <div class="sb-nav-link-icon"><i class="fab fa-car-side"></i></i></div>
                            <x-nav-link :href="route('posts')" :active="request()->routeIs('posts')">
                                {{ __('Posts') }}
                            </x-nav-link>
                        </div>
                        <div class="flex  nav-link">
                            <div class="sb-nav-link-icon"><i class="fab fa-car-side"></i></i></div>
                            <x-nav-link :href="route('gallery')" :active="request()->routeIs('gallery')">
                                {{ __('Gallery') }}
                            </x-nav-link>
                        </div>
                        <div class="flex  nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                {{ __('Add-Admin') }}
                            </x-nav-link>
                        </div>
                        <div class="flex  nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <x-nav-link :href="route('register-user')" :active="request()->routeIs('register-user')">
                                {{ __('Admins') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{Auth::user()->username}}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                {{$content}}