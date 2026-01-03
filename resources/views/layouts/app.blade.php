<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Optional: custom styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        nav {
            background: #232f3e;
            padding: 12px;
        }
        nav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }
        .container {
            padding: 20px;
        }
        /* Optional: style for logout button */
        .logout-btn {
            background: none;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3 d-flex justify-content-between align-items-center">

    <!-- LEFT : LOGO -->
    <div class="d-flex align-items-center">
        <a href="{{ route('home') }}"
           class="fw-bold text-white text-decoration-none fs-4 me-4">
            MyShop
        </a>

        <!-- SEARCH BAR -->
        <form action="{{ route('home') }}" method="GET" class="d-flex">
            <input
                type="text"
                name="search"
                class="form-control form-control-sm"
                placeholder="Search products..."
                value="{{ request('search') }}"
                style="width:220px;"
            >
            <button class="btn btn-warning btn-sm ms-1">
                Search
            </button>
        </form>
    </div>

    <!-- RIGHT : MENU -->
    <div class="d-flex align-items-center">

        <a href="{{ route('home') }}"
           class="text-white text-decoration-none me-3">
            Home
        </a>

        @auth
            <a href="{{ route('cart') }}"
               class="text-white text-decoration-none me-3">
                Cart
            </a>

            <a href="{{ route('dashboard') }}"
               class="text-white text-decoration-none me-3">
                Dashboard
            </a>

            <!-- LOGOUT -->
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit"
                        class="btn btn-outline-light btn-sm">
                    Logout
                </button>
            </form>

        @else
            <!-- LOGIN DROPDOWN -->
            <div class="dropdown me-3">
                <button class="btn btn-outline-light btn-sm dropdown-toggle"
                        data-bs-toggle="dropdown">
                    Login
                </button>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('login') }}">
                            User Login
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('admin.login') }}">
                            Admin Login
                        </a>
                    </li>
                </ul>
            </div>

            <a href="{{ route('register') }}"
               class="btn btn-warning btn-sm">
                Register
            </a>
        @endauth
    </div>
</nav>


<div class="container mt-4">
    @yield('content')
</div>

<!-- Optional: Bootstrap JS + Popper (for components like dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
