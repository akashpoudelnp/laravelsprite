@extends('home.master')
@section('css')
    <style>
        .spinner {
            animation: rotate 2s linear infinite;
            z-index: 2;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -25px 0 0 -25px;
            width: 50px;
            height: 50px;

            & .path {
                stroke: hsl(210, 70, 75);
                stroke-linecap: round;
                animation: dash 1.5s ease-in-out infinite;
            }

        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes dash {
            0% {
                stroke-dasharray: 1, 150;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -35;
            }

            100% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -124;
            }
        }

    </style>
@endsection
@section('content')
    <div class="flex flex-col ">
        <h1 class="text-3xl font-semibold text-green-600">Laravel Sprite </h1>
        <small class="mx-auto py-2">Starting now.. </small>
        <div>
            {!! file_get_contents('svg/spinner.svg') !!}
        </div>
        @auth
            <form class="mx-auto py-2 text-xs " action="{{ route('logout') }}" method="post">
                @csrf
                <button class="underline text-green-600" type="submit">Log me out!!</button>
            </form>
        @endauth
    </div>
@endsection
