<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <style>
        body { font-family: Arial; background:#f4f4f4; }
        .container { width:400px; margin:50px auto; background:#fff; padding:20px; }
        input { width:100%; padding:10px; margin:8px 0; }
        button { padding:10px; width:100%; background:#28a745; color:#fff; border:none; }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>
