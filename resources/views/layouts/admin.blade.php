<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        #admin-wrapper {
            display: flex;
            flex: 1;
        }
        #sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            flex-shrink: 0;
        }
        #sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        #sidebar a:hover {
            background-color: #495057;
        }
        #admin-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .navbar-admin {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
        .navbar-admin a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar-admin">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand">Studio Flower Admin</a>
            <div class="d-flex">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div id="admin-wrapper">
        <div id="sidebar">
            <h5>Admin Menu</h5>
            <ul class="list-unstyled">
                <li><a href="{{ route('admin.products.index') }}">Manage Products</a></li>
                <li><a href="{{ route('admin.posts.index') }}">Manage Posts</a></li>
                <li><a href="{{ url('/') }}">View Website</a></li>
            </ul>
        </div>
        <div id="admin-content">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
