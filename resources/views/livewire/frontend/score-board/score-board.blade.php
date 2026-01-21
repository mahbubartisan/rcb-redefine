<div>
    <section class="mt-20 lg:mt-8">
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
            <div>
                <!-- Previous Layout -->
                {{-- <div class="bg-white mx-auto rounded border border-gray-200 p-2 lg:p-6 w-full max-w-7xl">
                    <!-- Header Info -->
                    <div class="text-[14.5px]">
                        <span class="font-medium text-teal-600">
                            {{ $match->name ?? "N/A" }}
                        </span>
                        <div class="text-gray-600">
                            {{ $match->venue ?? "Venue Not Set Yet" }},
                            {{ \Carbon\Carbon::parse($match->date_time)->format("M d Y, h:i A") }}
                        </div>
                    </div>
        
                    <!-- Toss Info -->
                    @if ($match->toss)
                        <div class="mt-1 text-sm text-gray-700">
                            Toss: {{ $match->toss }}
                        </div>
                    @endif
        
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4">
                        <!-- Left card -->
                        <div class="bg-white border border-gray-100 rounded-xl p-4 flex flex-col space-y-4">
                            <!-- Team 1 -->
                            <div class="flex items-center space-x-3">
                                <img src="{{ optional($match->team1->media)->path
                                    ? asset(optional($match->team1->media)->path)
                                    : "https://ui-avatars.com/api/?name=" .
                                        urlencode(optional($match->team1)->name_en) .
                                        "&background=20b2aa&color=fff&size=64&length=3" }}"
                                    alt="{{ optional($match->team1)->name_en }}"
                                    class="w-10 h-10 rounded-full object-fill ring-1 ring-gray-200" loading="lazy" />
        
                                <div>
                                    <div class="text-teal-600 font-semibold text-sm uppercase tracking-wide">
                                        <a href="{{ route("frontend.team", $match->team1->slug) }}">
                                            {{ app()->getLocale() === "bn" ? optional($match->team1)->name_bn : optional($match->team1)->name_en }}
                                        </a>
                                    </div>
                                    <div class="text-gray-800 text-sm font-medium">
                                        @if (empty($match->team1_score) && empty($match->team1_played_over))
                                            Yet to bat
                                        @else
                                            {{ $match->team1_score ?? 0 }}
                                            <span>({{ $match->team1_played_over ?: 0 }})</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Team 2 -->
                            <div class="flex items-center space-x-3">
                                <img src="{{ optional($match->team2->media)->path
                                    ? asset(optional($match->team2->media)->path)
                                    : "https://ui-avatars.com/api/?name=" .
                                        urlencode(optional($match->team2)->name_en) .
                                        "&background=20b2aa&color=fff&size=64&length=3" }}"
                                    alt="{{ optional($match->team2)->name_en }}"
                                    class="w-10 h-10 rounded-full object-fill ring-1 ring-gray-200" loading="lazy">
                                <div>
                                    <div class="text-teal-600 font-semibold text-sm uppercase tracking-wide">
                                        <a href="{{ route("frontend.team", $match->team2->slug) }}">
                                            {{ app()->getLocale() === "bn" ? optional($match->team2)->name_bn : optional($match->team2)->name_en }}
                                        </a>
                                    </div>
                                    <div class="text-gray-800 text-sm font-medium">
                                        @if (empty($match->team2_score) && empty($match->team2_played_over))
                                            Yet to bat
                                        @else
                                            {{ $match->team2_score ?? 0 }}
                                            <span>({{ $match->team2_played_over ?: 0 }})</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <!-- Right card -->
                        <div class="bg-white border border-gray-100 rounded-xl p-4 flex flex-col justify-center space-y-4">
                            <div>
                                <div class="text-teal-600 text-sm font-semibold uppercase">
                                    {{ __("messages.result") }}
                                </div>
                                <div class="text-sm text-gray-800 font-medium">
                                    {{ $match->match_result ?: "N/A" }}
                                </div>
                            </div>
                            <div>
                                <div class="text-teal-600 text-sm font-semibold uppercase">
                                    {{ __("messages.player_of_the_match") }}
                                </div>
                                @if ($match->player_of_match)
                                    <div class="text-sm font-medium">
                                        <a href="{{ route("frontend.profile", optional($match->player)->slug) }}"
                                            class="text-gray-800 hover:text-teal-600 hover:underline">
                                            {{ strtoupper(app()->getLocale() === "bn" ? optional($match->player)->first_name_bn : optional($match->player)->first_name_en) }}
                                        </a>
                                    </div>
                                @else
                                    <span class="text-sm">{{ "N/A" }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> --}}


                {{-- <div class="bg-white border rounded p-4 lg:p-6">
        
                    <!-- Match Title -->
                    <div class="text-center mb-8">
                        <p class="text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($match->date_time)->format("M d Y, h:i A") }} —
                            {{ $match->venue ?? "Venue Not Set Yet" }}
                        </p>
                        <h2 class="text-2xl font-bold mt-2 tracking-tight text-gray-700">
                            {{ app()->getLocale() === "bn" ? optional($match->team1)->name_bn : optional($match->team1)->name_en }}
                            vs
                            {{ app()->getLocale() === "bn" ? optional($match->team2)->name_bn : optional($match->team2)->name_en }}
                        </h2>
                    </div>
        
                    <div class="grid grid-cols-3 gap-6 items-center">
        
                        <!-- Team 1 -->
                        <div class="text-center space-y-2">
                            <img src="{{ optional($match->team1->media)->path
                                ? asset(optional($match->team1->media)->path)
                                : "https://ui-avatars.com/api/?name=" .
                                    urlencode(optional($match->team1)->name_en) .
                                    "&background=20b2aa&color=fff&size=64&length=3" }}"
                                alt="{{ optional($match->team1)->name_en }}"
                                class="h-9 w-9 lg:h-16 lg:w-16 mx-auto object-contain rounded-full ring-1 ring-gray-200"
                                loading="lazy" />
                            <p class="text-xs lg:text-sm uppercase font-medium tracking-tight text-gray-700">
                                {{ optional($match->team1)->name_en }}
                            </p>
                            <p class="text-2xl lg:text-3xl font-bold text-gray-900">160/5</p>
                            <p class="text-sm text-gray-600">20 overs</p>
                        </div>
        
                        <!-- Central Score -->
                        <div class="text-center">
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-tight">RESULT</p>
                            <p class="text-sm lg:text-base font-semibold tracking-tight text-teal-600 mt-1">
                                {{ $match->match_result ?: "N/A" }}
                            </p>
        
                            <div class="border-t border-gray-300 my-3"></div>
        
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-tight">
                                Player of the Match
                            </p>
                            <p class="text-sm lg:text-base font-medium mt-1 tracking-tight text-teal-600">
                                {{ strtoupper(app()->getLocale() === "bn" ? optional($match->player)->first_name_bn : optional($match->player)->first_name_en) }}
                            </p>
                        </div>
        
                        <!-- Team 2 -->
                        <div class="text-center space-y-2">
                            <img src="{{ optional($match->team2->media)->path
                                ? asset(optional($match->team2->media)->path)
                                : "https://ui-avatars.com/api/?name=" .
                                    urlencode(optional($match->team1)->name_en) .
                                    "&background=20b2aa&color=fff&size=64&length=3" }}"
                                alt="{{ optional($match->team2)->name_en }}"
                                class="h-9 w-9 lg:h-16 lg:w-16 mx-auto object-contain rounded-full ring-1 ring-gray-200"
                                loading="lazy" />
                            <p class="text-xs lg:text-sm uppercase font-medium tracking-tight text-gray-700">
                                {{ optional($match->team2)->name_en }}
                            </p>
                            <p class="text-2xl lg:text-3xl font-bold text-gray-900">145/8</p>
                            <p class="text-sm text-gray-600">20 overs</p>
                        </div>
        
                    </div>
        
                </div> --}}

                <div class="rounded border bg-white p-4 lg:p-6">

                    <!-- Match Title -->
                    <div class="mb-6">
                        <!-- Top Match Meta -->
                        <div class="text-center">
                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($match->date_time)->format("M d, Y • h:i A") }}
                            </p>
                            <p class="text-sm text-teal-600">
                                {{ $match->venue ?? "Venue Not Set Yet" }}
                            </p>
                        </div>

                        <div
                            class="mt-3 flex w-full flex-col items-center justify-center gap-1 text-xl font-bold tracking-tight text-gray-700 lg:flex-row lg:gap-4 lg:text-2xl">

                            <!-- Team 1 -->
                            <span class="text-center lg:w-1/3 lg:text-right">
                                {{ app()->getLocale() === "bn" ? optional($match->team1)->name_bn : optional($match->team1)->name_en }}
                            </span>

                            <!-- VS block -->
                            <span class="rounded-full bg-red-600 px-2 py-1.5 text-sm text-white lg:text-base">
                                VS
                            </span>

                            <!-- Team 2 -->
                            <span class="text-center lg:w-1/3 lg:text-left">
                                {{ app()->getLocale() === "bn" ? optional($match->team2)->name_bn : optional($match->team2)->name_en }}
                            </span>
                        </div>

                    </div>

                    <!-- MOBILE LAYOUT (only mobile) -->
                    <div class="space-y-4 lg:hidden">
                        <!-- Team 1 -->
                        <div class="rounded-xl border border-gray-200 bg-gradient-to-br from-gray-50 to-white p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ optional($match->team1->media)->path
                                        ? asset(optional($match->team1->media)->path)
                                        : "https://ui-avatars.com/api/?name=" .
                                            urlencode(optional($match->team1)->name_en) .
                                            "&background=20b2aa&color=fff&size=64&length=3" }}"
                                        alt="{{ optional($match->team1)->name_en }}" loading="lazy"
                                        class="h-10 w-10 rounded-full ring-1 ring-gray-200" />
                                    <div
                                        class="text-sm font-semibold text-gray-800 hover:text-teal-600 hover:underline">
                                        <a href="{{ route("frontend.team", $match->team1->slug) }}">
                                            {{ app()->getLocale() === "bn" ? optional($match->team1)->name_bn : optional($match->team1)->name_en }}
                                        </a>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <p class="text-xl font-bold text-gray-900">
                                        {{ $match->team1_score }}
                                    </p>
                                    <div class="text-sm font-medium text-gray-700">
                                        @if (empty($match->team1_score) && empty($match->team1_played_over))
                                            Yet to bat
                                        @else
                                            <span class="text-sm text-gray-600">
                                                {{ $match->team1_played_over ?: 0 }} overs
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- RESULT -->
                        <div class="rounded-xl border border-gray-200 bg-white p-4 text-center">
                            <p class="text-xs uppercase tracking-tight text-gray-500">RESULT</p>
                            <p class="mt-1 text-base font-medium text-teal-600">
                                {{ $match->match_result ?: "N/A" }}
                            </p>

                            <div class="my-3 border-t"></div>

                            <p class="text-xs uppercase tracking-tight text-gray-500">
                                Player of the Match
                            </p>
                            <div class="mt-1 text-sm font-medium text-teal-600">
                                @if (optional($match->player)->slug)
                                    <a href="{{ route("frontend.profile", ["slug" => optional($match->player)->slug]) }}"
                                        class="hover:underline">
                                        {{ app()->getLocale() === "bn"
                                            ? optional($match->player)->first_name_bn ?? "N/A"
                                            : optional($match->player)->first_name_en ?? "N/A" }}
                                    </a>
                                @else
                                    <span>
                                        N/A
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Team 2 -->
                        <div class="rounded-xl border border-gray-200 bg-gradient-to-br from-gray-50 to-white p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ optional($match->team2->media)->path
                                        ? asset(optional($match->team2->media)->path)
                                        : "https://ui-avatars.com/api/?name=" .
                                            urlencode(optional($match->team2)->name_en) .
                                            "&background=20b2aa&color=fff&size=64&length=3" }}"
                                        alt="{{ optional($match->team2)->name_en }}" loading="lazy"
                                        class="h-10 w-10 rounded-full ring-1 ring-gray-200" />
                                    <div
                                        class="text-sm font-semibold text-gray-800 hover:text-teal-600 hover:underline">
                                        <a href="{{ route("frontend.team", optional($match->team2)->slug) }}">
                                            {{ app()->getLocale() === "bn" ? optional($match->team2)->name_bn : optional($match->team2)->name_en }}
                                        </a>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <p class="text-xl font-bold text-gray-900">
                                        {{ $match->team2_score }}
                                    </p>
                                    <div class="text-sm font-medium text-gray-700">
                                        @if (empty($match->team2_score) && empty($match->team2_played_over))
                                            Yet to bat
                                        @else
                                            <span class="text-sm text-gray-600">
                                                {{ $match->team2_played_over ?: 0 }} overs
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DESKTOP LAYOUT (your original grid) -->
                    <div class="hidden grid-cols-3 items-center gap-6 lg:grid">

                        <!-- Team 1 -->
                        <div class="space-y-2 text-center">
                            <img src="{{ optional($match->team1->media)->path
                                ? asset(optional($match->team1->media)->path)
                                : "https://ui-avatars.com/api/?name=" . urlencode(optional($match->team1)->name_en) }}"
                                class="mx-auto h-16 w-16 rounded-full object-contain ring-1 ring-gray-200" />
                            <div
                                class="text-sm font-semibold uppercase text-gray-800 hover:text-teal-600 hover:underline">
                                <a href="{{ route("frontend.team", optional($match->team1)->slug) }}">
                                    {{ app()->getLocale() === "bn" ? optional($match->team1)->name_bn : optional($match->team1)->name_en }}
                                </a>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">{{ $match->team1_score }}</p>
                            <div class="text-sm font-medium text-gray-700">
                                @if (empty($match->team1_score) && empty($match->team1_played_over))
                                    Yet to bat
                                @else
                                    <span class="text-sm text-gray-600">
                                        {{ $match->team1_played_over ?: 0 }} overs
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Result -->
                        <div class="text-center">
                            <p class="text-sm font-medium uppercase tracking-tight text-gray-500">RESULT</p>
                            <p class="mt-1 text-base font-medium text-teal-600">
                                {{ $match->match_result ?: "N/A" }}
                            </p>

                            <div class="my-3 border-t border-gray-300"></div>

                            <p class="text-sm font-medium uppercase tracking-tight text-gray-500">
                                Player of the Match
                            </p>
                            <div class="mt-1 text-base font-medium text-teal-600">
                                @if (optional($match->player)->slug)
                                    <a href="{{ route("frontend.profile", ["slug" => optional($match->player)->slug]) }}"
                                        class="hover:underline">
                                        {{ app()->getLocale() === "bn"
                                            ? optional($match->player)->first_name_bn ?? "N/A"
                                            : optional($match->player)->first_name_en ?? "N/A" }}
                                    </a>
                                @else
                                    <span>
                                        N/A
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Team 2 -->
                        <div class="space-y-2 text-center">
                            <img src="{{ optional($match->team2->media)->path
                                ? asset(optional($match->team2->media)->path)
                                : "https://ui-avatars.com/api/?name=" . urlencode(optional($match->team2)->name_en) }}"
                                class="mx-auto h-16 w-16 rounded-full object-contain ring-1 ring-gray-200" />
                            <div
                                class="text-sm font-semibold uppercase text-gray-800 hover:text-teal-600 hover:underline">
                                <a href="{{ route("frontend.team", $match->team2->slug) }}">
                                    {{ app()->getLocale() === "bn" ? optional($match->team2)->name_bn : optional($match->team2)->name_en }}
                                </a>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">{{ $match->team2_score }}</p>
                            <div class="text-sm font-medium text-gray-700">
                                @if (empty($match->team2_score) && empty($match->team2_played_over))
                                    Yet to bat
                                @else
                                    <span class="text-sm text-gray-600">
                                        {{ $match->team2_played_over ?: 0 }} overs
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

                @if ($defaultTab)
                    <div class="pt-3" x-data="{
                        tab: '{{ $defaultTab }}',
                        scoreSubtab: 'teamA',
                        updateUrl(newTab) {
                            const url = new URL(window.location.href);
                            url.searchParams.set('tab', newTab);
                            window.history.replaceState({}, '', url);
                        }
                    }" x-init="// On page load, set tab from URL or default
                    (() => {
                        const params = new URLSearchParams(window.location.search);
                        const tabParam = params.get('tab');
                        if (tabParam && tabParam !== tab) {
                            tab = tabParam;
                        } else {
                            // If no tab in URL, push the default one immediately
                            updateUrl(tab);
                        }
                    })();">
                        <div class="mx-auto w-full max-w-7xl rounded border border-gray-200 bg-white p-2 lg:p-6">

                            <!-- STICKY TABS WRAPPER -->
                            <div class="sticky top-16 z-40 bg-white/95 backdrop-blur-lg transition-shadow duration-300"
                                :class="{ 'shadow-md border-b border-gray-200': scrolled }" x-data
                                x-init="window.addEventListener('scroll', () => {
                                    scrolled = window.scrollY > 120
                                })" x-cloak>
                                <!-- Tabs -->
                                <div class="border-b border-gray-200">
                                    <div class="no-scrollbar overflow-x-auto">
                                        <div class="mx-auto flex min-w-max justify-center gap-8 px-4 py-3">

                                            @if (in_array("summary", $availableTabs))
                                                <button
                                                    class="relative pb-2 text-[15px] font-semibold uppercase tracking-wide transition"
                                                    :class="tab === 'summary'
                                                        ?
                                                        'text-teal-600' :
                                                        'text-gray-700 hover:text-teal-600'"
                                                    @click="tab = 'summary'; updateUrl('summary')" type="button">
                                                    {{ __("messages.summary") }}

                                                    <!-- Active underline -->
                                                    <span x-show="tab === 'summary'"
                                                        class="absolute -bottom-[1px] left-0 h-[2px] w-full rounded-full bg-teal-500">
                                                    </span>
                                                </button>
                                            @endif

                                            @if (in_array("scorecard", $availableTabs))
                                                <button
                                                    class="relative pb-2 text-[15px] font-semibold uppercase tracking-wide transition"
                                                    :class="tab === 'scorecard'
                                                        ?
                                                        'text-teal-600' :
                                                        'text-gray-700 hover:text-teal-600'"
                                                    @click="tab = 'scorecard'; scoreSubtab = 'teamA'; updateUrl('scorecard')"
                                                    type="button">
                                                    {{ __("messages.scorecard") }}
                                                    <span x-show="tab === 'scorecard'"
                                                        class="absolute -bottom-[1px] left-0 h-[2px] w-full rounded-full bg-teal-500"></span>
                                                </button>
                                            @endif

                                            @if (in_array("squad", $availableTabs))
                                                <button
                                                    class="relative pb-2 text-[15px] font-semibold uppercase tracking-wide transition"
                                                    :class="tab === 'squad'
                                                        ?
                                                        'text-teal-600' :
                                                        'text-gray-700 hover:text-teal-600'"
                                                    @click="tab = 'squad'; updateUrl('squad')" type="button">
                                                    {{ __("messages.squad") }}
                                                    <span x-show="tab === 'squad'"
                                                        class="absolute -bottom-[1px] left-0 h-[2px] w-full rounded-full bg-teal-500"></span>
                                                </button>
                                            @endif

                                            @if (in_array("matchinfo", $availableTabs))
                                                <button
                                                    class="relative pb-2 text-[15px] font-semibold uppercase tracking-wide transition"
                                                    :class="tab === 'matchinfo'
                                                        ?
                                                        'text-teal-600' :
                                                        'text-gray-700 hover:text-teal-600'"
                                                    @click="tab = 'matchinfo'; updateUrl('matchinfo')" type="button">
                                                    {{ __("messages.match_info") }}
                                                    <span x-show="tab === 'matchinfo'"
                                                        class="absolute -bottom-[1px] left-0 h-[2px] w-full rounded-full bg-teal-500"></span>
                                                </button>
                                            @endif

                                            @if (in_array("overs", $availableTabs))
                                                <button
                                                    class="relative pb-2 text-[15px] font-semibold uppercase tracking-wide transition"
                                                    :class="tab === 'overs'
                                                        ?
                                                        'text-teal-600' :
                                                        'text-gray-700 hover:text-teal-600'"
                                                    @click="tab = 'overs'; updateUrl('overs')" type="button">
                                                    {{ __("messages.overs") }}
                                                    <span x-show="tab === 'overs'"
                                                        class="absolute -bottom-[1px] left-0 h-[2px] w-full rounded-full bg-teal-500"></span>
                                                </button>
                                            @endif

                                            @if (in_array("headtohead", $availableTabs))
                                                <button
                                                    class="relative pb-2 text-[15px] font-semibold uppercase tracking-wide transition"
                                                    :class="tab === 'headtohead'
                                                        ?
                                                        'text-teal-600' :
                                                        'text-gray-700 hover:text-teal-600'"
                                                    @click="tab = 'headtohead'; updateUrl('headtohead')"
                                                    type="button">
                                                    {{ __("messages.headtohead") }}
                                                    <span x-show="tab === 'headtohead'"
                                                        class="absolute -bottom-[1px] left-0 h-[2px] w-full rounded-full bg-teal-500"></span>
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Content -->
                            <div>
                                @if (in_array("summary", $availableTabs))
                                    <div x-show="tab === 'summary'" x-cloak class="text-sm text-gray-700">
                                        <div class="mx-auto">
                                            <div class="mt-5 bg-white p-2">
                                                @foreach ([$match->team1, $match->team2] as $team)
                                                    @php
                                                        // Batting for this team, order by runs desc (top scorers)
                                                        $batting = $match->battings
                                                            ->where("team_id", $team->id)
                                                            ->sortByDesc("runs");

                                                        // Opponent team id
                                                        $opponentId =
                                                            $match->team1->id === $team->id
                                                                ? $match->team2->id
                                                                : $match->team1->id;

                                                        // Bowling of opponent team (for display — top 3)
                                                        $bowling = $this->match->bowlings
                                                            ->where("team_id", $opponentId)
                                                            ->sortBy([["wickets", "desc"], ["runs", "asc"]])
                                                            ->take(3)
                                                            ->values();

                                                        // Calculate total overs for this innings
                                                        $totalOvers = $this->match->bowlings
                                                            ->where("team_id", $opponentId)
                                                            ->sum("overs");

                                                        // Calculate extras for this team
                                                        $teamExtras = $match->extras->where("team_id", $opponentId);
                                                        $totalExtras =
                                                            $teamExtras->sum("byes") +
                                                            $teamExtras->sum("leg_byes") +
                                                            $teamExtras->sum("wides") +
                                                            $teamExtras->sum("no_balls");

                                                        // Team total = batsmen runs + extras
                                                        $teamScore = $batting->sum("runs") + $totalExtras;

                                                        // Wickets
                                                        $wickets = $batting
                                                            ->whereNotIn("dismissal", ["not out", "retired hurt"])
                                                            ->count();

                                                        // Display variable
                                                        $overs = $totalOvers;

                                                        // Take top 3 batters
                                                        $batting = $batting->take(3);

                                                    @endphp

                                                    <!-- Divider between teams -->
                                                    @if (!$loop->last)
                                                        <div class="my-4 border-t border-gray-200"></div>
                                                    @endif

                                                    <!-- Team Summary Card -->
                                                    <div
                                                        class="{{ $loop->first ? "" : "mt-8" }} rounded-2xl border border-gray-100 bg-white p-4">
                                                        <!-- Header -->
                                                        <div class="flex items-center justify-between">
                                                            <h3
                                                                class="text-sm font-semibold uppercase tracking-wide text-teal-600 lg:text-lg">
                                                                {{ app()->getLocale() === "bn" ? $team->name_bn : $team->name_en }}
                                                            </h3>

                                                            @if (!empty($teamScore) || !empty($wickets) || !empty($overs))
                                                                <div
                                                                    class="mt-1 text-base font-semibold text-gray-800 sm:mt-0 sm:text-lg">
                                                                    <span
                                                                        class="text-teal-600">{{ (int) $teamScore }}-{{ $wickets }}</span>
                                                                    <span
                                                                        class="ml-1 text-sm font-medium text-gray-500">({{ $overs }}
                                                                        Ov)</span>
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <!-- Batting & Bowling Grid -->
                                                        <div class="mt-5 grid grid-cols-1 gap-8 sm:grid-cols-2">
                                                            <!-- Batting Section -->
                                                            <div>
                                                                <div class="mb-2 flex items-center justify-between">
                                                                    <h4
                                                                        class="text-sm font-semibold uppercase tracking-wide text-gray-700">
                                                                        Batting</h4>
                                                                    <span
                                                                        class="h-[2px] w-6 rounded-full bg-teal-500"></span>
                                                                </div>

                                                                <div class="divide-y divide-gray-100">
                                                                    @forelse ($batting as $b)
                                                                        <div
                                                                            class="flex items-center justify-between py-2">
                                                                            <a href="{{ route("frontend.profile", optional($b->batter)->slug) }}"
                                                                                class="max-w-[150px] truncate text-sm font-normal text-teal-600 hover:underline sm:max-w-none"
                                                                                title="{{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}">
                                                                                {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                                            </a>
                                                                            <div
                                                                                class="whitespace-nowrap text-sm font-semibold text-gray-900">
                                                                                {{ $b->runs }}@if ($b->dismissal === "not out")
                                                                                    *
                                                                                @endif
                                                                                <span
                                                                                    class="ml-1 font-normal text-gray-500">({{ $b->balls }})</span>
                                                                            </div>
                                                                        </div>
                                                                        @empty
                                                                            <p class="py-2 text-sm italic text-gray-400">
                                                                                {{ __("No batting data available") }}</p>
                                                                        @endforelse
                                                                    </div>
                                                                </div>

                                                                <!-- Bowling Section -->
                                                                <div>
                                                                    <div class="mb-2 flex items-center justify-between">
                                                                        <h4
                                                                            class="text-sm font-semibold uppercase tracking-wide text-gray-700">
                                                                            Bowling
                                                                        </h4>
                                                                        <span
                                                                            class="h-[2px] w-6 rounded-full bg-teal-500"></span>
                                                                    </div>

                                                                    <div class="divide-y divide-gray-100">
                                                                        @forelse ($bowling as $bo)
                                                                            <div
                                                                                class="flex items-center justify-between py-2">
                                                                                <a href="{{ route("frontend.profile", optional($bo->bowler)->slug) }}"
                                                                                    class="max-w-[150px] truncate text-sm font-normal text-teal-600 hover:underline sm:max-w-none"
                                                                                    title="{{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}">
                                                                                    {{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}
                                                                                </a>
                                                                                <div
                                                                                    class="whitespace-nowrap text-sm font-semibold text-gray-900">
                                                                                    {{ $bo->wickets }}-{{ $bo->runs }}
                                                                                </div>
                                                                            </div>
                                                                        @empty
                                                                            <p class="py-2 text-sm italic text-gray-400">
                                                                                {{ __("No bowling data available") }}</p>
                                                                        @endforelse
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    @endif

                                    @if (in_array("scorecard", $availableTabs))
                                        <div x-show="tab === 'scorecard'" x-cloak class="text-sm text-gray-700">
                                            <div x-data="{ openCard: 0, totalCards: {{ count($scorecards) }} }" class="hidden space-y-6 md:block">
                                                @foreach ($scorecards as $index => $card)
                                                    <div class="overflow-hidden bg-white transition-all duration-300">
                                                        <!-- Header -->
                                                        <div class="flex cursor-pointer items-center justify-between border-b px-3 py-2 transition-all duration-300"
                                                            :class="openCard === {{ $index }} ?
                                                                'bg-teal-500 text-white' :
                                                                'bg-gray-50 text-gray-800'"
                                                            @click="
                                                                if (openCard !== {{ $index }}) {
                                                                    // open new tab
                                                                    openCard = {{ $index }};
                                                                } else {
                                                                    // if user clicks same open tab — auto switch to next
                                                                    openCard = (openCard + 1) % totalCards;
                                                                }
                                                            ">

                                                            <h1 class="text-lg font-semibold">
                                                                {{ app()->getLocale() === "bn" ? $card["team"]->name_bn : $card["team"]->name_en }}
                                                            </h1>

                                                            <div class="flex items-center gap-2 font-semibold"
                                                                :class="openCard === {{ $index }} ? 'text-white' :
                                                                    'text-gray-800'">
                                                                <span>
                                                                    {{ $card["score"] ?? "-" }}-
                                                                    {{ $card["batting"]->whereNotIn("dismissal", ["not out", "retired hurt"])->count() }}
                                                                    <span class="text-sm font-medium"
                                                                        :class="openCard === {{ $index }} ?
                                                                            'text-white' :
                                                                            'text-gray-800'">
                                                                        ({{ $card["bowling"]->sum("overs") ?: "-" }} Ov)
                                                                    </span>
                                                                </span>

                                                                <svg :class="{ 'rotate-180': openCard === {{ $index }} }"
                                                                    class="h-4 w-4 transition-transform duration-200"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M6 9l6 6 6-6" />
                                                                </svg>
                                                            </div>
                                                        </div>

                                                        <!-- Content -->
                                                        <div x-show="openCard === {{ $index }}" x-collapse
                                                            style="display: none">
                                                            <!-- Batters -->
                                                            <div>
                                                                <!-- Header -->
                                                                <div
                                                                    class="grid grid-cols-[1fr_2rem_2rem_2rem_2rem_3rem] border-b bg-teal-50 text-sm sm:grid-cols-[1fr_3rem_3rem_3rem_3rem_4rem]">
                                                                    <div class="min-w-28 p-2 text-left font-semibold">
                                                                        Batter</div>
                                                                    <div class="p-2 text-center font-semibold">R</div>
                                                                    <div class="p-2 text-center font-semibold">B</div>
                                                                    <div class="p-2 text-center font-semibold">4s</div>
                                                                    <div class="p-2 text-center font-semibold">6s</div>
                                                                    <div class="p-2 text-center font-semibold">SR</div>
                                                                </div>

                                                                <!-- Rows -->
                                                                <div class="divide-y">
                                                                    @foreach ($card["batting"] as $b)
                                                                        <div
                                                                            class="grid grid-cols-[1fr_2rem_2rem_2rem_2rem_3rem] items-start text-sm sm:grid-cols-[1fr_3rem_3rem_3rem_3rem_4rem]">
                                                                            <div class="min-w-28 p-2">
                                                                                <!-- Player Info -->
                                                                                <div class="flex items-start gap-2">
                                                                                    <!-- Player Image -->
                                                                                    <img src="{{ asset(optional($b->batter->media)->path ?? "images/user_profile.webp") }}"
                                                                                        alt="{{ optional($b->batter)->first_name_en }}"
                                                                                        class="h-8 w-8 flex-shrink-0 rounded-full border object-contain" />

                                                                                    <!-- Name + How Out -->
                                                                                    <div
                                                                                        class="grid grid-cols-1 lg:grid-cols-[250px_1fr] lg:items-center">
                                                                                        <!-- Player Name -->
                                                                                        <a href="{{ route("frontend.profile", optional($b->batter)->slug) }}"
                                                                                            class="block truncate md:overflow-visible md:text-clip md:whitespace-normal"
                                                                                            title="{{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}">
                                                                                            <span
                                                                                                class="text-sm text-teal-600 hover:underline">
                                                                                                {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                                                            </span>
                                                                                        </a>

                                                                                        <!-- How Out -->
                                                                                        <div
                                                                                            class="whitespace-nowrap text-[13px] text-gray-600">
                                                                                            @php
                                                                                                $howOut = strtolower(
                                                                                                    $b->dismissal ?? ""
                                                                                                );
                                                                                                $locale = app()->getLocale();
                                                                                                $fielderName =
                                                                                                    $locale === "bn"
                                                                                                        ? optional(
                                                                                                            $b->fielder
                                                                                                        )->first_name_bn
                                                                                                        : optional(
                                                                                                            $b->fielder
                                                                                                        )
                                                                                                            ->first_name_en;
                                                                                                $bowlerName =
                                                                                                    $locale === "bn"
                                                                                                        ? optional(
                                                                                                            $b->bowler
                                                                                                        )->first_name_bn
                                                                                                        : optional(
                                                                                                            $b->bowler
                                                                                                        )
                                                                                                            ->first_name_en;
                                                                                            @endphp

                                                                                            @if ($howOut)
                                                                                                @switch($howOut)
                                                                                                    @case("run out")
                                                                                                        run out
                                                                                                        @if ($b->fielder)
                                                                                                            ({{ $fielderName }})
                                                                                                        @endif
                                                                                                    @break

                                                                                                    @case("caught")
                                                                                                        @if ($b->fielder && $b->bowler && optional($b->fielder)->id === optional($b->bowler)->id)
                                                                                                            c & b
                                                                                                            {{ $bowlerName }}
                                                                                                        @else
                                                                                                            c
                                                                                                            {{ $fielderName ?? "" }}
                                                                                                            @if ($b->bowler)
                                                                                                                b
                                                                                                                {{ $bowlerName }}
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    @break

                                                                                                    @case("bowled")
                                                                                                    @case("lbw")
                                                                                                        @if ($b->bowler)
                                                                                                            {{ $howOut }} b
                                                                                                            {{ $bowlerName }}
                                                                                                        @else
                                                                                                            {{ $howOut }}
                                                                                                        @endif
                                                                                                    @break

                                                                                                    @case("stumped")
                                                                                                        st {{ $fielderName ?? "" }}
                                                                                                        @if ($b->bowler)
                                                                                                            b {{ $bowlerName }}
                                                                                                        @endif
                                                                                                    @break

                                                                                                    @case("retired hurt")
                                                                                                        retired hurt
                                                                                                    @break

                                                                                                    @case("not out")
                                                                                                        not out
                                                                                                    @break

                                                                                                    @default
                                                                                                        {{ $b->how_out }}
                                                                                                        @if ($b->fielder)
                                                                                                            {{ $fielderName }}
                                                                                                        @endif
                                                                                                        @if ($b->bowler)
                                                                                                            b {{ $bowlerName }}
                                                                                                        @endif
                                                                                                @endswitch
                                                                                            @else
                                                                                                not out
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <!-- R -->
                                                                            <div
                                                                                class="p-2 text-center text-xs font-bold sm:font-normal md:text-sm">
                                                                                {{ $b->runs }}</div>
                                                                            <!-- B -->
                                                                            <div
                                                                                class="p-2 text-center text-xs md:text-sm">
                                                                                {{ $b->balls }}</div>
                                                                            <!-- 4s -->
                                                                            <div
                                                                                class="p-2 text-center text-xs md:text-sm">
                                                                                {{ $b->fours }}</div>
                                                                            <!-- 6s -->
                                                                            <div
                                                                                class="p-2 text-center text-xs md:text-sm">
                                                                                {{ $b->sixes }}</div>
                                                                            <!-- SR -->
                                                                            <div
                                                                                class="p-2 text-center text-xs md:text-sm">
                                                                                {{ $b->balls > 0 ? number_format(($b->runs / $b->balls) * 100, 2) : 0 }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <!-- Extras -->
                                                            <div class="border-t px-3 py-2 text-sm">
                                                                <div class="flex items-center justify-between">
                                                                    <span
                                                                        class="font-semibold">{{ __("messages.extras") }}</span>
                                                                    <span class="text-[13.5px] text-gray-600">
                                                                        <span
                                                                            class="font-semibold text-gray-900">{{ $card["totalExtras"] }}</span>
                                                                        (b {{ $card["extras"]->sum("byes") }},
                                                                        lb {{ $card["extras"]->sum("leg_byes") }},
                                                                        w {{ $card["extras"]->sum("wides") }},
                                                                        nb {{ $card["extras"]->sum("no_balls") }})
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <!-- Total -->
                                                            <div class="border-t px-3 py-2 text-sm">
                                                                <div class="flex items-center justify-between">
                                                                    <span
                                                                        class="font-semibold">{{ __("messages.total") }}</span>
                                                                    <span class="text-[13.5px] text-gray-600">
                                                                        <span class="font-semibold text-gray-900">
                                                                            {{ $card["score"] }}
                                                                        </span>
                                                                        ({{ $card["batting"]->whereNotIn("dismissal", ["not out", "retired hurt"])->count() }}
                                                                        wkts,
                                                                        {{ $card["bowling"]->sum("overs") ?: "-" }} Ov)
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <!-- Did Not Bat -->
                                                            <div class="border-t px-3 py-2 text-sm">
                                                                {{ __("messages.did_not_bat") }}:
                                                                @foreach ($card["didNotBat"] as $p)
                                                                    <a href="{{ route("frontend.profile", $p->slug) }}"
                                                                        class="text-teal-600 hover:underline">
                                                                        {{ app()->getLocale() === "bn" ? $p->first_name_bn : $p->first_name_en }}
                                                                    </a>
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                            <!-- Fall of Wickets -->
                                                            @if ($card["fallWickets"]->isNotEmpty())
                                                                <div class="mt-2 text-sm">
                                                                    <div
                                                                        class="hidden border-b border-t bg-teal-50 px-2 py-2 font-semibold md:block">
                                                                        {{ __("messages.fall_of_wickets") }}
                                                                    </div>

                                                                    <!-- Desktop View -->
                                                                    <div class="hidden px-3 pt-3 text-gray-700 md:block">
                                                                        @foreach ($card["fallWickets"] as $f)
                                                                            {{ $f->score }}-{{ $f->wicket }}
                                                                            (<a href="{{ route("frontend.profile", optional($f->batter)->slug) }}"
                                                                                class="text-teal-600 hover:underline">
                                                                                {{ app()->getLocale() === "bn" ? optional($f->batter)->first_name_bn : optional($f->batter)->first_name_en }}
                                                                            </a>, {{ $f->over }})
                                                                            @if (!$loop->last)
                                                                                ,
                                                                            @endif
                                                                        @endforeach
                                                                    </div>

                                                                    <!-- Mobile View -->
                                                                    <div class="block text-gray-700 md:hidden">
                                                                        <!-- Header Row -->
                                                                        <div
                                                                            class="grid grid-cols-[2fr_1fr_1fr] border-b border-t border-gray-200 bg-teal-50 px-3 py-2 font-semibold">
                                                                            <div>{{ __("messages.fall_of_wickets") }}
                                                                            </div>
                                                                            <div class="text-center">Score</div>
                                                                            <div class="text-center">Over</div>
                                                                        </div>

                                                                        <!-- Data Rows -->
                                                                        @foreach ($card["fallWickets"] as $f)
                                                                            <div
                                                                                class="grid grid-cols-[2fr_1fr_1fr] items-center border-b border-gray-200 px-3 py-2 text-sm">

                                                                                <!-- Player Name -->
                                                                                <div class="overflow-hidden">
                                                                                    <a href="{{ route("frontend.profile", optional($f->batter)->slug) }}"
                                                                                        class="block max-w-[120px] truncate text-teal-600 hover:underline sm:max-w-[140px] md:max-w-none md:whitespace-normal"
                                                                                        title="{{ app()->getLocale() === "bn" ? optional($f->batter)->first_name_bn : optional($f->batter)->first_name_en }}">
                                                                                        {{ app()->getLocale() === "bn" ? optional($f->batter)->first_name_bn : optional($f->batter)->first_name_en }}
                                                                                    </a>
                                                                                </div>

                                                                                <!-- Score -->
                                                                                <div
                                                                                    class="text-center text-xs md:text-sm">
                                                                                    {{ $f->score }}-{{ $f->wicket }}
                                                                                </div>

                                                                                <!-- Over -->
                                                                                <div
                                                                                    class="text-center text-xs md:text-sm">
                                                                                    {{ $f->over }}
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <!-- Bowling -->
                                                            <div class="mt-3 overflow-x-auto">
                                                                <table class="w-full text-sm">
                                                                    <thead>
                                                                        <tr class="border-b border-t bg-teal-50">
                                                                            <th class="p-2 text-left">Bowler</th>
                                                                            <th class="p-2 text-center">O</th>
                                                                            <th class="p-2 text-center">M</th>
                                                                            <th class="p-2 text-center">R</th>
                                                                            <th class="p-2 text-center">W</th>
                                                                            <th
                                                                                class="hidden p-2 text-center lg:table-cell">
                                                                                WD
                                                                            </th>
                                                                            <th
                                                                                class="hidden p-2 text-center lg:table-cell">
                                                                                NB
                                                                            </th>
                                                                            <th class="p-2 text-center">ECO</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($card["bowling"] as $bo)
                                                                            <tr class="border-b">
                                                                                <td class="p-2">
                                                                                    <div class="flex items-center gap-3">
                                                                                        <img src="{{ asset(optional($bo->bowler->media)->path ?? "images/user_profile.webp") }}"
                                                                                            alt="{{ optional($bo->bowler)->first_name_en }}"
                                                                                            class="h-8 w-8 flex-shrink-0 rounded-full border object-contain" />
                                                                                        <a href="{{ route("frontend.profile", optional($bo->bowler)->slug) }}"
                                                                                            class="block max-w-[120px] truncate text-sm text-teal-600 hover:underline sm:max-w-[140px] md:max-w-none md:whitespace-normal"
                                                                                            title="{{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}">
                                                                                            {{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}
                                                                                        </a>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="text-center text-xs md:text-sm">
                                                                                    {{ $bo->overs ?? 0 }}
                                                                                </td>
                                                                                <td class="text-center text-xs md:text-sm">
                                                                                    {{ $bo->maiden ?? 0 }}
                                                                                </td>
                                                                                <td class="text-center text-xs md:text-sm">
                                                                                    {{ $bo->runs ?? 0 }}
                                                                                </td>
                                                                                <td class="text-center text-xs md:text-sm">
                                                                                    {{ $bo->wickets ?? 0 }}
                                                                                </td>
                                                                                <td
                                                                                    class="hidden text-center lg:table-cell">
                                                                                    {{ $bo->wides ?? 0 }}
                                                                                </td>
                                                                                <td
                                                                                    class="hidden text-center lg:table-cell">
                                                                                    {{ $bo->no_balls ?? 0 }}
                                                                                </td>
                                                                                <td class="text-center text-xs md:text-sm">
                                                                                    {{ $bo->overs > 0 ? number_format($bo->runs / $bo->overs, 2) : 0 }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Mobiel View -->
                                            <div x-data="{ activeTeam: 0 }" class="block md:hidden">

                                                <!-- Team Tabs -->
                                                <div class="sticky top-0 z-20 bg-white pt-3">
                                                    <div
                                                        class="no-scrollbar flex items-center overflow-x-auto rounded-full bg-gray-100">

                                                        @foreach ($scorecards as $index => $card)
                                                            <button @click="activeTeam = {{ $index }}"
                                                                class="flex-1 whitespace-nowrap rounded-full px-5 py-3 text-[13px] font-semibold transition-all duration-300"
                                                                :class="activeTeam === {{ $index }} ?
                                                                    'bg-teal-500 text-white shadow' :
                                                                    'bg-transparent text-gray-900'">

                                                                {{ app()->getLocale() === "bn" ? $card["team"]->name_bn : $card["team"]->name_en }}
                                                            </button>
                                                        @endforeach
                                                    </div>
                                                </div>


                                                <!-- Team Panels -->
                                                @foreach ($scorecards as $index => $card)
                                                    <div x-show="activeTeam === {{ $index }}" x-cloak>

                                                        <!-- Table Header -->
                                                        <div class="mt-4 px-3">
                                                            <div
                                                                class="flex items-center text-[11px] font-semibold text-teal-600">
                                                                <div class="flex-1">Batsman</div>
                                                                <div class="w-7 text-center">R</div>
                                                                <div class="w-7 text-center">B</div>
                                                                <div class="w-9 text-center">4s</div>
                                                                <div class="w-9 text-center">6s</div>
                                                                <div class="w-11 text-center">SR</div>
                                                            </div>
                                                        </div>

                                                        <!-- Batting Rows -->
                                                        <div class="divide-y">
                                                            @foreach ($card["batting"] as $b)
                                                                {{-- <div class="px-3 py-2">
                                                                    <div class="flex items-start text-[12px] gap-2">
                                                                        <!-- Player Image -->
                                                                        <img src="{{ asset(optional($b->batter->media)->path ?? "images/user_profile.webp") }}"
                                                                            alt="{{ optional($b->batter)->first_name_en }}"
                                                                            class="h-8 w-8 flex-shrink-0 rounded-full border object-contain" />
                                                                        <!-- Batsman -->
                                                                        <div class="flex-1 pr-1">
                                                                            <p
                                                                                class="truncate font-semibold leading-tight">
                                                                                {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                                            </p>

                                                                            <p
                                                                                class="text-[10px] leading-tight text-gray-500">
                                                                                @php
                                                                                    $howOut = strtolower(
                                                                                        $b->dismissal ?? ""
                                                                                    );
                                                                                    $locale = app()->getLocale();
                                                                                    $fielderName =
                                                                                        $locale === "bn"
                                                                                            ? optional($b->fielder)
                                                                                                ->first_name_bn
                                                                                            : optional($b->fielder)
                                                                                                ->first_name_en;
                                                                                    $bowlerName =
                                                                                        $locale === "bn"
                                                                                            ? optional($b->bowler)
                                                                                                ->first_name_bn
                                                                                            : optional($b->bowler)
                                                                                                ->first_name_en;
                                                                                @endphp

                                                                                @if ($howOut)
                                                                                    @switch($howOut)
                                                                                        @case("run out")
                                                                                            run out
                                                                                            @if ($b->fielder)
                                                                                                ({{ $fielderName }})
                                                                                            @endif
                                                                                        @break

                                                                                        @case("caught")
                                                                                            @if ($b->fielder && $b->bowler && optional($b->fielder)->id === optional($b->bowler)->id)
                                                                                                c & b
                                                                                                {{ $bowlerName }}
                                                                                            @else
                                                                                                c
                                                                                                {{ $fielderName ?? "" }}
                                                                                                @if ($b->bowler)
                                                                                                    b
                                                                                                    {{ $bowlerName }}
                                                                                                @endif
                                                                                            @endif
                                                                                        @break

                                                                                        @case("bowled")
                                                                                        @case("lbw")
                                                                                            @if ($b->bowler)
                                                                                                {{ $howOut }} b
                                                                                                {{ $bowlerName }}
                                                                                            @else
                                                                                                {{ $howOut }}
                                                                                            @endif
                                                                                        @break

                                                                                        @case("stumped")
                                                                                            st {{ $fielderName ?? "" }}
                                                                                            @if ($b->bowler)
                                                                                                b {{ $bowlerName }}
                                                                                            @endif
                                                                                        @break

                                                                                        @case("retired hurt")
                                                                                            retired hurt
                                                                                        @break

                                                                                        @case("not out")
                                                                                            not out
                                                                                        @break

                                                                                        @default
                                                                                            {{ $b->how_out }}
                                                                                            @if ($b->fielder)
                                                                                                {{ $fielderName }}
                                                                                            @endif
                                                                                            @if ($b->bowler)
                                                                                                b {{ $bowlerName }}
                                                                                            @endif
                                                                                    @endswitch
                                                                                @else
                                                                                    not out
                                                                                @endif
                                                                            </p>
                                                                        </div>

                                                                        <!-- R -->
                                                                        <div class="w-7 text-center font-semibold">
                                                                            {{ $b->runs }}
                                                                        </div>

                                                                        <!-- B -->
                                                                        <div class="w-7 text-center">
                                                                            {{ $b->balls }}
                                                                        </div>

                                                                        <!-- 4s -->
                                                                        <div class="w-9 text-center">
                                                                            {{ $b->fours }}
                                                                        </div>

                                                                        <!-- 6s -->
                                                                        <div class="w-9 text-center">
                                                                            {{ $b->sixes }}
                                                                        </div>

                                                                        <!-- SR -->
                                                                        <div class="w-11 text-center">
                                                                            {{ $b->balls > 0 ? number_format(($b->runs / $b->balls) * 100, 1) : 0 }}
                                                                        </div>

                                                                    </div>
                                                                </div> --}}
                                                                <div class="px-3 py-2">
                                                                    <div class="flex items-start gap-2 text-[12px]">

                                                                        <!-- Player Image -->
                                                                        <img src="{{ asset(optional($b->batter->media)->path ?? "images/user_profile.webp") }}"
                                                                            alt="{{ optional($b->batter)->first_name_en }}"
                                                                            class="h-8 w-8 flex-shrink-0 rounded-full border object-contain" />

                                                                        <!-- Player Name + How Out -->
                                                                        <div class="min-w-0 flex-1">
                                                                            <a href="{{ route("frontend.profile", optional($b->batter)->slug) }}"
                                                                                class="block truncate md:overflow-visible md:text-clip md:whitespace-normal"
                                                                                title="{{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}">
                                                                                <span
                                                                                    class="text-sm text-teal-600 hover:underline">
                                                                                    {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                                                </span>
                                                                            </a>

                                                                            <p
                                                                                class="mt-0.5 whitespace-nowrap text-[10px] leading-tight text-gray-500">
                                                                                @php
                                                                                    $howOut = strtolower(
                                                                                        $b->dismissal ?? ""
                                                                                    );
                                                                                    $locale = app()->getLocale();
                                                                                    $fielderName =
                                                                                        $locale === "bn"
                                                                                            ? optional($b->fielder)
                                                                                                ->first_name_bn
                                                                                            : optional($b->fielder)
                                                                                                ->first_name_en;
                                                                                    $bowlerName =
                                                                                        $locale === "bn"
                                                                                            ? optional($b->bowler)
                                                                                                ->first_name_bn
                                                                                            : optional($b->bowler)
                                                                                                ->first_name_en;
                                                                                @endphp

                                                                                @switch($howOut)
                                                                                    @case("run out")
                                                                                        run out
                                                                                        {{ $fielderName ? "($fielderName)" : "" }}
                                                                                    @break

                                                                                    @case("caught")
                                                                                        @if ($b->fielder && $b->bowler && optional($b->fielder)->id === optional($b->bowler)->id)
                                                                                            c & b {{ $bowlerName }}
                                                                                        @else
                                                                                            c {{ $fielderName }} b
                                                                                            {{ $bowlerName }}
                                                                                        @endif
                                                                                    @break

                                                                                    @case("bowled")
                                                                                    @case("lbw")
                                                                                        {{ $howOut }} b
                                                                                        {{ $bowlerName }}
                                                                                    @break

                                                                                    @case("stumped")
                                                                                        st {{ $fielderName }} b
                                                                                        {{ $bowlerName }}
                                                                                    @break

                                                                                    @case("retired hurt")
                                                                                        retired hurt
                                                                                    @break

                                                                                    @case("not out")
                                                                                        not out
                                                                                    @break

                                                                                    @default
                                                                                        not out
                                                                                @endswitch
                                                                            </p>
                                                                        </div>

                                                                        <!-- Stats (always same line) -->
                                                                        <div class="flex text-center leading-tight">
                                                                            <div class="w-7 font-semibold">
                                                                                {{ $b->runs }}</div>
                                                                            <div class="w-7">{{ $b->balls }}</div>
                                                                            <div class="w-9">{{ $b->fours }}</div>
                                                                            <div class="w-9">{{ $b->sixes }}</div>
                                                                            <div class="w-11">
                                                                                {{ $b->balls > 0 ? number_format(($b->runs / $b->balls) * 100, 1) : 0 }}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <!-- Extras -->
                                                        <div class="border-t px-3 py-2 text-sm">
                                                            <div class="flex items-center justify-between">
                                                                <span
                                                                    class="font-semibold">{{ __("messages.extras") }}</span>
                                                                <span class="text-[13.5px] text-gray-600">
                                                                    <span
                                                                        class="font-semibold text-gray-900">{{ $card["totalExtras"] }}</span>
                                                                    (b {{ $card["extras"]->sum("byes") }},
                                                                    lb {{ $card["extras"]->sum("leg_byes") }},
                                                                    w {{ $card["extras"]->sum("wides") }},
                                                                    nb {{ $card["extras"]->sum("no_balls") }})
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <!-- Total -->
                                                        <div class="border-t px-3 py-2 text-sm">
                                                            <div class="flex items-center justify-between">
                                                                <span
                                                                    class="font-semibold">{{ __("messages.total") }}</span>
                                                                <span class="text-[13.5px] text-gray-600">
                                                                    <span class="font-semibold text-gray-900">
                                                                        {{ $card["score"] }}
                                                                    </span>
                                                                    ({{ $card["batting"]->whereNotIn("dismissal", ["not out", "retired hurt"])->count() }}
                                                                    wkts,
                                                                    {{ $card["bowling"]->sum("overs") ?: "-" }} Ov)
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <!-- Did Not Bat -->
                                                        <div class="border-t px-3 py-2 text-sm">
                                                            {{ __("messages.did_not_bat") }}:
                                                            @foreach ($card["didNotBat"] as $p)
                                                                <a href="{{ route("frontend.profile", $p->slug) }}"
                                                                    class="text-teal-600 hover:underline">
                                                                    {{ app()->getLocale() === "bn" ? $p->first_name_bn : $p->first_name_en }}
                                                                </a>
                                                                @if (!$loop->last)
                                                                    ,
                                                                @endif
                                                            @endforeach
                                                        </div>

                                                        <!-- Fall of Wickets -->
                                                        @if ($card["fallWickets"]->isNotEmpty())
                                                            <div class="mt-2 text-sm">
                                                                <div
                                                                    class="hidden border-b border-t bg-teal-50 px-2 py-2 font-semibold md:block">
                                                                    {{ __("messages.fall_of_wickets") }}
                                                                </div>

                                                                <!-- Mobile View -->
                                                                <div class="text-gray-700">
                                                                    <!-- Header Row -->
                                                                    <div
                                                                        class="grid grid-cols-[2fr_1fr_1fr] border-b border-t border-gray-200 bg-teal-50 px-3 py-2 font-semibold">
                                                                        <div>{{ __("messages.fall_of_wickets") }}
                                                                        </div>
                                                                        <div class="text-center">Score</div>
                                                                        <div class="text-center">Over</div>
                                                                    </div>

                                                                    <!-- Data Rows -->
                                                                    @foreach ($card["fallWickets"] as $f)
                                                                        <div
                                                                            class="grid grid-cols-[2fr_1fr_1fr] items-center border-b border-gray-200 px-3 py-2 text-sm">

                                                                            <!-- Player Name -->
                                                                            <div class="overflow-hidden">
                                                                                <a href="{{ route("frontend.profile", optional($f->batter)->slug) }}"
                                                                                    class="block max-w-[120px] truncate text-teal-600 hover:underline sm:max-w-[140px] md:max-w-none md:whitespace-normal"
                                                                                    title="{{ app()->getLocale() === "bn" ? optional($f->batter)->first_name_bn : optional($f->batter)->first_name_en }}">
                                                                                    {{ app()->getLocale() === "bn" ? optional($f->batter)->first_name_bn : optional($f->batter)->first_name_en }}
                                                                                </a>
                                                                            </div>

                                                                            <!-- Score -->
                                                                            <div class="text-center text-xs md:text-sm">
                                                                                {{ $f->score }}-{{ $f->wicket }}
                                                                            </div>

                                                                            <!-- Over -->
                                                                            <div class="text-center text-xs md:text-sm">
                                                                                {{ $f->over }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <!-- Bowling -->
                                                        <div class="mt-3 overflow-x-auto">
                                                            <table class="w-full text-sm">
                                                                <thead>
                                                                    <tr class="border-b border-t bg-teal-50">
                                                                        <th class="p-2 text-left">Bowler</th>
                                                                        <th class="p-2 text-center">O</th>
                                                                        <th class="p-2 text-center">M</th>
                                                                        <th class="p-2 text-center">R</th>
                                                                        <th class="p-2 text-center">W</th>
                                                                        <th class="hidden p-2 text-center lg:table-cell">
                                                                            WD
                                                                        </th>
                                                                        <th class="hidden p-2 text-center lg:table-cell">
                                                                            NB
                                                                        </th>
                                                                        <th class="p-2 text-center">ECO</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($card["bowling"] as $bo)
                                                                        <tr class="border-b">
                                                                            <td class="p-2">
                                                                                <div class="flex items-center gap-3">
                                                                                    <img src="{{ asset(optional($bo->bowler->media)->path ?? "images/user_profile.webp") }}"
                                                                                        alt="{{ optional($bo->bowler)->first_name_en }}"
                                                                                        class="h-8 w-8 flex-shrink-0 rounded-full border object-contain" />
                                                                                    <a href="{{ route("frontend.profile", optional($bo->bowler)->slug) }}"
                                                                                        class="block max-w-[120px] truncate text-sm text-teal-600 hover:underline sm:max-w-[140px] md:max-w-none md:whitespace-normal"
                                                                                        title="{{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}">
                                                                                        {{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-center text-xs md:text-sm">
                                                                                {{ $bo->overs ?? 0 }}
                                                                            </td>
                                                                            <td class="text-center text-xs md:text-sm">
                                                                                {{ $bo->maiden ?? 0 }}
                                                                            </td>
                                                                            <td class="text-center text-xs md:text-sm">
                                                                                {{ $bo->runs ?? 0 }}
                                                                            </td>
                                                                            <td class="text-center text-xs md:text-sm">
                                                                                {{ $bo->wickets ?? 0 }}
                                                                            </td>
                                                                            <td class="hidden text-center lg:table-cell">
                                                                                {{ $bo->wides ?? 0 }}
                                                                            </td>
                                                                            <td class="hidden text-center lg:table-cell">
                                                                                {{ $bo->no_balls ?? 0 }}
                                                                            </td>
                                                                            <td class="text-center text-xs md:text-sm">
                                                                                {{ $bo->overs > 0 ? number_format($bo->runs / $bo->overs, 2) : 0 }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>



                                        </div>


                                    @endif



                                    @if (in_array("squad", $availableTabs))
                                        <div x-show="tab === 'squad'" x-cloak class="text-sm text-gray-700">
                                            <div x-data="{ openCard: 0, totalCards: {{ count($match->squads) }} }" class="space-y-6">
                                                @foreach ($match->squads as $index => $squad)
                                                    <div class="overflow-hidden bg-white transition-all duration-300">
                                                        <!-- Squad Header -->
                                                        <div class="flex cursor-pointer items-center justify-between border-b px-3 py-2 transition-all duration-300"
                                                            :class="openCard === {{ $index }} ?
                                                                'bg-teal-500 text-white' :
                                                                'bg-gray-50 text-gray-800'"
                                                            @click="
                                                                if (openCard !== {{ $index }}) {
                                                                    openCard = {{ $index }};
                                                                } else {
                                                                    openCard = (openCard + 1) % totalCards;
                                                                }
                                                            ">
                                                            <h2 class="text-lg font-semibold">
                                                                {{ app()->getLocale() === "bn" ? optional($squad->team)->name_bn : optional($squad->team)->name_en }}
                                                            </h2>

                                                            <svg :class="{ 'rotate-180': openCard === {{ $index }} }"
                                                                class="h-4 w-4 transition-transform duration-200"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 9l6 6 6-6" />
                                                            </svg>
                                                        </div>

                                                        <!-- Squad Player Stats Table -->
                                                        <div x-show="openCard === {{ $index }}" x-collapse
                                                            style="display: none">
                                                            <div class="overflow-x-auto">
                                                                <table class="min-w-full border-collapse text-left">
                                                                    <thead class="border-b bg-teal-50 text-sm">
                                                                        <tr>
                                                                            <th
                                                                                class="min-w-[120px] p-2 font-semibold lg:min-w-0">
                                                                                Player
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                M
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                INN
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                R
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                AVG
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                H/S
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                S/R
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                50s
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                100s
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                W
                                                                            </th>
                                                                            <th
                                                                                class="min-w-[40px] p-2 text-center font-semibold lg:min-w-0">
                                                                                Eco
                                                                            </th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody class="divide-y divide-gray-200">
                                                                        @foreach ($squad->players as $player)
                                                                            @php
                                                                                $bat =
                                                                                    $player->summaryBattingStats[0] ??
                                                                                    null;
                                                                                $bowl =
                                                                                    $player->summaryBowlingStats[0] ??
                                                                                    null;
                                                                            @endphp

                                                                            <tr
                                                                                class="transition duration-150 ease-in-out hover:bg-teal-50">
                                                                                <!-- Player Info -->
                                                                                <td
                                                                                    class="flex min-w-[140px] max-w-[150px] items-center gap-2 p-2 lg:max-w-none">
                                                                                    <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                                                                        alt="{{ $player->first_name_en }}"
                                                                                        class="h-8 w-8 flex-shrink-0 rounded-full border object-contain">

                                                                                    <a href="{{ route("frontend.profile", $player->slug) }}"
                                                                                        class="block truncate text-teal-600 hover:underline md:overflow-visible md:text-clip md:whitespace-normal"
                                                                                        title="{{ app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en }}">
                                                                                        {{ app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en }}
                                                                                    </a>
                                                                                </td>

                                                                                <!-- Stats -->
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bat["matches"] ?? 0 }}</td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bat["innings"] ?? 0 }}</td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bat["runs"] ?? 0 }}</td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bat["avg"] ?? 0 }}</td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bat["hs"] ?? 0 }}
                                                                                </td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bat["sr"] ?? 0 }}
                                                                                </td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bat["fifties"] ?? 0 }}</td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bat["hundreds"] ?? 0 }}</td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bowl["wickets"] ?? 0 }}</td>
                                                                                <td class="p-2 text-center">
                                                                                    {{ $bowl["economy"] ?? 0 }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    @if (in_array("matchinfo", $availableTabs))
                                        <div x-show="tab === 'matchinfo'" x-cloak class="text-sm text-gray-700">
                                            <div class="note-editable">
                                                {!! $match->match_info !!}
                                            </div>
                                        </div>
                                    @endif

                                    @if (in_array("overs", $availableTabs))
                                        <div x-show="tab === 'overs'" x-cloak class="text-sm text-gray-700">
                                            <div x-data="{ openCard: 0, totalCards: {{ $match->commentary->groupBy("team_id")->count() }} }" class="space-y-6">
                                                @foreach ($match->commentary->groupBy("team_id") as $teamId => $teamCommentaries)
                                                    @php
                                                        $team =
                                                            $match->team1->id === $teamId
                                                                ? $match->team1
                                                                : $match->team2;
                                                    @endphp

                                                    <div class="overflow-hidden bg-white transition-all duration-300">
                                                        <!-- Team Header -->
                                                        <div class="flex cursor-pointer items-center justify-between border-b px-3 py-2 transition-all duration-300"
                                                            :class="openCard === {{ $loop->index }} ?
                                                                'bg-teal-500 text-white' :
                                                                'bg-gray-50 text-gray-800'"
                                                            @click="
                                                    if (openCard !== {{ $loop->index }}) {
                                                        openCard = {{ $loop->index }};
                                                    } else {
                                                        openCard = (openCard + 1) % totalCards;
                                                    }
                                                ">

                                                            <h2 class="text-lg font-semibold">
                                                                {{ app()->getLocale() === "bn" ? $team->name_bn : $team->name_en }}
                                                            </h2>

                                                            <svg :class="{ 'rotate-180': openCard === {{ $loop->index }} }"
                                                                class="h-4 w-4 transition-transform duration-200"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 9l6 6 6-6" />
                                                            </svg>
                                                        </div>

                                                        <!-- Commentary Section -->
                                                        <div x-show="openCard === {{ $loop->index }}" x-collapse
                                                            style="display: none">
                                                            <div class="overflow-x-auto">
                                                                <div class="w-full bg-white text-sm">
                                                                    @foreach ($teamCommentaries->groupBy("over_number") as $overNumber => $balls)
                                                                        <div class="mb-4">
                                                                            <!-- Over Header -->
                                                                            <div
                                                                                class="flex items-center justify-between bg-teal-900 px-2 py-2 font-semibold text-white">
                                                                                <span>END OF OVER
                                                                                    {{ $overNumber }}</span>
                                                                                <span>{{ $balls->last()->score_at }}</span>
                                                                            </div>

                                                                            <!-- Ball-by-ball commentary -->
                                                                            <div class="mt-4 divide-y text-gray-700">
                                                                                @foreach ($balls->sortByDesc("ball_number") as $comment)
                                                                                    @php
                                                                                        $run = $comment->ball_per_run;
                                                                                        $description = trim(
                                                                                            $comment->description
                                                                                        );
                                                                                        $isWicket =
                                                                                            strtoupper($run) === "W";

                                                                                        $wicketKeywords = [
                                                                                            "OUT",
                                                                                            "caught",
                                                                                            "run out",
                                                                                            "lbw",
                                                                                            "stumped",
                                                                                            "hit wicket"
                                                                                        ];
                                                                                        $hasWicket = collect(
                                                                                            $wicketKeywords
                                                                                        )->contains(
                                                                                            fn($word) => stripos(
                                                                                                $description,
                                                                                                $word
                                                                                            ) !== false
                                                                                        );

                                                                                        $redLine = null;
                                                                                        $grayLine = null;

                                                                                        if ($hasWicket) {
                                                                                            $parts = explode(
                                                                                                ",",
                                                                                                $description,
                                                                                                2
                                                                                            );
                                                                                            $redLine = trim($parts[0]);
                                                                                            if (isset($parts[1])) {
                                                                                                $grayLine = trim(
                                                                                                    $parts[1]
                                                                                                );
                                                                                            }
                                                                                        }

                                                                                        $color = match (true) {
                                                                                            $isWicket
                                                                                                => "bg-red-600 text-white",
                                                                                            $run == 4
                                                                                                => "bg-sky-600 text-white",
                                                                                            $run == 6
                                                                                                => "bg-indigo-600 text-white",
                                                                                            in_array($run, [1, 2, 3])
                                                                                                => "bg-lime-600 text-white",
                                                                                            in_array(strtolower($run), [
                                                                                                "nb",
                                                                                                "wd",
                                                                                                "l1",
                                                                                                "b1"
                                                                                            ])
                                                                                                => "bg-amber-600 text-white",
                                                                                            default
                                                                                                => "bg-gray-200 text-gray-900"
                                                                                        };
                                                                                    @endphp

                                                                                    <div class="px-2 py-2">
                                                                                        <div
                                                                                            class="flex items-center gap-3 sm:gap-4">
                                                                                            <!-- Ball number -->
                                                                                            <span
                                                                                                class="w-10 shrink-0 text-right text-[13px] font-medium text-gray-700">
                                                                                                {{ $comment->ball_number }}
                                                                                            </span>

                                                                                            <!-- Run / Wicket circle -->
                                                                                            <span
                                                                                                class="{{ $color }} flex h-7 w-7 shrink-0 items-center justify-center rounded-full text-xs font-semibold">
                                                                                                {{ $run }}
                                                                                            </span>

                                                                                            <!-- Commentary text -->
                                                                                            <div class="flex-1">
                                                                                                @if ($hasWicket)
                                                                                                    <span
                                                                                                        class="text-[13px] font-semibold text-red-600">
                                                                                                        {{ $redLine }}
                                                                                                    </span>
                                                                                                    @if ($grayLine)
                                                                                                        <div
                                                                                                            class="mt-0.5 text-[12px] italic text-gray-800">
                                                                                                            {{ $grayLine }}
                                                                                                        </div>
                                                                                                    @endif
                                                                                                @else
                                                                                                    <span
                                                                                                        class="text-[13px] text-gray-800">{{ $description }}</span>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    {{-- @if (in_array("headtohead", $availableTabs))
                                        <div x-show="tab === 'headtohead'" x-cloak class="text-gray-700 text-sm space-y-5">
        
                                            <!--  Summary -->
                                            <div
                                                class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center text-center bg-gray-50 p-4 rounded-lg">
                                                <div>
                                                    <h3 class="font-semibold text-gray-800">
                                                        {{ $headToHeadSummary["team1"]["name"] }}</h3>
                                                    <p class="text-2xl font-bold text-green-600">
                                                        {{ $headToHeadSummary["team1"]["wins"] }}</p>
                                                    <p class="text-xs text-gray-500">Wins</p>
                                                </div>
        
                                                <div>
                                                    <p class="text-lg text-gray-500">No Result</p>
                                                    <p class="text-xl font-semibold text-gray-600">
                                                        {{ $headToHeadSummary["no_result"] }}</p>
                                                </div>
        
                                                <div>
                                                    <h3 class="font-semibold text-gray-800">
                                                        {{ $headToHeadSummary["team2"]["name"] }}</h3>
                                                    <p class="text-2xl font-bold text-green-600">
                                                        {{ $headToHeadSummary["team2"]["wins"] }}</p>
                                                    <p class="text-xs text-gray-500">Wins</p>
                                                </div>
                                            </div>
        
                                            <!-- Detailed Stats -->
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                @foreach (["team1", "team2"] as $side)
                                                    @php $team = $headToHeadSummary[$side]; @endphp
                                                    <div
                                                        class="border rounded-lg p-4 bg-white shadow-sm hover:shadow-md transition">
                                                        <h3 class="font-bold text-teal-700 mb-2">{{ $team["name"] }}</h3>
        
                                                        <div class="flex justify-between text-sm mb-2">
                                                            <span>Wins:</span> <span
                                                                class="font-semibold text-green-600">{{ $team["wins"] }}</span>
                                                        </div>
                                                        <div class="flex justify-between text-sm mb-2">
                                                            <span>Losses:</span> <span
                                                                class="font-semibold text-red-600">{{ $team["losses"] }}</span>
                                                        </div>
                                                        <div class="flex justify-between text-sm mb-2">
                                                            <span>Highest Score:</span> <span>{{ $team["high"] }}</span>
                                                        </div>
                                                        <div class="flex justify-between text-sm mb-4">
                                                            <span>Lowest Score:</span> <span>{{ $team["low"] }}</span>
                                                        </div>
        
                                                        @if ($team["top_bat"])
                                                            <div class="border-t pt-2 mt-2">
                                                                <p class="font-semibold text-gray-800">Top Run-Scorer</p>
                                                                <p class="text-sm text-gray-600">
                                                                    {{ $team["top_bat"]["player"] ?? "N/A" }} —
                                                                    <span
                                                                        class="font-semibold">{{ $team["top_bat"]["runs"] ?? 0 }}
                                                                        runs</span>
                                                                    in {{ $team["top_bat"]["matches"] ?? 0 }} inns
                                                                </p>
                                                            </div>
                                                        @endif
        
                                                        @if ($team["top_bowl"])
                                                            <div class="border-t pt-2 mt-2">
                                                                <p class="font-semibold text-gray-800">Top Wicket-Taker</p>
                                                                <p class="text-sm text-gray-600">
                                                                    {{ $team["top_bowl"]["player"] ?? "N/A" }} —
                                                                    <span
                                                                        class="font-semibold">{{ $team["top_bowl"]["wickets"] ?? 0 }}
                                                                        wkts</span>
                                                                    in {{ $team["top_bowl"]["matches"] ?? 0 }} inns
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
        
                                            <!--  Previous Matches -->
                                            <div class="space-y-3 mt-4">
                                                @forelse ($headToHeadMatches as $h2h)
                                                    <div class="p-3 border rounded-lg hover:bg-teal-50 transition">
                                                        <div class="flex justify-between items-center">
                                                            <div>
                                                                <p class="font-semibold text-gray-800">
                                                                    {{ $h2h->team1->name_en }} vs {{ $h2h->team2->name_en }}
                                                                </p>
                                                                <p class="text-sm text-gray-500">
                                                                    {{ $h2h->venue }} —
                                                                    {{ $h2h->date?->format("M d, Y") ?? "Date not available" }}
                                                                </p>
                                                            </div>
                                                            <div class="text-right text-sm">
                                                                @if ($h2h->won)
                                                                    <span class="text-teal-600 font-semibold">
                                                                        {{ optional($h2h->winnerTeam)->name_en ?? "Unknown" }}
                                                                    </span>
                                                                    <span class="text-gray-500">won</span>
                                                                @else
                                                                    <span class="text-gray-500">No result</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-gray-500 text-sm">No previous encounters found.</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    @endif --}}
                                    @if (in_array("headtohead", $availableTabs))
                                        <div x-show="tab === 'headtohead'" x-cloak class="text-sm text-gray-700">
                                            <div class="hidden md:block">
                                                <div class="overflow-hidden bg-white">
                                                    <div class="relative mx-auto w-full max-w-3xl">

                                                        <!-- Teams Row -->
                                                        <div class="relative z-10 my-5 flex items-center justify-between">
                                                            <!-- Left Team -->
                                                            <div class="flex flex-1 items-center gap-2">
                                                                <img src="{{ asset($headToHeadSummary["team1"]["logo"] ?? "images/user_profile.webp") }}"
                                                                    alt="{{ $headToHeadSummary["team1"]["name"] }}"
                                                                    class="h-11 w-11 rounded-full object-fill ring-1 ring-gray-200"
                                                                    loading="lazy">
                                                                <div
                                                                    class="truncate text-base font-semibold text-gray-800">
                                                                    {{ $headToHeadSummary["team1"]["name"] }}
                                                                </div>
                                                            </div>

                                                            <!-- VS -->
                                                            <div class="mx-6 flex-shrink-0">
                                                                <div
                                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-red-600 text-base font-bold text-white">
                                                                    VS
                                                                </div>
                                                            </div>

                                                            <!-- Right Team -->
                                                            <div class="flex flex-1 items-center justify-end gap-2">
                                                                <div
                                                                    class="truncate text-base font-semibold text-gray-800">
                                                                    {{ $headToHeadSummary["team2"]["name"] }}
                                                                </div>
                                                                <img src="{{ asset($headToHeadSummary["team2"]["logo"] ?? "images/user_profile.webp") }}"
                                                                    alt="{{ $headToHeadSummary["team2"]["name"] }}"
                                                                    class="h-11 w-11 rounded-full object-fill ring-1 ring-gray-200"
                                                                    loading="lazy">
                                                            </div>
                                                        </div>

                                                        <!-- Matches Count -->
                                                        <div class="relative z-10 my-5 flex justify-center">
                                                            <div class="text-center">
                                                                <div
                                                                    class="inline-block rounded-md border border-gray-200 bg-slate-50 px-6 py-3 text-red-600">
                                                                    <div
                                                                        class="text-base font-bold uppercase tracking-tighter text-gray-900">
                                                                        Matches</div>
                                                                    <div class="text-4xl font-bold">
                                                                        {{ $headToHeadSummary["total_matches"] }}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Stats -->
                                                        <div class="relative z-10 space-y-6">

                                                            <!-- WON -->
                                                            <div class="flex items-center justify-between">
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team1"]["wins"] }}
                                                                </div>
                                                                <div
                                                                    class="relative flex w-full max-w-xs flex-col items-center">
                                                                    <div class="mb-2 text-lg font-bold text-gray-900">Won
                                                                    </div>
                                                                    <div
                                                                        class="relative flex w-full items-center justify-center gap-[14px]">
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-end overflow-hidden rounded-full bg-slate-200">
                                                                            <div class="h-2.5 rounded-l-full bg-lime-700 transition-all duration-700"
                                                                                style="width: {{ $headToHeadSummary["team1"]["win_bar"] }}%;">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="z-10 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-gray-900">
                                                                        </div>
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-start overflow-hidden rounded-full bg-slate-200">
                                                                            <div class="h-2.5 rounded-r-full bg-lime-700 transition-all duration-700"
                                                                                style="width: {{ $headToHeadSummary["team2"]["win_bar"] }}%;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team2"]["wins"] }}
                                                                </div>
                                                            </div>

                                                            <!-- LOST -->
                                                            <div class="flex items-center justify-between">
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team1"]["losses"] }}
                                                                </div>
                                                                <div
                                                                    class="relative flex w-full max-w-xs flex-col items-center">
                                                                    <div class="mb-2 text-lg font-bold text-gray-900">Lost
                                                                    </div>
                                                                    <div
                                                                        class="relative flex w-full items-center justify-center gap-[14px]">
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-end overflow-hidden rounded-full bg-slate-200">
                                                                            <div class="h-2.5 rounded-l-full bg-red-600 transition-all duration-700"
                                                                                style="width: {{ $headToHeadSummary["team1"]["loss_bar"] }}%;">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="z-10 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-gray-900">
                                                                        </div>
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-start overflow-hidden rounded-full bg-slate-200">
                                                                            <div class="h-2.5 rounded-r-full bg-red-600 transition-all duration-700"
                                                                                style="width: {{ $headToHeadSummary["team2"]["loss_bar"] }}%;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team2"]["losses"] }}
                                                                </div>
                                                            </div>

                                                            <!-- NO RESULT -->
                                                            <div class="flex items-center justify-between">
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["no_result"] }}
                                                                </div>
                                                                <div
                                                                    class="relative flex w-full max-w-xs flex-col items-center">
                                                                    <div class="mb-2 text-lg font-bold text-gray-900">
                                                                        No Result
                                                                    </div>
                                                                    <div
                                                                        class="relative flex w-full items-center justify-center gap-[14px]">
                                                                        <!-- Left bar -->
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-end overflow-hidden rounded-full bg-slate-200">
                                                                        </div>

                                                                        <!-- Center dot -->
                                                                        <div
                                                                            class="z-10 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-gray-900">
                                                                        </div>

                                                                        <!-- Right bar -->
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-start overflow-hidden rounded-full bg-slate-200">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["no_result"] }}
                                                                </div>
                                                            </div>

                                                            <!-- WIN % -->
                                                            <div class="flex items-center justify-between">
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team1"]["win_percent"] }}%
                                                                </div>
                                                                <div
                                                                    class="relative flex w-full max-w-xs flex-col items-center">
                                                                    <div class="mb-2 text-lg font-bold text-gray-900">Win%
                                                                    </div>
                                                                    <div
                                                                        class="relative flex w-full items-center justify-center gap-[14px]">
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-end overflow-hidden rounded-full bg-slate-200">
                                                                            <div class="h-2.5 rounded-l-full bg-green-500 transition-all duration-700"
                                                                                style="width: {{ $headToHeadSummary["team1"]["win_percent"] }}%;">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="z-10 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-gray-900">
                                                                        </div>
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-start overflow-hidden rounded-full bg-slate-200">
                                                                            <div class="h-2.5 rounded-r-full bg-green-500 transition-all duration-700"
                                                                                style="width: {{ $headToHeadSummary["team2"]["win_percent"] }}%;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team2"]["win_percent"] }}%
                                                                </div>
                                                            </div>

                                                            <!-- HIGH SCORE -->
                                                            <div class="flex items-center justify-between">
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team1"]["high"] }}
                                                                </div>
                                                                <div
                                                                    class="relative flex w-full max-w-xs flex-col items-center">
                                                                    <div class="mb-2 text-lg font-bold text-gray-900">High
                                                                        Score
                                                                    </div>
                                                                    <div
                                                                        class="relative flex w-full items-center justify-center gap-[14px]">
                                                                        <!-- Left bar -->
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-end overflow-hidden rounded-full bg-slate-200">
                                                                        </div>

                                                                        <!-- Center dot -->
                                                                        <div
                                                                            class="z-10 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-gray-900">
                                                                        </div>

                                                                        <!-- Right bar -->
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-start overflow-hidden rounded-full bg-slate-200">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team2"]["high"] }}
                                                                </div>
                                                            </div>

                                                            <!-- LOW SCORE -->
                                                            <div class="flex items-center justify-between">
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team1"]["low"] }}
                                                                </div>
                                                                <div
                                                                    class="relative flex w-full max-w-xs flex-col items-center">
                                                                    <div class="mb-2 text-lg font-bold text-gray-900">
                                                                        Low Score
                                                                    </div>
                                                                    <div
                                                                        class="relative flex w-full items-center justify-center gap-[14px]">
                                                                        <!-- Left bar -->
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-end overflow-hidden rounded-full bg-slate-200">
                                                                        </div>

                                                                        <!-- Center dot -->
                                                                        <div
                                                                            class="z-10 h-2.5 w-2.5 flex-shrink-0 rounded-full bg-gray-900">
                                                                        </div>

                                                                        <!-- Right bar -->
                                                                        <div
                                                                            class="relative flex h-2.5 w-1/2 justify-start overflow-hidden rounded-full bg-slate-200">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="w-20 rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white py-6 text-center text-xl font-bold">
                                                                    {{ $headToHeadSummary["team2"]["low"] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Player Stats: Most Runs & Most Wickets -->
                                                    <div class="mx-auto mt-10 max-w-3xl space-y-8">
                                                        <!-- Most Runs -->
                                                        <div>
                                                            <h4
                                                                class="mb-5 flex items-center justify-center gap-2 text-center text-lg font-bold tracking-tighter text-gray-900">
                                                                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 512 512">
                                                                    <path d="" stroke="none" fill="#0d9488"
                                                                        fill-rule="evenodd" />
                                                                    <path
                                                                        d="M 433.344 20.283 L 413 40.565 413 45.570 L 413 50.575 388.191 76.537 C 364.760 101.057, 350.891 114.554, 339.530 123.895 C 326.382 134.704, 319.183 134.022, 304 120.530 C 299.875 116.865, 295.150 113.123, 293.500 112.216 C 289.317 109.917, 278.578 110.008, 274 112.382 C 268.959 114.995, 20.109 364.123, 15.551 371.119 C -2.712 399.154, 6.681 439.886, 38.755 471.739 C 61.802 494.629, 91.551 505.974, 114.397 500.587 C 129.761 496.964, 121.949 504.176, 262.276 364.072 C 350.157 276.330, 391.679 234.209, 393.026 231.434 C 395.626 226.078, 395.661 217.215, 393.100 212.196 C 392.055 210.148, 388.189 205.114, 384.509 201.010 C 372.189 187.271, 370.829 180.904, 377.995 170.519 C 383.326 162.793, 404.979 140.308, 430.015 116.500 C 453.570 94.099, 455.471 92.521, 458.543 92.819 C 460.353 92.994, 463.109 92.466, 464.667 91.646 C 469.303 89.205, 504.765 52.851, 505.534 49.750 C 506.929 44.132, 505.259 41.870, 484.124 20.750 L 463.360 0 458.524 0 L 453.688 0 433.344 20.283 M 154.863 251.749 C 9.294 397.451, 22.472 382.288, 22.538 404 C 22.573 415.587, 22.809 417.112, 25.766 424.880 C 35.937 451.604, 60.559 475.743, 85.688 483.628 C 92.602 485.797, 95.326 486.141, 103.188 485.838 C 120.552 485.167, 107.928 496.483, 252.250 352.208 C 360.537 243.956, 380 224.076, 380 221.724 C 380 219.728, 378.376 217.202, 374.215 212.725 C 371.034 209.301, 367.018 204.444, 365.292 201.931 C 362.883 198.424, 361.148 197.062, 357.827 196.069 C 337.478 189.983, 316.801 169.976, 309.846 149.642 C 307.835 143.764, 306.858 142.340, 303.008 139.677 C 300.537 137.969, 295.928 134.192, 292.766 131.285 C 282.622 121.959, 297.658 108.824, 154.863 251.749 M 199.741 349.765 C 158.083 391.436, 124 426.290, 124 427.218 C 124 431.798, 128.202 436, 132.782 436 C 133.710 436, 168.564 401.917, 210.235 360.259 C 279.596 290.920, 286 284.242, 286 281.259 C 286 279.333, 285.182 277.182, 284 276 C 282.818 274.818, 280.667 274, 278.741 274 C 275.758 274, 269.080 280.404, 199.741 349.765 M 329 368.045 C 314.082 371.895, 300.535 380.556, 290.607 392.592 C 266.367 421.979, 269.246 466.644, 297.038 492.375 C 310.554 504.889, 325.373 510.984, 344.161 511.759 C 358.791 512.363, 367.733 510.537, 379.812 504.479 C 425.035 481.802, 434.453 421.843, 398.315 386.679 C 391.281 379.835, 388.822 378.084, 379.636 373.377 C 365.132 365.945, 345.252 363.852, 329 368.045 M 341.946 379.750 C 332.835 389.997, 326.818 401.919, 322.515 418.252 C 315.573 444.600, 316.822 475.290, 325.643 495.097 C 327.936 500.246, 328.479 500.773, 332.422 501.675 C 336.034 502.502, 337.062 502.369, 338.964 500.828 C 341.826 498.511, 342.621 498.534, 344.732 501 C 348.290 505.155, 362.573 502.915, 376.500 496.018 C 395.430 486.643, 408.014 468.812, 410.978 447.163 C 414.524 421.263, 400.932 394.656, 378 382.610 C 369.323 378.051, 363.317 376.283, 361.768 377.832 C 359.943 379.657, 356.145 379.205, 354.768 377 C 353.887 375.589, 352.436 375, 349.844 375 C 346.720 375, 345.537 375.711, 341.946 379.750 M 330.238 376.850 C 328.994 377.207, 327.078 378.978, 325.982 380.784 C 323.493 384.884, 321.622 385.638, 318.695 383.720 C 316.572 382.329, 316.083 382.437, 311.953 385.208 C 300.426 392.944, 291.009 405.215, 286.314 418.617 C 283.866 425.604, 283.552 427.921, 283.552 439 C 283.552 450.060, 283.868 452.402, 286.295 459.328 C 287.804 463.633, 290.651 469.708, 292.622 472.828 C 296.767 479.389, 302.954 486.147, 304.142 485.412 C 305.626 484.495, 308.759 486.904, 309.399 489.455 C 309.746 490.835, 311.321 492.631, 312.899 493.448 L 315.769 494.932 313.938 489.048 C 303.858 456.661, 310.072 409.734, 327.924 383.422 C 330.694 379.340, 332.856 376.045, 332.730 376.100 C 332.603 376.155, 331.482 376.492, 330.238 376.850 M 343.285 384.199 C 342.712 384.915, 341.275 387.419, 340.093 389.764 C 337.577 394.759, 338.509 398, 342.463 398 C 346.550 398, 352.389 388.438, 350.319 385.132 C 349.027 383.066, 344.659 382.487, 343.285 384.199 M 308.783 390.062 C 307.839 390.612, 306.128 393.182, 304.982 395.773 C 302.460 401.476, 303.419 405, 307.493 405 C 312.323 405, 317.173 393.062, 313.450 390.340 C 311.295 388.764, 311.036 388.748, 308.783 390.062 M 332.598 405.545 C 330.668 407.475, 328.781 414.278, 329.191 417.826 C 329.459 420.147, 329.954 420.500, 332.943 420.500 C 336.285 420.500, 336.445 420.317, 338.376 414.281 C 340.308 408.240, 340.313 408.003, 338.528 406.031 C 336.328 403.600, 334.678 403.465, 332.598 405.545 M 297.985 414.029 C 296.186 417.390, 295.563 425.769, 296.985 427.482 C 298.577 429.400, 301.427 429.430, 303.307 427.550 C 305.319 425.538, 306.514 415.324, 304.956 413.447 C 303.202 411.334, 299.251 411.663, 297.985 414.029 M 326.070 429.936 C 325.178 430.500, 324.472 433.146, 324.197 436.956 C 323.844 441.840, 324.112 443.467, 325.532 445.036 C 329.620 449.553, 333 446.200, 333 437.629 C 333 429.808, 330.557 427.096, 326.070 429.936 M 293.854 439.422 C 293.167 440.928, 293.016 443.975, 293.454 447.479 C 294.033 452.110, 294.589 453.311, 296.575 454.216 C 298.538 455.110, 299.363 454.981, 300.967 453.530 C 302.674 451.985, 302.860 450.910, 302.334 445.621 C 301.999 442.254, 301.282 438.938, 300.740 438.250 C 299.039 436.091, 295.063 436.768, 293.854 439.422 M 324.919 454.597 C 323.281 456.571, 323.372 466.539, 325.047 468.557 C 326.620 470.452, 329.466 470.391, 331.437 468.421 C 333.272 466.585, 332.919 456.812, 330.931 454.417 C 329.370 452.535, 326.560 452.620, 324.919 454.597 M 295.999 462.502 C 294.300 464.548, 295.190 474.619, 297.252 476.680 C 299.070 478.499, 303.465 477.835, 304.318 475.614 C 305.226 473.249, 303.395 462.864, 301.904 461.920 C 299.794 460.584, 297.394 460.820, 295.999 462.502 M 328.243 479.157 C 326.464 480.936, 326.743 484.836, 329.004 489.818 C 330.688 493.530, 331.338 494.092, 333.631 493.818 C 337.987 493.299, 338.681 490.958, 336.446 484.318 C 334.822 479.494, 334.060 478.450, 331.986 478.207 C 330.611 478.046, 328.927 478.473, 328.243 479.157"
                                                                        stroke="none" fill="#0d9488"
                                                                        fill-rule="evenodd" />
                                                                </svg>
                                                                Most Runs
                                                            </h4>
                                                            <div class="grid grid-cols-2 gap-5 text-center">
                                                                <!-- Team 1 -->
                                                                <div
                                                                    class="flex flex-col items-center rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white p-6">
                                                                    <div
                                                                        class="mb-2 flex h-16 w-16 items-center justify-center rounded-full border border-gray-200 text-2xl font-bold text-gray-900">
                                                                        {{ $headToHeadSummary["team1"]["top_bat"]["runs"] ?? 0 }}
                                                                    </div>
                                                                    <a href="{{ route("frontend.profile", $headToHeadSummary["team1"]["top_bat"]["slug"] ?? "") }}"
                                                                        class="text-sm font-normal text-teal-600 hover:underline"
                                                                        title="{{ $headToHeadSummary["team1"]["top_bat"]["player"] ?? "-" }}">
                                                                        {{ $headToHeadSummary["team1"]["top_bat"]["player"] ?? "-" }}
                                                                    </a>
                                                                </div>

                                                                <!-- Team 2 -->
                                                                <div
                                                                    class="flex flex-col items-center rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white p-6">
                                                                    <div
                                                                        class="mb-2 flex h-16 w-16 items-center justify-center rounded-full border border-gray-200 text-2xl font-bold text-gray-900">
                                                                        {{ $headToHeadSummary["team2"]["top_bat"]["runs"] ?? 0 }}
                                                                    </div>
                                                                    <a href="{{ route("frontend.profile", $headToHeadSummary["team2"]["top_bat"]["slug"] ?? "") }}"
                                                                        class="text-sm font-normal text-teal-600 hover:underline"
                                                                        title="{{ $headToHeadSummary["team2"]["top_bat"]["player"] ?? "-" }}">
                                                                        {{ $headToHeadSummary["team2"]["top_bat"]["player"] ?? "-" }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Most Wickets -->
                                                        <div>
                                                            <h4
                                                                class="mb-5 flex items-center justify-center gap-2 text-center text-lg font-bold tracking-tighter text-gray-900">
                                                                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 512 512">
                                                                    <path d="" stroke="none" fill="#0d9488"
                                                                        fill-rule="evenodd" />
                                                                    <path
                                                                        d="M 431.707 14.825 C 418.377 28.262, 417 29.979, 417 33.158 C 417 36.400, 415.127 38.558, 392.250 61.669 C 378.637 75.422, 365.285 88.097, 362.579 89.837 C 353.738 95.519, 349.037 94.214, 335.810 82.407 C 331.751 78.784, 326.940 77.438, 321.828 78.495 C 319.103 79.059, 297.957 99.697, 205.176 192.342 C 142.848 254.579, 90.566 307.337, 88.993 309.583 C 78.501 324.566, 80.059 346.645, 92.999 366.364 C 102.416 380.713, 113.274 390.376, 127.500 397.066 C 141.500 403.651, 152.194 404.492, 164.500 399.977 C 170.314 397.844, 174.067 394.216, 285.858 282.638 C 372.573 196.088, 401.705 166.428, 403.185 163.183 C 406.230 156.504, 405.068 152.443, 397.602 143.657 C 389.699 134.358, 388.320 131.212, 389.875 126.024 C 391.447 120.776, 403.183 107.797, 427.406 84.519 C 445.228 67.392, 447.455 65.569, 450.203 65.857 C 452.947 66.145, 454.724 64.702, 468.125 51.302 C 480.625 38.801, 483 35.951, 483 33.451 C 483 30.946, 480.586 28.066, 467.738 15.238 C 454.775 2.295, 452.020 0, 449.445 0 C 446.867 0, 444.212 2.219, 431.707 14.825 M 79.571 10.571 C 78.707 11.436, 78 12.561, 78 13.071 C 78 13.582, 74.150 14, 69.445 14 L 60.890 14 61.195 18.750 L 61.500 23.500 69.736 23.790 C 76.719 24.036, 78.132 24.379, 79.022 26.040 C 80.018 27.903, 81.257 28, 103.978 28 C 126.568 28, 127.962 27.892, 129.256 26.045 C 130.383 24.436, 132.026 24.039, 138.562 23.795 L 146.500 23.500 146.805 18.750 L 147.110 14 139.170 14 C 131.804 14, 131.112 13.819, 129.592 11.500 L 127.954 9 104.548 9 C 84.604 9, 80.910 9.232, 79.571 10.571 M 169.750 10.070 C 168.787 10.636, 168 11.734, 168 12.509 C 168 13.585, 166.045 13.988, 159.750 14.210 L 151.500 14.500 151.500 19 L 151.500 23.500 159.438 23.795 C 165.974 24.039, 167.617 24.436, 168.744 26.045 C 170.038 27.892, 171.433 28, 194.048 28 C 216.900 28, 218.040 27.910, 219.232 26 C 220.317 24.263, 221.564 24, 228.721 24 C 236.677 24, 236.984 23.914, 237.589 21.500 C 237.934 20.125, 237.934 17.875, 237.589 16.500 C 236.984 14.086, 236.677 14, 228.718 14 C 221.128 14, 220.396 13.822, 219.487 11.750 C 218.508 9.518, 218.309 9.498, 195 9.270 C 180.264 9.127, 170.847 9.425, 169.750 10.070 M 44.750 28.080 C 43.091 29.046, 43 41.271, 43 262.550 L 43 496 36 496 L 29 496 29 504 L 29 512 150 512 L 271 512 271 504 L 271 496 264 496 L 257 496 257 420.761 L 257 345.521 239.500 363 L 222 380.479 222 438.239 L 222 496 195 496 L 168 496 168 460.439 L 168 424.877 163.250 425.689 C 160.637 426.135, 154.675 426.500, 150 426.500 C 145.325 426.500, 139.363 426.135, 136.750 425.689 L 132 424.877 132 460.439 L 132 496 105 496 L 78 496 78 441.881 L 78 387.762 72.429 378.974 C 62.771 363.740, 58.035 348.611, 58.035 333 C 58.035 316.478, 63.289 301.685, 73.046 290.738 L 78 285.179 78 157.125 C 78 31.545, 77.963 29.050, 76.066 28.035 C 73.570 26.699, 47.055 26.737, 44.750 28.080 M 133.557 29.223 C 132.173 31.198, 132 42.487, 132 130.723 C 132 185.325, 132.354 230, 132.787 230 C 133.220 230, 141.320 222.208, 150.787 212.685 L 168 195.370 168 112.840 C 168 34.156, 167.915 30.233, 166.171 28.655 C 164.645 27.274, 161.924 27, 149.728 27 C 135.759 27, 135.045 27.098, 133.557 29.223 M 223.571 28.571 C 222.181 29.962, 222 36.477, 222 85.155 C 222 120.136, 222.352 140.045, 222.967 139.833 C 223.499 139.650, 231.374 132.106, 240.467 123.070 L 257 106.639 257 67.855 C 257 30.533, 256.927 29.031, 255.066 28.035 C 253.997 27.463, 246.871 27, 239.137 27 C 227.748 27, 224.850 27.293, 223.571 28.571 M 210.790 201.750 C 88.848 323.734, 94.382 317.698, 93.275 329.909 C 92.568 337.702, 94.438 345.640, 99.254 355.294 C 104.936 366.685, 119.107 380.938, 130 386.221 C 144.326 393.168, 155.551 393.415, 165.155 386.994 C 171.487 382.759, 394 159.827, 394 157.717 C 394 156.748, 392.280 154.053, 390.178 151.728 C 388.075 149.402, 385.116 145.837, 383.601 143.805 C 381.688 141.238, 379.367 139.618, 376.004 138.501 C 369.263 136.262, 357.811 127.963, 352.860 121.728 C 348.896 116.737, 343.002 105.762, 343.001 103.369 C 343 102.746, 341.313 100.979, 339.250 99.441 C 337.188 97.903, 333.598 94.925, 331.272 92.822 C 328.947 90.720, 326.247 89, 325.273 89 C 324.254 89, 275.594 136.923, 210.790 201.750 M 242.757 270.757 C 180.630 332.884, 166 348.008, 166 350.102 C 166 353.068, 168.766 356, 171.563 356 C 172.755 356, 202.257 327.222, 250.235 279.259 C 331.331 198.188, 329.826 199.867, 325.171 195.655 C 324.165 194.745, 322.481 194, 321.429 194 C 320.227 194, 290.962 222.552, 242.757 270.757 M 370.814 272.021 C 357.270 274.144, 341.819 282.709, 332.538 293.237 C 327.148 299.352, 320.675 311.913, 318.510 320.460 C 316.578 328.088, 316.600 341.676, 318.558 349.985 C 319.399 353.551, 321.701 359.851, 323.675 363.985 C 328.617 374.335, 341.293 386.977, 352 392.234 C 388.830 410.314, 432.213 390.545, 442.642 350.928 C 445.115 341.534, 444.830 326.452, 442.010 317.500 C 438.418 306.099, 434.185 299.162, 425.458 290.372 C 418.946 283.815, 415.757 281.471, 408.944 278.236 C 404.300 276.032, 398.475 273.752, 396 273.171 C 389.187 271.570, 377.184 271.022, 370.814 272.021 M 375.137 284.635 C 355.495 306.673, 349.024 355.399, 361.879 384.460 C 363.482 388.082, 364.492 389.042, 367.612 389.903 C 370.636 390.738, 371.727 390.652, 373.028 389.474 C 375.129 387.573, 377.904 387.586, 378.638 389.500 C 379.408 391.506, 387.696 391.491, 395.458 389.469 C 404.381 387.145, 412.785 382.198, 420.041 375 C 441.571 353.640, 442.506 319.829, 422.176 297.806 C 412.642 287.477, 397.252 279.112, 392.846 281.864 C 390.161 283.541, 388.205 283.252, 387 281 C 386.309 279.710, 384.906 279, 383.045 279 C 380.801 279, 379.045 280.251, 375.137 284.635 M 363.278 282.250 C 362.746 282.938, 362.026 284.298, 361.678 285.273 C 360.813 287.696, 358.124 288.558, 355.852 287.140 C 353.314 285.555, 349.815 287.424, 342.316 294.372 C 325.061 310.358, 319.811 336.625, 329.500 358.500 C 332.996 366.395, 340.713 376, 343.559 376 C 345.197 376, 346.432 376.934, 347.485 378.970 C 349.341 382.560, 353.537 385.306, 352.627 382.336 C 342.790 350.209, 347.851 309.041, 364.485 285.888 C 367.502 281.689, 367.732 281, 366.121 281 C 365.089 281, 363.810 281.563, 363.278 282.250 M 378.376 286.765 C 376.682 287.872, 373.008 294.275, 373.004 296.128 C 372.999 298.399, 375.554 300.279, 377.702 299.584 C 379.427 299.026, 384 292.157, 384 290.123 C 384 289.003, 381.199 285.992, 380.179 286.015 C 379.805 286.024, 378.994 286.361, 378.376 286.765 M 346.144 293.327 C 344.186 295.685, 342.004 301.846, 342.587 303.367 C 343.307 305.244, 345.537 306.115, 347.597 305.324 C 350.112 304.359, 353.211 296.263, 351.961 293.927 C 350.771 291.704, 347.749 291.393, 346.144 293.327 M 368.200 305.855 C 366.558 306.897, 363.898 315.570, 364.633 317.486 C 365.448 319.609, 369.003 320.429, 370.558 318.853 C 371.292 318.109, 372.451 315.397, 373.133 312.827 C 374.140 309.035, 374.127 307.858, 373.064 306.577 C 371.613 304.829, 370.159 304.613, 368.200 305.855 M 338.088 313.394 C 337.452 314.161, 336.664 317.039, 336.338 319.791 C 335.827 324.109, 336.018 324.939, 337.735 325.858 C 339.194 326.639, 340.185 326.586, 341.454 325.657 C 343.696 324.018, 345.427 315.220, 343.875 313.350 C 342.424 311.601, 339.558 311.623, 338.088 313.394 M 362.724 327.134 C 361.373 327.891, 361 329.479, 361 334.482 C 361 340.099, 361.253 340.946, 363.112 341.535 C 364.379 341.938, 365.749 341.665, 366.539 340.853 C 367.648 339.713, 368.439 333.821, 368.093 329.285 C 367.945 327.345, 364.683 326.038, 362.724 327.134 M 335.724 334.134 C 334.404 334.873, 334 336.446, 334 340.850 C 334 346.797, 335.126 349, 338.165 349 C 340.863 349, 342 345.792, 341.324 340.084 C 340.663 334.510, 338.728 332.453, 335.724 334.134 M 360.607 349.582 C 359.655 352.062, 359.895 357.936, 361.035 360.066 C 362.202 362.246, 364.998 362.602, 366.800 360.800 C 368.356 359.244, 368.356 350.756, 366.800 349.200 C 365.086 347.486, 361.322 347.718, 360.607 349.582 M 336.750 355.107 C 333.188 357.127, 335.342 368.057, 339.459 368.850 C 342.381 369.413, 343.678 366.740, 343.054 361.443 C 342.424 356.087, 339.755 353.404, 336.750 355.107 M 364.550 370.340 C 361.232 372.766, 364.776 383, 368.934 383 C 372.463 383, 373.274 380.574, 371.497 375.338 C 369.364 369.056, 367.822 367.947, 364.550 370.340"
                                                                        stroke="none" fill="#0d9488"
                                                                        fill-rule="evenodd" />
                                                                </svg>
                                                                Most Wickets
                                                            </h4>
                                                            <div class="grid grid-cols-2 gap-5 text-center">
                                                                <!-- Team 1 -->
                                                                <div
                                                                    class="flex flex-col items-center rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white p-6">
                                                                    <div
                                                                        class="mb-2 flex h-16 w-16 items-center justify-center rounded-full border border-gray-200 text-2xl font-bold text-gray-900">
                                                                        {{ $headToHeadSummary["team1"]["top_bowl"]["wickets"] ?? 0 }}
                                                                    </div>
                                                                    <a href="{{ route("frontend.profile", $headToHeadSummary["team1"]["top_bowl"]["slug"] ?? "") }}"
                                                                        class="text-sm font-normal text-teal-600 hover:underline"
                                                                        title="{{ $headToHeadSummary["team1"]["top_bat"]["player"] ?? "-" }}">
                                                                        {{ $headToHeadSummary["team1"]["top_bowl"]["player"] ?? "-" }}
                                                                    </a>
                                                                </div>

                                                                <!-- Team 2 -->
                                                                <div
                                                                    class="flex flex-col items-center rounded-xl border border-slate-200 bg-gradient-to-b from-slate-50 to-white p-6">
                                                                    <div
                                                                        class="mb-2 flex h-16 w-16 items-center justify-center rounded-full border border-gray-200 text-2xl font-bold text-gray-900">
                                                                        {{ $headToHeadSummary["team2"]["top_bowl"]["wickets"] ?? 0 }}
                                                                    </div>
                                                                    <a href="{{ route("frontend.profile", $headToHeadSummary["team2"]["top_bowl"]["slug"] ?? "") }}"
                                                                        class="text-sm font-normal text-teal-600 hover:underline"
                                                                        title="{{ $headToHeadSummary["team2"]["top_bat"]["player"] ?? "-" }}">
                                                                        {{ $headToHeadSummary["team2"]["top_bowl"]["player"] ?? "-" }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Mobile Only -->
                                            {{-- <div
                                                class="block md:hidden max-w-xs mx-auto bg-white text-center">
                                                <!-- Top Section -->
                                                <div class="flex flex-col items-center space-y-3">
                                                    <!-- India -->
                                                    <div
                                                        class="flex items-center justify-between w-full bg-gray-50 border rounded px-3 py-1">
                                                        <div class="flex items-center space-x-2">
                                                            <img src="https://flagcdn.com/w20/in.png" alt="India"
                                                                class="w-5 h-3 rounded-sm">
                                                            <span class="text-sm font-medium text-gray-800">India</span>
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 9l-7 7-7-7" />
                                                        </svg>
                                                    </div>
        
                                                    <!-- VS -->
                                                    <div class="bg-blue-600 text-white font-bold rounded-full px-3 py-1 text-sm">
                                                        vs</div>
        
                                                    <!-- Australia -->
                                                    <div
                                                        class="flex items-center justify-between w-full bg-gray-50 border rounded px-3 py-1">
                                                        <div class="flex items-center space-x-2">
                                                            <img src="https://flagcdn.com/w20/au.png" alt="Australia"
                                                                class="w-5 h-3 rounded-sm">
                                                            <span class="text-sm font-medium text-gray-800">Australia</span>
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 9l-7 7-7-7" />
                                                        </svg>
                                                    </div>
                                                </div>
        
                                                <!-- Matches Section -->
                                                <div class="mt-5 flex items-center justify-between">
                                                    <img src="https://flagcdn.com/w20/in.png" alt="India"
                                                        class="w-5 h-3 rounded-sm">
                                                    <div>
                                                        <p class="text-xs font-semibold text-gray-600">MATCHES</p>
                                                        <p class="text-2xl font-bold text-red-600">152</p>
                                                    </div>
                                                    <img src="https://flagcdn.com/w20/au.png" alt="Australia"
                                                        class="w-5 h-3 rounded-sm">
                                                </div>
        
                                                <!-- Stats Table -->
                                                <div class="mt-4 text-sm divide-y divide-gray-200">
                                                    <div class="flex justify-between py-3">
                                                        <span>58</span>
                                                        <span class="text-gray-500">Won</span>
                                                        <span>84</span>
                                                    </div>
                                                    <div class="flex justify-between py-3">
                                                        <span>84</span>
                                                        <span class="text-gray-500">Lost</span>
                                                        <span>58</span>
                                                    </div>
                                                    <div class="flex justify-between py-3">
                                                        <span>10</span>
                                                        <span class="text-gray-500">No Result</span>
                                                        <span>10</span>
                                                    </div>
                                                    <div class="flex justify-between py-3">
                                                        <span>0</span>
                                                        <span class="text-gray-500">Win%</span>
                                                        <span>0</span>
                                                    </div>
                                                    <div class="flex justify-between py-3">
                                                        <span>33</span>
                                                        <span class="text-gray-500">High Score</span>
                                                        <span>38</span>
                                                    </div>
                                                    <div class="flex justify-between py-3">
                                                        <span>14</span>
                                                        <span class="text-gray-500">Low Score</span>
                                                        <span>34</span>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <!-- Mobile Only -->
                                            <div class="mx-auto block max-w-xs bg-white text-center md:hidden">
                                                <!-- Top Section -->
                                                {{-- <div class="flex flex-col items-center space-y-3">
                                                    <!-- Team 1 -->
                                                    <div
                                                        class="flex w-full items-center justify-between rounded-xl border border-gray-200 bg-gray-50 px-3 py-1">
                                                        <div class="flex items-center space-x-2">
                                                            <img src="{{ asset($headToHeadSummary["team1"]["logo"] ?? "images/user_profile.webp") }}"
                                                                alt="{{ $headToHeadSummary["team1"]["name"] }}"
                                                                class="w-11 h-11 rounded-full object-fill ring-1 ring-gray-200" />
                                                            <span class="text-sm font-medium text-gray-800">
                                                                {{ $headToHeadSummary["team1"]["name"] }}
                                                            </span>
                                                        </div>
                                                    </div>
        
                                                    <!-- VS -->
                                                    <div class="rounded-full bg-blue-600 px-3 py-1 text-sm font-bold text-white">vs
                                                    </div>
        
                                                    <!-- Team 2 -->
                                                    <div
                                                        class="flex w-full items-center justify-between rounded-xl border border-gray-200 bg-gray-50 px-3 py-1">
                                                        <div class="flex items-center space-x-2">
                                                            <img src="{{ asset($headToHeadSummary["team2"]["logo"] ?? "images/user_profile.webp") }}"
                                                                alt="{{ $headToHeadSummary["team2"]["name"] }}"
                                                                class="w-11 h-11 rounded-full object-fill ring-1 ring-gray-200" />
                                                            <span class="text-sm font-medium text-gray-800">
                                                                {{ $headToHeadSummary["team2"]["name"] }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <!-- Matches Section -->
                                                <div class="mt-5 flex items-center justify-between">
                                                    <img src="{{ asset($headToHeadSummary["team1"]["logo"] ?? "images/user_profile.webp") }}"
                                                        alt="{{ $headToHeadSummary["team1"]["name"] }}"
                                                        class="h-11 w-11 rounded-full object-fill ring-1 ring-gray-200"
                                                        loading="lazy" />
                                                    <div>
                                                        <p class="text-xs font-bold tracking-tighter text-gray-900">MATCHES
                                                        </p>
                                                        <p class="text-2xl font-bold text-red-600">
                                                            {{ $headToHeadSummary["total_matches"] }}</p>
                                                    </div>
                                                    <img src="{{ asset($headToHeadSummary["team2"]["logo"] ?? "images/user_profile.webp") }}"
                                                        alt="{{ $headToHeadSummary["team2"]["name"] }}"
                                                        class="h-11 w-11 rounded-full object-fill ring-1 ring-gray-200"
                                                        loading="lazy" />
                                                </div>

                                                <!-- Stats Table -->
                                                <div class="mt-4 divide-y divide-gray-200 text-sm">
                                                    <div class="flex justify-between py-3">
                                                        <span>{{ $headToHeadSummary["team1"]["wins"] }}</span>
                                                        <span class="text-gray-500">Won</span>
                                                        <span>{{ $headToHeadSummary["team2"]["wins"] }}</span>
                                                    </div>

                                                    <div class="flex justify-between py-3">
                                                        <span>{{ $headToHeadSummary["team1"]["losses"] }}</span>
                                                        <span class="text-gray-500">Lost</span>
                                                        <span>{{ $headToHeadSummary["team2"]["losses"] }}</span>
                                                    </div>

                                                    <div class="flex justify-between py-3">
                                                        <span>{{ $headToHeadSummary["no_result"] }}</span>
                                                        <span class="text-gray-500">No Result</span>
                                                        <span>{{ $headToHeadSummary["no_result"] }}</span>
                                                    </div>

                                                    <div class="flex justify-between py-3">
                                                        <span>{{ $headToHeadSummary["team1"]["win_percent"] }}%</span>
                                                        <span class="text-gray-500">Win%</span>
                                                        <span>{{ $headToHeadSummary["team2"]["win_percent"] }}%</span>
                                                    </div>

                                                    <div class="flex justify-between py-3">
                                                        <span>{{ $headToHeadSummary["team1"]["high"] }}</span>
                                                        <span class="text-gray-500">High Score</span>
                                                        <span>{{ $headToHeadSummary["team2"]["high"] }}</span>
                                                    </div>

                                                    <div class="flex justify-between py-3">
                                                        <span>{{ $headToHeadSummary["team1"]["low"] }}</span>
                                                        <span class="text-gray-500">Low Score</span>
                                                        <span>{{ $headToHeadSummary["team2"]["low"] }}</span>
                                                    </div>
                                                </div>

                                                <!-- Most Runs -->
                                                <div class="mt-5 text-sm">
                                                    <h4
                                                        class="mb-3 flex items-center justify-center space-x-2 font-bold tracking-tighter text-gray-900">
                                                        <!-- Cricket Bat Icon -->
                                                        <span class="inline-flex items-center justify-center">
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <path d="" stroke="none" fill="#0d9488"
                                                                    fill-rule="evenodd" />
                                                                <path
                                                                    d="M 433.344 20.283 L 413 40.565 413 45.570 L 413 50.575 388.191 76.537 C 364.760 101.057, 350.891 114.554, 339.530 123.895 C 326.382 134.704, 319.183 134.022, 304 120.530 C 299.875 116.865, 295.150 113.123, 293.500 112.216 C 289.317 109.917, 278.578 110.008, 274 112.382 C 268.959 114.995, 20.109 364.123, 15.551 371.119 C -2.712 399.154, 6.681 439.886, 38.755 471.739 C 61.802 494.629, 91.551 505.974, 114.397 500.587 C 129.761 496.964, 121.949 504.176, 262.276 364.072 C 350.157 276.330, 391.679 234.209, 393.026 231.434 C 395.626 226.078, 395.661 217.215, 393.100 212.196 C 392.055 210.148, 388.189 205.114, 384.509 201.010 C 372.189 187.271, 370.829 180.904, 377.995 170.519 C 383.326 162.793, 404.979 140.308, 430.015 116.500 C 453.570 94.099, 455.471 92.521, 458.543 92.819 C 460.353 92.994, 463.109 92.466, 464.667 91.646 C 469.303 89.205, 504.765 52.851, 505.534 49.750 C 506.929 44.132, 505.259 41.870, 484.124 20.750 L 463.360 0 458.524 0 L 453.688 0 433.344 20.283 M 154.863 251.749 C 9.294 397.451, 22.472 382.288, 22.538 404 C 22.573 415.587, 22.809 417.112, 25.766 424.880 C 35.937 451.604, 60.559 475.743, 85.688 483.628 C 92.602 485.797, 95.326 486.141, 103.188 485.838 C 120.552 485.167, 107.928 496.483, 252.250 352.208 C 360.537 243.956, 380 224.076, 380 221.724 C 380 219.728, 378.376 217.202, 374.215 212.725 C 371.034 209.301, 367.018 204.444, 365.292 201.931 C 362.883 198.424, 361.148 197.062, 357.827 196.069 C 337.478 189.983, 316.801 169.976, 309.846 149.642 C 307.835 143.764, 306.858 142.340, 303.008 139.677 C 300.537 137.969, 295.928 134.192, 292.766 131.285 C 282.622 121.959, 297.658 108.824, 154.863 251.749 M 199.741 349.765 C 158.083 391.436, 124 426.290, 124 427.218 C 124 431.798, 128.202 436, 132.782 436 C 133.710 436, 168.564 401.917, 210.235 360.259 C 279.596 290.920, 286 284.242, 286 281.259 C 286 279.333, 285.182 277.182, 284 276 C 282.818 274.818, 280.667 274, 278.741 274 C 275.758 274, 269.080 280.404, 199.741 349.765 M 329 368.045 C 314.082 371.895, 300.535 380.556, 290.607 392.592 C 266.367 421.979, 269.246 466.644, 297.038 492.375 C 310.554 504.889, 325.373 510.984, 344.161 511.759 C 358.791 512.363, 367.733 510.537, 379.812 504.479 C 425.035 481.802, 434.453 421.843, 398.315 386.679 C 391.281 379.835, 388.822 378.084, 379.636 373.377 C 365.132 365.945, 345.252 363.852, 329 368.045 M 341.946 379.750 C 332.835 389.997, 326.818 401.919, 322.515 418.252 C 315.573 444.600, 316.822 475.290, 325.643 495.097 C 327.936 500.246, 328.479 500.773, 332.422 501.675 C 336.034 502.502, 337.062 502.369, 338.964 500.828 C 341.826 498.511, 342.621 498.534, 344.732 501 C 348.290 505.155, 362.573 502.915, 376.500 496.018 C 395.430 486.643, 408.014 468.812, 410.978 447.163 C 414.524 421.263, 400.932 394.656, 378 382.610 C 369.323 378.051, 363.317 376.283, 361.768 377.832 C 359.943 379.657, 356.145 379.205, 354.768 377 C 353.887 375.589, 352.436 375, 349.844 375 C 346.720 375, 345.537 375.711, 341.946 379.750 M 330.238 376.850 C 328.994 377.207, 327.078 378.978, 325.982 380.784 C 323.493 384.884, 321.622 385.638, 318.695 383.720 C 316.572 382.329, 316.083 382.437, 311.953 385.208 C 300.426 392.944, 291.009 405.215, 286.314 418.617 C 283.866 425.604, 283.552 427.921, 283.552 439 C 283.552 450.060, 283.868 452.402, 286.295 459.328 C 287.804 463.633, 290.651 469.708, 292.622 472.828 C 296.767 479.389, 302.954 486.147, 304.142 485.412 C 305.626 484.495, 308.759 486.904, 309.399 489.455 C 309.746 490.835, 311.321 492.631, 312.899 493.448 L 315.769 494.932 313.938 489.048 C 303.858 456.661, 310.072 409.734, 327.924 383.422 C 330.694 379.340, 332.856 376.045, 332.730 376.100 C 332.603 376.155, 331.482 376.492, 330.238 376.850 M 343.285 384.199 C 342.712 384.915, 341.275 387.419, 340.093 389.764 C 337.577 394.759, 338.509 398, 342.463 398 C 346.550 398, 352.389 388.438, 350.319 385.132 C 349.027 383.066, 344.659 382.487, 343.285 384.199 M 308.783 390.062 C 307.839 390.612, 306.128 393.182, 304.982 395.773 C 302.460 401.476, 303.419 405, 307.493 405 C 312.323 405, 317.173 393.062, 313.450 390.340 C 311.295 388.764, 311.036 388.748, 308.783 390.062 M 332.598 405.545 C 330.668 407.475, 328.781 414.278, 329.191 417.826 C 329.459 420.147, 329.954 420.500, 332.943 420.500 C 336.285 420.500, 336.445 420.317, 338.376 414.281 C 340.308 408.240, 340.313 408.003, 338.528 406.031 C 336.328 403.600, 334.678 403.465, 332.598 405.545 M 297.985 414.029 C 296.186 417.390, 295.563 425.769, 296.985 427.482 C 298.577 429.400, 301.427 429.430, 303.307 427.550 C 305.319 425.538, 306.514 415.324, 304.956 413.447 C 303.202 411.334, 299.251 411.663, 297.985 414.029 M 326.070 429.936 C 325.178 430.500, 324.472 433.146, 324.197 436.956 C 323.844 441.840, 324.112 443.467, 325.532 445.036 C 329.620 449.553, 333 446.200, 333 437.629 C 333 429.808, 330.557 427.096, 326.070 429.936 M 293.854 439.422 C 293.167 440.928, 293.016 443.975, 293.454 447.479 C 294.033 452.110, 294.589 453.311, 296.575 454.216 C 298.538 455.110, 299.363 454.981, 300.967 453.530 C 302.674 451.985, 302.860 450.910, 302.334 445.621 C 301.999 442.254, 301.282 438.938, 300.740 438.250 C 299.039 436.091, 295.063 436.768, 293.854 439.422 M 324.919 454.597 C 323.281 456.571, 323.372 466.539, 325.047 468.557 C 326.620 470.452, 329.466 470.391, 331.437 468.421 C 333.272 466.585, 332.919 456.812, 330.931 454.417 C 329.370 452.535, 326.560 452.620, 324.919 454.597 M 295.999 462.502 C 294.300 464.548, 295.190 474.619, 297.252 476.680 C 299.070 478.499, 303.465 477.835, 304.318 475.614 C 305.226 473.249, 303.395 462.864, 301.904 461.920 C 299.794 460.584, 297.394 460.820, 295.999 462.502 M 328.243 479.157 C 326.464 480.936, 326.743 484.836, 329.004 489.818 C 330.688 493.530, 331.338 494.092, 333.631 493.818 C 337.987 493.299, 338.681 490.958, 336.446 484.318 C 334.822 479.494, 334.060 478.450, 331.986 478.207 C 330.611 478.046, 328.927 478.473, 328.243 479.157"
                                                                    stroke="none" fill="#0d9488" fill-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                        <span>Most Runs</span>
                                                    </h4>
                                                    <div class="flex items-start justify-between">
                                                        <!-- Team 1 -->
                                                        <div class="flex w-1/2 flex-col items-center space-y-2">
                                                            <div
                                                                class="flex h-14 w-14 items-center justify-center rounded-full border border-slate-200 bg-gradient-to-b from-slate-50 to-white text-base font-bold text-gray-900">
                                                                {{ $headToHeadSummary["team1"]["top_bat"]["runs"] ?? 0 }}
                                                            </div>
                                                            <a href="{{ route("frontend.profile", $headToHeadSummary["team1"]["top_bat"]["slug"] ?? "") }}"
                                                                class="text-center text-xs font-medium text-teal-600"
                                                                title="{{ $headToHeadSummary["team1"]["top_bat"]["player"] ?? "-" }}">
                                                                {{ $headToHeadSummary["team1"]["top_bat"]["player"] ?? "-" }}
                                                            </a>
                                                        </div>

                                                        <!-- Team 2 -->
                                                        <div class="flex w-1/2 flex-col items-center space-y-2">
                                                            <div
                                                                class="flex h-14 w-14 items-center justify-center rounded-full border border-slate-200 bg-gradient-to-b from-slate-50 to-white text-base font-bold text-gray-900">
                                                                {{ $headToHeadSummary["team2"]["top_bat"]["runs"] ?? 0 }}
                                                            </div>
                                                            <a href="{{ route("frontend.profile", $headToHeadSummary["team2"]["top_bat"]["slug"] ?? "") }}"
                                                                class="text-center text-xs font-medium text-teal-600 hover:underline"
                                                                title="{{ $headToHeadSummary["team2"]["top_bat"]["player"] ?? "-" }}">
                                                                {{ $headToHeadSummary["team2"]["top_bat"]["player"] ?? "-" }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Most Wickets -->
                                                <div class="mt-5 text-sm">
                                                    <h4
                                                        class="mb-3 flex items-center justify-center space-x-2 font-bold tracking-tighter text-gray-900">
                                                        <!-- Cricket Bat Icon -->
                                                        <span class="inline-flex items-center justify-center">
                                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512">
                                                                <path d="" stroke="none" fill="#0d9488"
                                                                    fill-rule="evenodd" />
                                                                <path
                                                                    d="M 431.707 14.825 C 418.377 28.262, 417 29.979, 417 33.158 C 417 36.400, 415.127 38.558, 392.250 61.669 C 378.637 75.422, 365.285 88.097, 362.579 89.837 C 353.738 95.519, 349.037 94.214, 335.810 82.407 C 331.751 78.784, 326.940 77.438, 321.828 78.495 C 319.103 79.059, 297.957 99.697, 205.176 192.342 C 142.848 254.579, 90.566 307.337, 88.993 309.583 C 78.501 324.566, 80.059 346.645, 92.999 366.364 C 102.416 380.713, 113.274 390.376, 127.500 397.066 C 141.500 403.651, 152.194 404.492, 164.500 399.977 C 170.314 397.844, 174.067 394.216, 285.858 282.638 C 372.573 196.088, 401.705 166.428, 403.185 163.183 C 406.230 156.504, 405.068 152.443, 397.602 143.657 C 389.699 134.358, 388.320 131.212, 389.875 126.024 C 391.447 120.776, 403.183 107.797, 427.406 84.519 C 445.228 67.392, 447.455 65.569, 450.203 65.857 C 452.947 66.145, 454.724 64.702, 468.125 51.302 C 480.625 38.801, 483 35.951, 483 33.451 C 483 30.946, 480.586 28.066, 467.738 15.238 C 454.775 2.295, 452.020 0, 449.445 0 C 446.867 0, 444.212 2.219, 431.707 14.825 M 79.571 10.571 C 78.707 11.436, 78 12.561, 78 13.071 C 78 13.582, 74.150 14, 69.445 14 L 60.890 14 61.195 18.750 L 61.500 23.500 69.736 23.790 C 76.719 24.036, 78.132 24.379, 79.022 26.040 C 80.018 27.903, 81.257 28, 103.978 28 C 126.568 28, 127.962 27.892, 129.256 26.045 C 130.383 24.436, 132.026 24.039, 138.562 23.795 L 146.500 23.500 146.805 18.750 L 147.110 14 139.170 14 C 131.804 14, 131.112 13.819, 129.592 11.500 L 127.954 9 104.548 9 C 84.604 9, 80.910 9.232, 79.571 10.571 M 169.750 10.070 C 168.787 10.636, 168 11.734, 168 12.509 C 168 13.585, 166.045 13.988, 159.750 14.210 L 151.500 14.500 151.500 19 L 151.500 23.500 159.438 23.795 C 165.974 24.039, 167.617 24.436, 168.744 26.045 C 170.038 27.892, 171.433 28, 194.048 28 C 216.900 28, 218.040 27.910, 219.232 26 C 220.317 24.263, 221.564 24, 228.721 24 C 236.677 24, 236.984 23.914, 237.589 21.500 C 237.934 20.125, 237.934 17.875, 237.589 16.500 C 236.984 14.086, 236.677 14, 228.718 14 C 221.128 14, 220.396 13.822, 219.487 11.750 C 218.508 9.518, 218.309 9.498, 195 9.270 C 180.264 9.127, 170.847 9.425, 169.750 10.070 M 44.750 28.080 C 43.091 29.046, 43 41.271, 43 262.550 L 43 496 36 496 L 29 496 29 504 L 29 512 150 512 L 271 512 271 504 L 271 496 264 496 L 257 496 257 420.761 L 257 345.521 239.500 363 L 222 380.479 222 438.239 L 222 496 195 496 L 168 496 168 460.439 L 168 424.877 163.250 425.689 C 160.637 426.135, 154.675 426.500, 150 426.500 C 145.325 426.500, 139.363 426.135, 136.750 425.689 L 132 424.877 132 460.439 L 132 496 105 496 L 78 496 78 441.881 L 78 387.762 72.429 378.974 C 62.771 363.740, 58.035 348.611, 58.035 333 C 58.035 316.478, 63.289 301.685, 73.046 290.738 L 78 285.179 78 157.125 C 78 31.545, 77.963 29.050, 76.066 28.035 C 73.570 26.699, 47.055 26.737, 44.750 28.080 M 133.557 29.223 C 132.173 31.198, 132 42.487, 132 130.723 C 132 185.325, 132.354 230, 132.787 230 C 133.220 230, 141.320 222.208, 150.787 212.685 L 168 195.370 168 112.840 C 168 34.156, 167.915 30.233, 166.171 28.655 C 164.645 27.274, 161.924 27, 149.728 27 C 135.759 27, 135.045 27.098, 133.557 29.223 M 223.571 28.571 C 222.181 29.962, 222 36.477, 222 85.155 C 222 120.136, 222.352 140.045, 222.967 139.833 C 223.499 139.650, 231.374 132.106, 240.467 123.070 L 257 106.639 257 67.855 C 257 30.533, 256.927 29.031, 255.066 28.035 C 253.997 27.463, 246.871 27, 239.137 27 C 227.748 27, 224.850 27.293, 223.571 28.571 M 210.790 201.750 C 88.848 323.734, 94.382 317.698, 93.275 329.909 C 92.568 337.702, 94.438 345.640, 99.254 355.294 C 104.936 366.685, 119.107 380.938, 130 386.221 C 144.326 393.168, 155.551 393.415, 165.155 386.994 C 171.487 382.759, 394 159.827, 394 157.717 C 394 156.748, 392.280 154.053, 390.178 151.728 C 388.075 149.402, 385.116 145.837, 383.601 143.805 C 381.688 141.238, 379.367 139.618, 376.004 138.501 C 369.263 136.262, 357.811 127.963, 352.860 121.728 C 348.896 116.737, 343.002 105.762, 343.001 103.369 C 343 102.746, 341.313 100.979, 339.250 99.441 C 337.188 97.903, 333.598 94.925, 331.272 92.822 C 328.947 90.720, 326.247 89, 325.273 89 C 324.254 89, 275.594 136.923, 210.790 201.750 M 242.757 270.757 C 180.630 332.884, 166 348.008, 166 350.102 C 166 353.068, 168.766 356, 171.563 356 C 172.755 356, 202.257 327.222, 250.235 279.259 C 331.331 198.188, 329.826 199.867, 325.171 195.655 C 324.165 194.745, 322.481 194, 321.429 194 C 320.227 194, 290.962 222.552, 242.757 270.757 M 370.814 272.021 C 357.270 274.144, 341.819 282.709, 332.538 293.237 C 327.148 299.352, 320.675 311.913, 318.510 320.460 C 316.578 328.088, 316.600 341.676, 318.558 349.985 C 319.399 353.551, 321.701 359.851, 323.675 363.985 C 328.617 374.335, 341.293 386.977, 352 392.234 C 388.830 410.314, 432.213 390.545, 442.642 350.928 C 445.115 341.534, 444.830 326.452, 442.010 317.500 C 438.418 306.099, 434.185 299.162, 425.458 290.372 C 418.946 283.815, 415.757 281.471, 408.944 278.236 C 404.300 276.032, 398.475 273.752, 396 273.171 C 389.187 271.570, 377.184 271.022, 370.814 272.021 M 375.137 284.635 C 355.495 306.673, 349.024 355.399, 361.879 384.460 C 363.482 388.082, 364.492 389.042, 367.612 389.903 C 370.636 390.738, 371.727 390.652, 373.028 389.474 C 375.129 387.573, 377.904 387.586, 378.638 389.500 C 379.408 391.506, 387.696 391.491, 395.458 389.469 C 404.381 387.145, 412.785 382.198, 420.041 375 C 441.571 353.640, 442.506 319.829, 422.176 297.806 C 412.642 287.477, 397.252 279.112, 392.846 281.864 C 390.161 283.541, 388.205 283.252, 387 281 C 386.309 279.710, 384.906 279, 383.045 279 C 380.801 279, 379.045 280.251, 375.137 284.635 M 363.278 282.250 C 362.746 282.938, 362.026 284.298, 361.678 285.273 C 360.813 287.696, 358.124 288.558, 355.852 287.140 C 353.314 285.555, 349.815 287.424, 342.316 294.372 C 325.061 310.358, 319.811 336.625, 329.500 358.500 C 332.996 366.395, 340.713 376, 343.559 376 C 345.197 376, 346.432 376.934, 347.485 378.970 C 349.341 382.560, 353.537 385.306, 352.627 382.336 C 342.790 350.209, 347.851 309.041, 364.485 285.888 C 367.502 281.689, 367.732 281, 366.121 281 C 365.089 281, 363.810 281.563, 363.278 282.250 M 378.376 286.765 C 376.682 287.872, 373.008 294.275, 373.004 296.128 C 372.999 298.399, 375.554 300.279, 377.702 299.584 C 379.427 299.026, 384 292.157, 384 290.123 C 384 289.003, 381.199 285.992, 380.179 286.015 C 379.805 286.024, 378.994 286.361, 378.376 286.765 M 346.144 293.327 C 344.186 295.685, 342.004 301.846, 342.587 303.367 C 343.307 305.244, 345.537 306.115, 347.597 305.324 C 350.112 304.359, 353.211 296.263, 351.961 293.927 C 350.771 291.704, 347.749 291.393, 346.144 293.327 M 368.200 305.855 C 366.558 306.897, 363.898 315.570, 364.633 317.486 C 365.448 319.609, 369.003 320.429, 370.558 318.853 C 371.292 318.109, 372.451 315.397, 373.133 312.827 C 374.140 309.035, 374.127 307.858, 373.064 306.577 C 371.613 304.829, 370.159 304.613, 368.200 305.855 M 338.088 313.394 C 337.452 314.161, 336.664 317.039, 336.338 319.791 C 335.827 324.109, 336.018 324.939, 337.735 325.858 C 339.194 326.639, 340.185 326.586, 341.454 325.657 C 343.696 324.018, 345.427 315.220, 343.875 313.350 C 342.424 311.601, 339.558 311.623, 338.088 313.394 M 362.724 327.134 C 361.373 327.891, 361 329.479, 361 334.482 C 361 340.099, 361.253 340.946, 363.112 341.535 C 364.379 341.938, 365.749 341.665, 366.539 340.853 C 367.648 339.713, 368.439 333.821, 368.093 329.285 C 367.945 327.345, 364.683 326.038, 362.724 327.134 M 335.724 334.134 C 334.404 334.873, 334 336.446, 334 340.850 C 334 346.797, 335.126 349, 338.165 349 C 340.863 349, 342 345.792, 341.324 340.084 C 340.663 334.510, 338.728 332.453, 335.724 334.134 M 360.607 349.582 C 359.655 352.062, 359.895 357.936, 361.035 360.066 C 362.202 362.246, 364.998 362.602, 366.800 360.800 C 368.356 359.244, 368.356 350.756, 366.800 349.200 C 365.086 347.486, 361.322 347.718, 360.607 349.582 M 336.750 355.107 C 333.188 357.127, 335.342 368.057, 339.459 368.850 C 342.381 369.413, 343.678 366.740, 343.054 361.443 C 342.424 356.087, 339.755 353.404, 336.750 355.107 M 364.550 370.340 C 361.232 372.766, 364.776 383, 368.934 383 C 372.463 383, 373.274 380.574, 371.497 375.338 C 369.364 369.056, 367.822 367.947, 364.550 370.340"
                                                                    stroke="none" fill="#0d9488" fill-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                        <span>Most Wickets</span>
                                                    </h4>
                                                    <div class="flex items-start justify-between">
                                                        <!-- Team 1 -->
                                                        <div class="flex w-1/2 flex-col items-center space-y-2">
                                                            <div
                                                                class="flex h-14 w-14 items-center justify-center rounded-full border border-slate-200 bg-gradient-to-b from-slate-50 to-white text-base font-bold text-gray-900">
                                                                {{ $headToHeadSummary["team1"]["top_bowl"]["wickets"] ?? 0 }}
                                                            </div>
                                                            <a href="{{ route("frontend.profile", $headToHeadSummary["team1"]["top_bowl"]["slug"] ?? "") }}"
                                                                class="text-center text-xs font-medium text-teal-600 hover:underline"
                                                                title="{{ $headToHeadSummary["team1"]["top_bowl"]["player"] ?? "-" }}">
                                                                {{ $headToHeadSummary["team1"]["top_bowl"]["player"] ?? "-" }}
                                                            </a>
                                                        </div>

                                                        <!-- Team 2 -->
                                                        <div class="flex w-1/2 flex-col items-center space-y-2">
                                                            <div
                                                                class="flex h-14 w-14 items-center justify-center rounded-full border border-slate-200 bg-gradient-to-b from-slate-50 to-white text-base font-bold text-gray-900">
                                                                {{ $headToHeadSummary["team2"]["top_bowl"]["wickets"] ?? 0 }}
                                                            </div>
                                                            <a href="{{ route("frontend.profile", $headToHeadSummary["team2"]["top_bowl"]["slug"] ?? "") }}"
                                                                class="text-center text-xs font-medium text-teal-600"
                                                                title="{{ $headToHeadSummary["team2"]["top_bowl"]["player"] ?? "-" }}">
                                                                {{ $headToHeadSummary["team2"]["top_bowl"]["player"] ?? "-" }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
    </div>
    </section>


    @push("title")
        {{ $team1 }} vs {{ $team2 }} - Scorecard
    @endpush

    </div>
