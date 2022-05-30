@extends('home.master')
@section('content')
    <!-- component -->
    <div class="flex justify-center min-h-screen bg-gray-100 antialiased">
        <div class="container sm:mt-40 mt-24 my-auto max-w-md border-2 border-gray-200 p-3 bg-white">
            <!-- header -->

            <div class="text-center m-6">
                <h1 class="text-3xl font-semibold text-gray-700 ">Success !</h1>
                <p class="text-gray-500 mt-2 border-b">Your password has been resetted sucessfully! </p>
            </div>
            <!-- sign-in -->
            <div class="m-6">

                {{-- Tick svg --}}
                <div class="flex flex-col ">
                    <svg class="w-16 h-16 text-green-500 mx-auto rounded-full border-2 border-green-500 " fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="mt-6 font-gray-600 text-sm text-center">You can now return safely to your app to
                        login</span>
                </div>

            </div>
        </div>
    </div>
@endsection


</body>

</html>
