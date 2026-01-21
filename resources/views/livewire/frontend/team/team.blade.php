<div>
    <section class="mt-20 lg:mt-8">
        <!-- Background Glow -->
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_top,rgba(56,189,248,0.12),transparent_60%)]">
        </div>

        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">

            <!-- Title -->
            <div class="relative mb-12 pl-4">
                <span class="absolute left-0 top-1 h-9 w-1 rounded-full bg-teal-500"></span>
                <h2 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                    {{ __("messages.teams") }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Squad overview & player roles
                </p>
            </div>

            <!-- Teams Grid -->
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

                @foreach ($teams as $team)
                    @php
                        $stats = $teamStats[$team->id] ?? ["matches" => 0, "wins" => 0, "losses" => 0];
                    @endphp

                    <a href="{{ route("frontend.team", $team->slug) }}"
                        class="group relative overflow-hidden rounded-3xl bg-gradient-to-b from-white via-white to-gray-50 shadow-[0_30px_80px_-25px_rgba(0,0,0,0.25)] transition-all duration-500 hover:-translate-y-3 hover:shadow-[0_50px_120px_-30px_rgba(16,185,129,0.45)]">
                        <!-- Logo -->
                        <div class="relative z-10 flex justify-center pt-10">
                            <div
                                class="relative flex h-20 w-20 items-center justify-center rounded-full border backdrop-blur-xl">

                                <img src="{{ asset(@$team->media?->path ?? "/images/default-team.png") }}"
                                    alt="{{ $team->name_en }}" class="h-16 w-16 rounded-full object-contain">
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="relative z-10 px-8 pb-8 pt-6 text-center">

                            <h3 class="text-xl font-bold tracking-tight text-gray-900 group-hover:text-emerald-600">
                                {{ $team->name_en }}
                            </h3>

                            <p class="mt-1 text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">
                                {{ @$team->short_name }}
                            </p>

                            <!-- Divider -->
                            <div
                                class="mx-auto mt-5 h-px w-20 bg-gradient-to-r from-transparent via-emerald-300/60 to-transparent">
                            </div>

                            <!-- Stats -->
                            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs font-semibold">

                                <span class="rounded-full bg-white/70 px-4 py-1.5 text-gray-700 ring-1 ring-gray-200">
                                    {{ $stats["matches"] }} Matches
                                </span>

                                <span
                                    class="rounded-full bg-emerald-500/10 px-4 py-1.5 text-emerald-700 ring-1 ring-emerald-300/40">
                                    {{ $stats["wins"] }} Wins
                                </span>

                                <span
                                    class="rounded-full bg-rose-500/10 px-4 py-1.5 text-rose-600 ring-1 ring-rose-300/40">
                                    {{ $stats["losses"] }} Loss
                                </span>

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Responsive Pagination -->
            <div class="mt-14 flex justify-center">
                <nav
                    class="inline-flex items-center space-x-2 rounded-full bg-white/70 px-2 py-1 shadow-sm backdrop-blur-md sm:space-x-3 sm:px-4 sm:py-2">

                    <!-- Previous Button -->
                    @if ($teams->onFirstPage())
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
                        @foreach ($teams->links()->elements[0] as $page => $url)
                            @if ($page == $teams->currentPage())
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
                        Page {{ $teams->currentPage() }} of {{ $teams->lastPage() }}
                    </span>

                    <!-- Next Button -->
                    @if ($teams->hasMorePages())
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
        </div>
    </section>

    @push("title")
        All Teams
    @endpush
</div>
