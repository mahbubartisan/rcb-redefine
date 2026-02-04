@php
    $settings = App\Models\Settings::first();
@endphp

<!-- Mobile Bottom Navigation -->
{{-- <div
    class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 shadow-lg flex justify-between items-center px-4 py-2 sm:hidden z-50">

    <!-- Teams -->
    <a href="{{ route("frontend.team") }}" class="flex flex-col items-center text-gray-900 text-[13px]">
        <svg class="w-5 h-5 mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M3 7h10v10h-10z"></path>
            <path d="M6 10h4"></path>
            <path d="M8 10v4"></path>
            <path d="M8.104 17c.47 2.274 2.483 4 4.896 4a5 5 0 0 0 5 -5v-7h-5"></path>
            <path d="M18 18a4 4 0 0 0 4 -4v-5h-4"></path>
            <path d="M13.003 8.83a3 3 0 1 0 -1.833 -1.833"></path>
            <path d="M15.83 8.36a2.5 2.5 0 1 0 .594 -4.117"></path>
        </svg>
        Teams
    </a>

    <!-- Fixtures -->
    <a href="{{ route("frontend.fixture") }}" target="_blank"
        class="flex flex-col items-center text-gray-900 text-[13px]">
        <svg class="w-5 h-5 mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M2 12c0 5.523 4.477 10 10 10s10 -4.477 10 -10s-4.477 -10 -10 -10s-10 4.477 -10 10"></path>
            <path
                d="M14 14.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75">
            </path>
            <path d="M7 9l2 6l2 -6"></path>
        </svg>
        Fixtures
    </a>

    <!-- Home -->
    <a href="{{ route("frontend.home-page") }}"
        class="relative -mt-10 bg-teal-500 text-white rounded-full w-16 h-16 flex flex-col items-center justify-center -mx-0">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M3 9.75l9-7.5 9 7.5V20a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V9.75z" />
        </svg>
        <span class="text-xs mt-1 font-medium">Home</span>
    </a>

    <!-- Records -->
    <a href="{{ route("frontend.records") }}" class="flex flex-col items-center text-gray-900 text-[13px]">
        <svg class="w-5 h-5 mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M8 21l8 0" />
            <path d="M12 17l0 4" />
            <path d="M7 4l10 0" />
            <path d="M17 4v8a5 5 0 0 1 -10 0v-8" />
            <path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
        </svg>
        Records
    </a>

    <!-- Be a player -->
    <a href="{{ route("frontend.player-registration") }}" class="flex flex-col items-center text-gray-900 text-[13px]">
        <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0">
            </path>
        </svg>
        Be a player
    </a>
</div> --}}

