<div>

    <!-- Team Profile -->

    <div class="min-h-screen text-gray-900" x-data="{ tab: 'overview' }">
        <!-- HEADER SECTION -->
        <div class="relative mx-auto mb-10 mt-20 max-w-6xl px-4 lg:mt-8">

            <div
                class="relative rounded-3xl border border-white/40 bg-white/70 shadow-[0_12px_40px_rgba(0,0,0,0.06)] backdrop-blur-2xl">

                <div class="flex flex-col items-center gap-6 p-6 sm:p-8 md:flex-row md:items-center md:gap-8">

                    <!-- Team Logo -->
                    <div class="relative shrink-0">
                        <div
                            class="h-28 w-28 overflow-hidden rounded-full bg-white shadow-sm ring-1 ring-black/5 sm:h-32 sm:w-32">
                            <img src="{{ asset(@$team->media?->path ?? "/images/default-team.png") }}"
                                alt="{{ $team->name_en }}" class="h-full w-full object-cover">
                        </div>
                    </div>

                    <!-- Team Info -->
                    <div class="flex-1 text-center md:text-left">

                        <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl lg:text-4xl">
                            {{ app()->getLocale() === "bn" ? $team->name_bn : $team->name_en }}
                        </h1>

                        {{-- <p class="mt-2 text-sm text-gray-500">
                            🏟 {{ $team->stadium ?? "Unknown Stadium" }}
                        </p>

                        <p class="mt-1 text-sm text-gray-500">
                            Established
                            <span class="font-medium text-gray-700">
                                {{ $team->established_year ?? "N/A" }}
                            </span>
                            · Coach
                            <span class="font-medium text-gray-700">
                                {{ $team->coach ?? "N/A" }}
                            </span>
                        </p> --}}

                        <!-- Recent Form -->
                        @if (!empty($stats["recent_form"]))
                            @php
                                $results = array_filter(explode(" ", trim($stats["recent_form"])));
                            @endphp

                            @if (count($results))
                                <div class="mt-5 flex flex-wrap justify-center gap-2 md:justify-start">

                                    <span class="mr-1 text-[11px] uppercase tracking-[0.2em] text-gray-400">
                                        Recent
                                    </span>

                                    @foreach ($results as $result)
                                        <span
                                            class="{{ $result === "W"
                                                ? "bg-emerald-50 text-emerald-700"
                                                : ($result === "L"
                                                    ? "bg-rose-50 text-rose-700"
                                                    : "bg-gray-100 text-gray-500") }} inline-flex h-7 min-w-[28px] items-center justify-center rounded-full text-xs font-semibold">
                                            {{ $result }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>


        <!-- TEAM STATS CARDS -->
        <div class="mx-auto mb-12 grid max-w-6xl grid-cols-2 gap-4 px-4 sm:grid-cols-3 sm:gap-5 md:grid-cols-5">

            <!-- Matches -->
            <div
                class="group relative rounded-2xl border border-white/40 bg-white/70 shadow-sm backdrop-blur-xl transition-all duration-300 hover:shadow-md">

                <div class="absolute inset-x-0 top-0 h-[2px] rounded-t-2xl bg-gray-900/60"></div>

                <div class="p-5 text-center">
                    <h3 class="text-[11px] font-semibold uppercase tracking-[0.2em] text-gray-500">
                        Matches
                    </h3>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900">
                        {{ $stats["matches"] }}
                    </p>
                </div>
            </div>

            <!-- Wins -->
            <div
                class="group relative rounded-2xl border border-white/40 bg-white/70 shadow-sm backdrop-blur-xl transition-all duration-300 hover:shadow-md">

                <div class="absolute inset-x-0 top-0 h-[2px] rounded-t-2xl bg-emerald-500"></div>

                <div class="p-5 text-center">
                    <h3 class="text-[11px] font-semibold uppercase tracking-[0.2em] text-gray-500">
                        Wins
                    </h3>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-emerald-700">
                        {{ $stats["wins"] }}
                    </p>
                </div>
            </div>

            <!-- Losses -->
            <div
                class="group relative rounded-2xl border border-white/40 bg-white/70 shadow-sm backdrop-blur-xl transition-all duration-300 hover:shadow-md">

                <div class="absolute inset-x-0 top-0 h-[2px] rounded-t-2xl bg-rose-500"></div>

                <div class="p-5 text-center">
                    <h3 class="text-[11px] font-semibold uppercase tracking-[0.2em] text-gray-500">
                        Losses
                    </h3>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-rose-600">
                        {{ $stats["losses"] }}
                    </p>
                </div>
            </div>

            <!-- No Result -->
            <div
                class="group relative rounded-2xl border border-white/40 bg-white/70 shadow-sm backdrop-blur-xl transition-all duration-300 hover:shadow-md">

                <div class="absolute inset-x-0 top-0 h-[2px] rounded-t-2xl bg-amber-500"></div>

                <div class="p-5 text-center">
                    <h3 class="text-[11px] font-semibold uppercase tracking-[0.2em] text-gray-500">
                        No Result
                    </h3>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-amber-600">
                        {{ $stats["noResult"] }}
                    </p>
                </div>
            </div>

            <!-- Win Ratio -->
            <div
                class="group relative rounded-2xl border border-white/40 bg-white/70 shadow-sm backdrop-blur-xl transition-all duration-300 hover:shadow-md">

                <div class="absolute inset-x-0 top-0 h-[2px] rounded-t-2xl bg-lime-500"></div>

                <div class="p-5 text-center">
                    <h3 class="text-[11px] font-semibold uppercase tracking-[0.2em] text-gray-500">
                        Win Ratio
                    </h3>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-lime-700">
                        {{ $stats["win_ratio"] }}%
                    </p>
                </div>
            </div>

        </div>


        <!-- NAV TABS -->
        <div class="mx-auto max-w-6xl px-4">
            <div class="scrollbar-hide mb-6 flex gap-8 overflow-x-auto border-b border-white">
                <template x-for="tabName in ['overview', 'players', 'matches', 'stats']" :key="tabName">
                    <button class="relative pb-2 text-sm font-semibold uppercase tracking-tight transition"
                        :class="tab === tabName ? 'text-teal-500' : 'text-gray-800 hover:text-teal-500'"
                        @click="tab = tabName">
                        <span x-text="tabName.charAt(0).toUpperCase() + tabName.slice(1)"></span>
                        <div x-show="tab === tabName"
                            class="absolute bottom-0 left-0 h-0.5 w-full rounded-full bg-teal-500"></div>
                    </button>
                </template>
            </div>
        </div>

        <!-- CONTENT SECTIONS -->
        <div class="mx-auto max-w-6xl px-4 pb-10">
            <!-- OVERVIEW -->
            <div x-show="tab === 'overview'" class="rounded border border-gray-200 bg-white p-6">
                <h2 class="mb-3 text-xl font-bold text-gray-900">About Us</h2>
                <p class="leading-relaxed text-gray-600">
                    {{ $team->description ?? "No detailed description available for this team." }}
                </p>
            </div>

            <!-- PLAYERS -->
            {{-- <div x-show="tab === 'players'" class="mt-4">
                <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
                    @foreach ($players as $player)
                        <a href="{{ route("frontend.profile", $player->slug) }}"
                            class="relative rounded-2xl border border-gray-200 bg-white p-4 text-center transition-all duration-300 hover:scale-105">
                            <div class="mx-auto mb-3 aspect-square h-16 w-16">
                                <img src="{{ asset($player->media?->path ?? "images/user_profile.webp") }}"
                                    alt="{{ $player->first_name_en }}" loading="lazy"
                                    class="h-full w-full rounded-full border border-gray-200 object-contain">
                            </div>
                            <h4 class="text-sm font-semibold tracking-tight text-teal-600">{{ $player->first_name_en }}
                            </h4>
                            <p class="text-xs uppercase tracking-tight text-gray-600">
                                {{ $player->playing_role ?? "Player" }}</p>
                            <div class="mt-2 text-sm text-gray-600">
                                @if ($player->total_runs)
                                    <p>Runs: <span class="font-medium text-green-600">
                                            {{ $player->total_runs }}
                                        </span>
                                    </p>
                                @endif
                                @if ($player->total_wickets)
                                    <p>Wickets: <span class="font-medium text-red-600">
                                            {{ $player->total_wickets }}
                                        </span>
                                    </p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10 flex justify-center">
                    <nav class="inline-flex items-center gap-3 rounded-full bg-white px-4 py-2 text-xs sm:text-sm">

                        <!-- Prev -->
                        @if ($players->onFirstPage())
                            <span class="select-none text-gray-400">‹ Prev</span>
                        @else
                            <button wire:click="previousPage" wire:loading.attr="disabled"
                                class="text-gray-700 transition hover:text-gray-900">
                                ‹ Prev
                            </button>
                        @endif

                        <!-- Page info (mobile only) -->
                        <span class="text-gray-600 sm:hidden">
                            Page {{ $players->currentPage() }} of {{ $players->lastPage() }}
                        </span>

                        <!-- Desktop pagination numbers -->
                        <div class="hidden items-center gap-1 sm:flex">

                            @php
                                $current = $players->currentPage();
                                $last = $players->lastPage();
                                $start = max(1, $current - 2);
                                $end = min($last, $current + 2);
                            @endphp

                            <!-- First + ... -->
                            @if ($start > 1)
                                <button wire:click="gotoPage(1)"
                                    class="rounded-full bg-white px-3 py-1 hover:bg-gray-100">
                                    1
                                </button>
                                @if ($start > 2)
                                    <span class="text-gray-400">…</span>
                                @endif
                            @endif

                            <!-- Range -->
                            @foreach (range($start, $end) as $page)
                                @if ($page == $current)
                                    <span
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 text-white">
                                        {{ $page }}
                                    </span>
                                @else
                                    <button wire:click="gotoPage({{ $page }})"
                                        class="rounded-full bg-white px-3 py-1 hover:bg-gray-100">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach

                            <!--  ... + Last -->
                            @if ($end < $last)
                                @if ($end < $last - 1)
                                    <span class="text-gray-400">…</span>
                                @endif
                                <button wire:click="gotoPage({{ $last }})"
                                    class="rounded-full bg-white px-3 py-1 hover:bg-gray-100">
                                    {{ $last }}
                                </button>
                            @endif
                        </div>

                        <!--  Next -->
                        @if ($players->hasMorePages())
                            <button wire:click="nextPage" wire:loading.attr="disabled"
                                class="text-gray-700 transition hover:text-gray-900">
                                Next ›
                            </button>
                        @else
                            <span class="select-none text-gray-400">Next ›</span>
                        @endif
                    </nav>
                </div>

            </div> --}}
            <div x-show="tab === 'players'" class="mt-4">

                <!-- Players Grid -->
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-5 md:grid-cols-4 md:gap-6 xl:grid-cols-5">

                    @foreach ($players as $player)
                        <a href="{{ route("frontend.profile", $player->slug) }}"
                            class="group relative rounded-2xl border border-white/40 bg-white/70 shadow-[0_10px_30px_rgba(0,0,0,0.05)] backdrop-blur-xl transition-all duration-300 hover:shadow-[0_20px_50px_rgba(0,0,0,0.10)]">

                            <div class="flex flex-col items-center p-4">

                                <!-- Avatar -->
                                <div
                                    class="sm:w-18 sm:h-18 relative mb-3 h-16 w-16 overflow-hidden rounded-full bg-white ring-1 ring-black/5">
                                    <img src="{{ asset($player->media?->path ?? "images/user_profile.webp") }}"
                                        alt="{{ $player->first_name_en }}" loading="lazy"
                                        class="h-full w-full object-contain">
                                </div>

                                <!-- Name -->
                                <h4
                                    class="truncate text-sm font-semibold tracking-tight text-gray-900 transition group-hover:text-teal-700">
                                    {{ app()->getLocale() === 'bn'
                                        ? ($player->first_name_bn ?? $player->first_name_en)
                                        : $player->first_name_en
                                    }}
                                </h4>

                                <!-- Role -->
                                <p class="mt-0.5 text-[11px] uppercase tracking-widest text-gray-400">
                                    {{ $player->playing_role ?? "Player" }}
                                </p>

                                <!-- Stats -->
                                <div class="mt-3 flex flex-wrap justify-center gap-2 text-[11px]">

                                    @if ($player->total_runs)
                                        <span class="rounded-full bg-emerald-50 px-3 py-1 font-medium text-emerald-700">
                                            {{ $player->total_runs }} Runs
                                        </span>
                                    @endif

                                    @if ($player->total_wickets)
                                        <span class="rounded-full bg-rose-50 px-3 py-1 font-medium text-rose-700">
                                            {{ $player->total_wickets }} Wkts
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10 flex justify-center">
                    <nav
                        class="inline-flex items-center gap-3 rounded-full border border-white/40 bg-white/70 px-4 py-2 text-xs shadow-sm backdrop-blur-xl sm:text-sm">

                        <!-- Prev -->
                        @if ($players->onFirstPage())
                            <span class="select-none text-gray-400">‹ Prev</span>
                        @else
                            <button wire:click="previousPage('playersPage')" wire:loading.attr="disabled"
                                class="text-gray-700 transition hover:text-gray-900">
                                ‹ Prev
                            </button>
                        @endif

                        <!-- Mobile Page Info -->
                        <span class="text-gray-500 sm:hidden">
                            Page {{ $players->currentPage() }} of {{ $players->lastPage() }}
                        </span>

                        <!-- Desktop Pagination -->
                        <div class="hidden items-center gap-1 sm:flex">
                            @php
                                $current = $players->currentPage();
                                $last = $players->lastPage();
                                $start = max(1, $current - 2);
                                $end = min($last, $current + 2);
                            @endphp

                            @if ($start > 1)
                                <button wire:click="gotoPage(2, 'playersPage')" class="rounded-full px-3 py-1 hover:bg-gray-100">
                                    1
                                </button>
                                @if ($start > 2)
                                    <span class="text-gray-400">…</span>
                                @endif
                            @endif

                            @foreach (range($start, $end) as $page)
                                @if ($page == $current)
                                    <span
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 text-sm font-medium text-white">
                                        {{ $page }}
                                    </span>
                                @else
                                    <button wire:click="gotoPage({{ $page }}, 'playersPage')"
                                        class="rounded-full px-3 py-1 hover:bg-gray-100">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach

                            @if ($end < $last)
                                @if ($end < $last - 1)
                                    <span class="text-gray-400">…</span>
                                @endif
                                <button wire:click="gotoPage({{ $last }} , 'playersPage')"
                                    class="rounded-full px-3 py-1 hover:bg-gray-100">
                                    {{ $last }}
                                </button>
                            @endif
                        </div>

                        <!-- Next -->
                        @if ($players->hasMorePages())
                            <button wire:click="nextPage('playersPage')" wire:loading.attr="disabled"
                                class="text-gray-700 transition hover:text-gray-900">
                                Next ›
                            </button>
                        @else
                            <span class="select-none text-gray-400">Next ›</span>
                        @endif
                    </nav>
                </div>

            </div>


            <!-- MATCH HISTORY -->
            <div x-show="tab === 'matches'"
                class="mt-4 overflow-hidden rounded border border-gray-200 bg-white p-2 lg:p-6">
                {{-- <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-sm text-gray-700 rounded overflow-hidden">
                        <thead>
                            <tr class="bg-teal-50 border-b font-semibold tracking-tight">
                                <th class="text-left p-2">Opponent</th>
                                <th class="text-left p-2">Date</th>
                                <th class="text-left p-2">Result</th>
                                <th class="text-left p-2">Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allMatches as $match)
                                @php
                                    $isWin = $match->won === $team->id;
                                    $opponent = $match->team1_id === $team->id ? $match->team2 : $match->team1;

                                    $resultText = is_null($match->won) ? "No Result" : ($isWin ? "Won" : "Lost");

                                    $resultColor = is_null($match->won)
                                        ? "text-amber-600"
                                        : ($isWin
                                            ? "text-green-600"
                                            : "text-red-600");
                                @endphp

                                <tr class="border-b">
                                    <!-- OPPONENT + AVATAR -->
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset(@$opponent->media?->path ?? "images/user_profile.webp") }}"
                                                class="w-8 h-8 rounded-full border object-contain" loading="lazy">

                                            <a href="{{ route("frontend.team", $opponent->slug) }}"
                                                class="font-medium truncate text-teal-600 hover:underline"
                                                title="{{ app()->getLocale() === "bn" ? $opponent->name_bn : $opponent->name_en }}">
                                                {{ app()->getLocale() === "bn" ? $opponent->name_bn : $opponent->name_en }}
                                            </a>
                                        </div>
                                    </td>

                                    <!-- DATE -->
                                    <td class="p-2 text-left whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($match->date_time)->format("d M Y") }}
                                    </td>

                                    <!-- RESULT -->
                                    <td class="p-2 text-left whitespace-nowrap">
                                        <span class="font-medium {{ $resultColor }}">
                                            {{ $resultText }}
                                        </span>
                                    </td>

                                    <!-- SCORE -->
                                    <td class="p-2 text-left font-medium whitespace-nowrap">
                                        {{ $match->team1_score ?: "N/A" }} vs {{ $match->team2_score ?: "N/A" }}
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4"
                                        class="px-4 py-3 text-center italic text-red-600 whitespace-nowrap">
                                        No matches found...
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> --}}


                <div class="space-y-4 sm:space-y-5">

                    @forelse ($allMatches as $match)
                        @php
                            $isWin = $match->won === $team->id;
                            $opponent = $match->team1_id === $team->id ? $match->team2 : $match->team1;

                            $status = is_null($match->won) ? "No Result" : ($isWin ? "Win" : "Loss");

                            $border = is_null($match->won)
                                ? "border-l-amber-500"
                                : ($isWin
                                    ? "border-l-emerald-500"
                                    : "border-l-rose-500");
                        @endphp

                        <div
                            class="{{ $border }} group relative rounded-2xl border border-l-4 border-white/40 bg-white/70 shadow-sm backdrop-blur-xl transition-all duration-300 hover:shadow-md">

                            <!-- Content Wrapper -->
                            <div
                                class="flex flex-col gap-4 px-4 py-4 sm:flex-row sm:items-center sm:gap-6 sm:px-6 sm:py-5">

                                <!-- Opponent -->
                                <div class="flex min-w-0 items-center gap-3 sm:gap-4">
                                    <img src="{{ asset(@$opponent->media?->path ?? "images/user_profile.webp") }}"
                                        class="h-10 w-10 rounded-full object-cover ring-1 ring-black/5 sm:h-12 sm:w-12"
                                        loading="lazy">

                                    <div class="min-w-0">
                                        <a href="{{ route("frontend.team", $opponent->slug) }}"
                                            class="block truncate text-sm font-semibold text-gray-900 sm:text-[15px]">
                                            {{ app()->getLocale() === "bn" ? $opponent->name_bn : $opponent->name_en }}
                                        </a>

                                        <p
                                            class="mt-0.5 text-[10px] uppercase tracking-widest text-gray-400 sm:text-[11px]">
                                            {{ \Carbon\Carbon::parse($match->date_time)->format("d M Y") }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Divider (desktop only) -->
                                <div
                                    class="hidden h-px flex-1 bg-gradient-to-r from-transparent via-gray-200/60 to-transparent sm:block">
                                </div>

                                <!-- Score + Result -->
                                <div class="flex items-center justify-between sm:block sm:text-right">
                                    <p class="text-sm font-semibold tracking-tight text-gray-900 sm:text-[15px]">
                                        {{ $match->team1_score ?: "N/A" }}
                                        <span class="mx-1 font-normal text-gray-300">vs</span>
                                        {{ $match->team2_score ?: "N/A" }}
                                    </p>

                                    <p
                                        class="{{ $isWin ? "text-emerald-600" : (is_null($match->won) ? "text-amber-600" : "text-rose-600") }} mt-1 text-[10px] font-semibold uppercase tracking-widest sm:text-[11px]">
                                        {{ $status }}
                                    </p>
                                </div>

                            </div>
                        </div>

                    @empty
                        <div
                            class="rounded-2xl bg-white/60 py-10 text-center text-sm italic text-gray-400 backdrop-blur-xl">
                            No match history available
                        </div>
                    @endforelse

                </div>

                <!-- Pagination -->
                <div class="my-3 flex justify-center">
                    <nav class="inline-flex items-center gap-3 rounded-full bg-white px-4 py-2 text-xs sm:text-sm">

                        <!-- Prev -->
                        @if ($allMatches->onFirstPage())
                            <span class="select-none text-gray-400">‹ Prev</span>
                        @else
                            <button wire:click="previousPage('matchesPage')" wire:loading.attr="disabled"
                                class="text-gray-700 transition hover:text-gray-900">
                                ‹ Prev
                            </button>
                        @endif

                        <!-- Page info (mobile only) -->
                        <span class="text-gray-600 sm:hidden">
                            Page {{ $allMatches->currentPage() }} of {{ $allMatches->lastPage() }}
                        </span>

                        <!-- Desktop pagination numbers -->
                        <div class="hidden items-center gap-1 sm:flex">

                            @php
                                $current = $allMatches->currentPage();
                                $last = $allMatches->lastPage();
                                $start = max(1, $current - 2);
                                $end = min($last, $current + 2);
                            @endphp

                            <!-- First + ... -->
                            @if ($start > 1)
                                <button wire:click="gotoPage(1, 'matchesPage')"
                                    class="rounded-full bg-white px-3 py-1 hover:bg-gray-100">
                                    1
                                </button>
                                @if ($start > 2)
                                    <span class="text-gray-400">…</span>
                                @endif
                            @endif

                            <!-- Range -->
                            @foreach (range($start, $end) as $page)
                                @if ($page == $current)
                                    <span
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 text-white">
                                        {{ $page }}
                                    </span>
                                @else
                                    <button wire:click="gotoPage({{ $page }}, 'matchesPage')"
                                        class="rounded-full bg-white px-3 py-1 hover:bg-gray-100">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach

                            <!--  ... + Last -->
                            @if ($end < $last)
                                @if ($end < $last - 1)
                                    <span class="text-gray-400">…</span>
                                @endif
                                <button wire:click="gotoPage({{ $last }}, 'matchesPage')"
                                    class="rounded-full bg-white px-3 py-1 hover:bg-gray-100">
                                    {{ $last }}
                                </button>
                            @endif
                        </div>

                        <!--  Next -->
                        @if ($allMatches->hasMorePages())
                            <button wire:click="nextPage('matchesPage')" wire:loading.attr="disabled"
                                class="text-gray-700 transition hover:text-gray-900">
                                Next ›
                            </button>
                        @else
                            <span class="select-none text-gray-400">Next ›</span>
                        @endif
                    </nav>
                </div>
            </div>

            <!-- TEAM STATS -->
            <div x-show="tab === 'stats'" class="mt-4">
                <h2 class="mb-4 text-xl font-semibold tracking-tight text-teal-700">Team Statistics</h2>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <x-stat-card
                        label="Highest Team Score"
                        :value="$stats['highest_score'] ?? 0"
                        meta="Team Total"
                        accent="bg-green-600"
                        valueColor="text-green-700"
                    />

                    <x-stat-card
                        label="Lowest Team Score"
                        :value="$stats['lowest_score'] ?? 0"
                        meta="Team Total"
                        accent="bg-red-600"
                        valueColor="text-red-700"
                    />

                <x-stat-card
                        label="Most Runs"
                        :value="$teamStats['most_runs']?->battingStats->sum('runs') ?? 0"
                        accent="bg-emerald-600"
                        valueColor="text-emerald-700"
                >
                        <a href="{{ route('frontend.profile', $teamStats['most_runs']?->player_slug) }}">
                            {{ $teamStats['most_runs']?->player_name }}
                        </a>
                </x-stat-card>

                <x-stat-card
                        label="Top Wicket Taker"
                        :value="$top_wicket_taker_wickets ?? 0"
                        accent="bg-purple-600"
                        valueColor="text-purple-700"
                >
                        <a href="{{ route('frontend.profile', $top_wicket_taker_slug) }}">
                            {{ $top_wicket_taker }}
                        </a>
                </x-stat-card>

                <x-stat-card
                        label="Highest Score"
                        :value="$teamStats['highest_score'] ?? 0"
                        accent="bg-amber-600"
                        valueColor="text-amber-600"
                >
                        <a href="{{ route('frontend.profile', $teamStats['highest_score_player']?->player_slug) }}">
                            {{ $teamStats['highest_score_player']?->player_name ?? 'N/A' }}
                        </a>
                </x-stat-card>

                <x-stat-card
                    label="Best Batting Average"
                    :value="number_format($teamStats['best_average']?->batting_average ?? 0, 2)"
                    :meta="$teamStats['best_average']?->player_name ?? 'N/A'"
                    accent="bg-violet-600"
                    valueColor="text-violet-700"
                >
                        <a href="{{ route('frontend.profile', $teamStats['best_average']?->player_slug) }}">
                            {{ $teamStats['best_average']?->player_name ?? 'N/A' }}
                        </a>
                </x-stat-card>

                <x-stat-card
                    label="Best Strike Rate"
                    :value="number_format($teamStats['best_strike_rate']?->strike_rate ?? 0, 2)"
                    :meta="$teamStats['best_strike_rate']?->player_name ?? 'N/A'"
                    accent="bg-orange-600"
                    valueColor="text-orange-700"
                >
                        <a href="{{ route('frontend.profile', $teamStats['best_strike_rate']?->player_slug) }}">
                            {{ $teamStats['best_strike_rate']?->player_name ?? 'N/A' }}
                        </a>
                </x-stat-card>

                <x-stat-card
                    label="Most Hundreds"
                    :value="$teamStats['most_hundreds']?->battingStats->where('runs','>=',100)->count() ?? 0"
                    :meta="$teamStats['most_hundreds']?->player_name ?? 'N/A'"
                    accent="bg-red-600"
                    valueColor="text-red-700"
                >
                        <a href="{{ route('frontend.profile', $teamStats['most_hundreds']?->player_slug) }}">
                            {{ $teamStats['most_hundreds']?->player_name ?? 'N/A' }}
                        </a>
                </x-stat-card>
            
                <x-stat-card
                    label="Most Fifties"
                    :value="$teamStats['most_fifties']?->battingStats->whereBetween('runs',[50,99])->count() ?? 0"
                    :meta="$teamStats['most_fifties']?->player_name ?? 'N/A'"
                    accent="bg-sky-600"
                    valueColor="text-sky-700"
                >
                        <a href="{{ route('frontend.profile', $teamStats['most_fifties']?->player_slug) }}">
                            {{ $teamStats['most_fifties']?->player_name ?? 'N/A' }}
                        </a>
                </x-stat-card>

                <x-stat-card
                    label="Most Fours"
                    :value="$teamStats['most_fours']?->battingStats->sum('fours') ?? 0"
                    :meta="$teamStats['most_fours']?->player_name ?? 'N/A'"
                    accent="bg-lime-600"
                    valueColor="text-lime-700"
                >
                        <a href="{{ route('frontend.profile', $teamStats['most_fours']?->player_slug) }}">
                            {{ $teamStats['most_fours']?->player_name ?? 'N/A' }}
                        </a>
                </x-stat-card>

                <x-stat-card
                    label="Most Sixes"
                    :value="$teamStats['most_sixes']?->battingStats->sum('sixes') ?? 0"
                    :meta="$teamStats['most_sixes']?->player_name ?? 'N/A'"
                    accent="bg-purple-600"
                    valueColor="text-purple-600"
                >
                        <a href="{{ route('frontend.profile', $teamStats['most_sixes']?->player_slug) }}">
                            {{ $teamStats['most_sixes']?->player_name ?? 'N/A' }}
                        </a>
                </x-stat-card>

        
                     {{-- <!-- Highest Score -->
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-green-600"></div>
                        <p class="text-sm font-medium text-gray-500">Highest Score</p>
                        <p class="mt-2 text-3xl font-bold text-green-700">
                            {{ $stats["highest_score"] ?? 0 }}
                        </p>
                    </div>

                    <!-- Lowest Score -->
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-red-600"></div>
                        <p class="text-sm font-medium text-gray-500">Lowest Score</p>
                        <p class="mt-2 text-3xl font-bold text-red-600">
                            {{ $stats["lowest_score"] ?? 0 }}
                        </p>
                    </div> 

                    <!-- Top Scorer -->
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-teal-600"></div>
                        <p class="text-sm font-medium text-gray-500">Top Scorer</p>

                        <a href="{{ route("frontend.profile", $top_scorer_slug) }}"
                            class="mt-2 block text-lg font-semibold text-teal-700 hover:underline">
                            {{ $top_scorer }}
                        </a>

                        <p class="text-sm font-semibold text-amber-600">
                            {{ $top_scorer_runs }} runs
                        </p>
                    </div>

                    <!-- Top Wicket Taker -->
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-purple-600"></div>
                        <p class="text-sm font-medium text-gray-500">Top Wicket Taker</p>

                        <a href="{{ route("frontend.profile", $top_wicket_taker_slug) }}"
                            class="mt-2 block text-lg font-semibold text-purple-700 hover:underline">
                            {{ $top_wicket_taker }}
                        </a>

                        <p class="text-sm font-semibold text-red-600">
                            {{ $top_wicket_taker_wickets }} wickets
                        </p>
                    </div>

                    <!-- Most Runs -->
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-green-600"></div>
                    
                        <p class="text-sm font-medium text-gray-500">Most Runs</p>
                    
                        <p class="mt-2 text-3xl font-bold text-green-700">
                            {{ $teamStats['most_runs']?->battingStats->sum('runs') ?? 0 }}
                        </p>
                    
                        <p class="mt-1 text-sm font-semibold text-gray-700">
                            {{ $teamStats['most_runs']?->player_name ?? 'N/A' }}
                        </p>
                    </div>
                    
            
                    <!-- 2️⃣ Highest Individual Score -->
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-amber-600"></div>
                        <p class="text-sm font-medium text-gray-500">Highest Score</p>
            
                        <p class="mt-2 text-3xl font-bold text-amber-600">
                            {{ $teamStats['highest_score'] }}
                        </p>
            
                        <p class="mt-1 text-sm font-semibold text-gray-700">
                            {{ $teamStats['highest_score_player']?->player_name ?? 'N/A' }}
                        </p>
                    </div>
            
                  
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-teal-600"></div>
                    
                        <p class="text-sm font-medium text-gray-500">Best Batting Average</p>
                    
                        <p class="mt-2 text-3xl font-bold text-teal-700">
                            {{ number_format($teamStats['best_average']?->batting_average ?? 0, 2) }}
                        </p>
                    
                        <p class="mt-1 text-sm font-semibold text-gray-700">
                            {{ $teamStats['best_average']?->player_name ?? 'N/A' }}
                        </p>
                    </div>
            
                   
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-indigo-600"></div>
                    
                        <p class="text-sm font-medium text-gray-500">Best Strike Rate</p>
                    
                        <p class="mt-2 text-3xl font-bold text-indigo-700">
                            {{ number_format($teamStats['best_strike_rate']?->strike_rate ?? 0, 2) }}
                        </p>
                    
                        <p class="mt-1 text-sm font-semibold text-gray-700">
                            {{ $teamStats['best_strike_rate']?->player_name ?? 'N/A' }}
                        </p>
                    </div>
            
                   
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-red-600"></div>
                        <p class="text-sm font-medium text-gray-500">Most Hundreds</p>
            
                        <p class="mt-2 text-3xl font-bold text-red-600">
                            {{ $teamStats['most_hundreds']?->battingStats->where('runs', '>=', 100)->count() ?? 0 }}
                        </p>
            
                        <p class="mt-1 text-sm font-semibold text-gray-700">
                            {{ $teamStats['most_hundreds']?->player_name ?? 'N/A' }}
                        </p>
                    </div>
            
                   
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-orange-600"></div>
                        <p class="text-sm font-medium text-gray-500">Most Fifties</p>
            
                        <p class="mt-2 text-3xl font-bold text-orange-600">
                            {{ $teamStats['most_fifties']?->battingStats->whereBetween('runs', [50, 99])->count() ?? 0 }}
                        </p>
            
                        <p class="mt-1 text-sm font-semibold text-gray-700">
                            {{ $teamStats['most_fifties']?->player_name ?? 'N/A' }}
                        </p>
                    </div>
            
                  
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-cyan-600"></div>
                        <p class="text-sm font-medium text-gray-500">Most Fours</p>
            
                        <p class="mt-2 text-3xl font-bold text-cyan-600">
                            {{ $teamStats['most_fours']?->battingStats->sum('fours') ?? 0 }}
                        </p>
            
                        <p class="mt-1 text-sm font-semibold text-gray-700">
                            {{ $teamStats['most_fours']?->player_name ?? 'N/A' }}
                        </p>
                    </div>
            
               
                    <div class="relative rounded-xl border border-gray-200 bg-white p-5">
                        <div class="absolute left-0 top-0 h-full w-1 rounded-l-xl bg-purple-600"></div>
                        <p class="text-sm font-medium text-gray-500">Most Sixes</p>
            
                        <p class="mt-2 text-3xl font-bold text-purple-600">
                            {{ $teamStats['most_sixes']?->battingStats->sum('sixes') ?? 0 }}
                        </p>
            
                        <p class="mt-1 text-sm font-semibold text-gray-700">
                            {{ $teamStats['most_sixes']?->player_name ?? 'N/A' }}
                        </p>
                    </div> --}} 
                   </div>
                </div>

            </div>
        </div>

        @push("title")
            {{ $team->name_en }}
        @endpush
    </div>
