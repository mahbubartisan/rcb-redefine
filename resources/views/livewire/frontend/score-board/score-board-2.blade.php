<div x-data="{ tab: 'summary', scoreSubtab: 'teamA' }">
    <div class="mt-24 mx-auto py-12 px-2 sm:px-6 lg:px-11">
        {{-- <div class="bg-white mx-auto rounded border border-gray-200 p-2 lg:p-6 w-full max-w-7xl">
            <!-- Header Info -->
            <div class="text-[14.5px]">
                <span class="font-medium text-teal-600"> ODI Series </span>
                <div class="text-gray-600">
                    Brian Lara Cricket Academy,
                    <span class="text-gray-700 font-semibold">50 Ov.</span>, 10-Aug-25
                    09:24 AM
                </div>
            </div>

            <!-- Toss Info -->
            <!-- <div class="mt-1 text-sm text-gray-700">
          Toss: Prathap cricket academy U-14 opt to bat
        </div> -->

            <!-- Score Section -->
            <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between text-gray-800">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Pakistan&background=20b2aa&color=fff&size=64&length=3"
                        alt="Pakistan Logo" class="w-11 h-11 rounded-full object-contain" />
                    <span class="text-lg font-semibold uppercase">Pakistan</span>
                </div>
                <div class="text-left sm:text-right my-3 sm:mt-0">
                    <span class="text-xl font-semibold">171/7</span>
                    <span class="text-sm text-gray-500">(37/40 Ov)</span>
                </div>
            </div>

            <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between text-gray-800">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=West Indies&background=20b2aa&color=fff&size=64&length=3"
                        alt="West Indies Logo" class="w-11 h-11 rounded-full object-contain" />
                    <span class="text-lg font-semibold uppercase">West Indies</span>
                </div>
                <div class="text-left sm:text-right my-3 sm:mt-0">
                    <span class="text-xl font-semibold">184/5</span>
                    <span class="text-sm text-gray-500">(33.2/35 Ov)</span>
                </div>
            </div>

            <!-- Requirement Info -->
            <div class="mt-4 text-sm text-gray-600">
                WI won by
                <span class="text-gray-800 font-semibold">5 wickets</span>
                <span class="text-gray-800 font-semibold">(10 balls left)</span> (DLS
                method)
            </div>
        </div> --}}

        <div class="bg-white mx-auto rounded border border-gray-200 p-2 lg:p-6 w-full max-w-7xl">
            <!-- Header Info -->
            <div class="text-[14.5px]">
                <span class="font-medium text-teal-600">
                    {{ $match->name ?? "Match Name" }}
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
            <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between text-gray-800">
                <div class="flex items-center gap-3">
                    <img src="{{ optional($match->team1->media)->path
                        ? asset(optional($match->team1->media)->path)
                        : "https://ui-avatars.com/api/?name=" .
                            urlencode(optional($match->team1)->name_en) .
                            "&background=20b2aa&color=fff&size=64&length=3" }}"
                        alt="{{ optional($match->team1)->name_en }}" class="w-11 h-11 rounded-full object-cover">

                    <span class="text-lg font-semibold uppercase">{{ optional($match->team1)->name_en }}</span>
                </div>
                <div class="text-left sm:text-right my-3 sm:mt-0">
                    <span class="text-xl font-semibold">{{ $match->team1_score ?? "-" }}</span>
                </div>
            </div>

            <!-- Team 2 Score -->
            <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center justify-between text-gray-800">
                <div class="flex items-center gap-3">
                    <img src="{{ optional($match->team2->media)->path
                        ? asset(optional($match->team2->media)->path)
                        : "https://ui-avatars.com/api/?name=" .
                            urlencode($match->team2->name_en) .
                            "&background=20b2aa&color=fff&size=64&length=3" }}"
                        alt="{{ optional($match->team2)->name_en }}" class="w-11 h-11 rounded-full object-cover">
                    <span class="text-lg font-semibold uppercase">{{ optional($match->team2)->name_en }}</span>
                </div>
                <div class="text-left sm:text-right my-3 sm:mt-0">
                    <span class="text-xl font-semibold">{{ $match->team2_score ?? "-" }}</span>
                </div>
            </div>

            {{-- <!-- Result Info -->
            @if ($match->match_result)
                <div class="mt-4 text-sm text-gray-600">
                    {{ $match->match_result }}
                </div>
            @endif

            <!-- Player of Match -->
            @if ($match->player_of_match)
                <div class="mt-2 text-sm text-gray-800">
                    <span class="font-semibold">Player of the Match:</span>
                    <a href="#" class="text-blue-600">{{ optional($match->player)->first_name_en }}</a>
                </div>
            @endif --}}
            <!-- Result + Player of the Match Centered -->
            <div class="mt-4 text-center">
                @if ($match->match_result)
                    <div class="text-base text-gray-600">
                        {{ $match->match_result }}
                    </div>
                @endif

                @if ($match->player_of_match)
                    <div class="mt-2 text-base text-gray-800">
                        <span class="font-semibold">Player of the Match:</span>
                        <a href="#" class="text-blue-600">{{ optional($match->player)->first_name_en }}</a>
                    </div>
                @endif
            </div>
        </div>

        <div class="pt-3">
            <div class="bg-white mx-auto rounded border border-gray-200 p-2 lg:p-6 w-full max-w-7xl">
                <!-- Main Tabs -->
                <div class="border-b border-gray-200 mb-6">
                    <div
                        class="flex lg:justify-center space-x-6 overflow-x-auto no-scrollbar min-w-0 whitespace-nowrap px-2">
                        <button class="pb-1 text-sm lg:text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'summary' ? 'border-b-2 border-teal-600 text-teal-600' :
                                'text-gray-700 hover:text-teal-600'"
                            @click="tab = 'summary'" type="button">
                            Summary
                        </button>
                        <button class="pb-1 text-sm lg:text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'scorecard' ? 'border-b-2 border-teal-600 text-teal-600' :
                                'text-gray-700 hover:text-teal-600'"
                            @click="tab = 'scorecard'; scoreSubtab = 'teamA'" type="button">
                            Scorecard
                        </button>
                        <button class="pb-1 text-sm lg:text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'commentary' ? 'border-b-2 border-teal-600 text-teal-600' :
                                'text-gray-700 hover:text-teal-600'"
                            @click="tab = 'commentary'" type="button">
                            Commentary
                        </button>
                        <button class="pb-1 text-sm lg:text-[15px] font-semibold uppercase flex-shrink-0"
                            :class="tab === 'matchinfo' ? 'border-b-2 border-teal-600 text-teal-600' :
                                'text-gray-700 hover:text-teal-600'"
                            @click="tab = 'matchinfo'" type="button">
                            Match Info
                        </button>
                    </div>
                </div>

                <!-- Tab Contents -->
                <div>
                    <!-- Summary -->
                    <div x-show="tab === 'summary'" class="text-gray-700 text-sm">
                        <div class="mx-auto">
                            {{-- <!-- Title -->
                            <h2 class="text-gray-800 font-semibold text-lg mb-3">
                                Match Report
                            </h2>

                            <!-- Two-column layout -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                <!-- Left card -->
                                <div class="bg-white border border-gray-100 rounded-md p-4 flex flex-col space-y-4">
                                    <!-- Team 1 -->
                                    <div class="flex items-center space-x-3">
                                        <img src="https://ui-avatars.com/api/?name=Pakistan&background=20b2aa&color=fff&size=64&length=3"
                                            alt="Pakistan" class="w-10 h-10 rounded-full object-cover" />
                                        <div>
                                            <div class="text-teal-600 font-semibold text-sm uppercase tracking-wide">
                                                Pakistan
                                            </div>
                                            <div class="text-gray-800 text-sm">171-7(37/40)</div>
                                        </div>
                                    </div>
                                    <!-- Team 2 -->
                                    <div class="flex items-center space-x-3">
                                        <img src="https://ui-avatars.com/api/?name=West Indies&background=20b2aa&color=fff&size=64&length=3"
                                            alt="West Indies" class="w-10 h-10 rounded-full object-cover" />
                                        <div>
                                            <div class="text-teal-600 font-semibold text-sm uppercase tracking-wide">
                                                West Indies
                                            </div>
                                            <div class="text-gray-800 text-sm">185-5(33.5/35)</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right card -->
                                <div
                                    class="bg-white border border-gray-100 rounded-md p-4 flex flex-col justify-center space-y-4">
                                    <div>
                                        <div class="text-teal-600 text-sm font-semibold uppercase">
                                            Result
                                        </div>
                                        <div class="text-gray-600 text-sm">
                                            WI won by
                                            <span class="text-gray-800 font-semibold">5 wickets</span>
                                            <span class="text-gray-800 font-semibold">(10 balls left)</span>
                                            (DLS method)
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-teal-600 text-sm font-semibold uppercase">
                                            Player of the Match
                                        </div>
                                        <div class="text-gray-800 text-[13px]">
                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">
                                                Masum Rana Shamim
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Summery Stats -->
                            {{-- <div class="bg-white mt-5 p-2">
                                <!-- Team 1 header -->
                                <div class="flex items-center justify-between">
                                    <div class="text-gray-800 font-semibold text-base uppercase">
                                        Pakistan
                                    </div>
                                    <div class="text-gray-800 font-semibold text-base">
                                        171-7<span class="font-normal text-gray-600">(37/40)</span>
                                    </div>
                                </div>

                                <!-- Team 1 rows -->
                                <div class="mt-4 space-y-3">
                                    <div class="grid grid-cols-2 gap-x-20">
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                                            <div class="text-blue-600 text-sm">Hassan Nawaz</div>
                                            <div
                                                class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-semibold">
                                                36*<span class="font-normal text-gray-600">(30)</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row items-end sm:items-center">
                                            <div class="text-blue-600 text-sm">Jayden Seales</div>
                                            <div class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-medium">
                                                3-23
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-x-20">
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                                            <div class="text-blue-600 text-sm">Hussain Talat</div>
                                            <div
                                                class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-semibold">
                                                31<span class="font-normal text-gray-600">(32)</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row items-end sm:items-center">
                                            <div class="text-blue-600 text-sm">Roston Chase</div>
                                            <div class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-medium">
                                                1-26
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-x-20">
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                                            <div class="text-gray-800 text-sm">Abdullah Shafique</div>
                                            <div
                                                class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-semibold">
                                                26<span class="font-normal text-gray-600">(40)</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row items-end sm:items-center">
                                            <div class="text-gray-800 text-sm">Shamar Joseph</div>
                                            <div class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-medium">
                                                1-27
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- divider -->
                                <div class="border-t border-gray-200 my-4"></div>

                                <!-- Team 2 header -->
                                <div class="flex items-center justify-between">
                                    <div class="text-gray-800 font-semibold text-base uppercase">
                                        West Indies
                                    </div>
                                    <div class="text-gray-800 font-semibold text-base">
                                        185-5<span class="font-normal text-gray-600">(33.5/35)</span>
                                    </div>
                                </div>

                                <!-- Team 2 rows -->
                                <div class="mt-4 space-y-3">
                                    <div class="grid grid-cols-2 gap-x-20">
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                                            <div class="text-gray-800 text-sm">Roston Chase</div>
                                            <div
                                                class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-semibold">
                                                49*<span class="font-normal text-gray-600">(47)</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row items-end sm:items-center">
                                            <div class="text-gray-800 text-sm">Mohammad Nawaz</div>
                                            <div class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-medium">
                                                2-17
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-x-20">
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                                            <div class="text-gray-800 text-sm">
                                                Sherfane Rutherford
                                            </div>
                                            <div
                                                class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-semibold">
                                                45<span class="font-normal text-gray-600">(33)</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row items-end sm:items-center">
                                            <div class="text-gray-800 text-sm">Hasan Ali</div>
                                            <div
                                                class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-medium">
                                                2-35
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-x-20">
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                                            <div class="text-gray-800 text-sm">Shai Hope</div>
                                            <div
                                                class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-semibold">
                                                32<span class="font-normal text-gray-600">(35)</span>
                                            </div>
                                        </div>
                                        <div class="flex flex-col sm:flex-row items-end sm:items-center">
                                            <div class="text-gray-800 text-sm">Abrar Ahmed</div>
                                            <div
                                                class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-semibold">
                                                1-23
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="bg-white mt-5 p-2">
                                @foreach ([$match->team1, $match->team2] as $team)
                                    @php
                                        // Team score from match table
                                        $teamScore =
                                            $team->id === $match->team1->id ? $match->team1_score : $match->team2_score;

                                        // Get batting for this team, order by runs desc (top scorers)
                                        $batting = $match->battings
                                            ->where("team_id", $team->id)
                                            ->sortByDesc("runs")
                                            ->take(3);

                                        // Opponent team id
                                        $opponentId =
                                            $match->team1->id === $team->id ? $match->team2->id : $match->team1->id;

                                        // Get bowling of opponent team, order by wickets desc then economy
                                        $bowling = $match->bowlings
                                            ->where("team_id", $opponentId)
                                            ->sortByDesc("wickets")
                                            ->sortBy("runs")
                                            ->take(3);
                                    @endphp

                                    <!-- Team header -->
                                    <div class="flex items-center justify-between {{ $loop->first ? "" : "mt-6" }}">
                                        <div class="text-gray-800 font-semibold text-base uppercase">
                                            {{ $team->name_en }}
                                        </div>
                                        <div class="text-gray-800 font-semibold text-base">
                                            {{ $teamScore ?? "-" }}
                                        </div>
                                    </div>

                                    <!-- Team rows -->
                                    <div class="mt-4 space-y-3">
                                        @for ($i = 0; $i < max($batting->count(), $bowling->count()); $i++)
                                            <div class="grid grid-cols-2 gap-x-20">
                                                <!-- Batter -->
                                                @if ($batting->get($i))
                                                    @php $b = $batting->get($i); @endphp
                                                    <div class="flex flex-col sm:flex-row items-start sm:items-center">
                                                        <div class="text-blue-600 text-sm">
                                                            {{ $b->batter->first_name_en }}</div>
                                                        <div
                                                            class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-semibold">
                                                            {{ $b->runs }}@if ($b->dismissal === "not out")
                                                                *
                                                            @endif
                                                            <span
                                                                class="font-normal text-gray-600">({{ $b->balls }})</span>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div></div>
                                                @endif

                                                <!-- Bowler -->
                                                @if ($bowling->get($i))
                                                    @php $bo = $bowling->get($i); @endphp
                                                    <div class="flex flex-col sm:flex-row items-end sm:items-center">
                                                        <div class="text-gray-800 text-sm">
                                                            {{ $bo->bowler->first_name_en }}</div>
                                                        <div
                                                            class="mt-1 sm:mt-0 ml-0 sm:ml-auto text-gray-800 text-sm font-medium">
                                                            {{ $bo->wickets }}-{{ $bo->runs }}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div></div>
                                                @endif
                                            </div>
                                        @endfor
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
                    {{-- <div x-show="tab === 'scorecard'" class="text-gray-700 text-sm" x-cloak>
                        <div class="space-y-6">
                            <div class="bg-white overflow-hidden" x-data="{ open: true }">
                                <!-- Header -->
                                <div class="px-2 py-2 bg-white border-b border-gray-200 cursor-pointer"
                                    @click="open = !open">
                                    <div class="flex items-center justify-between font-semibold text-lg">
                                        <h1 class="uppercase">Pakistan</h1>
                                        <div class="flex items-center gap-2">
                                            <span>171-7 (37/40)</span>
                                            <!-- Arrow Icon -->
                                            <svg :class="{ 'rotate-180': open }"
                                                class="w-4 h-4 transition-transform duration-200"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 9l6 6l6 -6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div x-show="open" y-transition>
                                    <!-- Batter Table -->
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
                                            <!-- Player Row -->
                                            <tr class="border-b">
                                                <td class="p-2 whitespace-nowrap">
                                                    <div
                                                        class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                        <!-- Left section -->
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Saim Ayub"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Saim Ayub
                                                            </a>
                                                        </div>

                                                        <!-- Right section -->
                                                        <span
                                                            class="text-gray-600 -mt-2 lg:-mt-0 text-xs lg:text-[13.5px] lg:self-center lg:ml-0 ml-12">
                                                            c Justin Greaves b Jayden Seales
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">13</td>
                                                <td class="text-center">11</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">118.18</td>
                                            </tr>

                                            <tr class="border-b">
                                                <td class="p-2">
                                                    <div
                                                        class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                        <!-- Left section -->
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Shafique"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Shafique
                                                            </a>
                                                        </div>

                                                        <!-- Right section -->
                                                        <span
                                                            class="text-gray-600 -mt-2 lg:-mt-0 text-xs lg:text-[13.5px] lg:self-center lg:ml-0 ml-12">
                                                            c Motie b Jediah Blades
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">20</td>
                                                <td class="text-center">21</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">95.24</td>
                                            </tr>

                                            <tr class="border-b">
                                                <td class="p-2">
                                                    <div
                                                        class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                        <!-- Left section -->
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Babar Azam"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Babar Azam
                                                            </a>
                                                        </div>

                                                        <!-- Right section -->
                                                        <span
                                                            class="text-gray-600 -mt-2 lg:-mt-0 text-xs lg:text-[13.5px] lg:self-center lg:ml-0 ml-12">
                                                            b Jayden Seales
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">50.00</td>
                                            </tr>

                                            <tr>
                                                <td class="p-2">
                                                    <div
                                                        class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                        <!-- Left section -->
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Rizwan (c & wk)"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Rizwan (c & wk)
                                                            </a>
                                                        </div>

                                                        <!-- Right section -->
                                                        <span
                                                            class="text-gray-600 -mt-2 lg:-mt-0 text-xs lg:text-[13.5px] lg:self-center lg:ml-0 ml-12">
                                                            lbw b Motie
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">36</td>
                                                <td class="text-center">27</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center">133.33</td>
                                            </tr>

                                            <!-- Add other players here following same pattern -->
                                        </tbody>
                                    </table>
                                    <!-- Extras -->
                                    <div class="px-3 py-2 border-t text-sm">
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-700 font-semibold">Extras</span>
                                            <span class="text-gray-600 text-[13.5px]">
                                                <span class="font-semibold text-gray-900">14</span>
                                                (b 2, lb 0, w 11, nb 1, p 0)
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Total -->
                                    <div class="px-3 py-2 border-t text-sm">
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-700 font-semibold">Total</span>
                                            <span class="text-gray-600 text-[13.5px]">
                                                <span class="font-semibold text-gray-900">171</span>
                                                (7 wkts, 37 Ov)
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Did Not Bat -->
                                    <div class="px-3 py-2 border-t text-sm">
                                        Did not Bat:
                                        <a wire:navigate href="{{ route("frontend.profile") }}"
                                            class="text-blue-600 hover:underline">Hasan Ali</a>,
                                        <a wire:navigate href="{{ route("frontend.profile") }}"
                                            class="text-blue-600 hover:underline">Abrar
                                            Ahmed</a>
                                    </div>

                                    <!-- Fall of Wickets -->
                                    <div class="mt-2 text-sm">
                                        <div class="bg-gray-100 font-semibold px-2 py-2 border-b border-t">
                                            Fall of Wickets
                                        </div>
                                        <div class="px-3 pt-3 text-gray-700">
                                            28-1 (<a wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Saim
                                                Ayub</a>, 26), 35-2 (<a wire:navigate
                                                href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Babar Azam</a>, 32), 36-3 (
                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Shafique</a>, 35), 75-4 (<a
                                                wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Rizwan</a>, 66), 78-5 (<a
                                                wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Talat</a>, 74), 80-6 (<a
                                                wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Salman
                                                Agha</a>, 77), 95-7 (<a wire:navigate
                                                href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Mohammad Nawaz</a>, 92)
                                        </div>
                                    </div>

                                    <!-- Bowler Table -->
                                    <div class="mt-3 overflow-x-auto">
                                        <table class="w-full text-sm min-w-[600px] border-collapse">
                                            <thead>
                                                <tr class="bg-gray-100 border-b border-t">
                                                    <th class="text-left p-2">Bowler</th>
                                                    <th class="p-2 text-center">O</th>
                                                    <th class="p-2 text-center">M</th>
                                                    <th class="p-2 text-center">R</th>
                                                    <th class="p-2 text-center">W</th>
                                                    <th class="p-2 text-center">NB</th>
                                                    <th class="p-2 text-center">WD</th>
                                                    <th class="p-2 text-center">ECO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-b">
                                                    <td class="p-2 whitespace-nowrap">
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Jayden Seales"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Jayden Seales
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">7</td>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">23</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">0</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">3.30</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- Scorecard subtabs -->
                            <!-- <div
              class="mb-4 flex justify-center space-x-6 border-b border-gray-200"
            >
              <button
                class="pb-1 text-sm font-semibold uppercase"
                :class="scoreSubtab === 'teamA' ? 'border-b-2 border-teal-600 text-teal-600' :
                    'text-gray-600 hover:text-teal-600'"
                @click="scoreSubtab = 'teamA'"
                type="button"
              >
                Pakistan
              </button>
              <button
                class="pb-1 text-sm font-semibold uppercase"
                :class="scoreSubtab === 'teamB' ? 'border-b-2 border-teal-600 text-teal-600' :
                    'text-gray-600 hover:text-teal-600'"
                @click="scoreSubtab = 'teamB'"
                type="button"
              >
                West Indies
              </button>
            </div> -->

                            <!-- Team A Scores -->
                            <!-- <div x-show="scoreSubtab === 'teamA'" x-cloak>
              
            </div> -->

                            <!-- Team B Scores -->
                            <!-- <div x-show="scoreSubtab === 'teamB'" x-cloak>
              
            </div> -->
                            <div class="bg-white overflow-hidden" x-data="{ open: true }">
                                <!-- Header -->
                                <div class="px-2 py-2 bg-white border-b border-gray-200 cursor-pointer"
                                    @click="open = !open">
                                    <div class="flex items-center justify-between font-semibold text-lg">
                                        <h1 class="uppercase">West Indies</h1>
                                        <div class="flex items-center gap-2">
                                            <span>185-5 (33.5/35)</span>
                                            <!-- Arrow Icon -->
                                            <svg :class="{ 'rotate-180': open }"
                                                class="w-4 h-4 transition-transform duration-200"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 9l6 6l6 -6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div x-show="open" y-transition>
                                    <!-- Batter Table -->
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
                                            <!-- Player Row -->
                                            <tr class="border-b">
                                                <td class="p-2">
                                                    <div
                                                        class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                        <!-- Left section -->
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Brandon King"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Brandon King
                                                            </a>
                                                        </div>

                                                        <!-- Right section -->
                                                        <span
                                                            class="text-gray-600 -mt-2 lg:-mt-0 text-xs lg:text-[13.5px] lg:self-center lg:ml-0 ml-12">
                                                            c Rizwan b Hasan Ali
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">13</td>
                                                <td class="text-center">11</td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">118.18</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="p-2">
                                                    <div
                                                        class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                        <!-- Left section -->
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Evin Lewis"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Evin Lewis
                                                            </a>
                                                        </div>

                                                        <!-- Right section -->
                                                        <span
                                                            class="text-gray-600 -mt-2 lg:-mt-0 text-xs lg:text-[13.5px] lg:self-center lg:ml-0 ml-12">
                                                            c Rizwan b Hasan Ali
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">20</td>
                                                <td class="text-center">21</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">95.24</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="p-2">
                                                    <div
                                                        class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                        <!-- Left section -->
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Keacy Carty"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Keacy Carty
                                                            </a>
                                                        </div>

                                                        <!-- Right section -->
                                                        <span
                                                            class="text-gray-600 -mt-2 lg:-mt-0 text-xs lg:text-[13.5px] lg:self-center lg:ml-0 ml-12">
                                                            b Abrar Ahmed
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">50.00</td>
                                            </tr>
                                            <tr>
                                                <td class="p-2">
                                                    <div
                                                        class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                        <!-- Left section -->
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Shai Hope (wk)"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Shai Hope (wk)
                                                            </a>
                                                        </div>

                                                        <!-- Right section -->
                                                        <span
                                                            class="text-gray-600 -mt-2 lg:-mt-0 text-xs lg:text-[13.5px] lg:self-center lg:ml-0 ml-12">
                                                            st Rizwan b Mohammad Nawaz
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-center">36</td>
                                                <td class="text-center">27</td>
                                                <td class="text-center">4</td>
                                                <td class="text-center">2</td>
                                                <td class="text-center">133.33</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!-- Extras -->
                                    <div class="px-3 py-2 border-t text-sm">
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-700 font-semibold">Extras</span>
                                            <span class="text-gray-600 text-[13.5px]">
                                                <span class="font-semibold text-gray-900">8</span>
                                                (b 0, lb 8, w 0, nb 0, p 0)
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Total -->
                                    <div class="px-3 py-2 border-t text-sm">
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-700 font-semibold">Total</span>
                                            <span class="text-gray-600 text-[13.5px]">
                                                <span class="font-semibold text-gray-900">184</span>
                                                (5 wkts, 33.2 Ov)
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Did Not Bat -->
                                    <div class="px-3 py-2 border-t text-sm">
                                        Did not Bat:
                                        <a wire:navigate href="{{ route("frontend.profile") }}"
                                            class="text-blue-600 hover:underline">Gudakesh
                                            Motie</a>,
                                        <a wire:navigate href="{{ route("frontend.profile") }}"
                                            class="text-blue-600 hover:underline">Shamar
                                            Joseph</a>,
                                        <a wire:navigate href="{{ route("frontend.profile") }}"
                                            class="text-blue-600 hover:underline">Jayden
                                            Seales</a>,
                                        <a wire:navigate href="{{ route("frontend.profile") }}"
                                            class="text-blue-600 hover:underline">Jediah
                                            Blades</a>,
                                    </div>

                                    <!-- Fall of Wickets -->
                                    <div class="mt-2 text-sm">
                                        <div class="bg-gray-100 font-semibold px-2 py-2 border-b border-t">
                                            Fall of Wickets
                                        </div>
                                        <div class="px-3 pt-3 text-gray-700">
                                            28-1 (<a wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Brandon King</a>, 26), 35-2 (<a
                                                wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Evin
                                                Lewis</a>, 32), 36-3 (<a wire:navigate
                                                href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Keacy Carty</a>, 35), 75-4 (<a
                                                wire:navigate href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Shai
                                                Hope</a>, 66), 78-5 (<a wire:navigate
                                                href="{{ route("frontend.profile") }}"
                                                class="text-blue-600 hover:underline">Sherfane Rutherford</a>, 74),
                                            80-6
                                        </div>
                                    </div>

                                    <!-- Bowler Table -->
                                    <div class="mt-3 overflow-x-auto">
                                        <table class="w-full text-sm min-w-[600px] border-collapse">
                                            <thead>
                                                <tr class="bg-gray-100 border-b border-t">
                                                    <th class="text-left p-2">Bowler</th>
                                                    <th class="p-2 text-center">O</th>
                                                    <th class="p-2 text-center">M</th>
                                                    <th class="p-2 text-center">R</th>
                                                    <th class="p-2 text-center">W</th>
                                                    <th class="p-2 text-center">NB</th>
                                                    <th class="p-2 text-center">WD</th>
                                                    <th class="p-2 text-center">ECO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-b">
                                                    <td class="p-2">
                                                        <div class="flex items-center gap-3">
                                                            <img src="{{ asset("user_profile.webp") }}"
                                                                alt="Shaheen Afridi"
                                                                class="w-9 h-9 rounded-full object-cover" />
                                                            <a wire:navigate href="{{ route("frontend.profile") }}"
                                                                class="text-sm text-blue-600 hover:underline">
                                                                Shaheen Afridi
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">6.4</td>
                                                    <td class="text-center">0</td>
                                                    <td class="text-center">22</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">0</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">1.10</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div x-show="tab === 'scorecard'" class="text-gray-700 text-sm" x-cloak>
                        <div class="space-y-6">
                            @foreach ([$match->team1, $match->team2] as $team)
                                @php
                                    // batting for this team
                                    $batting = $match->battings->where("team_id", $team->id);
                                    $fallWickets = $match->fallWickets->where("team_id", $team->id);

                                    // get opposite team id
                                    $opponentId =
                                        $match->team1->id === $team->id ? $match->team2->id : $match->team1->id;

                                    // bowling comes from opponent team
                                    $bowling = $match->bowlings->where("team_id", $opponentId);

                                    // team extras
                                    $teamExtras = $match->extras->where("team_id", $team->id);
                                    $totalExtras =
                                        $teamExtras->sum("byes") +
                                        $teamExtras->sum("leg_byes") +
                                        $teamExtras->sum("wides") +
                                        $teamExtras->sum("no_balls");
                                @endphp


                                <div class="bg-white overflow-hidden" x-data="{ open: true }">
                                    <!-- Header -->
                                    <div class="px-2 py-2 bg-white border-b border-gray-200 cursor-pointer"
                                        @click="open = !open">
                                        <div class="flex items-center justify-between font-semibold text-lg">
                                            <h1 class="uppercase">{{ $team->name_en }}</h1>
                                            <div class="flex items-center gap-2">
                                                <!-- Example: you should compute score dynamically in controller -->
                                                <span>{{ $match->team1_score ?? "-" }}</span>
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
                                        <!-- Batters Table -->
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
                                                @foreach ($batting as $b)
                                                    <tr class="">
                                                        <td class="p-2 whitespace-nowrap">
                                                            <div
                                                                class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                                <!-- Left -->
                                                                <div class="flex items-center gap-3">
                                                                    <img src="{{ asset($b->batter->profile_photo_url ?? "images/user_profile.webp") }}"
                                                                        alt="{{ $b->batter->first_name_en }}"
                                                                        class="w-9 h-9 rounded-full object-cover" />
                                                                    <a href="{{ route("frontend.profile", $b->batter->id) }}"
                                                                        class="text-sm text-blue-600 hover:underline">
                                                                        {{ $b->batter->first_name_en }}
                                                                    </a>
                                                                </div>

                                                                <!-- Right (dismissal info) -->
                                                                <span
                                                                    class="text-gray-600 text-xs lg:text-[13.5px] lg:self-center ml-12 lg:ml-0">
                                                                    @php
                                                                        $howOut = strtolower($b->dismissal ?? "");
                                                                    @endphp

                                                                    @if ($howOut)
                                                                        @switch($howOut)
                                                                            @case("run out")
                                                                                run out
                                                                                @if ($b->fielder)
                                                                                    ({{ $b->fielder->first_name_en }})
                                                                                @endif
                                                                            @break

                                                                            @case("caught")
                                                                                @if ($b->fielder && $b->bowler && $b->fielder->id === $b->bowler->id)
                                                                                    c & b {{ $b->bowler->first_name_en }}
                                                                                @else
                                                                                    c {{ $b->fielder->first_name_en ?? "" }}
                                                                                    @if ($b->bowler)
                                                                                        b {{ $b->bowler->first_name_en }}
                                                                                    @endif
                                                                                @endif
                                                                            @break

                                                                            @case("bowled")
                                                                            @case("lbw")
                                                                                @if ($b->bowler)
                                                                                    {{ $howOut }} b
                                                                                    {{ $b->bowler->first_name_en }}
                                                                                @else
                                                                                    {{ $howOut }}
                                                                                @endif
                                                                            @break

                                                                            @case("stumped")
                                                                                st {{ $b->fielder->first_name_en ?? "" }}
                                                                                @if ($b->bowler)
                                                                                    b {{ $b->bowler->first_name_en }}
                                                                                @endif
                                                                            @break

                                                                            @case("not out")
                                                                                not out
                                                                            @break

                                                                            @default
                                                                                {{ $b->how_out }}
                                                                                @if ($b->fielder)
                                                                                    {{ $b->fielder->first_name_en }}
                                                                                @endif
                                                                                @if ($b->bowler)
                                                                                    b {{ $b->bowler->first_name_en }}
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

                                        <!-- Extras -->
                                        <div class="px-3 py-2 border-t text-sm">
                                            <div class="flex items-center justify-between">
                                                <span class="font-semibold">Extras</span>
                                                <span class="text-gray-600 text-[13.5px]">
                                                    <span
                                                        class="font-semibold text-gray-900">{{ $totalExtras }}</span>
                                                    (b {{ $teamExtras->sum("byes") }},
                                                    lb {{ $teamExtras->sum("leg_byes") }},
                                                    w {{ $teamExtras->sum("wides") }},
                                                    nb {{ $teamExtras->sum("no_balls") }})
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Total -->
                                        <div class="px-3 py-2 border-t text-sm">
                                            <div class="flex items-center justify-between">
                                                <span class="font-semibold">Total</span>
                                                <span class="text-gray-600 text-[13.5px]">
                                                    <span class="font-semibold text-gray-900">
                                                        {{ $batting->sum("runs") + $totalExtras }}
                                                    </span>
                                                    ({{ $batting->count() }} wkts,
                                                    {{ $bowling->count() ?? "-" }} Ov)
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Did Not Bat -->
                                        <div class="px-3 py-2 border-t text-sm">
                                            Did not Bat:
                                            @foreach ($team->players->whereNotIn("id", $batting->pluck("player_id")) as $p)
                                                <a href="{{ route("frontend.profile", $p->id) }}"
                                                    class="text-blue-600 hover:underline">
                                                    {{ $p->first_name_en }}
                                                </a>
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </div>

                                        <!-- Fall of Wickets -->
                                        <div class="mt-2 text-sm">
                                            <div class="bg-gray-100 font-semibold px-2 py-2 border-b border-t">
                                                Fall of Wickets
                                            </div>
                                            <div class="px-3 pt-3 text-gray-700">
                                                @foreach ($fallWickets as $f)
                                                    {{ $f->score }}-{{ $f->wicket }}
                                                    (<a href="{{ route("frontend.profile", $f->batter_id) }}"
                                                        class="text-blue-600 hover:underline">{{ @$f->batter->first_name_en }}</a>,
                                                    {{ $f->over }})
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Bowler Table -->
                                        <div class="mt-3 overflow-x-auto">
                                            <table class="w-full text-sm min-w-[600px] border-collapse">
                                                <thead>
                                                    <tr class="bg-gray-100 border-b border-t">
                                                        <th class="text-left p-2">Bowler</th>
                                                        <th class="p-2 text-center">O</th>
                                                        <th class="p-2 text-center">M</th>
                                                        <th class="p-2 text-center">R</th>
                                                        <th class="p-2 text-center">W</th>
                                                        <th class="p-2 text-center">NB</th>
                                                        <th class="p-2 text-center">WD</th>
                                                        <th class="p-2 text-center">ECO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bowling as $bo)
                                                        <tr class="border-b">
                                                            <td class="p-2 whitespace-nowrap">
                                                                <div class="flex items-center gap-3">
                                                                    <img src="{{ asset($bo->bowler->profile_photo_url ?? "images/user_profile.webp") }}"
                                                                        alt="{{ $bo->bowler->first_name_en }}"
                                                                        class="w-9 h-9 rounded-full object-cover" />
                                                                    <a href="{{ route("frontend.profile", $bo->bowler->id) }}"
                                                                        class="text-sm text-blue-600 hover:underline">
                                                                        {{ $bo->bowler->first_name_en }}
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">{{ $bo->overs ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->maidens ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->runs ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->wickets ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->no_balls ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->wides ?? 0 }}</td>
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
                    </div> --}}

                    <div x-show="tab === 'scorecard'" class="text-gray-700 text-sm" x-cloak>
                        <div class="space-y-6">
                            @foreach ($scorecards as $card)
                                <div class="bg-white overflow-hidden" x-data="{ open: true }">
                                    <!-- Header -->
                                    <div class="px-2 py-2 bg-white border-b border-gray-200 cursor-pointer"
                                        @click="open = !open">
                                        <div class="flex items-center justify-between font-semibold text-lg">
                                            <h1 class="uppercase">{{ $card["team"]->name_en }}</h1>
                                            <div class="flex items-center gap-2">
                                                <span>{{ $card["score"] ?? "-" }}</span>
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
                                                        <td class="p-2 whitespace-nowrap">
                                                            <div
                                                                class="flex flex-col lg:grid lg:grid-cols-[350px_auto] lg:gap-4">
                                                                <!-- Left -->
                                                                <div class="flex items-center gap-3">
                                                                    <img src="{{ asset(optional($b->batter->media)->path ?? "images/user_profile.webp") }}"
                                                                        alt="{{ optional($b->batter)->first_name_en }}"
                                                                        class="w-9 h-9 rounded-full object-cover" />
                                                                    <a href="{{ route("frontend.profile", $b->batter->id) }}"
                                                                        class="text-sm text-blue-600 hover:underline">
                                                                        {{ optional($b->batter)->first_name_en }}
                                                                    </a>
                                                                </div>

                                                                <!-- Right (dismissal info) -->
                                                                <span
                                                                    class="text-gray-600 text-xs lg:text-[13.5px] lg:self-center ml-12 lg:ml-0">
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
                                                                                    b {{ optional($b->bowler)->first_name_en }}
                                                                                @endif
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
                                                                                    b {{ optional($b->bowler)->first_name_en }}
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

                                        <!-- Extras -->
                                        <div class="px-3 py-2 border-t text-sm">
                                            <div class="flex items-center justify-between">
                                                <span class="font-semibold">Extras</span>
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
                                                <span class="font-semibold">Total</span>
                                                <span class="text-gray-600 text-[13.5px]">
                                                    <span class="font-semibold text-gray-900">
                                                        {{ (int) $card["score"] }}
                                                    </span>
                                                    ({{ $card["batting"]->count() }} wkts,
                                                    {{ $card["bowling"]->sum("overs") ?: "-" }} Ov)
                                                </span>
                                            </div>
                                        </div>



                                        <!-- Did Not Bat -->
                                        <div class="px-3 py-2 border-t text-sm">
                                            Did not Bat:
                                            @foreach ($card["didNotBat"] as $p)
                                                <a href="{{ route("frontend.profile", $p->id) }}"
                                                    class="text-blue-600 hover:underline">
                                                    {{ $p->first_name_en }}
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
                                                    Fall of Wickets
                                                </div>
                                                <div class="px-3 pt-3 text-gray-700">
                                                    @foreach ($card["fallWickets"] as $f)
                                                        {{ $f->score }}-{{ $f->wicket }}
                                                        (<a href="{{ route("frontend.profile", optional($f->batter)->id) }}"
                                                            class="text-blue-600 hover:underline">{{ optional($f->batter)->first_name_en }}</a>,
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
                                            <table class="w-full text-sm min-w-[600px] border-collapse">
                                                <thead>
                                                    <tr class="bg-gray-100 border-b border-t">
                                                        <th class="text-left p-2">Bowler</th>
                                                        <th class="p-2 text-center">O</th>
                                                        <th class="p-2 text-center">M</th>
                                                        <th class="p-2 text-center">R</th>
                                                        <th class="p-2 text-center">W</th>
                                                        <th class="p-2 text-center">NB</th>
                                                        <th class="p-2 text-center">WD</th>
                                                        <th class="p-2 text-center">ECO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($card["bowling"] as $bo)
                                                        <tr class="border-b">
                                                            <td class="p-2 whitespace-nowrap">
                                                                <div class="flex items-center gap-3">
                                                                    <img src="{{ asset(optional($bo->bowler->media)->path ?? "images/user_profile.webp") }}"
                                                                        alt="{{ optional($bo->bowler)->first_name_en }}"
                                                                        class="w-9 h-9 rounded-full object-cover" />
                                                                    <a href="{{ route("frontend.profile", optional($bo->bowler)->id) }}"
                                                                        class="text-sm text-blue-600 hover:underline">
                                                                        {{ optional($bo->bowler)->first_name_en }}
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">{{ $bo->overs ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->maidens ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->runs ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->wickets ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->no_balls ?? 0 }}</td>
                                                            <td class="text-center">{{ $bo->wides ?? 0 }}</td>
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




                    <!-- Commentary -->
                    <div x-show="tab === 'commentary'" class="text-gray-700 text-sm" x-cloak>
                        <p>
                            <strong>Commentary:</strong> Ball-by-ball commentary and
                            highlights will appear here.
                        </p>
                    </div>

                    <!-- Match Info -->
                    <div x-show="tab === 'matchinfo'" class="text-gray-700 text-sm" x-cloak>
                        <!-- Bowler Table -->
                        <div class="mt-3">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
