<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- component -->
    <!-- component -->
    <div class="flex bg-white">
        <div class="md:flex w-2/5 md:w-1/4 h-screen bg-white border-r hidden">
            <div class="mx-auto py-10">
                <h1 class="text-2xl font-bold mb-10 cursor-pointer text-[#EC5252] duration-150">
                    {{ env('APP_NAME') }}
                </h1>
                <ul>
                    @foreach ($urls as $url)
                        <li class="flex space-x-2 mt-10 cursor-pointer hover:text-[#EC5252] duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <a href="{{ url($url->slug) }}"> <span
                                    class="font-semibold">{{ $url->title }}</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <main class="min-h-screen w-full bg-white border-l">
            <div class="mx-6">
                @yield('content')
            </div>
        </main>

    </div>
</body>

</html>
