<div>
    <section class="mt-20 lg:mt-8">
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
            <div x-data="{ openRow: null }">

                <!-- Header -->
                <div class="mb-12 text-center">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 lg:text-4xl">
                        🏏Records for RCB
                    </h1>
                    <p class="mt-2 text-base text-gray-500">
                        All match results, stats & performance summary
                    </p>
                </div>

                <!-- Table Container -->
                {{-- <div class="border-200 overflow-hidden rounded-lg border bg-white">
                    <h2 class="border-b px-4 py-3 text-lg font-semibold text-gray-800">Results Summary</h2>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-700">
                            <!-- Table Head -->
                            <thead class="bg-gray-100 text-sm font-semibold uppercase text-gray-800">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-3">v/s Opponent</th>
                                    <th class="px-4 py-3">Mat</th>
                                    <th class="px-4 py-3">Won</th>
                                    <th class="px-4 py-3">Lost</th>
                                    <th class="px-4 py-3">Draw</th>
                                    <th class="px-4 py-3">W/L</th>
                                    <th class="px-4 py-3">% W</th>
                                    <th class="px-4 py-3">% L</th>
                                    <th class="px-4 py-3">% D</th>
                                    <th class="px-4 py-3">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M16 15l-4 4" />
                                            <path d="M8 15l4 4" />
                                        </svg>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($opponents as $index => $op)
                                    <!-- Opponent Row -->
                                    <tr class="cursor-pointer border-t bg-gray-50 hover:bg-gray-100"
                                        @click="openRow = openRow === {{ $index }} ? null : {{ $index }}">
                                        <td class="flex items-center gap-2 whitespace-nowrap px-4 py-3">
                                            <img src="{{ asset($op["logo"] ?? "images/user_profile.webp") }}"
                                                class="h-8 w-8 rounded-full" alt="">
                                            {{ app()->getLocale() === "bn" ? $op["name_bn"] : $op["name_en"] }}
                                        </td>
                                        <td class="px-4 py-3">{{ $op["played"] }}</td>
                                        <td class="px-4 py-3">{{ $op["won"] }}</td>
                                        <td class="px-4 py-3">{{ $op["lost"] }}</td>
                                        <td class="px-4 py-3">{{ $op["draw"] }}</td>
                                        <td class="px-4 py-3">{{ $op["w_l"] }}</td>
                                        <td class="px-4 py-3">{{ $op["w_percent"] }}%</td>
                                        <td class="px-4 py-3">{{ $op["l_percent"] }}%</td>
                                        <td class="px-4 py-3">{{ $op["d_percent"] }}%</td>
                                        <td class="px-4 py-3 text-gray-500">
                                            <svg x-show="openRow === {{ $index }}" style="display: none"
                                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M5 15l7-7 7 7" />
                                            </svg>
                                            <svg x-show="openRow !== {{ $index }}" style="display: none"
                                                xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </td>
                                    </tr>

                                    <!-- Expanded Row -->
                                    <tr x-show="openRow === {{ $index }}" x-cloak class="border-t bg-white">
                                        <td colspan="10" class="px-4 py-4">
                                            <table class="w-full border border-teal-100 text-sm">
                                                <thead class="bg-teal-50">
                                                    <tr>
                                                        <th class="px-4 py-2">MN</th>
                                                        <th class="px-4 py-2">Scorecard</th>
                                                        <th class="px-4 py-2">Match Result</th>
                                                        <th class="px-4 py-2">Man of The Match</th>
                                                        <th class="px-4 py-2">Date</th>
                                                        <th class="px-4 py-2">Scoreboard</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($op["matches"] as $m)
                                                        @php
                                                            $oppTeam = $m->team1_id == $rcbId ? $m->team2 : $m->team1;
                                                            $score1 =
                                                                $m->team1->name_en .
                                                                " : " .
                                                                ($m->team1_score ?? "-") .
                                                                " (" .
                                                                $m->team1_played_over .
                                                                " ov)";
                                                            $score2 =
                                                                $m->team2->name_en .
                                                                " : " .
                                                                ($m->team2_score ?? "-") .
                                                                " (" .
                                                                $m->team2_played_over .
                                                                " ov)";
                                                        @endphp
                                                        <tr class="border-t">
                                                            <td class="px-4 py-2">{{ $m->id }}</td>
                                                            <td class="px-4 py-2">
                                                                {{ $score1 }}; {{ $score2 }}
                                                            </td>
                                                            <td
                                                                class="{{ $m->won == $rcbId ? "text-green-600" : ($m->won ? "text-red-600" : "text-yellow-600") }} px-4 py-2">
                                                                {{ $m->match_result ?? "N/A" }}
                                                            </td>
                                                            <td class="px-4 py-2 text-blue-600">
                                                                <a
                                                                    href="{{ $m->manOfTheMatch?->slug ? route("frontend.profile", $m->manOfTheMatch->slug) : "#" }}">
                                                                    {{ app()->getLocale() === "bn"
                                                                        ? $m->manOfTheMatch->first_name_bn ?? "N/A"
                                                                        : $m->manOfTheMatch->first_name_en ?? "N/A" }}
                                                                </a>
                                                            </td>
                                                            <td class="px-4 py-2">
                                                                {{ \Carbon\Carbon::parse($m->date_time)->format("d M Y") }}
                                                            </td>
                                                            <td
                                                                class="flex cursor-pointer items-center gap-1 px-4 py-2 text-blue-600">
                                                                <a href="{{ route("frontend.scoreboard", [
                                                                    "matchId" => $m->id,
                                                                    "team1" => @$m->team1?->slug,
                                                                    "team2" => @$m->team2?->slug
                                                                ]) }}"
                                                                    class="flex items-center gap-1 text-blue-600 hover:underline">
                                                                    <span>Details</span>
                                                                    <svg class="h-5 w-5"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 512 512">
                                                                        <path
                                                                            d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="32" />
                                                                        <circle cx="256" cy="256" r="80"
                                                                            fill="none" stroke="currentColor"
                                                                            stroke-miterlimit="10"
                                                                            stroke-width="32" />
                                                                    </svg>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}


                {{-- <div class="min-h-screen rounded-xl bg-teal-900">
                    <div
                        class="mx-auto max-w-7xl rounded-xl border border-white/10 bg-white/5 backdrop-blur-lg">

                        <!-- Sticky Header -->
                        <div
                            class="rounded-t-xl grid-cols-[4fr_0.8fr_0.8fr_0.8fr_0.8fr_1fr_3fr_1.2fr] bg-slate-900 px-5 py-3 text-sm font-semibold text-slate-300 md:grid">

                            <div>Opponent</div>
                            <div class="text-center">Mat</div>
                            <div class="text-center">Won</div>
                            <div class="text-center">Lost</div>
                            <div class="text-center">Draw</div>
                            <div class="text-center">W/L</div>
                            <div class="text-center">Performance</div>
                            <div class="text-center">Status</div>
                        </div>

                        @foreach ($opponents as $index => $op)
                            <div x-data="{ open: false }" class="border-t border-white/10">

                                <!-- ================= SUMMARY ROW ================= -->
                                <button @click="open = !open"
                                    class="grid w-full grid-cols-[4fr_0.8fr_0.8fr_0.8fr_0.8fr_1fr_3fr_1.2fr] items-center px-5 py-5 transition hover:bg-white/5">

                                    <!-- Opponent -->
                                    <div class="flex items-center gap-4">
                                        <svg class="h-4 w-4 text-slate-400 transition-transform"
                                            :class="open && 'rotate-90'" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>

                                        <img src="{{ asset($op["logo"] ?? "images/user_profile.webp") }}"
                                            class="h-10 w-10 rounded-full object-cover" />

                                        <div>
                                            <p class="text-[15px] font-semibold leading-tight text-white">
                                                {{ app()->getLocale() === "bn" ? $op["name_bn"] : $op["name_en"] }}
                                            </p>
                                            <p class="text-left text-xs text-slate-400">
                                                Matches: {{ $op["played"] }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="text-center font-medium text-white">{{ $op["played"] }}</div>
                                    <div class="text-center font-medium text-green-400">{{ $op["won"] }}</div>
                                    <div class="text-center font-medium text-red-400">{{ $op["lost"] }}</div>
                                    <div class="text-center font-medium text-yellow-400">{{ $op["draw"] }}</div>
                                    <div class="text-center font-medium text-indigo-400">{{ $op["w_l"] }}</div>

                                    <!-- Performance -->
                                    <div class="flex flex-col justify-center gap-1 px-2">
                                        <div class="flex h-3 overflow-hidden rounded-full bg-white/10">
                                            @foreach ($op["performance"] as $item)
                                                <div class="{{ $item["color"] }}" style="width: {{ $item["value"] }}%">
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="flex justify-between text-[11px] text-slate-400">
                                            @foreach ($op["performance"] as $item)
                                                <span>{{ $item["label"] }} {{ $item["value"] }}%</span>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="flex justify-center">
                                        <span
                                            class="{{ $op["status"] === "STRONG"
                                                ? "bg-green-500/20 text-green-400"
                                                : ($op["status"] === "BALANCED"
                                                    ? "bg-yellow-500/20 text-yellow-400"
                                                    : "bg-red-500/20 text-red-400") }} rounded-full px-4 py-1.5 text-xs font-semibold">
                                            {{ $op["status"] }}
                                        </span>
                                    </div>
                                </button>

                                <!-- ================= COLLAPSIBLE MATCHES ================= -->
                                <div x-show="open" x-collapse class="bg-slate-800/40">

                                    <!-- Header -->
                                    <div
                                        class="grid-cols-[1.3fr_5fr_2.6fr_0.8fr_3.4fr_1.6fr_1fr] items-center border-b border-white/10 px-5 py-3 text-xs font-semibold text-slate-400 md:grid">

                                        <div>Match No</div>
                                        <div>Scorecard</div>
                                        <div>Result</div>

                                        <!-- Spacer -->
                                        <div></div>

                                        <div>Man of the Match</div>
                                        <div>Date</div>
                                        <div>Detail</div>
                                    </div>



                                    @foreach ($op["matches"] as $m)
                                        <div
                                            class="grid min-h-[56px] grid-cols-[1.3fr_5fr_2.6fr_0.8fr_3.4fr_1.6fr_1fr] items-center border-t border-white/10 px-5 py-3 hover:bg-white/5">

                                            <!-- Match No -->
                                            <div class="font-semibold text-white">
                                                #{{ $m->id }}
                                            </div>

                                            <!-- Scorecard -->
                                            <div class="leading-snug text-slate-300">
                                                <div class="font-medium">
                                                    {{ $m->team1->name_en }}:
                                                    {{ $m->team1_score ?? "-" }}
                                                    ({{ $m->team1_played_over }} ov)
                                                </div>
                                                <div class="text-slate-500">
                                                    {{ $m->team2->name_en }}:
                                                    {{ $m->team2_score ?? "-" }}
                                                    ({{ $m->team2_played_over }} ov)
                                                </div>
                                            </div>

                                            <!-- Result -->
                                            <div class="flex whitespace-nowrap">
                                                <span
                                                    class="{{ $m->won == $rcbId
                                                        ? "bg-green-500/20 text-green-400"
                                                        : ($m->won
                                                            ? "bg-red-500/20 text-red-400"
                                                            : "bg-yellow-500/20 text-yellow-400") }} inline-flex items-center rounded-full px-3 py-1 text-xs font-medium">
                                                    {{ $m->match_result ?? "N/A" }}
                                                </span>
                                            </div>

                                            <!-- Spacer -->
                                            <div></div>

                                            <!-- Man of the Match -->
                                            <div class="leading-tight text-slate-300">
                                                {{ app()->getLocale() === "bn"
                                                    ? $m->manOfTheMatch?->first_name_bn ?? "N/A"
                                                    : $m->manOfTheMatch?->first_name_en ?? "N/A" }}

                                                @if ($m->manOfTheMatch?->performance)
                                                    <span class="mt-0.5 block text-xs text-slate-500">
                                                        {{ $m->manOfTheMatch->performance }}
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Date -->
                                            <div class="text-slate-300">
                                                {{ \Carbon\Carbon::parse($m->date_time)->format("d M Y") }}
                                            </div>

                                            <!-- Link -->
                                            <div class="flex">
                                                <a href="{{ route("frontend.scoreboard", [
                                                    "matchId" => $m->id,
                                                    "team1" => $m->team1?->slug,
                                                    "team2" => $m->team2?->slug
                                                ]) }}"
                                                    class="font-semibold text-indigo-400 hover:text-indigo-300">
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> --}}

                <div class="min-h-screen rounded-xl bg-teal-900">
                    <div class="mx-auto max-w-7xl rounded-xl border border-white/10 bg-white/5 backdrop-blur-lg">

                        <!-- ================= SCROLL WRAPPER ================= -->
                        <div class="relative overflow-x-auto">

                            <!-- ================= TABLE ================= -->
                            <div class="min-w-[1100px]">

                                <!-- ================= HEADER ================= -->
                                <div
                                    class="sticky top-0 z-20 grid grid-cols-[4fr_0.8fr_0.8fr_0.8fr_0.8fr_1fr_3fr_1.2fr] rounded-t-xl bg-slate-900 px-5 py-3 text-sm font-semibold uppercase text-slate-300">

                                    <div>Opponent</div>
                                    <div class="text-center">Mat</div>
                                    <div class="text-center">Won</div>
                                    <div class="text-center">Lost</div>
                                    <div class="text-center">Draw</div>
                                    <div class="text-center">W/L</div>
                                    <div class="text-center">Performance</div>
                                    <div class="text-center">Status</div>
                                </div>

                                <!-- ================= BODY ================= -->
                                @foreach ($opponents as $op)
                                    <div x-data="{ open: false }" class="border-t border-white/10">

                                        <!-- ================= ROW ================= -->
                                        <button @click="open = !open"
                                            class="grid w-full grid-cols-[4fr_0.8fr_0.8fr_0.8fr_0.8fr_1fr_3fr_1.2fr] items-center px-5 py-5 transition hover:bg-white/5">

                                            <!-- Opponent -->
                                            <div class="flex items-center gap-4">
                                                <svg class="h-4 w-4 text-slate-400 transition-transform"
                                                    :class="open && 'rotate-90'" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>

                                                <img src="{{ asset($op["logo"] ?? "images/user_profile.webp") }}"
                                                    class="h-10 w-10 rounded-full object-cover">

                                                <div>
                                                    <p class="whitespace-nowrap text-left font-semibold text-white">
                                                        {{ app()->getLocale() === "bn" ? $op["name_bn"] : $op["name_en"] }}
                                                    </p>

                                                    @php
                                                        $lastMatch = collect($op["matches"])
                                                            ->sortByDesc("date_time")
                                                            ->first();
                                                    @endphp

                                                    @if ($lastMatch)
                                                        <p class="text-left text-xs text-slate-400">
                                                            Last match:
                                                            {{ \Carbon\Carbon::parse($lastMatch->date_time)->format("d M Y") }}
                                                        </p>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="text-center text-white">{{ $op["played"] }}</div>
                                            <div class="text-center text-green-400">{{ $op["won"] }}</div>
                                            <div class="text-center text-red-400">{{ $op["lost"] }}</div>
                                            <div class="text-center text-yellow-400">{{ $op["draw"] }}</div>
                                            <div class="text-center text-indigo-400">{{ $op["w_l"] }}</div>

                                            <!-- Performance -->
                                            <div class="flex flex-col justify-center gap-1 px-2">
                                                <div class="flex h-3 overflow-hidden rounded-full bg-white/10">
                                                    @foreach ($op["performance"] as $item)
                                                        @if ($item["value"] > 0)
                                                            <div class="{{ $item["color"] }}"
                                                                style="width: {{ $item["value"] }}%">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>


                                                <div class="flex justify-between text-[11px] text-slate-400">
                                                    @foreach ($op["performance"] as $item)
                                                        <span>{{ $item["label"] }} {{ $item["value"] }}%</span>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <!-- Status -->
                                            <div class="flex justify-center">
                                                <span
                                                    class="{{ $op["status"] === "STRONG"
                                                        ? "bg-green-500/20 text-green-400"
                                                        : ($op["status"] === "BALANCED"
                                                            ? "bg-yellow-500/20 text-yellow-400"
                                                            : "bg-red-500/20 text-red-400") }} rounded-full px-4 py-1.5 text-xs font-semibold">
                                                    {{ $op["status"] }}
                                                </span>
                                            </div>
                                        </button>

                                        <!-- ================= COLLAPSIBLE ================= -->
                                        {{-- <div x-show="open" x-collapse class="bg-slate-800/40">

                                            <!-- Match Header -->
                                            <div
                                                class="grid grid-cols-[1.3fr_5fr_2.6fr_0.8fr_3.4fr_1.6fr_1fr] border-b border-white/10 px-5 py-3 text-xs font-semibold text-slate-400">

                                                <div>Match</div>
                                                <div>Scorecard</div>
                                                <div>Result</div>
                                                <div></div>
                                                <div>MOM</div>
                                                <div>Date</div>
                                                <div>Detail</div>
                                            </div>

                                            @foreach ($op["matches"] as $m)
                                                <div
                                                    class="grid grid-cols-[1.3fr_5fr_2.6fr_0.8fr_3.4fr_1.6fr_1fr] items-center border-t border-white/10 px-5 py-4 hover:bg-white/5">

                                                    <div class="font-semibold text-white">#{{ $m->id }}</div>

                                                    <div class="text-slate-300">
                                                        {{ $m->team1->name_en }} {{ $m->team1_score ?? "-" }}<br>
                                                        <span class="text-slate-500">
                                                            {{ $m->team2->name_en }} {{ $m->team2_score ?? "-" }}
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span
                                                            class="{{ $m->won ? 'bg-green-500/20 text-green-400' : 'bg-yellow-500/20 text-yellow-400' }} 
                                                                   inline-flex max-w-full items-center 
                                                                   whitespace-nowrap overflow-hidden text-ellipsis
                                                                   rounded-full px-3 py-1 text-xs">
                                                            {{ $m->match_result ?? 'N/A' }}
                                                        </span>
                                                    </div>
                                                    

                                                    <div></div>

                                                    <div class="text-sm text-slate-300">
                                                        {{ $m->manOfTheMatch?->first_name_en ?? "N/A" }}
                                                    </div>

                                                   
                                                    <div class="text-sm text-slate-300">
                                                        {{ \Carbon\Carbon::parse($m->date_time)->format("d M Y") }}
                                                    </div>

                                                    <div class="flex text-sm">
                                                        <a href="{{ route("frontend.scoreboard", [
                                                            "matchId" => $m->id,
                                                            "team1" => $m->team1?->slug,
                                                            "team2" => $m->team2?->slug
                                                        ]) }}"
                                                            class="font-semibold text-indigo-400 hover:text-indigo-300">
                                                            View
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div> --}}

                                        <div x-show="open" x-collapse class="bg-slate-800/40">

                                            <!-- HEADER -->
                                            <div
                                                class="grid grid-cols-[1.3fr_5fr_2.6fr_0.8fr_3.4fr_1.6fr_1fr] border-b border-white/10 px-5 py-3 text-xs font-semibold text-slate-400">

                                                <div class="min-w-0">Match</div>
                                                <div class="min-w-0">Scorecard</div>
                                                <div class="min-w-0">Result</div>
                                                <div></div>
                                                <div class="min-w-0">MOM</div>
                                                <div class="min-w-0">Date</div>
                                                <div class="min-w-0 text-right">Detail</div>
                                            </div>

                                            @foreach ($op["matches"] as $m)
                                                <div
                                                    class="grid grid-cols-[1.3fr_5fr_2.6fr_0.8fr_3.4fr_1.6fr_1fr] items-start border-t border-white/10 px-5 py-4 hover:bg-white/5">

                                                    <!-- MATCH -->
                                                    <div class="min-w-0 font-semibold text-white">
                                                        #{{ $m->id }}
                                                    </div>

                                                    <!-- SCORECARD -->
                                                    <div class="min-w-0 leading-tight text-slate-300">
                                                        {{ $m->team1->name_en }} {{ $m->team1_score ?? "-" }}<br>
                                                        <span class="text-slate-500">
                                                            {{ $m->team2->name_en }} {{ $m->team2_score ?? "-" }}
                                                        </span>
                                                    </div>

                                                    <!-- RESULT -->
                                                    <div class="min-w-0">
                                                        <span
                                                            class="{{ $m->won ? " text-green-400" : " text-yellow-400" }} inline-block max-w-full break-words rounded-full text-xs leading-snug">
                                                            {{ $m->match_result ?? "N/A" }}
                                                        </span>
                                                    </div>

                                                    <!-- EMPTY COLUMN -->
                                                    <div></div>

                                                    <!-- MOM -->
                                                    <div class="min-w-0 text-sm text-slate-300">
                                                        {{ $m->manOfTheMatch?->first_name_en ?? "N/A" }}
                                                    </div>

                                                    <!-- DATE -->
                                                    <div class="min-w-0 text-sm text-slate-300">
                                                        {{ \Carbon\Carbon::parse($m->date_time)->format("d M Y") }}
                                                    </div>

                                                    <!-- DETAIL -->
                                                    <div class="min-w-0 text-right text-sm">
                                                        <a href="{{ route("frontend.scoreboard", [
                                                            "matchId" => $m->id,
                                                            "team1" => $m->team1?->slug,
                                                            "team2" => $m->team2?->slug
                                                        ]) }}"
                                                            class="font-semibold text-indigo-400 hover:text-indigo-300">
                                                            View
                                                        </a>
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


            </div>
        </div>

        <!-- Responsive Pagination -->
        <div class="mt-14 flex justify-center">
            <nav
                class="inline-flex items-center space-x-2 rounded-full bg-white/70 px-2 py-1 shadow-sm backdrop-blur-md sm:space-x-3 sm:px-4 sm:py-2">

                <!-- Previous Button -->
                @if ($opponents->onFirstPage())
                    <span
                        class="cursor-not-allowed select-none rounded-full px-3 py-2 text-xs text-gray-400 sm:px-4 sm:text-sm">
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
                    @php
                        // Generate pagination elements manually since we're using a custom paginator
                        $currentPage = $opponents->currentPage();
                        $lastPage = $opponents->lastPage();
                        $start = max($currentPage - 2, 1);
                        $end = min($currentPage + 2, $lastPage);
                    @endphp

                    @if ($start > 1)
                        <a href="#" wire:click.prevent="gotoPage(1)"
                            class="flex h-10 w-10 items-center justify-center rounded-full text-sm text-gray-600 transition hover:bg-gray-200">
                            1
                        </a>
                        @if ($start > 2)
                            <span class="text-sm text-gray-400">...</span>
                        @endif
                    @endif

                    @for ($page = $start; $page <= $end; $page++)
                        @if ($page == $currentPage)
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
                    @endfor

                    @if ($end < $lastPage)
                        @if ($end < $lastPage - 1)
                            <span class="text-sm text-gray-400">...</span>
                        @endif
                        <a href="#" wire:click.prevent="gotoPage({{ $lastPage }})"
                            class="flex h-10 w-10 items-center justify-center rounded-full text-sm text-gray-600 transition hover:bg-gray-200">
                            {{ $lastPage }}
                        </a>
                    @endif
                </div>

                <!-- Mobile Page Indicator -->
                <span class="px-3 py-2 text-xs text-gray-600 sm:hidden">
                    Page {{ $opponents->currentPage() }} of {{ $opponents->lastPage() }}
                </span>

                <!-- Next Button -->
                @if ($opponents->hasMorePages())
                    <a href="#" wire:click.prevent="nextPage"
                        class="rounded-full px-3 py-2 text-xs text-gray-600 transition hover:bg-gray-200 sm:px-4 sm:text-sm">
                        Next ›
                    </a>
                @else
                    <span
                        class="cursor-not-allowed select-none rounded-full px-3 py-2 text-xs text-gray-400 sm:px-4 sm:text-sm">
                        Next ›
                    </span>
                @endif
            </nav>
        </div>
    </section>

    @push("title")
        RCB - All Records
    @endpush
</div>
