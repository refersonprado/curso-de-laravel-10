<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prado's Supports @yield('title')</title>

</head>
<body class="bg-gray-950">
    <header class="bg-slate-900 ">
        @yield('header')
    </header>
    <div class="content px-8 max-w-5xl m-auto">
        @yield('content')
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/30fff15ef7.js" crossorigin="anonymous"></script>
</body>
</html>