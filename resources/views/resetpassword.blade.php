@extends('home.master')
@section('content')
    <!-- component -->
    <div class="flex justify-center min-h-screen bg-gray-100 antialiased">
        <div class="container sm:mt-40 mt-24 my-auto max-w-md border-2 border-gray-200 p-3 bg-white">
            <!-- header -->

            @if (session('token_expired'))
                <div class="text-center m-6">
                    <h1 class="text-3xl font-semibold text-gray-700 ">Error !</h1>
                    <p class="text-gray-500 mt-2 border-b"> {{ session('token_expired') }}</p>
                </div>
            @else
                <div class="text-center m-6">
                    <h1 class="text-3xl font-semibold text-gray-700">Reset your Password</h1>
                    <p class="text-gray-500">Please enter your email and new password to reset password</p>
                </div>
                <!-- sign-in -->
                <div class="m-6">

                    <div class="text-md text-red-600">
                        {{ session('token_expired') }}
                    </div>

                    <form class="mb-4" method="POST" action="{{ route('users.change-password') }}">
                        @csrf
                        <div class="mb-6">
                            @if (session('error'))
                                <span class="text-red-600 text-xs">
                                    {{ session('error') }}
                                </span>
                            @endif
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Existing Email
                                Address</label>
                            <input type="email" name="email" id="email" placeholder="Your email address"
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                        <input type="hidden" name="user_token" value="{{ $token }}">

                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">New
                                Password</label>
                            <input type="password" name="password" id="password" placeholder="New Password"
                                class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none duration-100 ease-in-out">Reset
                                Password</button>
                        </div>

                    </form>


                </div>
            @endif
        </div>
    </div>
@endsection


</body>

</html>