<div
    class="fixed bottom-0 left-0 z-50 w-full border-t border-white/30 bg-white/80 shadow-[0_-10px_30px_rgba(0,0,0,0.08)] backdrop-blur-xl sm:hidden">

    <div class="relative flex items-end justify-between px-3 pb-2 pt-3">

        <!-- Teams -->
        <a href="{{ route("frontend.teams") }}"
            class="group flex flex-1 flex-col items-center text-gray-600 transition hover:text-teal-600">
            <svg class="mb-1 h-5 w-5 transition group-hover:scale-110" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path
                    d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                <path d="M12 22V2" />
            </svg>
            <span class="text-[11px] font-medium">Teams</span>
        </a>

        <!-- Fixtures -->
        <a href="{{ route("frontend.fixture") }}"
            class="group flex flex-1 flex-col items-center text-gray-600 transition hover:text-teal-600">
            <svg class="mb-1 h-5 w-5 transition group-hover:scale-110" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M8 2v4" />
                <path d="M16 2v4" />
                <rect width="18" height="18" x="3" y="4" rx="2" />
                <path d="M3 10h18" />
                <path d="M8 14h.01" />
                <path d="M12 14h.01" />
                <path d="M16 14h.01" />
                <path d="M8 18h.01" />
                <path d="M12 18h.01" />
                <path d="M16 18h.01" />
            </svg>
            <span class="text-[11px] font-medium">Fixtures</span>
        </a>

        <!-- HOME (Floating Action) -->
        <a href="{{ route("frontend.home-page") }}"
            class="relative -mt-8 flex h-16 w-16 items-center justify-center rounded-full bg-teal-500 text-white shadow-[0_15px_40px_rgba(20,184,166,0.6)] transition active:scale-95">

            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 9.75l9-7.5 9 7.5V20a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V9.75z" />
            </svg>

            <!-- Glow ring -->
            <span class="absolute -inset-1 rounded-full bg-teal-500/30 blur-xl"></span>
        </a>

        <!-- Records -->
        <a href="{{ route("frontend.records") }}"
            class="group flex flex-1 flex-col items-center text-gray-600 transition hover:text-teal-600">
            <svg class="mb-1 h-5 w-5 transition group-hover:scale-110" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978" />
                <path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978" />
                <path d="M18 9h1.5a1 1 0 0 0 0-5H18" />
                <path d="M4 22h16" />
                <path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z" />
                <path d="M6 9H4.5a1 1 0 0 1 0-5H6" />
            </svg>
            <span class="text-[11px] font-medium">Records</span>
        </a>

        <!-- Be a Player -->
        <a href="{{ route("frontend.player") }}"
            class="group flex flex-1 flex-col items-center text-gray-600 transition hover:text-teal-600">
            <svg class="mb-1 h-5 w-5 transition group-hover:scale-110" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 21a8 8 0 0 0-16 0" />
                <circle cx="10" cy="8" r="5" />
                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
            </svg>
            <span class="text-[11px] font-medium">Players</span>
        </a>

    </div>
</div>


