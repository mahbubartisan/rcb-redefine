<div>
    <section class="mt-20 lg:mt-8">
        {{-- <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">

            <!-- Header -->
            <div class="mb-8 flex flex-col items-center justify-between md:flex-row">
                <h2 class="text-2xl font-bold uppercase text-gray-900 md:text-3xl">
                    {{ __("messages.team") }} / {{ __("messages.players") }}
                </h2>

                <!-- Filters -->
                <div class="mt-4 flex flex-wrap gap-3 md:mt-0">
                    @foreach (["Batsman", "Bowler", "All Rounder", "Wicket Keeper"] as $role)
                        <button wire:click="setFilter('{{ $role }}')"
                            class="{{ $filter === $role
                                ? "bg-teal-600 text-white border-teal-600"
                                : "border-teal-600 text-teal-600 hover:bg-teal-600 hover:text-white" }} rounded-full border px-4 py-1.5 text-sm transition">
                            {{ $role }}
                        </button>
                    @endforeach

                    <!-- Clear filter -->
                    @if ($filter)
                        <button wire:click="$set('filter', null)"
                            class="rounded-full border border-gray-400 px-4 py-1.5 text-sm text-gray-600 transition hover:bg-gray-200">
                            Clear
                        </button>
                    @endif
                </div>
            </div>

            <!-- Player Cards -->
            <div wire:loading.flex class="justify-center py-10">
                <div class="h-10 w-10 animate-spin rounded-full border-b-2 border-teal-600"></div>
            </div>

            <div wire:loading.remove class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @forelse ($players ?? [] as $player)
                    <div class="swiper-slide">
                        <div
                            class="bg-white/3 group relative h-80 overflow-hidden rounded-2xl border border-white/10 bg-cover bg-center bg-no-repeat backdrop-blur-sm">
                            <!-- Background image -->
                            <div class="absolute inset-0 bg-contain bg-center bg-no-repeat opacity-30"
                                style="background-image: url('{{ asset("images/player-bg-image.png") }}'); background-size: 80% auto;">
                            </div>

                            <!-- Pill Badge -->
                            @if (!empty($player->player_tag))
                                <div
                                    class="absolute right-0 top-3 z-50 rounded-l-full bg-teal-200 px-3 py-1 text-xs font-semibold text-teal-700 shadow">
                                    {{ $player->player_tag }}
                                </div>
                            @endif
                            <!-- Player Image -->
                            <div class="aspect-[3/4] w-full overflow-hidden rounded-lg">
                                <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                    alt="{{ $player->first_name_en }}"
                                    class="absolute h-full w-full object-cover object-[center_top]" />
                            </div>

                            <!-- Hover Overlay -->
                            <div
                                class="absolute inset-0 flex flex-col items-center justify-center bg-black/80 p-6 text-center opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                <h3 class="mb-2 text-base font-semibold tracking-tight text-white">
                                    {{ __("messages.player_stats") }}</h3>
                                <ul class="mb-3 space-y-1 text-base tracking-tight text-white/90">
                                    <li><span class="font-medium">{{ __("messages.matches") }}:</span>
                                        {{ $player->matches ?? 0 }}
                                    </li>
                                    <li><span class="font-medium">{{ __("messages.runs") }}:</span>
                                        {{ $player->runs ?? 0 }}
                                    </li>
                                    <li><span class="font-medium">{{ __("messages.wickets") }}:</span>
                                        {{ $player->wickets ?? 0 }}
                                    </li>
                                    <li><span class="font-medium">{{ __("messages.average") }}:</span>
                                        {{ $player->average ?? 0 }}
                                    </li>
                                </ul>
                                <a class="inline-block rounded-full bg-teal-500 px-5 py-1.5 text-sm font-medium text-white transition hover:bg-teal-600"
                                    href="{{ route("frontend.profile", $player->slug) }}">
                                    {{ __("messages.view_profile") }}
                                </a>
                            </div>

                            <!-- Bottom Info -->
                            <div class="absolute bottom-0 left-0 right-0 z-50 flex items-center bg-black/70 px-3 py-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="flex h-8 w-8 items-center justify-center rounded-full border border-white/20 bg-white/10 text-sm">
                                        @if (@$player->icon?->media?->path)
                                            <img src="{{ asset(@$player->icon?->media?->path) }}"
                                                alt="{{ $player->first_name_en }}" class="rounded-full">
                                        @else
                                            <span>🏏</span>
                                        @endif
                                    </div>
                                    <div class="h-6 w-px bg-white/20"></div>
                                    <div class="ml-0 text-[13px] font-semibold text-white">
                                        {{ strtoupper(app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full py-10 text-center italic text-red-500">No players found.</p>
                @endforelse
            </div>

            <!-- Responsive Pagination -->
            <div class="mt-14 flex justify-center">
                <nav
                    class="inline-flex items-center space-x-2 rounded-full bg-white/70 px-2 py-1 shadow-sm backdrop-blur-md sm:space-x-3 sm:px-4 sm:py-2">

                    <!-- Previous Button -->
                    @if ($players->onFirstPage())
                        <span
                            class="cursor-not-allowed rounded-full px-3 py-2 text-xs text-gray-400 sm:px-4 sm:text-sm">
                            ‹ Prev
                        </span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="rounded-full px-3 py-2 text-xs text-gray-600 transition hover:bg-gray-200 sm:px-4 sm:text-sm">
                            ‹ Prev
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    <div class="hidden space-x-2 sm:flex">
                        @foreach ($players->links()->elements[0] as $page => $url)
                            @if ($page == $players->currentPage())
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-500 text-sm font-semibold text-white shadow">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                    class="flex h-10 w-10 items-center justify-center rounded-full text-sm text-gray-600 transition hover:bg-gray-200">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <!-- Mobile Page Indicator -->
                    <span class="px-3 py-2 text-xs text-gray-600 sm:hidden">
                        Page {{ $players->currentPage() }} of {{ $players->lastPage() }}
                    </span>

                    <!-- Next Button -->
                    @if ($players->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                            class="rounded-full px-3 py-2 text-xs text-gray-600 transition hover:bg-gray-200 sm:px-4 sm:text-sm">
                            Next ›
                        </a>
                    @else
                        <span
                            class="cursor-not-allowed rounded-full px-3 py-2 text-xs text-gray-400 sm:px-4 sm:text-sm">
                            Next ›
                        </span>
                    @endif
                </nav>
            </div>
        </div> --}}
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">

            <!-- ================= HEADER ================= -->
            <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">

                <!-- Title -->
                <div class="relative">
                    <span class="absolute -left-4 top-1 h-9 w-1 rounded-full bg-teal-500"></span>
                    <h2 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                        {{ __("messages.players") }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        Squad overview & player roles
                    </p>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap gap-3">
                    @foreach (["Batsman", "Bowler", "All Rounder", "Wicket Keeper"] as $role)
                        <button wire:click="setFilter('{{ $role }}')"
                            class="{{ $filter === $role
                                ? "bg-teal-500 text-white shadow-lg shadow-teal-500/30"
                                : "bg-white/70 text-gray-600 backdrop-blur-md border border-white/40 hover:bg-teal-50 hover:text-teal-700" }} rounded-full px-4 py-1.5 text-sm font-medium transition-all duration-300">
                            {{ $role }}
                        </button>
                    @endforeach

                    @if ($filter)
                        <button wire:click="$set('filter', null)"
                            class="rounded-full bg-gray-100 px-4 py-1.5 text-sm text-gray-500 transition hover:bg-gray-200">
                            Clear
                        </button>
                    @endif
                </div>
            </div>

            <!-- ================= LOADING ================= -->
            <div wire:loading.flex class="justify-center py-16">
                <div class="h-12 w-12 animate-spin rounded-full border-4 border-gray-200 border-t-teal-500"></div>
            </div>

            <!-- ================= PLAYER GRID ================= -->
            {{-- <div wire:loading.remove
                class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4"> --}}
            <div wire:loading.remove
                class="grid grid-cols-1 place-items-center gap-4 sm:grid-cols-2 sm:place-items-stretch md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4">


                @forelse ($players ?? [] as $player)
                    <!-- ===== Player Card ===== -->
                    {{-- <div
                        class="group relative h-80 overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-[0_20px_50px_rgba(0,0,0,0.25)] backdrop-blur-xl transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_30px_70px_rgba(0,0,0,0.35)]"> --}}
                    <div
                        class="group relative h-80 w-full max-w-[280px] overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-[0_20px_50px_rgba(0,0,0,0.25)] backdrop-blur-xl transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_30px_70px_rgba(0,0,0,0.35)] sm:max-w-none">

                        <!-- Player Tag (Top Right Corner) -->
                        @if (!empty($player->player_tag))
                            <div
                                class="absolute right-4 top-4 z-50 rounded-full bg-teal-500/90 px-3 py-1 text-[11px] font-semibold text-white shadow-lg">
                                {{ $player->player_tag }}
                            </div>
                        @endif

                        <!-- Decorative Background -->
                        <div class="absolute inset-0 bg-contain bg-center bg-no-repeat opacity-20"
                            style="background-image:url('{{ asset("images/player-bg-image.png") }}'); background-size:70% auto;">
                        </div>

                        <!-- Player Image -->
                        <div class="relative h-full w-full overflow-hidden">
                            <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                alt="{{ $player->first_name_en }}"
                                class="h-full w-full object-cover object-top transition-transform duration-700 group-hover:scale-105">
                        </div>

                        <!-- Hover Overlay -->
                        <div
                            class="absolute inset-0 flex flex-col items-center justify-center bg-black/85 p-6 text-center opacity-0 transition-all duration-500 group-hover:opacity-100">

                            <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-white">
                                {{ __("messages.player_stats") }}
                            </h3>

                            <ul class="mb-4 space-y-1 text-sm text-white/90">
                                <li>
                                    <span class="font-medium">{{ __("messages.matches") }}:</span>
                                    {{ $player->matches ?? 0 }}
                                </li>
                                <li>
                                    <span class="font-medium">{{ __("messages.runs") }}:</span>
                                    {{ $player->runs ?? 0 }}
                                </li>
                                <li>
                                    <span class="font-medium">{{ __("messages.wickets") }}:</span>
                                    {{ $player->wickets ?? 0 }}
                                </li>
                                <li>
                                    <span class="font-medium">{{ __("messages.average") }}:</span>
                                    {{ $player->average ?? 0 }}
                                </li>
                            </ul>

                            <a href="{{ route("frontend.profile", $player->slug) }}"
                                class="rounded-full bg-teal-500 px-5 py-1.5 text-sm font-medium text-white transition hover:bg-teal-600">
                                {{ __("messages.view_profile") }}
                            </a>
                        </div>

                        <!-- Bottom Identity Bar (Name Inside) -->
                        {{-- <div
                            class="absolute bottom-0 left-0 right-0 z-30 flex items-center gap-3 bg-black/70 px-4 py-3 backdrop-blur-md">

                            <!-- Icon -->
                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white/10 ring-1 ring-white/20">
                                @if (@$player->icon?->media?->path)
                                    <img src="{{ asset(@$player->icon?->media?->path) }}"
                                        class="h-full w-full rounded-full object-cover">
                                @else
                                    <span class="text-sm">🏏</span>
                                @endif
                            </div>

                            <!-- Player Name + Role -->
                            <div class="min-w-0 leading-tight">
                                <span class="block truncate text-[13px] font-semibold tracking-tight text-white">
                                    {{ strtoupper(app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en) }}
                                </span>

                                @if (!empty($player->playing_role))
                                    <span class="mt-1 block truncate text-[11px] text-white/70">
                                        {{ strtoupper($player->playing_role) }}
                                    </span>
                                @endif
                            </div>

                        </div> --}}
                        <div
                            class="absolute bottom-0 left-0 right-0 z-30 flex items-center bg-black/70 px-3 py-3 backdrop-blur-md">

                            <div class="flex items-center gap-3">

                                <!-- Role Icon -->
                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center overflow-hidden rounded-full border border-white/20 bg-white/10 text-sm">
                                    @if (!empty($player->icon?->media?->path))
                                        <img src="{{ asset($player->icon->media->path) }}"
                                            alt="{{ $player->first_name_en }}"
                                            class="h-6 w-6 rounded-full object-contain">
                                    @else
                                        <span>🏏</span>
                                    @endif
                                </div>

                                <!-- Divider -->
                                <div class="h-6 w-px bg-white/20"></div>

                                <!-- Player Name + Role (inline, compact) -->
                                <div class="min-w-0 text-[13px] font-semibold leading-tight text-white">
                                    <span class="block truncate">
                                        {{ strtoupper(app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en) }}
                                    </span>

                                    @if (!empty($player->playing_role))
                                        <span class="block text-[11px] font-normal text-white/70">
                                            {{ strtoupper($player->playing_role) }}
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>


                    </div>

                @empty
                    <p class="col-span-full py-16 text-center italic text-gray-400">
                        No players found.
                    </p>
                @endforelse
            </div>


            <!-- ================= PAGINATION ================= -->
            <div class="mt-16 flex justify-center">
                <nav
                    class="inline-flex items-center gap-2 rounded-full bg-white/70 px-3 py-2 shadow-[0_10px_30px_rgba(0,0,0,0.08)] backdrop-blur-xl">

                    @if ($players->onFirstPage())
                        <span class="cursor-not-allowed px-4 py-2 text-sm text-gray-400">‹ Prev</span>
                    @else
                        <a wire:click.prevent="previousPage"
                            class="rounded-full px-4 py-2 text-sm text-gray-600 transition hover:bg-gray-200">
                            ‹ Prev
                        </a>
                    @endif

                    <span class="px-4 py-2 text-sm text-gray-600">
                        Page {{ $players->currentPage() }} of {{ $players->lastPage() }}
                    </span>

                    @if ($players->hasMorePages())
                        <a wire:click.prevent="nextPage"
                            class="rounded-full px-4 py-2 text-sm text-gray-600 transition hover:bg-gray-200">
                            Next ›
                        </a>
                    @else
                        <span class="cursor-not-allowed px-4 py-2 text-sm text-gray-400">Next ›</span>
                    @endif
                </nav>
            </div>

        </div>

    </section>


    @push("title")
        RCB - Players
    @endpush
</div>
