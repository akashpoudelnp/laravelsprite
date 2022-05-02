<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>

    <div class="grid h-screen place-items-center bg-gray-100" id="bgMain">
        @yield('content')
    </div>
</body>

</html>
