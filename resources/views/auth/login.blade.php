@php
    $settings = App\Models\Settings::with("siteLogo")->first();
@endphp
@extends("auth.app")
@section("title")
    RCB - Login
@endsection
{{-- @section("content")
    <div class="w-full mt-36 md:mt-32 max-w-md px-5 lg:px-0">
        <div class="flex justify-center">
            <img src="{{ asset(@$settings->siteLogo?->path) }}" alt="{{ @$settings->site_name }}" class="w-44">
        </div>
        <form method="POST" action="{{ route("login") }}" class="mt-3 space-y-4 px-8 py-3 bg-white rounded-lg shadow-md ">
            @csrf
            <div>
                <label class="block text-gray-600 text-sm">Email</label>
                <input type="email" name="email" placeholder="Enter Email"
                    class="w-full px-4 py-2.5 mt-2 text-sm text-white border border-transparent bg-[#D2AB67] rounded focus:outline-none focus:ring-0 focus:border-transparent placeholder:text-white">
                @error("email")
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block text-gray-600 text-sm">Password</label>
                <input type="password" name="password" placeholder="Enter Password"
                    class="w-full px-4 py-2.5 mt-2 text-sm text-white border border-transparent bg-[#D2AB67] rounded focus:outline-none focus:ring-0 focus:border-transparent placeholder:text-white">
                @error("password")
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center">
                <input type="checkbox" id="remember_me" name="remember" class="w-4 h-4 rounded cursor-pointer">
                <label for="remember_me" class="ml-2 text-gray-600 text-sm cursor-pointer">Remember me</label>
            </div>
            <div class="flex justify-between items-center">
                @if (Route::has("password.request"))
                    <a href="{{ route("password.request") }}" class="text-sm text-gray-600 underline">Forgot your
                        password?</a>
                @endif
                <button type="submit" class="px-4 py-1.5 text-white text-[15px] bg-slate-900 rounded-md">
                    LOG IN
                </button>
            </div>
        </form>
    </div>
@endsection --}}
@section("content")
    <div class="w-full max-w-md rounded bg-white p-8 shadow">
        <div class="mb-2 flex items-center">
            <svg class="h-8 w-8 mr-2 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                <polyline points="10 17 15 12 10 7" />
                <line x1="15" y1="12" x2="3" y2="12" />
            </svg>
            <h2 class="text-3xl font-semibold text-gray-700">Login</h2>
        </div>
        <p class="mb-4 text-gray-600">Welcome back!</p>

        <form method="POST" action="{{ route("login") }}">
            @csrf
            <!-- Email Field -->
            <div class="mb-1 text-sm">
                <label for="email" class="text-gray-700 leading-10">Email address</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <!-- Email SVG Icon -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                            <path d="M3 7l9 6l9 -6" />
                        </svg>
                    </span>
                    <input type="email" name="email" id="email"
                        class="w-full pl-10 pr-4 py-3 rounded border 
                            @error("email") border-red-500 @else border-gray-200 @enderror
                            focus:outline-none focus:border-blue-500 focus:ring-transparent transition duration-300 ease-in-out"
                        placeholder="Email address" />
                </div>
                @error("email")
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>


            <!-- Password Field -->
            <div class="mb-6 text-sm">
                <label for="password" class="text-gray-700 leading-10">Password</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <!-- Lock SVG Icon -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                        </svg>
                    </span>
                    <input type="password" name="password" id="password"
                        class="w-full pl-10 pr-4 py-3 rounded border
                            @error("password") border-red-500 @else border-gray-200 @enderror
                            focus:outline-none focus:border-blue-500 focus:ring-transparent transition duration-300 ease-in-out"
                        placeholder="Password" />
                </div>
                @error("password")
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>


            <!-- Submit Button -->
            <button type="submit"
                class="w-full rounded-full shadow bg-blue-600 px-4 py-3 text-white text-lg font-medium hover:bg-blue-700 transition duration-300 ease-in-out">
                Sign in
            </button>
        </form>

        {{-- <p class="mt-3 text-sm text-gray-700">
            Don’t have an account yet? <a href="{{ route("register") }}" class="text-blue-600 font-medium hover:underline">
                Register now
            </a>
        </p> --}}

        {{-- <p class="mt-2">
            @if (Route::has("password.request"))
                <a href="{{ route("password.request") }}"
                    class="text-gray-600 underline text-sm hover:text-orange-600 transition duration-300 ease-in-out">
                    Forgot password?
                </a>
            @endif
        </p> --}}
    </div>
@endsection