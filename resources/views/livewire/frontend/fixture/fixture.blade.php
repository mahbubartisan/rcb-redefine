<div>
    <section class="mt-20 lg:mt-8">
        {{-- <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
            <!-- Title -->
            <div class="flex flex-col md:flex-row items-center justify-between mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 uppercase">
                    {{ __('messages.all_fixtures') }}
                </h2>

                <!-- Filters -->
                <div class="flex flex-wrap gap-3 mt-4 md:mt-0">
                    @foreach ([0 => "Upcoming", 1 => "Completed", 2 => "Abandoned"] as $key => $label)
                        <button wire:click="setFilter({{ $key }})"
                            class="px-4 py-1.5 text-sm rounded-full border transition
                {{ $filter === $key
                    ? "bg-teal-600 text-white border-teal-600"
                    : "border-teal-600 text-teal-600 hover:bg-teal-600 hover:text-white" }}">
                            {{ $label }}
                        </button>
                    @endforeach

                    <!-- Clear filter -->
                    @if (!is_null($filter))
                        <button wire:click="$set('filter', null)"
                            class="px-4 py-1.5 text-sm rounded-full border border-gray-400 text-gray-600 hover:bg-gray-200 transition">
                            Clear
                        </button>
                    @endif
                </div>
            </div>


            <!-- Fixture Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($fixtures as $fixture)
                    <a href="{{ route("frontend.scoreboard", [
                        "matchId" => $fixture->id,
                        "team1" => @$fixture->team1?->slug,
                        "team2" => @$fixture->team2?->slug,
                    ]) }}"
                        class="block">
                        <div
                            class="bg-white rounded-md border hover:border-teal-300 shadow-sm flex flex-col min-h-[220px] relative transition duration-300 ease-in-out">
                            <!-- Type Pill -->
                            <div class="flex justify-between items-center pt-2">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-r-full text-xs font-medium 
                                        bg-yellow-100 text-yellow-700">
                                    Match {{ $fixture->id }}
                                </span>
                                <div
                                    class="bg-{{ $fixture->type == 0 ? "yellow" : ($fixture->type == 2 ? "red" : "teal") }}-500 text-white text-[12px] font-semibold px-2 py-0.5 rounded-l-full shadow-sm tracking-wide">
                                    {{ $fixture->type == 0 ? "Upcoming" : ($fixture->type == 2 ? "Abandoned" : "Completed") }}
                                </div>
                            </div>

                            <!-- Fixture Number & Date -->
                            <div class="flex justify-center items-center mt-1">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                        bg-gray-100 text-black-700 border border-gray-100">
                                    {{ \Carbon\Carbon::parse($fixture->date_time)->format("d M Y") }}
                                </span>
                            </div>

                            <div class="relative px-3 pb-4 flex-1">
                                <!-- VS line -->
                                <div class="absolute inset-y-4 left-1/2 -translate-x-1/2 w-px bg-gray-200">
                                </div>
                                <div class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
                                    <span
                                        class="bg-red-600 text-white text-[10px] font-bold rounded px-1.5 py-0.5 tracking-wider">VS</span>
                                </div>

                                <!-- Scores and Team Logos -->
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-11 h-11 rounded-full ring-1 ring-gray-200"
                                            src="{{ asset(@$fixture->team1?->media?->path) }}"
                                            alt="{{ @$fixture->team1?->name_en }}">
                                        <div class="leading-tight">
                                            <div class="text-base font-semibold text-red-600">
                                                {{ $fixture->team1_score }}
                                            </div>
                                            @if (!empty($match->team1_played_over))
                                                <div class="text-sm text-gray-500">
                                                    ({{ $match->team1_played_over }})
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="text-right leading-tight">
                                            <div class="text-base font-semibold text-red-600">
                                                {{ $fixture->team2_score }}
                                            </div>
                                            @if (!empty($match->team2_played_over))
                                                <div class="text-sm text-gray-500">
                                                    ({{ $match->team2_played_over }})
                                                </div>
                                            @endif
                                        </div>
                                        <img class="w-11 h-11 rounded-full ring-1 ring-gray-200"
                                            src="{{ asset(@$fixture->team2?->media?->path) }}"
                                            alt="{{ @$fixture->team2?->name_en }}">
                                    </div>
                                </div>

                                <!-- Team Names -->
                                <div class="mt-3 flex justify-between text-sm font-semibold">
                                    <span class="text-gray-800 text-left w-1/2 pr-2"
                                        title="{{ @$fixture->team1?->name_en }}">
                                        {{ app()->getLocale() === "bn" ? @$fixture->team1?->name_bn : @$fixture->team1?->name_en }}
                                    </span>
                                    <span class="text-gray-800 text-right w-1/2 pl-2"
                                        title="{{ @$fixture->team2?->name_en }}">
                                        {{ app()->getLocale() === "bn" ? @$fixture->team2?->name_bn : @$fixture->team2?->name_en }}
                                    </span>
                                </div>
                            </div>

                            <!-- Result -->
                            @if ($fixture->type == 0)
                                <!-- Show venue for upcoming matches -->
                                <div class="border-t p-3 text-center">
                                    <p class="text-sm text-teal-600" title="{{ $fixture->venue }}">
                                        {{ $fixture->venue }}
                                    </p>
                                </div>
                            @else
                                <!-- Show result for completed/abandoned matches -->
                                <div class="border-t p-3 text-center">
                                    <p class="text-sm text-teal-600" title="{{ $fixture->match_result }}">
                                        {{ $fixture->match_result }}
                                    </p>
                                </div>
                            @endif

                        </div>
                    </a>
                @empty
                    <p class="text-red-500 italic col-span-full text-center py-10">No fixtures available.</p>
                @endforelse
            </div>

            <!-- Responsive Pagination -->
            <div class="flex justify-center mt-14">
                <nav
                    class="inline-flex items-center space-x-2 sm:space-x-3 bg-white/70 backdrop-blur-md shadow-sm rounded-full px-2 sm:px-4 py-1 sm:py-2">

                    <!-- Previous Button -->
                    @if ($fixtures->onFirstPage())
                        <span
                            class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-400 cursor-not-allowed">
                            ‹ Prev
                        </span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-600 hover:bg-gray-200 transition">
                            ‹ Prev
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    <div class="hidden sm:flex space-x-2">
                        @foreach ($fixtures->links()->elements[0] as $page => $url)
                            @if ($page == $fixtures->currentPage())
                                <span
                                    class="w-10 h-10 flex items-center justify-center text-sm rounded-full bg-teal-500 text-white font-semibold shadow">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                    class="w-10 h-10 flex items-center justify-center text-sm rounded-full text-gray-600 hover:bg-gray-200 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <!-- Mobile Page Indicator -->
                    <span class="sm:hidden px-3 py-2 text-xs text-gray-600">
                        Page {{ $fixtures->currentPage() }} of {{ $fixtures->lastPage() }}
                    </span>

                    <!-- Next Button -->
                    @if ($fixtures->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                            class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-600 hover:bg-gray-200 transition">
                            Next ›
                        </a>
                    @else
                        <span
                            class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-400 cursor-not-allowed">
                            Next ›
                        </span>
                    @endif
                </nav>
            </div>
        </div> --}}
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">

            <!-- Header -->
            <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">

                <!-- Title -->
                <div class="relative">
                    <span class="absolute -left-4 top-1 h-9 w-1 rounded-full bg-teal-500"></span>
                    <h2 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                        {{ __("messages.all_fixtures") }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        Upcoming matches & results
                    </p>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap gap-3">
                    @foreach ([0 => "Upcoming", 1 => "Completed", 2 => "Abandoned"] as $key => $label)
                        <button wire:click="setFilter({{ $key }})"
                            class="{{ $filter === $key
                                ? "bg-teal-500 text-white shadow-lg shadow-teal-500/30"
                                : "bg-white/70 text-gray-600 backdrop-blur-md border border-white/40 hover:bg-teal-50 hover:text-teal-700" }} rounded-full px-4 py-1.5 text-sm font-medium transition-all duration-300">
                            {{ $label }}
                        </button>
                    @endforeach

                    @if (!is_null($filter))
                        <button wire:click="$set('filter', null)"
                            class="rounded-full bg-gray-100 px-4 py-1.5 text-sm text-gray-500 transition hover:bg-gray-200">
                            Clear
                        </button>
                    @endif
                </div>

            </div>

            <!-- Fixture Grid -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                @forelse ($fixtures as $fixture)
                    <div class="group block cursor-pointer"
                        onclick="window.location='{{ route("frontend.scoreboard", [
                            "matchId" => $fixture->id,
                            "team1" => @$fixture->team1?->slug,
                            "team2" => @$fixture->team2?->slug
                        ]) }}'">

                        {{-- <div
                            class="relative h-full overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition-all duration-300 hover:shadow-xl">

                            <!-- Status Indicator Strip -->
                            <div
                                class="{{ $fixture->type == 0 ? "bg-yellow-400" : ($fixture->type == 2 ? "bg-red-500" : "bg-teal-500") }} absolute inset-y-0 left-0 w-1">
                            </div>

                            <!-- Top Row -->
                            <div class="flex items-center justify-between px-5 pt-4">
                                <span class="text-xs font-semibold tracking-widest text-gray-400">
                                    MATCH #{{ $fixture->id }}
                                </span>

                                <span
                                    class="{{ $fixture->type == 0 ? "bg-yellow-500" : ($fixture->type == 2 ? "bg-red-500" : "bg-teal-600") }} rounded-full px-3 py-1 text-[11px] font-bold text-white">
                                    {{ $fixture->type == 0 ? "UPCOMING" : ($fixture->type == 2 ? "ABANDONED" : "COMPLETED") }}
                                </span>
                            </div>

                            <!-- Date -->
                            <div class="mt-3 flex justify-center">
                                <span class="rounded-full bg-gray-100 px-4 py-1 text-xs font-medium text-gray-600">
                                    {{ \Carbon\Carbon::parse($fixture->date_time)->format("d M Y") }}
                                </span>
                            </div>

                            <!-- Teams -->
                            <div class="relative px-6 py-6">

                                <!-- Divider -->
                                <div class="absolute inset-y-6 left-1/2 w-px -translate-x-1/2 bg-gray-200"></div>
                                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                                    <span
                                        class="rounded bg-red-600 px-2 py-0.5 text-[10px] font-extrabold text-white shadow">
                                        VS
                                    </span>
                                </div>

                                <div class="flex items-center justify-between">

                                    <!-- Team 1 -->
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset(@$fixture->team1?->media?->path) }}"
                                            alt="{{ @$fixture->team1?->name_en }}"
                                            class="h-12 w-12 rounded-full object-cover ring-2 ring-gray-200">

                                        <div>
                                            <div class="text-lg font-bold text-gray-900">
                                                {{ $fixture->team1_score }}
                                            </div>
                                            @if (!empty($match->team1_played_over))
                                                <div class="text-xs text-gray-500">
                                                    ({{ $match->team1_played_over }})
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Team 2 -->
                                    <div class="flex items-center gap-3">
                                        <div class="text-right">
                                            <div class="text-lg font-bold text-gray-900">
                                                {{ $fixture->team2_score }}
                                            </div>
                                            @if (!empty($match->team2_played_over))
                                                <div class="text-xs text-gray-500">
                                                    ({{ $match->team2_played_over }})
                                                </div>
                                            @endif
                                        </div>

                                        <img src="{{ asset(@$fixture->team2?->media?->path) }}"
                                            alt="{{ @$fixture->team2?->name_en }}"
                                            class="h-12 w-12 rounded-full object-cover ring-2 ring-gray-200">
                                    </div>

                                </div>

                                <!-- Team Names -->
                                <div class="mt-4 flex justify-between text-sm font-semibold">
                                    <span class="w-1/2 truncate pr-3 text-gray-800">
                                        {{ app()->getLocale() === "bn" ? @$fixture->team1?->name_bn : @$fixture->team1?->name_en }}
                                    </span>
                                    <span class="w-1/2 truncate pl-3 text-right text-gray-800">
                                        {{ app()->getLocale() === "bn" ? @$fixture->team2?->name_bn : @$fixture->team2?->name_en }}
                                    </span>
                                </div>

                            </div>

                            <!-- Bottom Identity Bar -->
                            <div class="border-t bg-gray-50 px-5 py-3 text-center">
                                <p class="truncate text-sm font-medium text-teal-600">
                                    {{ $fixture->type == 0 ? $fixture->venue : $fixture->match_result }}
                                </p>
                            </div>

                        </div> --}}
                        <div
                            class="group relative flex h-full flex-col overflow-hidden rounded-2xl border border-white/40 bg-white/80 backdrop-blur-xl">

                            <!-- Match ID Pill -->
                            <div class="absolute left-0 top-4 z-10">
                                <span
                                    class="inline-flex items-center rounded-r-full bg-gradient-to-r from-yellow-400 to-yellow-500 px-4 py-1 text-xs font-bold text-white shadow-md">
                                    Match {{ $fixture->id }}
                                </span>
                            </div>

                            <!-- Status Pill -->
                            <div class="absolute right-0 top-4 z-10">
                                <span
                                    class="{{ $fixture->type == 0
                                        ? "from-yellow-400 to-yellow-500"
                                        : ($fixture->type == 2
                                            ? "from-red-500 to-rose-600"
                                            : "from-teal-500 to-emerald-500") }} inline-flex items-center rounded-l-full bg-gradient-to-r px-4 py-1 text-xs font-bold text-white shadow-md">
                                    {{ $fixture->type == 0 ? "Upcoming" : ($fixture->type == 2 ? "Abandoned" : "Completed") }}
                                </span>
                            </div>

                            <!-- Date -->
                            <div class="mt-14 flex justify-center">
                                <span
                                    class="rounded-full bg-gray-100 px-4 py-1 text-xs font-medium text-gray-600 backdrop-blur">
                                    {{ \Carbon\Carbon::parse($fixture->date_time)->format("d M Y") }}
                                </span>
                            </div>

                            <!-- Gap -->
                            <div class="h-6"></div>

                            <!-- Main -->
                            <div class="relative flex flex-1 items-center px-4">

                                <!-- Full Height Divider -->
                                <div class="absolute inset-y-0 left-1/2 w-px bg-gray-200"></div>

                                <!-- VS Badge -->
                                <div class="absolute left-1/2 top-1/2 z-10 -translate-x-1/2 -translate-y-1/2">
                                    <span
                                        class="rounded bg-gradient-to-r from-red-500 to-rose-600 px-2 py-0.5 text-[11px] font-bold text-white shadow-md">
                                        VS
                                    </span>
                                </div>

                                <!-- Team 1 -->
                                <div class="flex w-1/2 items-center gap-3">
                                    <img class="h-12 w-12 rounded-full object-cover shadow ring-2 ring-white"
                                        src="{{ asset(@$fixture->team1?->media?->path ?? "images/user_profile.webp") }}"
                                        alt="{{ @$fixture->team1?->name_en }}">
                                    <div>
                                        <div class="text-lg font-bold text-gray-800">
                                            {{ $fixture->team1_score ?? "-" }}
                                        </div>
                                        @if (!empty($fixture->team1_played_over))
                                            <div class="text-xs text-gray-500">
                                                ({{ $fixture->team1_played_over }})
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Team 2 -->
                                <div class="flex w-1/2 items-center justify-end gap-3">
                                    <div class="text-right">
                                        <div class="text-lg font-bold text-gray-800">
                                            {{ $fixture->team2_score ?? "-" }}
                                        </div>
                                        @if (!empty($fixture->team2_played_over))
                                            <div class="text-xs text-gray-500">
                                                ({{ $fixture->team2_played_over }})
                                            </div>
                                        @endif
                                    </div>
                                    <img class="h-12 w-12 rounded-full border object-cover shadow ring-2 ring-white"
                                        src="{{ asset(@$fixture->team2?->media?->path ?? "images/user_profile.webp") }}"
                                        alt="{{ @$fixture->team2?->name_en }}">
                                </div>

                            </div>

                            <!-- Team Names -->
                            <div class="mt-2 flex justify-between px-4 text-sm font-semibold text-gray-800">

                                <!-- Team 1 -->
                                <a href="{{ route('frontend.team', @$fixture->team1?->slug) }}"
                                   class="w-1/2 truncate pr-2 hover:text-teal-600 hover:underline transition"
                                   onclick="event.stopPropagation()">
                                    {{ app()->getLocale() === 'bn'
                                        ? @$fixture->team1?->name_bn
                                        : @$fixture->team1?->name_en }}
                                </a>
                            
                                <!-- Team 2 -->
                                <a href="{{ route('frontend.team', @$fixture->team2?->slug) }}"
                                   class="w-1/2 truncate pl-2 text-right hover:text-teal-600 hover:underline transition"
                                   onclick="event.stopPropagation()">
                                    {{ app()->getLocale() === 'bn'
                                        ? @$fixture->team2?->name_bn
                                        : @$fixture->team2?->name_en }}
                                </a>
                            
                            </div>
                            

                            <!-- Result -->
                            <div class="mt-3 border-t border-gray-200 px-4 py-3 text-center">
                                <p class="text-sm font-medium text-teal-600">
                                    {{ $fixture->match_result ?? "N/A" }}
                                </p>
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="col-span-full py-16 text-center italic text-red-500">
                        No fixtures available.
                    </p>
                @endforelse
            </div>

            <!-- Responsive Pagination -->
            <div class="mt-14 flex justify-center">
                <nav
                    class="inline-flex items-center space-x-2 rounded-full bg-white/70 px-2 py-1 shadow-sm backdrop-blur-md sm:space-x-3 sm:px-4 sm:py-2">

                    <!-- Previous Button -->
                    @if ($fixtures->onFirstPage())
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
                        @foreach ($fixtures->links()->elements[0] as $page => $url)
                            @if ($page == $fixtures->currentPage())
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
                        Page {{ $fixtures->currentPage() }} of {{ $fixtures->lastPage() }}
                    </span>

                    <!-- Next Button -->
                    @if ($fixtures->hasMorePages())
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
        RCB - All Fixtures
    @endpush
</div>
