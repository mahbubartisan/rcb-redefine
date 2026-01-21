@php
    $settings = App\Models\Settings::with("siteLogo")->first();
@endphp

<div x-data = "headerScroll()" x-init="init();">

    <div x-data="{ open: false, searchOpen: false }">


        <!-- ================= TOP BAR ================= -->
        {{-- <div :class="scrolled" class="hidden border-b bg-white text-sm md:block">

            <div class="mx-auto flex max-w-6xl items-center justify-between px-2 py-2 sm:px-6 lg:px-4">
                <!-- Left: Phone + Email -->
                <div class="flex items-center gap-4">
                    <span class="flex items-center gap-1">
                        <svg class="h-4 w-4 text-gray-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512">
                            <path
                                d="M391 480c-19.52 0-46.94-7.06-88-30-49.93-28-88.55-53.85-138.21-103.38C116.91 298.77 93.61 267.79 61 208.45c-36.84-67-30.56-102.12-23.54-117.13C45.82 73.38 58.16 62.65 74.11 52a176.3 176.3 0 0128.64-15.2c1-.43 1.93-.84 2.76-1.21 4.95-2.23 12.45-5.6 21.95-2 6.34 2.38 12 7.25 20.86 16 18.17 17.92 43 57.83 52.16 77.43 6.15 13.21 10.22 21.93 10.23 31.71 0 11.45-5.76 20.28-12.75 29.81-1.31 1.79-2.61 3.5-3.87 5.16-7.61 10-9.28 12.89-8.18 18.05 2.23 10.37 18.86 41.24 46.19 68.51s57.31 42.85 67.72 45.07c5.38 1.15 8.33-.59 18.65-8.47 1.48-1.13 3-2.3 4.59-3.47 10.66-7.93 19.08-13.54 30.26-13.54h.06c9.73 0 18.06 4.22 31.86 11.18 18 9.08 59.11 33.59 77.14 51.78 8.77 8.84 13.66 14.48 16.05 20.81 3.6 9.53.21 17-2 22-.37.83-.78 1.74-1.21 2.75a176.49 176.49 0 01-15.29 28.58c-10.63 15.9-21.4 28.21-39.38 36.58A67.42 67.42 0 01391 480z" />
                        </svg>
                        {{ $settings->phone }}
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18a2 2 0 002 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                        {{ $settings->email }}
                    </span>
                </div>

                <!-- Center: Site Name -->
                <div
                    class="absolute left-1/2 -translate-x-1/2 transform text-sm font-semibold text-teal-600 sm:text-base">
                    {{ __("messages.rcb") }}
                </div>

                <!-- Right: Language + Social -->
                <div class="flex items-center gap-3">
                    <div class="flex overflow-hidden rounded-full border border-teal-500">
                        <!-- ENG -->
                        <button onclick="window.location='{{ route("locale.switch", "en") }}'"
                            class="{{ app()->getLocale() === "en" ? "bg-teal-500 text-white" : "text-black bg-white" }} px-2 py-1 text-xs font-semibold">
                            ENG
                        </button>

                        <!-- BAN -->
                        <button onclick="window.location='{{ route("locale.switch", "bn") }}'"
                            class="{{ app()->getLocale() === "bn" ? "bg-teal-500 text-white" : "text-black bg-white" }} px-2 py-1 text-xs font-semibold">
                            BAN
                        </button>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex gap-2">
                        <!-- Facebook -->
                        <a href="{{ $settings->facebook }}" target="_blank" class="text-teal-600 hover:opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V12h2.6l-.4 3h-2.2v7A10 10 0 0 0 22 12z" />
                            </svg>
                        </a>
                        <!-- Twitter -->
                        <a href="{{ $settings->twitter }}" target="_blank" class="text-sky-400 hover:opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3 4.3 0 0 0 1.88-2.37 8.59 8.59 0 0 1-2.72 1.04 4.28 4.28 0 0 0-7.29 3.9A12.14 12.14 0 0 1 3.16 4.9a4.28 4.28 0 0 0 1.33 5.7A4.24 4.24 0 0 1 2.8 10v.05a4.28 4.28 0 0 0 3.44 4.19 4.28 4.28 0 0 1-1.92.07 4.28 4.28 0 0 0 4 2.97A8.58 8.58 0 0 1 2 19.54 12.09 12.09 0 0 0 8.29 21c7.55 0 11.68-6.26 11.68-11.68 0-.18-.01-.36-.02-.54A8.36 8.36 0 0 0 22.46 6z" />
                            </svg>
                        </a>
                        <!-- Instagram -->
                        <a href="{{ $settings->instagram }}" target="_blank" class="text-pink-500 hover:opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.3A4.7 4.7 0 1 0 16.7 12 4.7 4.7 0 0 0 12 7.3zm0 7.7A3 3 0 1 1 15 12a3 3 0 0 1-3 3zm4.8-7.9a1.1 1.1 0 1 1-1.1-1.1c.6 0 1.1.5 1.1 1.1z" />
                            </svg>
                        </a>
                        <!-- YouTube -->
                        <a href="{{ $settings->youtube }}" target="_blank" class="text-red-600 hover:opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M10 15l5.19-3L10 9v6zm12-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        <div :class="scrolled"
            class="hidden border-b border-white/30 bg-white/70 text-sm backdrop-blur-xl md:block">

            <div class="relative mx-auto flex max-w-6xl items-center justify-between px-2 py-2 sm:px-6 lg:px-4">

                <!-- Left: Phone + Email -->
                <div class="flex items-center gap-5 text-gray-600">

                    <!-- Phone -->
                    <span class="group flex items-center gap-2 transition hover:text-teal-600">
                        <svg class="h-4 w-4 text-gray-500 group-hover:text-teal-600" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M391 480c-19.52 0-46.94-7.06-88-30-49.93-28-88.55-53.85-138.21-103.38C116.91 298.77 93.61 267.79 61 208.45c-36.84-67-30.56-102.12-23.54-117.13C45.82 73.38 58.16 62.65 74.11 52a176.3 176.3 0 0128.64-15.2c1-.43 1.93-.84 2.76-1.21 4.95-2.23 12.45-5.6 21.95-2 6.34 2.38 12 7.25 20.86 16 18.17 17.92 43 57.83 52.16 77.43 6.15 13.21 10.22 21.93 10.23 31.71 0 11.45-5.76 20.28-12.75 29.81-1.31 1.79-2.61 3.5-3.87 5.16-7.61 10-9.28 12.89-8.18 18.05 2.23 10.37 18.86 41.24 46.19 68.51s57.31 42.85 67.72 45.07c5.38 1.15 8.33-.59 18.65-8.47 1.48-1.13 3-2.3 4.59-3.47 10.66-7.93 19.08-13.54 30.26-13.54h.06c9.73 0 18.06 4.22 31.86 11.18 18 9.08 59.11 33.59 77.14 51.78 8.77 8.84 13.66 14.48 16.05 20.81 3.6 9.53.21 17-2 22-.37.83-.78 1.74-1.21 2.75a176.49 176.49 0 01-15.29 28.58c-10.63 15.9-21.4 28.21-39.38 36.58A67.42 67.42 0 01391 480z" />
                        </svg>
                        <span class="font-medium">{{ $settings->phone }}</span>
                    </span>

                    <!-- Divider -->
                    <span class="h-4 w-px bg-gray-300/70"></span>

                    <!-- Email -->
                    <span class="group flex items-center gap-2 transition hover:text-teal-600">
                        <svg class="h-4 w-4 text-gray-500 group-hover:text-teal-600" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18a2 2 0 002 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                        <span class="font-medium">{{ $settings->email }}</span>
                    </span>
                </div>

                <!-- Center: Brand -->
                <div
                    class="absolute left-1/2 -translate-x-1/2 transform select-none text-sm font-extrabold tracking-[0.25em] text-teal-600 sm:text-base">
                    {{ __("messages.rcb") }}
                </div>

                <!-- Right: Language + Social -->
                <div class="flex items-center gap-4">

                    <!-- Language Switch -->
                    <div
                        class="flex overflow-hidden rounded-full border border-teal-500/70 bg-white/80 shadow-sm backdrop-blur">
                        <button onclick="window.location='{{ route("locale.switch", "en") }}'"
                            class="{{ app()->getLocale() === "en" ? "bg-gradient-to-r from-teal-500 to-emerald-500 text-white" : "text-gray-700" }} px-3 py-1 text-xs font-bold transition hover:bg-teal-50">
                            ENG
                        </button>
                        <button onclick="window.location='{{ route("locale.switch", "bn") }}'"
                            class="{{ app()->getLocale() === "bn" ? "bg-gradient-to-r from-teal-500 to-emerald-500 text-white" : "text-gray-700" }} px-3 py-1 text-xs font-bold transition hover:bg-teal-50">
                            BAN
                        </button>
                    </div>

                    <!-- Social Icons -->
                    <div class="flex items-center gap-2">
                        <a href="{{ $settings->facebook }}" target="_blank"
                            class="rounded-full bg-white/70 p-1.5 text-teal-600 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                            <!-- FB -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2V12h2.6l-.4 3h-2.2v7A10 10 0 0 0 22 12z" />
                            </svg>
                        </a>

                        <a href="{{ $settings->twitter }}" target="_blank"
                            class="rounded-full bg-white/70 p-1.5 text-sky-400 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                            <!-- X -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3 4.3 0 0 0 1.88-2.37 8.59 8.59 0 0 1-2.72 1.04 4.28 4.28 0 0 0-7.29 3.9A12.14 12.14 0 0 1 3.16 4.9a4.28 4.28 0 0 0 1.33 5.7A4.24 4.24 0 0 1 2.8 10v.05a4.28 4.28 0 0 0 3.44 4.19 4.28 4.28 0 0 1-1.92.07 4.28 4.28 0 0 0 4 2.97A8.58 8.58 0 0 1 2 19.54 12.09 12.09 0 0 0 8.29 21c7.55 0 11.68-6.26 11.68-11.68 0-.18-.01-.36-.02-.54A8.36 8.36 0 0 0 22.46 6z" />
                            </svg>
                        </a>

                        <a href="{{ $settings->instagram }}" target="_blank"
                            class="rounded-full bg-white/70 p-1.5 text-pink-500 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                            <!-- IG -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3.3A4.7 4.7 0 1 0 16.7 12 4.7 4.7 0 0 0 12 7.3zm0 7.7A3 3 0 1 1 15 12a3 3 0 0 1-3 3zm4.8-7.9a1.1 1.1 0 1 1-1.1-1.1c.6 0 1.1.5 1.1 1.1z" />
                            </svg>
                        </a>

                        <a href="{{ $settings->youtube }}" target="_blank"
                            class="rounded-full bg-white/70 p-1.5 text-red-600 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                            <!-- YT -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M10 15l5.19-3L10 9v6zm12-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- ================= MAIN HEADER ================= -->
        {{-- <div :class="scrolled" class="bg-white">
            <div class="mx-auto hidden max-w-6xl items-center justify-between px-2 pb-2 pt-2 sm:px-6 lg:flex lg:px-4">
                <!-- Left: Logo -->
                <div>
                    <a href="{{ route("frontend.home-page") }}">
                        <img src="{{ asset(@$settings->siteLogo?->path ?? "rcb-logo.jpeg") }}"
                            alt="{{ $settings->site_name }}" class="object-fit h-full w-36" />
                    </a>
                </div>

                <!-- Center: Search -->
                <div class="flex-1 px-6" x-data="{ open: @entangle("query").defer.length > 0 }">
                    <div class="relative mx-auto w-full max-w-xl">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 transform text-gray-400"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>

                        <input type="search" wire:model.live.debounce.300ms="query"
                            placeholder="Are you looking for a player?"
                            class="w-full rounded-full border border-gray-200 py-2.5 pl-11 pr-4 text-sm text-gray-700 transition duration-300 ease-in-out focus:border-teal-500 focus:outline-none focus:ring-transparent" />

                        <!-- Results Dropdown -->
                        @if (!empty($query))
                            <div
                                class="absolute z-50 mt-2 max-h-64 w-full divide-y divide-gray-100 overflow-y-auto rounded-md border border-gray-200 bg-white shadow-lg">
                                @forelse($players as $player)
                                    <a href="{{ route("frontend.profile", $player->slug) }}"
                                        class="flex items-center gap-3 px-4 py-3 transition hover:bg-teal-50">
                                        <!-- Player Image -->
                                        <div class="aspect-square w-14">
                                            <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                                alt="{{ $player->first_name_en }}"
                                                class="h-full w-full rounded-full border border-gray-200 object-contain" />
                                        </div>

                                        <!-- Player Info -->
                                        <div class="min-w-0 flex-1">
                                            <p class="truncate text-sm font-medium text-gray-900">
                                                {{ $player->first_name_en }}
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                {{ $player->playing_role ?? "N/A" }}
                                            </p>
                                        </div>
                                    </a>
                                @empty
                                    <div class="px-4 py-3 text-sm italic text-red-500">No players found</div>
                                @endforelse
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right: Register -->
                <div>
                    <a href="{{ route("frontend.player-registration") }}"
                        class="flex items-center gap-2 rounded-md bg-gradient-to-r from-teal-500 to-teal-700 px-3 py-2 font-medium text-white shadow transition-colors hover:opacity-90">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M11.105 18.79l-1 .992a4.159 4.159 0 0 1 -6.038 -5.715l.157 -.166l8.282 -8.401l1.5 1.5l3.45 -3.391a2.08 2.08 0 0 1 3.057 2.815l-.116 .126l-3.391 3.45l1.5 1.5l-3.668 3.617" />
                            <path d="M10.5 7.5l6 6" />
                            <path d="M14 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        </svg>
                        BE A PLAYER
                    </a>
                </div>
            </div>
        </div> --}}
        <div :class="scrolled"
            class="relative z-50 overflow-visible border-b border-white/30 bg-white/70 backdrop-blur-xl">
            <div class="mx-auto hidden max-w-6xl items-center justify-between px-2 pb-3 pt-3 sm:px-6 lg:flex lg:px-4">

                <!-- Left: Logo -->
                <div class="flex items-center">
                    <a href="{{ route("frontend.home-page") }}" class="group flex items-center gap-2">
                        <img src="{{ asset(@$settings->siteLogo?->path ?? "rcb-logo.jpeg") }}"
                            alt="{{ $settings->site_name }}"
                            class="object-fit h-10 w-auto transition group-hover:scale-105" />
                    </a>
                </div>

                <!-- Center: Search -->
                <div class="flex-1 px-8" x-data="{ open: @entangle("query").defer.length > 0 }">
                    <div class="relative mx-auto w-full max-w-xl">

                        <!-- Search Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>

                        <!-- Input -->
                        <input type="search" wire:model.live.debounce.300ms="query"
                            placeholder="Search players..."
                            class="w-full rounded-full border border-gray-200 bg-white/90 py-3 pl-11 pr-4 text-sm text-gray-700 shadow-sm transition duration-300 focus:border-teal-500 focus:outline-none" />

                        <!-- Results -->
                        @if (!empty($query))
                            <div
                                class="absolute z-50 mt-3 max-h-72 w-full overflow-y-auto rounded-2xl border border-gray-200 bg-white shadow-2xl backdrop-blur-md">

                                @forelse($players as $player)
                                    <a href="{{ route("frontend.profile", $player->slug) }}"
                                        class="group flex items-center gap-4 px-4 py-3 transition hover:bg-teal-50">
                                        <!-- Avatar -->
                                        <div class="aspect-square w-14">
                                            <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                                alt="{{ $player->first_name_en }}"
                                                class="h-full w-full rounded-full border border-gray-200 object-contain" />
                                        </div>

                                        <!-- Info -->
                                        <div class="min-w-0 flex-1">
                                            <p class="truncate text-sm font-semibold text-gray-800">
                                                {{ $player->first_name_en }}
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                {{ $player->playing_role ?? "N/A" }}
                                            </p>
                                        </div>

                                        <!-- Arrow -->
                                        <svg class="h-4 w-4 text-gray-400 group-hover:text-teal-500"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                @empty
                                    <div class="px-4 py-4 text-center text-sm italic text-gray-500">
                                        No players found
                                    </div>
                                @endforelse
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right: CTA -->
                <div class="flex items-center">
                    <a href="{{ route("frontend.player-registration") }}"
                        class="group inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-teal-500 to-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-lg transition hover:scale-105 hover:shadow-xl">

                        <svg class="h-5 w-5 transition group-hover:rotate-12" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M11.105 18.79l-1 .992a4.159 4.159 0 0 1 -6.038 -5.715l.157 -.166l8.282 -8.401l1.5 1.5l3.45 -3.391a2.08 2.08 0 0 1 3.057 2.815l-.116 .126l-3.391 3.45l1.5 1.5l-3.668 3.617" />
                            <path d="M10.5 7.5l6 6" />
                            <path d="M14 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        </svg>

                        BE A PLAYER
                    </a>
                </div>
            </div>
        </div>


        <!-- ================= Inital Navbar ================= -->
        {{-- <nav :class="scrolled ? 'hidden' : 'block'" class="hidden bg-teal-500 lg:block">
            <div class="mx-auto px-4 sm:px-6 lg:px-11">
                <ul class="flex justify-center space-x-10 py-2.5 text-base font-medium text-white">
                    <li>
                        <a href="{{ route("frontend.home-page") }}"
                            class="{{ request()->routeIs("frontend.home-page") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.home") }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route("frontend.about") }}"
                            class="{{ request()->routeIs("frontend.about") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.about") }}
                        </a>
                    </li>

                    <!-- Gallery Dropdown -->
                    <li x-data="{ open: false }" class="relative" @mouseenter="open = true"
                        @mouseleave="open = false" @click.outside="open = false">
                        <button class="flex items-center gap-2 hover:text-yellow-400 focus:outline-none"
                            @click="open = !open">
                            {{ __("messages.gallery") }}
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Hover bridge -->
                        <div x-show="open" class="absolute left-0 top-full h-3 w-full"></div>

                        <div x-show="open" x-transition.origin.top.left
                            class="absolute left-0 z-20 mt-2 w-40 border border-teal-500 bg-teal-500 text-sm shadow-sm"
                            x-cloak>
                            <div class="flex flex-col divide-y divide-teal-400">
                                <a href="{{ route("frontend.photo.gallery") }}"
                                    class="block px-4 py-2 text-white hover:text-yellow-400">
                                    {{ __("messages.photo_gallery") }}
                                </a>
                                <a href="{{ route("frontend.video.gallery") }}"
                                    class="block px-4 py-2 text-white hover:text-yellow-400">
                                    {{ __("messages.video_gallery") }}
                                </a>
                            </div>
                        </div>
                    </li>


                    <!-- Other Links -->
                    <li>
                        <a href="{{ route("frontend.news") }}"
                            class="{{ request()->routeIs("frontend.news") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.news") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.fixture") }}"
                            class="{{ request()->routeIs("frontend.fixture") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.fixtures") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.player") }}"
                            class="{{ request()->routeIs("frontend.player") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.player") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.records") }}"
                            class="{{ request()->routeIs("frontend.records") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.records") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.contact-us") }}"
                            class="{{ request()->routeIs("frontend.contact-us") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.contact") }}
                        </a>
                    </li>
                </ul>
            </div>
        </nav> --}}
        <nav :class="scrolled ? 'hidden' : 'block'"
            class="relative isolate z-10 hidden bg-gradient-to-r from-teal-600 via-teal-500 to-teal-600 shadow-lg shadow-teal-900/20 lg:block">

            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <ul class="flex items-center justify-center gap-10 py-2 text-[15px] font-medium text-white">

                    <!-- Nav Item -->
                    <li>
                        <a href="{{ route("frontend.home-page") }}"
                            class="{{ request()->routeIs("frontend.home-page") ? "text-yellow-400" : "hover:text-yellow-300" }} group relative transition-all duration-300">
                            {{ __("messages.home") }}

                            <!-- Active / Hover underline -->
                            <span
                                class="{{ request()->routeIs("frontend.home-page") ? "scale-x-100" : "" }} absolute -bottom-1 left-0 h-[2px] w-full scale-x-0 bg-yellow-400 transition-transform duration-300 group-hover:scale-x-100">
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route("frontend.about") }}"
                            class="{{ request()->routeIs("frontend.about") ? "text-yellow-400" : "hover:text-yellow-300" }} group relative transition-all duration-300">
                            {{ __("messages.about") }}
                            <span
                                class="{{ request()->routeIs("frontend.about") ? "scale-x-100" : "" }} absolute -bottom-1 left-0 h-[2px] w-full scale-x-0 bg-yellow-400 transition-transform duration-300 group-hover:scale-x-100">
                            </span>
                        </a>
                    </li>

                    <!-- Gallery Dropdown -->
                    <li x-data="{ open: false }" class="relative" @mouseenter="open = true"
                        @mouseleave="open = false">

                        <!-- Parent -->
                        <button
                            class="flex items-center gap-2 py-2 transition-all duration-300 hover:text-yellow-300 focus:outline-none">
                            {{ __("messages.gallery") }}

                            <svg class="h-4 w-4 transition-transform duration-300"
                                :class="open ? 'rotate-180 text-yellow-300' : ''" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Attached Dropdown -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1" x-cloak
                            class="absolute left-0 top-full z-[999] w-48 overflow-hidden rounded-b-xl border border-t-0 border-white/20 bg-white/95 text-gray-800 shadow-xl backdrop-blur-xl">

                            <div class="flex flex-col divide-y divide-gray-100">
                                <a href="{{ route("frontend.photo.gallery") }}"
                                    class="px-5 py-3 text-sm font-medium transition hover:bg-teal-50 hover:text-teal-600">
                                    {{ __("messages.photo_gallery") }}
                                </a>

                                <a href="{{ route("frontend.video.gallery") }}"
                                    class="px-5 py-3 text-sm font-medium transition hover:bg-teal-50 hover:text-teal-600">
                                    {{ __("messages.video_gallery") }}
                                </a>
                            </div>
                        </div>
                    </li>


                    <!-- Other Links -->
                    @foreach ([
        "frontend.news" => __("messages.news"),
        "frontend.fixture" => __("messages.fixtures"),
        "frontend.player" => __("messages.player"),
        "frontend.teams" => __("messages.teams"),
        "frontend.records" => __("messages.records"),
        "frontend.contact-us" => __("messages.contact")
    ] as $route => $label)
                        <li>
                            <a href="{{ route($route) }}"
                                class="{{ request()->routeIs($route) ? "text-yellow-400" : "hover:text-yellow-300" }} group relative transition-all duration-300">
                                {{ $label }}

                                <span
                                    class="{{ request()->routeIs($route) ? "scale-x-100" : "" }} absolute -bottom-1 left-0 h-[2px] w-full scale-x-0 bg-yellow-400 transition-transform duration-300 group-hover:scale-x-100">
                                </span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </nav>


        <!-- ================= Sticky NAVBAR ================= -->
        <nav x-cloak x-show="showSticky" x-transition:enter="transition transform duration-500 ease-out"
            x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition transform duration-0 ease-in"
            x-transition:leave-start="translate-y-0 opacity-0" x-transition:leave-end="-translate-y-full opacity-0"
            class="fixed left-0 right-0 top-0 z-50 hidden bg-teal-500 shadow-lg lg:block" style="display: none;">

            {{-- <div class="mx-auto px-4 sm:px-6 lg:px-11">
                <ul class="flex justify-center space-x-10 py-2.5 text-base font-medium text-white">
                    <li>
                        <a href="{{ route("frontend.home-page") }}"
                            class="{{ request()->routeIs("frontend.home-page") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.home") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.about") }}"
                            class="{{ request()->routeIs("frontend.about") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.about") }}
                        </a>
                    </li>

                    <!-- Gallery Dropdown -->
                    <li x-data="{ open: false }" class="relative" @mouseenter="open = true"
                        @mouseleave="open = false" @click.outside="open = false">
                        <button class="flex items-center gap-2 hover:text-yellow-400 focus:outline-none"
                            @click="open = !open">
                            {{ __("messages.gallery") }}
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Hover bridge -->
                        <div x-show="open" class="absolute left-0 top-full h-3 w-full"></div>

                        <div x-show="open" x-transition.origin.top.left
                            class="absolute left-0 z-20 mt-2 w-40 border border-teal-500 bg-teal-500 text-sm shadow-sm"
                            x-cloak>
                            <div class="flex flex-col divide-y divide-teal-400">
                                <a href="{{ route("frontend.photo.gallery") }}"
                                    class="block px-4 py-2 text-white hover:text-yellow-400">
                                    {{ __("messages.photo_gallery") }}
                                </a>
                                <a href="{{ route("frontend.video.gallery") }}"
                                    class="block px-4 py-2 text-white hover:text-yellow-400">
                                    {{ __("messages.video_gallery") }}
                                </a>
                            </div>
                        </div>
                    </li>

                    <!-- Other Links -->
                    <li>
                        <a href="{{ route("frontend.news") }}"
                            class="{{ request()->routeIs("frontend.news") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.news") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.fixture") }}"
                            class="{{ request()->routeIs("frontend.fixture") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.fixtures") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.player") }}"
                            class="{{ request()->routeIs("frontend.player") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.player") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.records") }}"
                            class="{{ request()->routeIs("frontend.records") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.records") }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route("frontend.contact-us") }}"
                            class="{{ request()->routeIs("frontend.contact-us") ? "text-yellow-400 border-b-2 border-yellow-400 pb-1" : "hover:text-yellow-400" }}">
                            {{ __("messages.contact") }}
                        </a>
                    </li>
                </ul>
            </div> --}}
            <div class="mx-auto max-w-7xl px-6 lg:px-12">
                <ul class="flex items-center justify-center gap-10 py-2 text-[15px] font-medium text-white">

                    <!-- Nav Item -->
                    <li>
                        <a href="{{ route("frontend.home-page") }}"
                            class="{{ request()->routeIs("frontend.home-page") ? "text-yellow-400" : "hover:text-yellow-300" }} group relative transition-all duration-300">
                            {{ __("messages.home") }}

                            <!-- Active / Hover underline -->
                            <span
                                class="{{ request()->routeIs("frontend.home-page") ? "scale-x-100" : "" }} absolute -bottom-1 left-0 h-[2px] w-full scale-x-0 bg-yellow-400 transition-transform duration-300 group-hover:scale-x-100">
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route("frontend.about") }}"
                            class="{{ request()->routeIs("frontend.about") ? "text-yellow-400" : "hover:text-yellow-300" }} group relative transition-all duration-300">
                            {{ __("messages.about") }}
                            <span
                                class="{{ request()->routeIs("frontend.about") ? "scale-x-100" : "" }} absolute -bottom-1 left-0 h-[2px] w-full scale-x-0 bg-yellow-400 transition-transform duration-300 group-hover:scale-x-100">
                            </span>
                        </a>
                    </li>

                    <!-- Gallery Dropdown -->
                    <li x-data="{ open: false }" class="relative" @mouseenter="open = true"
                        @mouseleave="open = false">

                        <!-- Parent -->
                        <button
                            class="flex items-center gap-2 py-2 transition-all duration-300 hover:text-yellow-300 focus:outline-none">
                            {{ __("messages.gallery") }}

                            <svg class="h-4 w-4 transition-transform duration-300"
                                :class="open ? 'rotate-180 text-yellow-300' : ''" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Attached Dropdown -->
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1" x-cloak
                            class="absolute left-0 top-full z-[999] w-48 overflow-hidden rounded-b-xl border border-t-0 border-white/20 bg-white/95 text-gray-800 shadow-xl backdrop-blur-xl">

                            <div class="flex flex-col divide-y divide-gray-100">
                                <a href="{{ route("frontend.photo.gallery") }}"
                                    class="px-5 py-3 text-sm font-medium transition hover:bg-teal-50 hover:text-teal-600">
                                    {{ __("messages.photo_gallery") }}
                                </a>

                                <a href="{{ route("frontend.video.gallery") }}"
                                    class="px-5 py-3 text-sm font-medium transition hover:bg-teal-50 hover:text-teal-600">
                                    {{ __("messages.video_gallery") }}
                                </a>
                            </div>
                        </div>
                    </li>


                    <!-- Other Links -->
                    @foreach ([
        "frontend.news" => __("messages.news"),
        "frontend.fixture" => __("messages.fixtures"),
        "frontend.player" => __("messages.player"),
        "frontend.teams" => __("messages.teams"),
        "frontend.records" => __("messages.records"),
        "frontend.contact-us" => __("messages.contact")
    ] as $route => $label)
                        <li>
                            <a href="{{ route($route) }}"
                                class="{{ request()->routeIs($route) ? "text-yellow-400" : "hover:text-yellow-300" }} group relative transition-all duration-300">
                                {{ $label }}

                                <span
                                    class="{{ request()->routeIs($route) ? "scale-x-100" : "" }} absolute -bottom-1 left-0 h-[2px] w-full scale-x-0 bg-yellow-400 transition-transform duration-300 group-hover:scale-x-100">
                                </span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </nav>

        <!-- ================== COMPACT MEDIUM HEADER (md only) ================== -->
        {{-- <div class="fixed left-0 right-0 top-0 z-50 bg-white shadow lg:hidden">
            <div class="flex items-center justify-between px-4 py-3">
                <!-- Left: Hamburger + Logo -->
                <div class="flex items-center gap-3">
                    <!-- Hamburger -->
                    <button @click="open = true" class="text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <!-- Logo -->
                    <div>
                        <a href="{{ route("frontend.home-page") }}">
                            <img src="{{ asset(@$settings->siteLogo?->path ?? "rcb-logo.jpeg") }}"
                                alt="{{ $settings->site_name }}" class="object-fit h-full w-32">
                        </a>
                    </div>
                </div>

                <!-- Right: Language + Search -->
                <div class="flex items-center gap-2">
                    <div class="flex overflow-hidden rounded-full border border-teal-500">
                        <!-- ENG -->
                        <button onclick="window.location='{{ route("locale.switch", "en") }}'"
                            class="{{ app()->getLocale() === "en" ? "bg-teal-500 text-white" : "text-black bg-white" }} px-2 py-1 text-xs font-semibold">
                            ENG
                        </button>

                        <!-- BAN -->
                        <button onclick="window.location='{{ route("locale.switch", "bn") }}'"
                            class="{{ app()->getLocale() === "bn" ? "bg-teal-500 text-white" : "text-black bg-white" }} px-2 py-1 text-xs font-semibold">
                            BAN
                        </button>
                    </div>

                    <!-- Search Icon -->
                    <button type="button" @click="searchOpen = true" class="ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                    </button>
                </div>

            </div>
        </div> --}}
        <div
            class="fixed inset-x-0 top-0 z-50 border-b border-white/30 bg-white/80 shadow-lg backdrop-blur-xl lg:hidden">

            <div class="flex items-center justify-between px-4 py-3">

                <!-- Left: Hamburger + Logo -->
                <div class="flex items-center gap-3">

                    <!-- Hamburger -->
                    <button @click="open = true"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-gray-700 transition hover:bg-teal-50 hover:text-teal-600 active:scale-95">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Logo -->
                    <a href="{{ route("frontend.home-page") }}" class="group flex items-center">
                        <img src="{{ asset(@$settings->siteLogo?->path ?? "rcb-logo.jpeg") }}"
                            alt="{{ $settings->site_name }}" class="h-8 w-auto transition group-hover:scale-105" />
                    </a>
                </div>

                <!-- Right: Language + Search -->
                <div class="flex items-center gap-2">

                    <!-- Language Switch -->
                    <div class="flex overflow-hidden rounded-full border border-teal-500 bg-white shadow-sm">

                        <button onclick="window.location='{{ route("locale.switch", "en") }}'"
                            class="{{ app()->getLocale() === "en" ? "bg-teal-500 text-white" : "text-gray-700 hover:bg-teal-50" }} px-3 py-1 text-xs font-semibold transition">
                            ENG
                        </button>

                        <button onclick="window.location='{{ route("locale.switch", "bn") }}'"
                            class="{{ app()->getLocale() === "bn" ? "bg-teal-500 text-white" : "text-gray-700 hover:bg-teal-50" }} px-3 py-1 text-xs font-semibold transition">
                            BAN
                        </button>
                    </div>

                    <!-- Search Button -->
                    <button type="button" @click="searchOpen = true"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-100 text-gray-700 transition hover:bg-teal-50 hover:text-teal-600 active:scale-95">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                    </button>

                </div>

            </div>
        </div>

        <!-- ================== MOBILE MENU (sm & md) ================== -->
        {{-- <div class="block lg:hidden">
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform -translate-x-full"
                x-transition:enter-end="transform translate-x-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="transform translate-x-0"
                x-transition:leave-end="transform -translate-x-full"
                class="fixed left-0 top-0 z-50 h-full w-56 bg-white text-sm shadow-lg" style="display: none">

                <!-- Top -->
                <a href="{{ route("frontend.home-page") }}">
                    <div class="flex flex-col px-4 py-4">
                        <div class="text-3xl font-bold text-teal-600 lg:text-4xl">RCB</div>
                        <span class="text-sm font-medium text-gray-500">REAL CHALLENGER BOYS</span>
                    </div>
                </a>

                <!-- Close Button -->
                <button @click="open = false" class="absolute -right-4 top-4 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 rounded-full bg-teal-600 p-1 text-white shadow-md" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Menu Links -->
                <nav class="mt-4 space-y-2">
                    <a href="{{ route("frontend.home-page") }}"
                        class="block px-4 py-2 uppercase text-gray-800 hover:bg-teal-50">
                        {{ __("messages.home") }}
                    </a>
                    <a href="{{ route("frontend.about") }}"
                        class="block px-4 py-2 uppercase text-gray-800 hover:bg-teal-50">
                        {{ __("messages.about") }}
                    </a>
                    <!-- Gallery Dropdown -->
                    <div x-data="{ galleryOpen: false }">
                        <div @click="galleryOpen = !galleryOpen"
                            class="flex cursor-pointer select-none items-center justify-between px-4 py-2 uppercase text-gray-800 hover:bg-teal-50"
                            :aria-expanded="galleryOpen.toString()" role="button">
                            <span>{{ __("messages.gallery") }}</span>

                            <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-45': galleryOpen }"
                                class="h-5 w-5 transition-transform duration-300" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </div>

                        <div x-show="galleryOpen" y-transition x-cloak class="space-y-1 pl-4">
                            <a href="{{ route("frontend.photo.gallery") }}"
                                class="block px-4 py-2 uppercase text-gray-700 hover:bg-teal-50">
                                {{ __("messages.photo_gallery") }}
                            </a>

                            <a href="{{ route("frontend.video.gallery") }}"
                                class="block px-4 py-2 uppercase text-gray-700 hover:bg-teal-50">
                                {{ __("messages.video_gallery") }}
                            </a>
                        </div>
                    </div>

                    <a href="{{ route("frontend.news") }}"
                        class="block px-4 py-2 uppercase text-gray-800 hover:bg-teal-50">
                        {{ __("messages.news") }}
                    </a>
                    <a href="{{ route("frontend.fixture") }}"
                        class="block px-4 py-2 uppercase text-gray-800 hover:bg-teal-50">
                        {{ __("messages.fixtures") }}
                    </a>
                    <a href="{{ route("frontend.team") }}"
                        class="block px-4 py-2 uppercase text-gray-800 hover:bg-teal-50">
                        {{ __("messages.team") }}
                    </a>
                    <a href="{{ route("frontend.records") }}"
                        class="block px-4 py-2 uppercase text-gray-800 hover:bg-teal-50">
                        {{ __("messages.records") }}
                    </a>
                    <a href="{{ route("frontend.contact-us") }}"
                        class="block px-4 py-2 uppercase text-gray-800 hover:bg-teal-50">
                        {{ __("messages.contact") }}
                    </a>
                </nav>
                <div class="mt-9 flex items-center justify-center">
                    <a href="{{ route("frontend.player-registration") }}"
                        class="flex w-36 items-center justify-center gap-2 rounded-md bg-gradient-to-r from-teal-500 to-teal-700 px-3 py-2.5 text-sm font-medium text-white shadow transition-colors hover:opacity-90">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M11.105 18.79l-1 .992a4.159 4.159 0 0 1 -6.038 -5.715l.157 -.166l8.282 -8.401l1.5 1.5l3.45 -3.391a2.08 2.08 0 0 1 3.057 2.815l-.116 .126l-3.391 3.45l1.5 1.5l-3.668 3.617" />
                            <path d="M10.5 7.5l6 6" />
                            <path d="M14 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        </svg>
                        BE A PLAYER
                    </a>
                </div>
            </div>
        </div> --}}

        <div class="block lg:hidden">
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="-translate-x-full opacity-0"
                x-transition:enter-end="translate-x-0 opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-x-0 opacity-100"
                x-transition:leave-end="-translate-x-full opacity-0"
                class="fixed inset-y-0 left-0 z-50 w-72 bg-white/90 shadow-2xl backdrop-blur-xl" x-cloak>

                <!-- Header -->
                <div class="relative border-b border-gray-200 px-6 py-6">
                    <a href="{{ route("frontend.home-page") }}">
                        <div class="text-3xl font-extrabold tracking-wide text-teal-600">
                            RCB
                        </div>
                        <span class="mt-1 block text-xs font-semibold tracking-widest text-gray-500">
                            REAL CHALLENGER BOYS
                        </span>
                    </a>

                    <!-- Close -->
                    <button @click="open = false"
                        class="absolute right-4 top-4 rounded-full bg-teal-600 p-2 text-white shadow-lg transition hover:scale-105">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Menu -->
                <nav class="space-y-1 px-4 py-4 text-[13px] font-semibold uppercase tracking-wide">

                    @php
                        $linkClass =
                            "block rounded-lg px-4 py-3 text-gray-800 transition hover:bg-teal-50 hover:text-teal-600";
                    @endphp

                    <a href="{{ route("frontend.home-page") }}" class="{{ $linkClass }}">
                        {{ __("messages.home") }}
                    </a>

                    <a href="{{ route("frontend.about") }}" class="{{ $linkClass }}">
                        {{ __("messages.about") }}
                    </a>

                    <!-- Gallery -->
                    <div x-data="{ galleryOpen: false }" class="rounded-lg">
                        <button @click="galleryOpen = !galleryOpen"
                            class="flex w-full items-center justify-between rounded-lg px-4 py-3 text-gray-800 transition hover:bg-teal-50 hover:text-teal-600">

                            <span>{{ __("messages.gallery") }}</span>

                            <svg class="h-4 w-4 transition-transform duration-300"
                                :class="galleryOpen ? 'rotate-180 text-teal-600' : ''" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="galleryOpen" y-transition x-cloak class="mt-1 space-y-1 pl-3">

                            <a href="{{ route("frontend.photo.gallery") }}"
                                class="block rounded-lg px-4 py-2 text-xs text-gray-600 transition hover:bg-teal-50 hover:text-teal-600">
                                {{ __("messages.photo_gallery") }}
                            </a>

                            <a href="{{ route("frontend.video.gallery") }}"
                                class="block rounded-lg px-4 py-2 text-xs text-gray-600 transition hover:bg-teal-50 hover:text-teal-600">
                                {{ __("messages.video_gallery") }}
                            </a>
                        </div>
                    </div>

                    <a href="{{ route("frontend.news") }}" class="{{ $linkClass }}">
                        {{ __("messages.news") }}
                    </a>

                    <a href="{{ route("frontend.fixture") }}" class="{{ $linkClass }}">
                        {{ __("messages.fixtures") }}
                    </a>

                    <a href="{{ route("frontend.player") }}" class="{{ $linkClass }}">
                        {{ __("messages.player") }}
                    </a>

                    <a href="{{ route("frontend.teams") }}" class="{{ $linkClass }}">
                        {{ __("messages.teams") }}
                    </a>

                    <a href="{{ route("frontend.records") }}" class="{{ $linkClass }}">
                        {{ __("messages.records") }}
                    </a>

                    <a href="{{ route("frontend.contact-us") }}" class="{{ $linkClass }}">
                        {{ __("messages.contact") }}
                    </a>
                </nav>

                <!-- CTA -->
                <div class="absolute bottom-16 left-0 right-0 px-6">
                    <a href="{{ route("frontend.player-registration") }}"
                        class="flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-teal-500 to-teal-700 px-5 py-3 text-sm font-bold text-white shadow-xl transition hover:opacity-90">

                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.105 18.79l-1 .992a4.159 4.159 0 0 1 -6.038 -5.715l.157 -.166l8.282 -8.401l1.5 1.5l3.45 -3.391a2.08 2.08 0 0 1 3.057 2.815l-.116 .126l-3.391 3.45l1.5 1.5l-3.668 3.617" />
                            <path d="M10.5 7.5l6 6" />
                            <path d="M14 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        </svg>

                        BE A PLAYER
                    </a>
                </div>

            </div>
        </div>


        <!-- Search Overlay -->
        {{-- <div x-show="searchOpen" x-transition class="fixed inset-0 z-50 flex items-start justify-center bg-black/60"
            @keydown.escape.window="searchOpen = false" @click.self="searchOpen = false" style="display: none">

            <!-- Close Button -->
            <button @click="searchOpen = false"
                class="absolute right-4 top-4 flex h-10 w-10 items-center justify-center rounded-full bg-white text-red-600 shadow-lg transition hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- White Search Box -->
            <div class="relative mx-4 mt-20 w-full max-w-xl overflow-hidden rounded-lg bg-white shadow-lg">
                <!-- Search Input -->
                <div class="flex items-center border-b px-4 py-3">
                    <div class="relative w-full">
                        <!-- Icon -->
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                            </svg>
                        </span>

                        <!-- Input -->
                        <input type="text" wire:model.live="query" placeholder="Search players..."
                            class="w-full rounded-md border border-gray-200 py-2.5 pl-10 pr-3 text-sm text-gray-700 placeholder-gray-400 focus:border-teal-500 focus:outline-none focus:ring-0"
                            autofocus>
                    </div>
                </div>

                <!-- Search Results -->
                <div class="max-h-64 overflow-y-auto">
                    @if (!empty($query))
                        @forelse($players as $player)
                            <a href="{{ route("frontend.profile", $player->slug) }}"
                                class="flex items-center gap-3 px-4 py-2 transition hover:bg-teal-50">

                                <!-- Player Image -->
                                <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                    class="object-fit h-10 w-10 rounded-full border"
                                    alt="{{ $player->first_name_en }}">

                                <div class="aspect-square w-14">
                                    <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                        alt="{{ $player->first_name_en }}"
                                        class="h-full w-full rounded-full border border-gray-200 object-contain" />
                                </div>

                                <!-- Player Info -->
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-medium text-gray-900">
                                        {{ $player->first_name_en }}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        {{ $player->playing_role ?? "N/A" }}
                                    </p>
                                </div>
                            </a>
                        @empty
                            <div class="px-4 py-2 text-sm italic text-red-500">No players found...</div>
                        @endforelse
                    @endif
                </div>
            </div>
        </div> --}}
        <div x-show="searchOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-start justify-center bg-black/70 backdrop-blur-sm"
            @keydown.escape.window="searchOpen = false" @click.self="searchOpen = false" x-cloak>

            <!-- Close -->
            <button @click="searchOpen = false"
                class="absolute right-6 top-6 flex h-11 w-11 items-center justify-center rounded-full bg-white/90 text-gray-700 shadow-xl transition hover:scale-105 hover:bg-white">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Search Container -->
            <div
                class="relative mx-4 mt-24 w-full max-w-2xl overflow-hidden rounded-2xl bg-white/95 shadow-2xl backdrop-blur-xl">

                <!-- Search Bar -->
                <div class="border-b border-gray-200 px-6 py-5">
                    <div class="relative">

                        <!-- Icon -->
                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                            </svg>
                        </span>

                        <!-- Input -->
                        <input type="text" wire:model.live.debounce.300ms="query"
                            placeholder="Search players..." autofocus
                            class="w-full rounded-full border border-gray-200 bg-white py-3 pl-12 pr-4 text-sm text-gray-800 placeholder-gray-400 transition duration-300 focus:border-teal-500 focus:outline-none" />
                    </div>
                </div>

                <!-- Results -->
                <div class="max-h-[420px] overflow-y-auto">

                    @if (!empty($query))
                        @forelse($players as $player)
                            <a href="{{ route("frontend.profile", $player->slug) }}"
                                class="group flex items-center gap-4 px-6 py-4 transition hover:bg-teal-50">

                                <!-- Avatar -->
                                <div class="aspect-square w-14">
                                    <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                        alt="{{ $player->first_name_en }}"
                                        class="h-full w-full rounded-full border border-gray-200 object-contain" />
                                </div>

                                <!-- Info -->
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-gray-800">
                                        {{ $player->first_name_en }}
                                    </p>
                                    <p class="text-xs text-gray-500">
                                        {{ $player->playing_role ?? "N/A" }}
                                    </p>
                                </div>

                                <!-- Arrow -->
                                <svg class="h-4 w-4 text-gray-400 transition group-hover:translate-x-1 group-hover:text-teal-500"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        @empty
                            <div class="px-6 py-6 text-center text-sm italic text-gray-500">
                                No players found
                            </div>
                        @endforelse
                    @else
                        <div class="px-6 py-8 text-center text-sm text-gray-400">
                            Start typing to search players
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
    <!-- ================= SCRIPT ================= -->
    <script>
        function headerScroll() {
            return {
                scrolled: false, // hides initial nav
                showSticky: false, // controls display:none sticky nav

                init() {
                    window.addEventListener('scroll', () => {
                        const y = window.scrollY;

                        this.scrolled = y > 120;
                        this.showSticky = y > 120;
                    });
                }
            }
        }
    </script>

</div>
