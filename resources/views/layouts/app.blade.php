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

<nav class="d-flex justify-content-between align-items-center">
    <div>
        <a href="{{ route('home') }}" class="fw-bold text-white text-decoration-none">MyShop</a>
    </div>
    <div>
        <a href="{{ route('home') }}" class="text-white text-decoration-none me-2">Home</a>

        @auth
            <a href="{{ route('cart') }}" class="text-white text-decoration-none me-2">Cart</a>
            <a href="{{ route('dashboard') }}" class="text-white text-decoration-none me-2">Dashboard</a>

            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-white text-decoration-none me-2">Login</a>
            <a href="{{ route('register') }}" class="text-white text-decoration-none">Register</a>
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
