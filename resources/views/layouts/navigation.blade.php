<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('dashboard') }}">CRMS</a>
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
                    <a class="dropdown-item" href="{{ route('profiles') }}">Settings</a>
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
                        @if (Auth::user()->roll == 1)
                        <div class="flex  nav-link">
                            <a href="{{ route('dashboard') }}" class="{{Request::routeIs("dashboard") ? 'actives' :""}}">Dashboard</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('car_category') }}" class="{{Request::routeIs("car_category") ? 'actives' :""}}">Car Category</a>

                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('car') }}" class="{{Request::routeIs("car") ? 'actives' :""}}">Car</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('category') }}" class="{{Request::routeIs("category") ? 'actives' :""}}">Category</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('post') }}" class="{{Request::routeIs("post") ? 'actives' :""}}">Posts</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('gallerys') }}" class="{{Request::routeIs("gallerys") ? 'actives' :""}}">
                            Gallery</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('admins') }}" class="{{Request::routeIs("admins") ? 'actives' :""}}">
                            Admin</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('customars') }}" class="{{Request::routeIs("customars") ? 'actives' :""}}">
                            Customer</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('about') }}" class="{{Request::routeIs("about") ? 'actives' :""}}">
                            About</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('contact') }}" class="{{Request::routeIs("contact") ? 'actives' :""}}">
                            Contact</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('likes') }}" class="{{Request::routeIs("likes") ? 'actives' :""}}">
                            Likes</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('review') }}" class="{{Request::routeIs("review") ? 'actives' :""}}">
                            Review</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('car-book') }}" class="{{Request::routeIs("car-book") ? 'actives' :""}}">
                            Car Book</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('comments') }}" class="{{Request::routeIs("comments") ? 'actives' :""}}">
                            Comments</a>
                        </div>
                        @endif
                        
                        @if (Auth::user()->roll == 0)
                        <div class="flex  nav-link">
                            <a href="{{ route('car') }}" class="{{Request::routeIs("car") ? 'actives' :""}}">Car</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('post') }}" class="{{Request::routeIs("post") ? 'actives' :""}}">Posts</a>
                        </div>
                        <div class="flex  nav-link">
                            <a href="{{ route('gallerys') }}" class="{{Request::routeIs("gallerys") ? 'actives' :""}}">
                            Gallery</a>
                        </div>
                        @endif
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