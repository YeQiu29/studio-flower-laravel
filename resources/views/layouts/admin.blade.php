<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link rel="icon" href="{{ asset('images/main-logo.png') }}" type="image/png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <style>
        body {
            font-size: .875rem;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            width: 250px;
            transition: all 0.3s ease;
        }
        .sidebar.collapsed {
            margin-left: -250px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        .sidebar .nav-link {
            color: #c7c7c7;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            color: #fff;
            font-weight: bold;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin.products.index') }}">
            <img src="{{ asset('images/main-logo.png') }}" alt="Studio Flower Logo">
            Studio Flower Admin
        </a>
        <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="position-sticky pt-3">
                    <h5 class="px-3 text-white">Admin Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                                <ion-icon name="cube" class="me-2"></ion-icon> Manage Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.posts.index') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">
                                <ion-icon name="document" class="me-2"></ion-icon> Manage Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}" target="_blank">
                                <ion-icon name="globe" class="me-2"></ion-icon> View Website
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="pt-3 pb-2 mb-3 border-bottom d-flex justify-content-end align-items-center">
                    <button class="btn btn-dark d-none d-md-inline-block" id="sidebarToggle">Toggle Menu</button>
                </div>
                @yield('content')

                <footer class="footer mt-auto py-3 bg-light">
                    <div class="container-fluid text-center">
                        <span class="text-muted">Copyright © 2025 Studio Flower. All rights reserved ~ Website untuk Alisa</span>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebarMenu');
            const mainContent = document.querySelector('.main-content');

            sidebarToggle.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