{{-- <footer class="bg-teal-500 text-gray-800 pt-10 relative">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-4 gap-8">

        <!-- Support -->
        <div>
            <h3 class="text-lg font-semibold mb-6">{{ __('messages.support') }}</h3>
            <div class="space-y-4">
                <!-- Phone -->
                <a href="tel:01674297522"
                    class="flex items-center justify-start w-full border border-gray-300/90 hover:border-white rounded-full px-4 py-5 bg-teal-500 transition duration-300 ease-in-out">
                    <div class="flex items-center space-x-3 w-full">
                        <div class="flex items-center pr-3 border-r">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M2 3a1 1 0 011-1h3.28a1 1 0 01.95.68l1.52 4.55a1 1 0 01-.27 1.03l-2.1 2.1a16 16 0 006.95 6.95l2.1-2.1a1 1 0 011.03-.27l4.55 1.52a1 1 0 01.68.95V21a1 1 0 01-1 1H19c-9.39 0-17-7.61-17-17V4a1 1 0 011-1z" />
                            </svg>
                        </div>
                        <span class="font-medium">{{ $settings->phone }}</span>
                    </div>
                </a>

                <!-- Email -->
                <a href="mailto:info@rcb.com.bd"
                    class="flex items-center justify-start w-full border border-gray-300/90 hover:border-white rounded-full px-4 py-5 bg-teal-500 transition duration-300 ease-in-out">
                    <div class="flex items-center space-x-3 w-full">
                        <div class="flex items-center pr-3 border-r">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18a2 2 0 002 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                            </svg>
                        </div>
                        <span class="font-medium">{{ $settings->email }}</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Quick Link -->
        <div>
            <h3 class="text-lg font-semibold mb-6">{{ __("messages.quick_link") }}</h3>
            <ul class="space-y-3">
                <li class="flex items-center justify-between border-b border-dotted pb-1">
                    <a href="{{ route("frontend.about") }}" class="flex items-center hover:text-white">
                        <span class="mr-2 text-white">»</span>
                        {{ __("messages.about") }}
                    </a>
                </li>
                <li class="flex items-center justify-between border-b border-dotted pb-1">
                    <a href="{{ route("frontend.team") }}" class="flex items-center hover:text-white">
                        <span class="mr-2 text-white">»</span>
                        {{ __("messages.team") }}
                    </a>
                </li>
                <li class="flex items-center justify-between border-b border-dotted pb-1">
                    <a href="{{ route("frontend.fixture") }}" class="flex items-center hover:text-white">
                        <span class="mr-2 text-white">»</span>
                        {{ __("messages.fixtures") }}
                    </a>
                </li>
                <li class="flex items-center justify-between border-b border-dotted pb-1">
                    <a href="{{ route("frontend.photo.gallery") }}" class="flex items-center hover:text-white">
                        <span class="mr-2 text-white">»</span>
                        {{ __("messages.gallery") }}
                    </a>
                </li>
            </ul>
        </div>

        <!-- Facebook Page -->
        <div>
            <h3 class="text-lg font-semibold mb-6">{{ __("messages.facebook_page") }}</h3>
            <div class="bg-white w-fit rounded-lg shadow overflow-hidden">
                <iframe
                    src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/RealChallengerBoys&tabs=timeline&width=340&height=250"
                    width="100%" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>

        <!-- Contact Us -->
        <div>
            <h3 class="text-lg font-semibold mb-6">{{ __("messages.contact_us") }}</h3>
            <ul class="space-y-3">
                <!-- Location -->
                <li class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-white mt-1" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                        </svg>
                    </div>
                    <span class="text-gray-800 leading-relaxed">
                        {{ $settings->address }}
                    </span>
                </li>

                <!-- Email -->
                <li class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18a2 2 0 002 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                    </div>
                    <a href="mailto:{{ $settings->email }}" class="hover:underline text-gray-700">
                        <span class="text-gray-800 leading-relaxed">
                            {{ $settings->email }}
                        </span>
                    </a>
                </li>

                <!-- Phone -->
                <li class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M2 3a1 1 0 011-1h3.28a1 1 0 01.95.68l1.52 4.55a1 1 0 01-.27 1.03l-2.1 2.1a16 16 0 006.95 6.95l2.1-2.1a1 1 0 011.03-.27l4.55 1.52a1 1 0 01.68.95V21a1 1 0 01-1 1H19c-9.39 0-17-7.61-17-17V4a1 1 0 011-1z" />
                        </svg>
                    </div>
                    <a href="tel:{{ $settings->phone }}" class="hover:underline text-gray-700">
                        <span class="text-gray-800 leading-relaxed">
                            {{ $settings->phone }}
                        </span>
                    </a>
                </li>
            </ul>


            <!-- Social Icons with SVG -->
            <div class="mt-4 flex space-x-3">
                <!-- Facebook -->
                <a href="{{ $settings->facebook }}" target="_blank" class="p-2 bg-blue-600 text-white rounded"
                    aria-label="Facebook">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 5 3.66 9.13 8.44 9.88v-6.99H8.08V12h2.36V9.79c0-2.33 1.39-3.62 3.52-3.62.99 0 2.02.18 2.02.18v2.22h-1.14c-1.12 0-1.47.7-1.47 1.42V12h2.5l-.4 2.89h-2.1v6.99C18.34 21.13 22 17 22 12z" />
                    </svg>
                </a>
                <!-- Twitter -->
                <a href="{{ $settings->twitter }}" target="_blank" class="p-2 bg-sky-400 text-white rounded"
                    aria-label="Twitter">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M22.46 6c-.77.35-1.6.58-2.46.69a4.25 4.25 0 001.88-2.34 8.52 8.52 0 01-2.7 1.03 4.24 4.24 0 00-7.3 3.87A12.05 12.05 0 013 4.8a4.25 4.25 0 001.31 5.66c-.64-.02-1.25-.2-1.77-.49v.05a4.25 4.25 0 003.4 4.16c-.48.13-.99.16-1.51.06a4.25 4.25 0 003.97 2.95A8.52 8.52 0 012 19.54a12.05 12.05 0 006.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.39-.01-.58A8.67 8.67 0 0022.46 6z" />
                    </svg>
                </a>
                <!-- LinkedIn -->
                <a href="{{ $settings->linkedin }}" target="_blank" class="p-2 bg-blue-700 text-white rounded"
                    aria-label="LinkedIn">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M19 3A2 2 0 0121 5v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14zM8.34 17v-7H5.67v7h2.67zm-1.34-8c.86 0 1.4-.58 1.4-1.3-.01-.74-.54-1.3-1.39-1.3s-1.4.56-1.4 1.3c0 .72.54 1.3 1.38 1.3h.01zM18.33 17v-3.71c0-1.97-1.05-2.89-2.46-2.89-1.13 0-1.63.62-1.91 1.05V10h-2.67c.04.65 0 7 0 7h2.67v-3.91c0-.21.02-.43.08-.59.16-.43.53-.88 1.16-.88.82 0 1.15.66 1.15 1.62V17h2.67z" />
                    </svg>
                </a>
                <!-- Instagram -->
                <a href="{{ $settings->instagram }}" target="_blank" class="p-2 bg-pink-500 text-white rounded"
                    aria-label="Instagram">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.77 0 5-2.24 5-5V7c0-2.76-2.23-5-5-5H7zm10 2c1.66 0 3 1.34 3 3v10c0 1.66-1.34 3-3 3H7c-1.65 0-3-1.34-3-3V7c0-1.66 1.35-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.1a1.1 1.1 0 100 2.2 1.1 1.1 0 000-2.2z" />
                    </svg>
                </a>
                <!-- YouTube -->
                <a href="{{ $settings->youtube }}" target="_blank" class="p-2 bg-red-600 text-white rounded"
                    aria-label="YouTube">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.498 6.186a2.994 2.994 0 0 0-2.112-2.12C19.3 3.5 12 3.5 12 3.5s-7.3 0-9.386.566a2.994 2.994 0 0 0-2.112 2.12C0 8.3 0 12 0 12s0 3.7.502 5.814a2.994 2.994 0 0 0 2.112 2.12C4.7 20.5 12 20.5 12 20.5s7.3 0 9.386-.566a2.994 2.994 0 0 0 2.112-2.12C24 15.7 24 12 24 12s0-3.7-.502-5.814zM9.75 15.02V8.98L15.5 12l-5.75 3.02z" />
                    </svg>
                </a>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="bg-teal-500 text-center text-white border-t border-gray-300 mt-10 py-4">
        <p class="text-sm">Copyright © <span class="font-semibold text-gray-800">RCB</span> All rights reserved to
            <span class="font-semibold text-gray-800">Real Challenger Boys</span>
        </p>
    </div>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.link/c1y139" target="_blank"
        class="fixed z-50 bottom-24 left-6 bg-green-500 text-white rounded-full p-2 shadow-lg">
        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M16.72 14.47c-.27-.13-1.59-.78-1.84-.87-.25-.1-.43-.13-.62.13-.18.27-.72.87-.88 1.05-.16.18-.32.2-.59.07-.27-.13-1.13-.42-2.15-1.35-.79-.71-1.32-1.58-1.48-1.85-.15-.27-.02-.41.11-.54.12-.12.27-.32.41-.48.14-.16.18-.27.27-.45.09-.18.05-.34-.02-.47-.07-.13-.62-1.5-.85-2.05-.22-.53-.45-.46-.62-.47h-.53c-.18 0-.48.07-.73.34s-.95.93-.95 2.27 1 2.64 1.14 2.82c.14.18 1.96 3 4.75 4.2.66.29 1.18.46 1.58.59.66.21 1.26.18 1.74.11.53-.08 1.59-.65 1.81-1.28.22-.63.22-1.18.15-1.28-.06-.1-.25-.16-.52-.29z" />
            <path fill="currentColor"
                d="M20.52 3.48A11.94 11.94 0 0012 0a12 12 0 00-10.6 17.4L0 24l6.73-1.75A11.97 11.97 0 0012 24c6.63 0 12-5.37 12-12 0-3.2-1.24-6.21-3.48-8.52zM12 22a9.94 9.94 0 01-5.06-1.39l-.36-.21-4 .99 1.05-3.9-.25-.4A9.94 9.94 0 1112 22z" />
        </svg>
    </a>

    <!-- Scroll To Top -->
    <button id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="hidden fixed z-50 bottom-20 right-6 bg-yellow-500 text-white rounded-full p-2 shadow-lg transition-opacity duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <script>
        const backToTop = document.getElementById("backToTop");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                backToTop.classList.remove("hidden");
            } else {
                backToTop.classList.add("hidden");
            }
        });
    </script>
