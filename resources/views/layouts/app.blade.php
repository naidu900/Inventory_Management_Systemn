<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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

   <form action="{{ route('filter') }}" method="GET" class="d-flex">
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

        {{-- <a href="{{ route('home') }}"
           class="text-white text-decoration-none me-3">
            Home
        </a> --}}

@auth

    {{-- USER ONLY --}}
    @if(Auth::user()->role === 'user')
        <a href="{{ route('cart') }}"
           class="text-white text-decoration-none me-3">
            Cart
        </a>
    @endif

    {{-- ADMIN ONLY --}}
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('dashboard') }}"
           class="text-white text-decoration-none me-3">
            Dashboard
        </a>
    @endif


            <!-- PROFILE DROPDOWN (ADDED, NOTHING REMOVED) -->
            <div class="dropdown me-2">
                <button class="btn btn-outline-light btn-sm dropdown-toggle"
                        data-bs-toggle="dropdown">
                    {{ Auth::user()->name }}
                </button>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('profile.edit') }}">
                            Edit Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item"
                           href="{{ route('password.change') }}">
                            Change Password
                        </a>
                    </li>

                    

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form action="{{ route('logout') }}"
                              method="POST">
                            @csrf
                            <button type="submit"
                                    class="dropdown-item text-danger">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

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
<footer class="bg-dark text-light mt-5 pt-4">
    <div class="container">
        <div class="row">

            <!-- ABOUT -->
            <div class="col-md-3 mb-3">
                <h5 class="text-warning">MyShop</h5>
                <p class="small">
                    MyShop is your trusted online store for quality products
                    at the best prices.
                </p>
            </div>

            <!-- QUICK LINKS -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase">Quick Links</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="{{ route('cart') }}" class="text-light text-decoration-none">Cart</a></li>
                    <li><a href="{{ route('dashboard') }}" class="text-light text-decoration-none">My Account</a></li>
                    
                </ul>
            </div>

            <!-- CUSTOMER CARE -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase">Customer Care</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Contact Us</a></li>
                    <li><a href="#" class="text-light text-decoration-none">FAQ</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Returns</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Shipping Policy</a></li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase">Contact</h6>
                <p class="small mb-1">📧 support@myshop.com</p>
                <p class="small mb-1">📞 +91 98765 43210</p>
                <p class="small">📍 India</p>
            </div>

        </div>

        <hr class="border-secondary">

        <!-- BOTTOM FOOTER -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pb-3">
            <p class="mb-2 mb-md-0 small">
                © {{ date('Y') }} MyShop. All rights reserved.
            </p>

            <!-- SOCIAL LINKS -->
            <div>
                <a href="#" class="text-light me-3 text-decoration-none">Facebook</a>
                <a href="#" class="text-light me-3 text-decoration-none">Instagram</a>
                <a href="#" class="text-light text-decoration-none">Twitter</a>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
