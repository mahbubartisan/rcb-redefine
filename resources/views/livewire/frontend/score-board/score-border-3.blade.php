<div x-data="{ tab: 'summary', scoreSubtab: 'teamA' }">
    <div class="max-w-6xl mx-auto mt-10 lg:mt-36 py-12 px-2 sm:px-6 lg:px-4">
        <div class="bg-white mx-auto rounded border border-gray-200 p-2 lg:p-6 w-full max-w-7xl">
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

            <!-- Team 1 Score -->
            <div class="mt-4 flex items-center justify-between text-gray-800">
                <div class="flex items-center gap-3">
                    <img src="{{ optional($match->team1->media)->path
                        ? asset(optional($match->team1->media)->path)
                        : "https://ui-avatars.com/api/?name=" .
                            urlencode(optional($match->team1)->name_en) .
                            "&background=20b2aa&color=fff&size=64&length=3" }}"
                        alt="{{ optional($match->team1)->name_en }}" class="w-11 h-11 rounded-full object-cover">
                    <span class="text-lg font-semibold uppercase">
                        {{ app()->getLocale() === "bn" ? optional($match->team1)->name_bn : optional($match->team1)->name_en }}
                    </span>
                </div>
                <div class="text-left sm:text-right my-3 sm:mt-0">
                    <span class="text-lg lg:text-xl font-semibold">
                        {{ $match->team1_score ?? 0 }}
                        <span class="text-base font-medium">({{ $match->team1_played_over ?: 0 }} Ov)</span>
                    </span>
                </div>
            </div>

            {{-- <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between text-gray-800">
                <!-- Left side: Logo + Name + (Score on mobile) -->
                <div class="flex items-center gap-3">
                    <img src="{{ optional($match->team1->media)->path
                        ? asset(optional($match->team1->media)->path)
                        : "https://ui-avatars.com/api/?name=" .
                            urlencode(optional($match->team1)->name_en) .
                            "&background=20b2aa&color=fff&size=64&length=3" }}"
                        alt="{{ optional($match->team1)->name_en }}" class="w-11 h-11 rounded-full object-fit">

                    <div class="flex flex-col">
                        <!-- Team name -->
                        <span class="text-lg font-semibold uppercase">
                            {{ app()->getLocale() === "bn" ? optional($match->team1)->name_bn : optional($match->team1)->name_en }}
                        </span>

                        <!-- Mobile score (hidden on sm and up) -->
                        <span class="text-base font-semibold text-gray-800 sm:hidden">
                            {{ $match->team1_score ?? 0 }}
                            <span class="text-xs font-normal text-gray-600">
                                ({{ $match->team1_played_over ?: 0 }} Ov)
                            </span>
                        </span>
                    </div>
                </div>

                <!-- Desktop score (hidden on mobile) -->
                <div class="hidden sm:block text-left sm:text-right my-3 sm:mt-0">
                    <span class="text-xl font-bold">
                        {{ $match->team1_score ?? 0 }}
                        <span class="text-base font-medium">
                            ({{ $match->team1_played_over ?: 0 }} Ov)
                        </span>
                    </span>
                </div>
            </div> --}}



            <!-- Team 2 Score -->
            <div class="mt-4 flex items-center justify-between text-gray-800">
                <div class="flex items-center gap-3">
                    <img src="{{ optional(@$match->team2?->media)->path
                        ? asset(optional(@$match->team2?->media)->path)
                        : "https://ui-avatars.com/api/?name=" .
                            urlencode($match->team2->name_en) .
                            "&background=20b2aa&color=fff&size=64&length=3" }}"
                        alt="{{ optional($match->team2)->name_en }}" class="w-11 h-11 rounded-full object-cover">
                    <span class="text-lg font-semibold uppercase">
                        {{ app()->getLocale() === "bn" ? optional($match->team2)->name_bn : optional($match->team2)->name_en }}
                    </span>
                </div>
                <div class="text-left sm:text-right my-3 sm:mt-0">
                    <span class="text-lg lg:text-xl font-semibold">
                        {{ $match->team2_score ?? 0 }}
                        <span class="text-base font-medium">({{ $match->team2_played_over ?: 0 }} Ov)</span>
                    </span>
                </div>
            </div>
            {{-- <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between text-gray-800">
                <!-- Left side: Logo + Name + (Score on mobile) -->
                <div class="flex items-center gap-3">
                    <img src="{{ optional(@$match->team2?->media)->path
                        ? asset(optional(@$match->team2?->media)->path)
                        : "https://ui-avatars.com/api/?name=" .
                            urlencode(optional($match->team2)->name_en) .
                            "&background=20b2aa&color=fff&size=64&length=3" }}"
                        alt="{{ optional($match->team2)->name_en }}" class="w-11 h-11 rounded-full object-fit">

                    <div class="flex flex-col">
                        <!-- Team name -->
                        <span class="text-lg font-semibold uppercase">
                            {{ app()->getLocale() === "bn" ? optional($match->team2)->name_bn : optional($match->team2)->name_en }}
                        </span>

                        <!-- Mobile score (hidden on sm and up) -->
                        <span class="text-base font-semibold text-gray-800 sm:hidden">
                            {{ $match->team2_score ?? 0 }}
                            <span class="text-xs font-normal text-gray-600">
                                ({{ $match->team2_played_over ?: 0 }} Ov)
                            </span>
                        </span>
                    </div>
                </div>

                <!-- Desktop score (hidden on mobile) -->
                <div class="hidden sm:block text-left sm:text-right my-3 sm:mt-0">
                    <span class="text-xl font-bold">
                        {{ $match->team2_score ?? 0 }}
                        <span class="text-base font-medium">
                            ({{ $match->team2_played_over ?: 0 }} Ov)
                        </span>
                    </span>
                </div>
            </div> --}}


            <!-- Result + Player of the Match Centered -->
            <div class="mt-4 text-center">
                @if ($match->match_result)
                    <div class="text-base text-gray-600">
                        {{ $match->match_result }}
                    </div>
                @endif

                @if ($match->player_of_match)
                    <div class="mt-2 text-base text-gray-800">
                        <span class="font-semibold">{{ __("messages.player_of_the_match") }}:</span>
                        <a href="{{ route("frontend.profile", optional($match->player)->slug) }}"
                            class="text-teal-600">
                            {{ strtoupper(app()->getLocale() === "bn" ? optional($match->player)->first_name_bn : optional($match->player)->first_name_en) }}
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="pt-3">
            <div class="bg-white mx-auto rounded border border-gray-200 p-2 lg:p-6 w-full max-w-7xl">
                <!-- Main Tabs -->
                <div class="border-b border-gray-200 mb-6">
                    {{-- <div
                        class="flex justify-center space-x-6 overflow-x-auto no-scrollbar min-w-0 whitespace-nowrap px-2">
                        <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'summary' ? 'border-b-2 border-teal-500 text-teal-500' :
                                'text-gray-800 hover:text-teal-500'"
                            @click="tab = 'summary'" type="button">
                            {{ __("messages.summary") }}
                        </button>
                        <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'scorecard' ? 'border-b-2 border-teal-500 text-teal-500' :
                                'text-gray-800 hover:text-teal-500'"
                            @click="tab = 'scorecard'; scoreSubtab = 'teamA'" type="button">
                            {{ __("messages.scorecard") }}
                        </button>
                        <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'squad' ? 'border-b-2 border-teal-500 text-teal-500' :
                                'text-gray-800 hover:text-teal-500'"
                            @click="tab = 'squad'" type="button">
                            {{ __("messages.squad") }}
                        </button>
                        <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'matchinfo' ? 'border-b-2 border-teal-500 text-teal-500' :
                                'text-gray-800 hover:text-teal-500'"
                            @click="tab = 'matchinfo'" type="button">
                            {{ __("messages.match_info") }}
                        </button>
                        <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'commentary' ? 'border-b-2 border-teal-500 text-teal-500' :
                                'text-gray-800 hover:text-teal-500'"
                            @click="tab = 'commentary'" type="button">
                            {{ __("messages.commentary") }}
                        </button>
                    </div> --}}
                    <div class="overflow-x-auto no-scrollbar px-2">
                        <div class="flex justify-center space-x-6 min-w-max">
                            <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                                :class="tab === 'summary' ? 'border-b-2 border-teal-500 text-teal-500' :
                                    'text-gray-800 hover:text-teal-500'"
                                @click="tab = 'summary'" type="button">
                                {{ __("messages.summary") }}
                            </button>

                            <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                                :class="tab === 'scorecard' ? 'border-b-2 border-teal-500 text-teal-500' :
                                    'text-gray-800 hover:text-teal-500'"
                                @click="tab = 'scorecard'; scoreSubtab = 'teamA'" type="button">
                                {{ __("messages.scorecard") }}
                            </button>

                            <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                                :class="tab === 'squad' ? 'border-b-2 border-teal-500 text-teal-500' :
                                    'text-gray-800 hover:text-teal-500'"
                                @click="tab = 'squad'" type="button">
                                {{ __("messages.squad") }}
                            </button>

                            <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                                :class="tab === 'matchinfo' ? 'border-b-2 border-teal-500 text-teal-500' :
                                    'text-gray-800 hover:text-teal-500'"
                                @click="tab = 'matchinfo'" type="button">
                                {{ __("messages.match_info") }}
                            </button>

                            {{-- <button class="pb-1 text-[15px] font-semibold uppercase flex-shrink-0"
                                :class="tab === 'commentary' ? 'border-b-2 border-teal-500 text-teal-500' :
                                    'text-gray-800 hover:text-teal-500'"
                                @click="tab = 'commentary'" type="button">
                                {{ __("messages.commentary") }}
                            </button> --}}
                        </div>
                    </div>
                </div>

                <!-- Tab Contents -->
                <div>
                    <!-- Summary -->
                    <div x-show="tab === 'summary'" class="text-gray-700 text-sm" x-cloak>
                        <div class="mx-auto">
                            <div class="bg-white mt-5 p-2">
                                @foreach ([$match->team1, $match->team2] as $team)
                                    @php
                                        // Batting for this team, order by runs desc (top scorers)
                                        $batting = $match->battings->where("team_id", $team->id)->sortByDesc("runs");

                                        // Opponent team id
                                        $opponentId =
                                            $match->team1->id === $team->id ? $match->team2->id : $match->team1->id;

                                        // Bowling of opponent team, order by wickets desc then runs asc
                                        $bowling = $match->bowlings
                                            ->where("team_id", $opponentId)
                                            ->sortByDesc("wickets")
                                            ->sortBy("runs");

                                        // Calculate extras for this team
                                        $teamExtras = $match->extras->where("team_id", $opponentId);
                                        $totalExtras =
                                            $teamExtras->sum("byes") +
                                            $teamExtras->sum("leg_byes") +
                                            $teamExtras->sum("wides") +
                                            $teamExtras->sum("no_balls");

                                        // Team total = batsmen runs + extras
                                        $teamScore = $batting->sum("runs") + $totalExtras;
                                        $overs = $bowling->sum("overs");
                                        $wickets = $batting
                                            ->whereNotIn("dismissal", ["not out", "retired hurt"])
                                            ->count();
                                        // Take top 3 batters
                                        $bowling = $bowling->take(3);
                                        $batting = $batting->take(3);
                                    @endphp

                                    <!-- Team header -->
                                    <div class="flex items-center justify-between {{ $loop->first ? "" : "mt-6" }}">
                                        <div class="text-teal-600 font-semibold text-lg uppercase">
                                            {{ app()->getLocale() === "bn" ? $team->name_bn : $team->name_en }}
                                        </div>
                                        <div class="text-teal-600 font-semibold text-lg">
                                            {{ (int) $teamScore ?? 0 }}-{{ $wickets }}
                                            <span class="text-base font-medium">({{ $overs ?: 0 }} Ov)</span>
                                        </div>
                                    </div>

                                    <!-- Team rows -->
                                    <div class="mt-4 space-y-3">
                                        {{-- <div class="grid grid-cols-2 gap-6 md:gap-x-20">
                                            <div>
                                                @foreach ($batting as $b)
                                                    <div class="flex justify-between items-center mb-1">
                                                        <a href="{{ route("frontend.profile", optional($b->batter)->slug) }}"
                                                            class="text-sm text-blue-600 hover:underline">
                                                            {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                        </a>
                                                        <div class="text-gray-800 text-sm font-semibold">
                                                            {{ $b->runs }}@if ($b->dismissal === "not out")
                                                                *
                                                            @endif
                                                            <span
                                                                class="font-normal text-gray-600">({{ $b->balls }})</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div>
                                                @foreach ($bowling as $bo)
                                                    <div class="flex justify-between items-center mb-1">
                                                        <a href="{{ route("frontend.profile", optional($bo->bowler)->slug) }}"
                                                            class="text-sm text-blue-600 hover:underline">
                                                            {{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}
                                                        </a>
                                                        <div class="text-gray-800 text-sm font-medium">
                                                            {{ $bo->wickets }}-{{ $bo->runs }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> --}}
                                        <!-- Blur Effect -->
                                        {{-- <div class="grid grid-cols-2 gap-4 sm:gap-6 md:gap-x-20">
                                            <!-- Batting -->
                                            <div>
                                                @foreach ($batting as $b)
                                                    <div class="flex justify-between items-center mb-1">
                                                        <a href="{{ route("frontend.profile", optional($b->batter)->slug) }}"
                                                            class="text-sm text-blue-600 hover:underline relative overflow-hidden max-w-[120px] sm:max-w-[150px] md:max-w-none">
                                                            <span class="blur-fade">
                                                                {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                            </span>
                                                        </a>
                                                        <div
                                                            class="text-gray-800 text-sm font-semibold whitespace-nowrap">
                                                            {{ $b->runs }}@if ($b->dismissal === "not out")
                                                                *
                                                            @endif
                                                            <span
                                                                class="font-normal text-gray-600">({{ $b->balls }})</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Bowling -->
                                            <div>
                                                @foreach ($bowling as $bo)
                                                    <div class="flex justify-between items-center mb-1">
                                                        <a href="{{ route("frontend.profile", optional($bo->bowler)->slug) }}"
                                                            class="text-sm text-blue-600 hover:underline relative overflow-hidden max-w-[120px] sm:max-w-[150px] md:max-w-none">
                                                            <span class="blur-fade">
                                                                {{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}
                                                            </span>
                                                        </a>
                                                        <div
                                                            class="text-gray-800 text-sm font-medium whitespace-nowrap">
                                                            {{ $bo->wickets }}-{{ $bo->runs }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> --}}
                                        <!-- Word Break -->
                                        <div class="grid grid-cols-2 gap-6 md:gap-x-20">
                                            <!-- Batting -->
                                            <div>
                                                @foreach ($batting as $b)
                                                    <div class="flex justify-between mb-1">
                                                        <a href="{{ route("frontend.profile", optional($b->batter)->slug) }}"
                                                            class="text-sm text-teal-600 hover:underline 
                                                            break-words max-w-[120px] sm:max-w-[150px] md:max-w-none">
                                                            {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                        </a>

                                                        <div
                                                            class="text-gray-800 text-sm font-semibold whitespace-nowrap">
                                                            {{ $b->runs }}@if ($b->dismissal === "not out")
                                                                *
                                                            @endif
                                                            <span
                                                                class="font-normal text-gray-600">({{ $b->balls }})</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- Bowling -->
                                            <div>
                                                @foreach ($bowling as $bo)
                                                    <div class="flex justify-between mb-1">
                                                        {{-- <a href="{{ route("frontend.profile", optional($bo->bowler)->slug) }}"
                                                            class="text-sm text-blue-600 hover:underline relative overflow-hidden max-w-[120px] sm:max-w-[150px] md:max-w-none">
                                                            <span class="blur-fade">
                                                                {{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}
                                                            </span>
                                                        </a> --}}
                                                        <a href="{{ route("frontend.profile", optional($bo->bowler)->slug) }}"
                                                            class="text-sm text-teal-600 hover:underline 
                                                            break-words max-w-[120px] sm:max-w-[150px] md:max-w-none">
                                                            {{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}
                                                        </a>
                                                        <div
                                                            class="text-gray-800 text-sm font-medium whitespace-nowrap">
                                                            {{ $bo->wickets }}-{{ $bo->runs }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Divider between teams -->
                                    @if (!$loop->last)
                                        <div class="border-t border-gray-200 my-4"></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Scorecard -->
                    <div x-show="tab === 'scorecard'" class="text-gray-700 text-sm" x-cloak>
                        <div class="space-y-6">
                            @foreach ($scorecards as $card)
                                <div class="bg-white overflow-hidden" x-data="{ open: true }">
                                    <!-- Header -->
                                    <div class="px-0 py-3 bg-white border-b border-gray-200 cursor-pointer"
                                        @click="open = !open">
                                        <div class="flex items-center justify-between font-semibold text-lg">
                                            <h1 class="font-semibold text-teal-600">
                                                {{ app()->getLocale() === "bn" ? $card["team"]->name_bn : $card["team"]->name_en }}
                                            </h1>
                                            <div class="flex items-center gap-2">
                                                <span class="font-semibold text-teal-600">
                                                    {{ $card["score"] ?? "-" }}-{{ $card["batting"]->whereNotIn("dismissal", ["not out", "retired hurt"])->count() }}
                                                    <span
                                                        class="text-base font-medium">({{ $card["bowling"]->sum("overs") ?: "-" }}
                                                        Ov)
                                                    </span>
                                                </span>
                                                <svg :class="{ 'rotate-180': open }"
                                                    class="w-4 h-4 transition-transform duration-200"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M6 9l6 6l6 -6" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div x-show="open" y-transition>
                                        <!-- Batters -->
                                        {{-- <div class="overflow-x-auto">
                                            <table class="w-full text-sm">
                                                <thead>
                                                    <tr class="bg-gray-100 border-b">
                                                        <th class="text-left p-2">Batters</th>
                                                        <th class="p-2 text-center">R</th>
                                                        <th class="p-2 text-center">B</th>
                                                        <th class="p-2 text-center">4s</th>
                                                        <th class="p-2 text-center">6s</th>
                                                        <th class="p-2 text-center">SR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($card["batting"] as $b)
                                                        <tr>
                                                            <td class="p-2">
                                                                <div
                                                                    class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                                    <!-- Left -->
                                                                    <div class="flex items-center gap-3">
                                                                        <img src="{{ asset(optional($b->batter->media)->path ?? "images/user_profile.webp") }}"
                                                                            alt="{{ optional($b->batter)->first_name_en }}"
                                                                            class="w-9 h-9 rounded-full object-fit hidden lg:block" />
                                                                        <a href="{{ route("frontend.profile", $b->batter->slug) }}"
                                                                            class="text-sm text-blue-600 hover:underline">
                                                                            {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                                        </a>
                                                                    </div>

                                                                    <!-- Right (dismissal info) -->
                                                                    <span
                                                                        class="text-gray-600 text-xs lg:text-[13.5px] lg:self-center ml-0 lg:ml-0">
                                                                        @php
                                                                            $howOut = strtolower($b->dismissal ?? "");
                                                                        @endphp

                                                                        @if ($howOut)
                                                                            @switch($howOut)
                                                                                @case("run out")
                                                                                    run out
                                                                                    @if ($b->fielder)
                                                                                        ({{ optional($b->fielder)->first_name_en }})
                                                                                    @endif
                                                                                @break

                                                                                @case("caught")
                                                                                    @if ($b->fielder && $b->bowler && optional($b->fielder)->id === optional($b->bowler)->id)
                                                                                        c & b
                                                                                        {{ optional($b->bowler)->first_name_en }}
                                                                                    @else
                                                                                        c
                                                                                        {{ optional($b->fielder)->first_name_en ?? "" }}
                                                                                        @if ($b->bowler)
                                                                                            b
                                                                                            {{ optional($b->bowler)->first_name_en }}
                                                                                        @endif
                                                                                    @endif
                                                                                @break

                                                                                @case("bowled")
                                                                                @case("lbw")
                                                                                    @if ($b->bowler)
                                                                                        {{ $howOut }} b
                                                                                        {{ optional($b->bowler)->first_name_en }}
                                                                                    @else
                                                                                        {{ $howOut }}
                                                                                    @endif
                                                                                @break

                                                                                @case("stumped")
                                                                                    st
                                                                                    {{ optional($b->fielder)->first_name_en ?? "" }}
                                                                                    @if ($b->bowler)
                                                                                        b
                                                                                        {{ optional($b->bowler)->first_name_en }}
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
                                                                                        {{ optional($b->fielder)->first_name_en }}
                                                                                    @endif
                                                                                    @if ($b->bowler)
                                                                                        b
                                                                                        {{ optional($b->bowler)->first_name_en }}
                                                                                    @endif
                                                                            @endswitch
                                                                        @else
                                                                            not out
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </td>

                                                            <td class="text-center">{{ $b->runs }}</td>
                                                            <td class="text-center">{{ $b->balls }}</td>
                                                            <td class="text-center">{{ $b->fours }}</td>
                                                            <td class="text-center">{{ $b->sixes }}</td>
                                                            <td class="text-center">
                                                                {{ $b->balls > 0 ? number_format(($b->runs / $b->balls) * 100, 2) : 0 }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div> --}}

                                        {{-- <div>
                                            <!-- Header -->
                                            <div
                                                class="grid grid-cols-[1fr_3rem_3rem_3rem_3rem_4rem] border-b bg-gray-100 text-sm">
                                                <div class="p-2 font-semibold min-w-28">Batter</div>
                                                <div class="p-2 text-center font-semibold">R</div>
                                                <div class="p-2 text-center font-semibold">B</div>
                                                <div class="p-2 text-center font-semibold">4s</div>
                                                <div class="p-2 text-center font-semibold">6s</div>
                                                <div class="p-2 text-center font-semibold">SR</div>
                                            </div>

                                            <!-- Rows -->
                                            <div class="divide-y">
                                                <!-- Row 1 -->
                                                @foreach ($card["batting"] as $b)
                                                    <div
                                                        class="grid grid-cols-[1fr_3rem_3rem_3rem_3rem_4rem] items-start  text-sm">
                                                        <div class="p-2 min-w-28">
                                                            <!-- Player Info -->
                                                            <div class="flex items-start gap-2">
                                                                <!-- Player Image -->
                                                                <img src="{{ asset("images/user_profile.webp") }}"
                                                                    alt="Sediqullah Atal"
                                                                    class="w-8 h-8 rounded-full object-cover">

                                                                <!-- Name + How Out -->
                                                                <div
                                                                    class="grid grid-cols-1 lg:grid-cols-[250px_1fr] lg:items-center">
                                                                    <!-- Player Name -->
                                                                    <a
                                                                        href="{{ route("frontend.profile", $b->batter->slug) }}">
                                                                        <span
                                                                            class="text-sm text-teal-600 hover:underline">
                                                                            {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                                        </span>
                                                                    </a>

                                                                    <!-- How Out -->
                                                                    <div
                                                                        class="text-[13px] text-gray-600 whitespace-nowrap">
                                                                        @php
                                                                            $howOut = strtolower($b->dismissal ?? "");
                                                                        @endphp

                                                                        @if ($howOut)
                                                                            @switch($howOut)
                                                                                @case("run out")
                                                                                    run out
                                                                                    @if ($b->fielder)
                                                                                        ({{ optional($b->fielder)->first_name_en }})
                                                                                    @endif
                                                                                @break

                                                                                @case("caught")
                                                                                    @if ($b->fielder && $b->bowler && optional($b->fielder)->id === optional($b->bowler)->id)
                                                                                        c & b
                                                                                        {{ optional($b->bowler)->first_name_en }}
                                                                                    @else
                                                                                        c
                                                                                        {{ optional($b->fielder)->first_name_en ?? "" }}
                                                                                        @if ($b->bowler)
                                                                                            b
                                                                                            {{ optional($b->bowler)->first_name_en }}
                                                                                        @endif
                                                                                    @endif
                                                                                @break

                                                                                @case("bowled")
                                                                                @case("lbw")
                                                                                    @if ($b->bowler)
                                                                                        {{ $howOut }} b
                                                                                        {{ optional($b->bowler)->first_name_en }}
                                                                                    @else
                                                                                        {{ $howOut }}
                                                                                    @endif
                                                                                @break

                                                                                @case("stumped")
                                                                                    st
                                                                                    {{ optional($b->fielder)->first_name_en ?? "" }}
                                                                                    @if ($b->bowler)
                                                                                        b
                                                                                        {{ optional($b->bowler)->first_name_en }}
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
                                                                                        {{ optional($b->fielder)->first_name_en }}
                                                                                    @endif
                                                                                    @if ($b->bowler)
                                                                                        b
                                                                                        {{ optional($b->bowler)->first_name_en }}
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
                                                            class="p-2 flex items-start justify-center whitespace-nowrap font-semibold lg:font-normal min-w-6">
                                                            {{ $b->runs }}
                                                        </div>
                                                        <!-- B -->
                                                        <div
                                                            class="p-2 flex items-start justify-center whitespace-nowrap min-w-6">
                                                            {{ $b->balls }}
                                                        </div>
                                                        <!-- 4s -->
                                                        <div
                                                            class="p-2 flex items-start justify-center whitespace-nowrap min-w-6">
                                                            {{ $b->fours }}
                                                        </div>
                                                        <!-- 6s -->
                                                        <div
                                                            class="p-2 flex items-start justify-center whitespace-nowrap min-w-6">
                                                            {{ $b->sixes }}
                                                        </div>
                                                        <!-- SR -->
                                                        <div
                                                            class="p-2 flex items-start justify-center whitespace-nowrap min-w-6">
                                                            {{ $b->balls > 0 ? number_format(($b->runs / $b->balls) * 100, 2) : 0 }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> --}}



                                        <div>
                                            <!-- Header -->
                                            <div
                                                class="grid grid-cols-[1fr_2rem_2rem_2rem_2rem_3rem] sm:grid-cols-[1fr_3rem_3rem_3rem_3rem_4rem] border-b bg-gray-100 text-sm">
                                                <div class="p-2 text-left font-semibold min-w-28">Batter</div>
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
                                                        class="grid grid-cols-[1fr_2rem_2rem_2rem_2rem_3rem] sm:grid-cols-[1fr_3rem_3rem_3rem_3rem_4rem] items-start  text-sm">
                                                        <div class="p-2 min-w-28">
                                                            <!-- Player Info -->
                                                            <div class="flex items-start gap-2">
                                                                <!-- Player Image -->
                                                                <img src="{{ asset(optional($b->batter->media)->path ?? "images/user_profile.webp") }}"
                                                                    alt="{{ optional($b->batter)->first_name_en }}"
                                                                    class="w-8 h-8 rounded-full object-fit" />

                                                                <!-- Name + How Out -->
                                                                <div
                                                                    class="grid grid-cols-1 lg:grid-cols-[250px_1fr] lg:items-center">
                                                                    <!-- Player Name -->
                                                                    <a
                                                                        href="{{ route("frontend.profile", $b->batter->slug) }}">
                                                                        <span
                                                                            class="text-sm text-teal-600 hover:underline">
                                                                            {{ app()->getLocale() === "bn" ? optional($b->batter)->first_name_bn : optional($b->batter)->first_name_en }}
                                                                        </span>
                                                                    </a>

                                                                    <!-- How Out -->
                                                                    <div
                                                                        class="text-[13px] text-gray-600 whitespace-nowrap">
                                                                        @php
                                                                            $howOut = strtolower($b->dismissal ?? "");
                                                                        @endphp

                                                                        @if ($howOut)
                                                                            @switch($howOut)
                                                                                @case("run out")
                                                                                    run out
                                                                                    @if ($b->fielder)
                                                                                        ({{ optional($b->fielder)->first_name_en }})
                                                                                    @endif
                                                                                @break

                                                                                @case("caught")
                                                                                    @if ($b->fielder && $b->bowler && optional($b->fielder)->id === optional($b->bowler)->id)
                                                                                        c & b
                                                                                        {{ optional($b->bowler)->first_name_en }}
                                                                                    @else
                                                                                        c
                                                                                        {{ optional($b->fielder)->first_name_en ?? "" }}
                                                                                        @if ($b->bowler)
                                                                                            b
                                                                                            {{ optional($b->bowler)->first_name_en }}
                                                                                        @endif
                                                                                    @endif
                                                                                @break

                                                                                @case("bowled")
                                                                                @case("lbw")
                                                                                    @if ($b->bowler)
                                                                                        {{ $howOut }} b
                                                                                        {{ optional($b->bowler)->first_name_en }}
                                                                                    @else
                                                                                        {{ $howOut }}
                                                                                    @endif
                                                                                @break

                                                                                @case("stumped")
                                                                                    st
                                                                                    {{ optional($b->fielder)->first_name_en ?? "" }}
                                                                                    @if ($b->bowler)
                                                                                        b
                                                                                        {{ optional($b->bowler)->first_name_en }}
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
                                                                                        {{ optional($b->fielder)->first_name_en }}
                                                                                    @endif
                                                                                    @if ($b->bowler)
                                                                                        b
                                                                                        {{ optional($b->bowler)->first_name_en }}
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
                                                            class="p-2 text-center text-xs md:text-sm font-semibold sm:font-normal">
                                                            {{ $b->runs }}</div>
                                                        <!-- B -->
                                                        <div class="p-2 text-center text-xs md:text-sm">
                                                            {{ $b->balls }}</div>
                                                        <!-- 4s -->
                                                        <div class="p-2 text-center text-xs md:text-sm">
                                                            {{ $b->fours }}</div>
                                                        <!-- 6s -->
                                                        <div class="p-2 text-center text-xs md:text-sm">
                                                            {{ $b->sixes }}</div>
                                                        <!-- SR -->
                                                        <div class="p-2 text-center text-xs md:text-sm">
                                                            {{ $b->balls > 0 ? number_format(($b->runs / $b->balls) * 100, 2) : 0 }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                        <!-- Extras -->
                                        <div class="px-3 py-2 border-t text-sm">
                                            <div class="flex items-center justify-between">
                                                <span class="font-semibold">{{ __("messages.extras") }}</span>
                                                <span class="text-gray-600 text-[13.5px]">
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
                                        <div class="px-3 py-2 border-t text-sm">
                                            <div class="flex items-center justify-between">
                                                <span class="font-semibold">{{ __("messages.total") }}</span>
                                                <span class="text-gray-600 text-[13.5px]">
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
                                        <div class="px-3 py-2 border-t text-sm">
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
                                                <div class="bg-gray-100 font-semibold px-2 py-2 border-b border-t">
                                                    {{ __("messages.fall_of_wickets") }}
                                                </div>
                                                <div class="px-3 pt-3 text-gray-700">
                                                    @foreach ($card["fallWickets"] as $f)
                                                        {{ $f->score }}-{{ $f->wicket }}
                                                        (<a href="{{ route("frontend.profile", optional($f->batter)->slug) }}"
                                                            class="text-teal-600 hover:underline">{{ app()->getLocale() === "bn" ? optional($f->batter)->first_name_bn : optional($f->batter)->first_name_en }}
                                                        </a>,
                                                        {{ $f->over }})
                                                        @if (!$loop->last)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Bowling -->
                                        <div class="mt-3 overflow-x-auto">
                                            <table class="w-full text-sm">
                                                <thead>
                                                    <tr class="bg-gray-100 border-b border-t">
                                                        <th class="text-left p-2">Bowler</th>
                                                        <th class="p-2 text-center">O</th>
                                                        <th class="p-2 text-center">M</th>
                                                        <th class="p-2 text-center">R</th>
                                                        <th class="p-2 text-center">W</th>
                                                        <th class="p-2 text-center hidden lg:table-cell">NB</th>
                                                        <th class="p-2 text-center hidden lg:table-cell">WD</th>
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
                                                                        class="w-9 h-9 rounded-full object-fit hidden lg:block" />
                                                                    <a href="{{ route("frontend.profile", optional($bo->bowler)->slug) }}"
                                                                        class="text-sm text-teal-600 hover:underline">
                                                                        {{ app()->getLocale() === "bn" ? optional($bo->bowler)->first_name_bn : optional($bo->bowler)->first_name_en }}
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">{{ $bo->overs ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->maidens ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->runs ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->wickets ?? 0 }}</td>
                                                            <td class="text-center hidden lg:table-cell">
                                                                {{ $bo->no_balls ?? 0 }}
                                                            </td>
                                                            <td class="text-center hidden lg:table-cell">
                                                                {{ $bo->wides ?? 0 }}
                                                            </td>
                                                            <td class="text-center">
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
                    </div>

                    <!-- Squad -->
                    <div x-show="tab === 'squad'" class="text-gray-700 text-sm" x-cloak>
                        <div class="space-y-6">
                            @foreach ($match->squads as $squad)
                                <div class="bg-white overflow-hidden" x-data="{ open: true }">
                                    <!-- Squad Header -->
                                    <div class="py-3 border-b cursor-pointer flex justify-between items-center"
                                        @click="open = !open">
                                        <h2 class="font-semibold text-teal-600 text-lg">
                                            {{ app()->getLocale() === "bn" ? $squad->team->name_bn : $squad->team->name_en }}
                                        </h2>
                                        <svg :class="{ 'rotate-180': open }"
                                            class="w-4 h-4 text-gray-600 transition-transform duration-200"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </div>

                                    <!-- Player Stats Table -->
                                    <div x-show="open" y-transition class="overflow-x-auto">
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full text-xs md:text-sm text-left border-collapse">
                                                <thead class="bg-gray-100 text-gray-700 font-semibold">
                                                    <tr>
                                                        <th class="px-4 py-3">Player</th>
                                                        <th class="px-3 py-3 text-center">M</th>
                                                        <th class="px-3 py-3 text-center">Inn</th>
                                                        <th class="px-3 py-3 text-center">R</th>
                                                        <th class="px-3 py-3 text-center">Avg</th>
                                                        <th class="px-3 py-3 text-center">H/S</th>
                                                        <th class="px-3 py-3 text-center">S/R</th>
                                                        <th class="px-3 py-3 text-center">50s</th>
                                                        <th class="px-3 py-3 text-center">100s</th>
                                                        <th class="px-3 py-3 text-center">W</th>
                                                        <th class="px-3 py-3 text-center">Eco</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="divide-y divide-gray-200">
                                                    @foreach ($squad->players as $player)
                                                        @php
                                                            $bat = $player->summaryBattingStats[0] ?? null;
                                                            $bowl = $player->summaryBowlingStats[0] ?? null;
                                                        @endphp

                                                        <tr
                                                            class="hover:bg-teal-50 transition duration-150 ease-in-out">
                                                            <!-- Player Info -->
                                                            <td
                                                                class="px-0 py-2 flex items-center gap-3 min-w-[150px]">
                                                                <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                                                    alt="{{ $player->first_name_en }}"
                                                                    class="w-10 h-10 rounded-full object-fit">
                                                                <a href="{{ route("frontend.profile", $player->slug) }}"
                                                                    class='text-teal-600 hover:underline'>
                                                                    {{ $player->first_name_en }}
                                                                </a>
                                                            </td>

                                                            <!-- Batting Stats -->
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bat["matches"] ?? 0 }}
                                                            </td>
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bat["innings"] ?? 0 }}
                                                            </td>
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bat["runs"] ?? 0 }}
                                                            </td>
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bat["avg"] ?? 0 }}
                                                            </td>
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bat["hs"] ?? 0 }}
                                                            </td>
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bat["sr"] ?? 0 }}
                                                            </td>
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bat["fifties"] ?? 0 }}
                                                            </td>
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bat["hundreds"] ?? 0 }}
                                                            </td>

                                                            <!-- Bowling Stats -->
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bowl["wickets"] ?? 0 }}
                                                            </td>
                                                            <td class="px-0 py-2 text-center">
                                                                {{ $bowl["economy"] ?? 0 }}
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

                    </div>

                    <!-- Match Info -->
                    <div x-show="tab === 'matchinfo'" class="text-gray-700 text-sm" x-cloak>
                        <!-- Bowler Table -->
                        {{-- <div class="mt-3">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-gray-100 border-b border-t">
                                        <th colspan="2" class="text-left p-2 font-semibold">
                                            Match Information
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Match
                                        </td>
                                        <td class="p-2 text-gray-700">
                                            WI vs PAK, 2nd ODI, Pakistan tour of West Indies, 2025
                                        </td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Match Title
                                        </td>
                                        <td class="p-2 text-gray-700">Open Match</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Match Format
                                        </td>
                                        <td class="p-2 text-gray-700">ODI</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Playing
                                        </td>
                                        <td class="p-2 text-gray-700">11 Per Side</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Over
                                        </td>
                                        <td class="p-2 text-gray-700">50</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Venue
                                        </td>
                                        <td class="p-2 text-gray-700">
                                            Brian Lara Stadium, Tarouba, Trinidad
                                        </td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Date &amp; Time
                                        </td>
                                        <td class="p-2 text-gray-700">
                                            Sunday, August 10, 2025 7:30 PM
                                        </td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Toss
                                        </td>
                                        <td class="p-2 text-gray-700">
                                            West Indies won the toss and opt to bowl
                                        </td>
                                    </tr>
                                    <tr class="border-b">
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Scorer
                                        </td>
                                        <td class="p-2 text-gray-700">Raj Ahmed</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap">
                                            Match ID
                                        </td>
                                        <td class="p-2 text-gray-700">pzea4683</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}
                        <div class="note-editable">
                            {!! $match->match_info !!}
                        </div>
                    </div>

                    <!-- Commentary -->
                    <div x-show="tab === 'commentary'" class="text-gray-700 text-sm" x-cloak>
                        <p>
                            <strong>Commentary:</strong> Ball-by-ball commentary and
                            highlights will appear here.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push("title")
        Scoreboard
    @endpush

    <style>
        /* Apply blur-fade only on small screens (below 768px) */
        @media (max-width: 767px) {
            .blur-fade {
                display: inline-block;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: clip;
                position: relative;
                max-width: 100%;
                mask-image: linear-gradient(to right, black 80%, transparent 100%);
                -webkit-mask-image: linear-gradient(to right, black 80%, transparent 100%);
            }
        }

        /* On larger screens, show normally */
        @media (min-width: 768px) {
            .blur-fade {
                mask-image: none !important;
                -webkit-mask-image: none !important;
            }
        }
    </style>

</div>
