<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <style>
        body{font-family:Arial;margin:0;}
        nav{
            background:#232f3e;
            padding:12px;
            color:#fff;
            display:flex;
            justify-content:space-between;
        }
        nav a{
            color:#fff;
            margin:0 10px;
            text-decoration:none;
        }
        .container{padding:20px;}
    </style>
</head>
<body>

<nav>
    <div>
        <a href="{{ route('home') }}"><strong>MyShop</strong></a>
    </div>
    <div>
        <a href="{{ route('home') }}">Home</a>

        @auth
            <a href="{{ route('cart') }}">Cart</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button style="background:none;color:white;border:none;cursor:pointer;">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
