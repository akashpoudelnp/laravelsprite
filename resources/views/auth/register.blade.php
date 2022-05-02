@extends('auth.master')
@section('title', 'Register')

@section('content')
    <form method="POST" action="{{ route('register') }}" style="border-top-width: 26px;"
        class="border-1 flex flex-col rounded-md border-teal-600 bg-white p-12 shadow-md">
        @csrf
        <span class="mx-auto text-2xl text-gray-800"> Laravel <b>Sprite</b></span>
        <h4 class="text-md my-4 text-center text-gray-700"> Register</h4>
        <input type="text" name="name" class="my-1 rounded-md border-teal-600" type="text" placeholder="Enter your name">
        <small class="py-1 text-red-700">
            @error('name')
                {{ $message }}
            @enderror
        </small>
        <input type="email" name="email" class="my-1 rounded-md border-teal-600" type="text" placeholder="Enter your email">
        <small class="py-1 text-red-700">
            @error('email')
                {{ $message }}
            @enderror
        </small>
        <input type="password" name="password" class="my-1 rounded-md border-teal-600" type="text"
            placeholder="Enter your password">
        <small class="py-1 text-red-700">
            @error('password')
                {{ $message }}
            @enderror
        </small>
        <input type="password" name="password_confirmation" class="my-1 rounded-md border-teal-600" type="text"
            placeholder="Repeat Password">
        <small class="py-1 text-red-700">
            @error('password_confirmation')
                {{ $message }}
            @enderror
        </small>
        <small class="py-2 text-gray-500">By clicking register you agree to our terms and condition.</small>

        <button class="rounded-md bg-teal-700 p-1 text-white hover:bg-teal-500">Register</button>
        <a class="pt-2 text-gray-500" href="{{ url('login') }}">Already have an account? <u
                class="text-teal-600">Login</u></a>

    </form>

@endsection
