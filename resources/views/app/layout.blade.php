<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.118.2">
        <title>ArgoApp Dashboard</title>
        <link rel="icon" type="image/x-icon" href="https://arielguerrero.es/cine.png">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        <!-- Custom styles for this template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ url('assets/styles/dashboard.css') }}" rel="stylesheet">
    </head>
    <body>
        
        <!-- Incluimos la definiciones de simbolos de la fuente -->
        @include('extra.definitions')
        
        <!--<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
            <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
                aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                    <use href="#circle-half"></use>
                </svg>
                <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                        aria-pressed="false">
                        <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                            <use href="#sun-fill"></use>
                        </svg>
                        Light
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                        aria-pressed="false">
                        <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                            <use href="#moon-stars-fill"></use>
                        </svg>
                        Dark
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                        aria-pressed="true">
                        <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                            <use href="#circle-half"></use>
                        </svg>
                        Auto
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>-->
    
        <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">ArgoApp</a>
    
            <ul class="navbar-nav flex-row d-md-none">
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                        aria-label="Toggle search">
                        <svg class="bi">
                            <use xlink:href="#search" />
                        </svg>
                    </button>
                </li>
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <svg class="bi">
                            <use xlink:href="#list" />
                        </svg>
                    </button>
                </li>
            </ul>
    
            <div id="navbarSearch" class="navbar-search w-100 collapse">
                <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
            </div>
        </header>
    
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                        aria-labelledby="sidebarMenuLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="sidebarMenuLabel">ArgoApp</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                data-bs-target="#sidebarMenu" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ url('movie') }}">
                                        <svg class="bi">
                                            <use xlink:href="#house-fill" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark" />
                                        </svg>
                                        Orders
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#cart" />
                                        </svg>
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#people" />
                                        </svg>
                                        Customers
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#graph-up" />
                                        </svg>
                                        Reports
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#puzzle" />
                                        </svg>
                                        Integrations
                                    </a>
                                </li>
                            </ul>
                            
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                                <span>Movie Links</span>
                            </h6>
                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="{{ url('movie') }}">
                                        <svg class="bi">
                                            <use xlink:href="#movie" />
                                        </svg>
                                        Movies
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="{{ url('movie/create') }}">
                                        <svg class="bi">
                                            <use xlink:href="#addMovie" />
                                        </svg>
                                        Add Movie
                                    </a>
                                </li>
                            </ul>
                            
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                                <span>Discography Links</span>
                            </h6>
                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="{{ url('artist') }}">
                                        <svg class="bi">
                                            <use xlink:href="#person" />
                                        </svg>
                                        Artists
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="{{ url('disk') }}">
                                        <svg class="bi">
                                            <use xlink:href="#disk" />
                                        </svg>
                                        Disks
                                    </a>
                                </li>
                            </ul>
    
                            <h6
                                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                                <span>Saved reports</span>
                                <a class="link-secondary" href="#" aria-label="Add a new report">
                                    <svg class="bi">
                                        <use xlink:href="#plus-circle" />
                                    </svg>
                                </a>
                            </h6>
                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#file-earmark-text" />
                                        </svg>
                                        Current month
                                    </a>
                                </li>
                            </ul>
    
                            <hr class="my-3">
    
                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="{{ url('setting') }}">
                                        <svg class="bi">
                                            <use xlink:href="#gear-wide-connected" />
                                        </svg>
                                        Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="{{ url('setting/showSelect') }}">
                                        <svg class="bi">
                                            <use xlink:href="#showSelect" />
                                        </svg>
                                        ShowSelect
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#door-closed" />
                                        </svg>
                                        Sign out
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                                        <svg class="bi">
                                            <use xlink:href="#door-opened" />
                                        </svg>
                                        Sign in
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <!-- Header / Cabecera -->
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button"
                                class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                                <svg class="bi">
                                    <use xlink:href="#calendar3" />
                                </svg>
                                This week
                            </button>
                        </div>
                    </div>
    
                    <!-- Content -->
                    <h2>@yield('title', 'Argo List')</h2>
                    
                    <!-- para mostrar el mensaje de éxito-->

                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <!-- para mostrar el mensaje de error-->
                  
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                          {{ $errors->first()}}
                        </div>
                    @endif
                    
                    @yield('content')
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    
        <script src="{{ url('assets/script/dashboard.js') }}"></script>
    </body>
</html>