</footer> --}}

<footer class="relative bg-gradient-to-br from-teal-600 via-teal-500 to-emerald-600 text-white">

    <!-- Soft glow -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.25),transparent_60%)]"></div>

    <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-10 px-6 pb-12 pt-16 lg:grid-cols-4">

        <!-- ================= SUPPORT (UNCHANGED) ================= -->
        <div>
            <h3 class="mb-6 text-lg font-semibold">{{ __("messages.support") }}</h3>
            <div class="space-y-4">
                <a href="tel:01674297522"
                    class="flex w-full items-center justify-start rounded-full border border-gray-300/90 bg-teal-500 px-4 py-5 transition hover:border-white">
                    <div class="flex w-full items-center space-x-3">
                        <div class="flex items-center border-r pr-3">
                            <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M2 3a1 1 0 011-1h3.28a1 1 0 01.95.68l1.52 4.55a1 1 0 01-.27 1.03l-2.1 2.1a16 16 0 006.95 6.95l2.1-2.1a1 1 0 011.03-.27l4.55 1.52a1 1 0 01.68.95V21a1 1 0 01-1 1H19c-9.39 0-17-7.61-17-17V4a1 1 0 011-1z" />
                            </svg>
                        </div>
                        <span class="font-medium text-white">{{ $settings->phone }}</span>
                    </div>
                </a>

                <a href="mailto:info@rcb.com.bd"
                    class="flex w-full items-center justify-start rounded-full border border-gray-300/90 bg-teal-500 px-4 py-5 transition hover:border-white">
                    <div class="flex w-full items-center space-x-3">
                        <div class="flex items-center border-r pr-3">
                            <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18a2 2 0 002 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                            </svg>
                        </div>
                        <span class="font-medium text-white">{{ $settings->email }}</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- ================= QUICK LINKS (UNCHANGED) ================= -->
        <div>
            <h3 class="mb-6 text-lg font-semibold">{{ __("messages.quick_link") }}</h3>
            <ul class="space-y-3 text-white">
                <li class="border-b border-dotted pb-1">
                    <a href="{{ route("frontend.about") }}" class="hover:text-white">
                        » {{ __("messages.about") }}
                    </a>
                </li>
                <li class="border-b border-dotted pb-1">
                    <a href="{{ route("frontend.teams") }}" class="hover:text-white">
                        » {{ __("messages.team") }}
                    </a>
                </li>
                <li class="border-b border-dotted pb-1">
                    <a href="{{ route("frontend.fixture") }}" class="hover:text-white">
                        » {{ __("messages.fixtures") }}
                    </a>
                </li>
                <li class="border-b border-dotted pb-1">
                    <a href="{{ route("frontend.photo.gallery") }}" class="hover:text-white">
                        » {{ __("messages.gallery") }}
                    </a>
                </li>
            </ul>
        </div>

        <!-- ================= FACEBOOK (PREMIUM) ================= -->
        <div>
            <h3 class="mb-6 text-lg font-semibold text-white">{{ __("messages.facebook_page") }}</h3>
            <div class="overflow-hidden rounded-2xl border border-white/20 bg-white/10 shadow-2xl backdrop-blur-xl">
                <iframe
                    src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/RealChallengerBoys&tabs=timeline&height=250"
                    height="250" class="w-full border-none"></iframe>
            </div>
        </div>

        <!-- ================= CONTACT + SOCIAL (PREMIUM) ================= -->
        <div>
            <h3 class="mb-6 text-lg font-semibold text-white">{{ __("messages.contact_us") }}</h3>

            <ul class="space-y-4 text-white/90">
                <li class="flex gap-3">
                    <div class="flex-shrink-0">
                        <svg class="mt-1 h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z" />
                        </svg>
                    </div>
                    <span>{{ $settings->address }}</span>
                </li>

                <li class="flex gap-3">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18a2 2 0 002 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                    </div>
                    <a href="mailto:{{ $settings->email }}" class="hover:underline">
                        {{ $settings->email }}
                    </a>
                </li>

                <li class="flex gap-3">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2 3h4l2 5-2 2c1 3 4 6 7 7l2-2 5 2v4c-9 0-18-9-18-18z" />
                    </svg>
                    <a href="tel:{{ $settings->phone }}" class="hover:underline">
                        {{ $settings->phone }}
                    </a>
                </li>
            </ul>

            <!-- Social -->
            <div class="mt-6 flex gap-3">
                @foreach ([
        "facebook" => [
            "color" => "bg-blue-600",
            "svg" => '<path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 5 3.66 9.13 8.44 9.88v-6.99H8.08V12h2.36V9.79c0-2.33 1.39-3.62 3.52-3.62.99 0 2.02.18 2.02.18v2.22h-1.14c-1.12 0-1.47.7-1.47 1.42V12h2.5l-.4 2.89h-2.1v6.99C18.34 21.13 22 17 22 12z" />'
        ],
        "twitter" => [
            "color" => "bg-sky-400",
            "svg" => '<path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.25 4.25 0 001.88-2.34 8.52 8.52 0 01-2.7 1.03 4.24 4.24 0 00-7.3 3.87A12.05 12.05 0 013 4.8a4.25 4.25 0 001.31 5.66c-.64-.02-1.25-.2-1.77-.49v.05a4.25 4.25 0 003.4 4.16c-.48.13-.99.16-1.51.06a4.25 4.25 0 003.97 2.95A8.52 8.52 0 012 19.54a12.05 12.05 0 006.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.39-.01-.58A8.67 8.67 0 0022.46 6z" />'
        ],
        "linkedin" => [
            "color" => "bg-blue-700",
            "svg" => '<path d="M19 3A2 2 0 0121 5v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14zM8.34 17v-7H5.67v7h2.67zm-1.34-8c.86 0 1.4-.58 1.4-1.3-.01-.74-.54-1.3-1.39-1.3s-1.4.56-1.4 1.3c0 .72.54 1.3 1.38 1.3h.01zM18.33 17v-3.71c0-1.97-1.05-2.89-2.46-2.89-1.13 0-1.63.62-1.91 1.05V10h-2.67c.04.65 0 7 0 7h2.67v-3.91c0-.21.02-.43.08-.59.16-.43.53-.88 1.16-.88.82 0 1.15.66 1.15 1.62V17h2.67z" />'
        ],
        "instagram" => [
            "color" => "bg-gradient-to-tr from-yellow-400 via-pink-500 to-purple-600",
            "svg" => '<path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.77 0 5-2.24 5-5V7c0-2.76-2.23-5-5-5H7zm10 2c1.66 0 3 1.34 3 3v10c0 1.66-1.34 3-3 3H7c-1.65 0-3-1.34-3-3V7c0-1.66 1.35-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.1a1.1 1.1 0 100 2.2 1.1 1.1 0 000-2.2z" />'
        ],
        "youtube" => [
            "color" => "bg-red-600",
            "svg" => '<path d="M23.498 6.186a2.994 2.994 0 0 0-2.112-2.12C19.3 3.5 12 3.5 12 3.5s-7.3 0-9.386.566a2.994 2.994 0 0 0-2.112 2.12C0 8.3 0 12 0 12s0 3.7.502 5.814a2.994 2.994 0 0 0 2.112 2.12C4.7 20.5 12 20.5 12 20.5s7.3 0 9.386-.566a2.994 2.994 0 0 0 2.112-2.12C24 15.7 24 12 24 12s0-3.7-.502-5.814zM9.75 15.02V8.98L15.5 12l-5.75 3.02z" />'
        ]
    ] as $platform => $data)
                    <a href="{{ $settings->$platform }}" target="_blank"
                        class="{{ $data["color"] }} group flex h-10 w-10 items-center justify-center rounded-full shadow-lg transition-all duration-300 hover:scale-110 hover:shadow-xl"
                        aria-label="{{ ucfirst($platform) }}">
                        <svg class="h-4 w-4 fill-current text-white transition group-hover:scale-110"
                            viewBox="0 0 24 24">
                            {!! $data["svg"] !!}
                        </svg>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.link/c1y139" target="_blank"
        class="fixed bottom-24 left-6 z-50 rounded-full bg-green-500 p-2 text-white shadow-lg">
        <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M16.72 14.47c-.27-.13-1.59-.78-1.84-.87-.25-.1-.43-.13-.62.13-.18.27-.72.87-.88 1.05-.16.18-.32.2-.59.07-.27-.13-1.13-.42-2.15-1.35-.79-.71-1.32-1.58-1.48-1.85-.15-.27-.02-.41.11-.54.12-.12.27-.32.41-.48.14-.16.18-.27.27-.45.09-.18.05-.34-.02-.47-.07-.13-.62-1.5-.85-2.05-.22-.53-.45-.46-.62-.47h-.53c-.18 0-.48.07-.73.34s-.95.93-.95 2.27 1 2.64 1.14 2.82c.14.18 1.96 3 4.75 4.2.66.29 1.18.46 1.58.59.66.21 1.26.18 1.74.11.53-.08 1.59-.65 1.81-1.28.22-.63.22-1.18.15-1.28-.06-.1-.25-.16-.52-.29z" />
            <path fill="currentColor"
                d="M20.52 3.48A11.94 11.94 0 0012 0a12 12 0 00-10.6 17.4L0 24l6.73-1.75A11.97 11.97 0 0012 24c6.63 0 12-5.37 12-12 0-3.2-1.24-6.21-3.48-8.52zM12 22a9.94 9.94 0 01-5.06-1.39l-.36-.21-4 .99 1.05-3.9-.25-.4A9.94 9.94 0 1112 22z" />
        </svg>
    </a>

    <!-- Scroll To Top -->
    <button id="backToTop" onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="fixed bottom-20 right-6 z-50 hidden rounded-full bg-yellow-500 p-2 text-white shadow-lg transition-opacity duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7" />
        </svg>
    </button>

    <script>
        const backToTop = document.getElementById("backToTop");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                backToTop.classList.remove("hidden");
            } else {
                backToTop.classList.add("hidden");
            }
        });
    </script>

    <!-- ================= FOOTER BOTTOM ================= -->
    <div class="relative border-t border-white/20 bg-black/20 py-4 text-center text-sm text-white backdrop-blur-md">

        © {{ date("Y") }}
        <span class="font-semibold">Real Challenger Boys</span>.
        All rights reserved.

        <span class="mx-2 text-white/40">•</span>

        <span class="text-white/60">
            Developed by
            <a href="https://devcorre.com" target="_blank"
                class="font-medium text-teal-400 transition hover:text-teal-300 hover:underline">
                Devcorre
            </a>
        </span>
    </div>

</footer>
