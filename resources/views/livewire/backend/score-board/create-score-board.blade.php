<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Create Scoreboard
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Create Scoreboard</li>
            </ol>
        </nav>
    </div>
    <form method="post" class="space-y-4">
        <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
            <h2 class="text-lg text-gray-900 dark:text-gray-300 font-medium mb-4">Match Information</h2>
            <!-- Match Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tournament -->
                <div>
                    <label for="tournamentId" class="block text-sm text-gray-800 mb-1">
                        Tournament<span class="text-red-500">*</span>
                    </label>
                    <select wire:model.live='form.tournamentId' id="tournamentId"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a Tournament --</option>
                        @foreach ($form->tournaments as $tournament)
                            <option value="{{ $tournament->id }}">{{ $tournament->name_en }}</option>
                        @endforeach
                    </select>
                    @error("form.tournamentId")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Match -->
                <div>
                    <label for="matchId" class="block text-sm text-gray-800 mb-1">
                        Match<span class="text-red-500">*</span>
                    </label>
                    <select wire:model.live='form.matchId' id="matchId"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a Match --</option>
                        @foreach ($form->matches as $match)
                            <option value="{{ $match->id }}">{{ $match->name }}</option>
                        @endforeach
                    </select>
                    @error("form.matchId")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Team -->
                {{-- <div>
                    <label for="teamId" class="block text-sm text-gray-800 mb-1">
                        Team<span class="text-red-500">*</span>
                    </label>
                    <select wire:model='form.teamId' id="teamId"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a Team --</option>
                        @foreach ($form->teams as $team)
                            <option value="{{ $team["id"] }}">{{ $team["name_en"] }}</option>
                        @endforeach
                    </select>
                    @error("form.teamId")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div>
                    <label for="teamId" class="block text-sm text-gray-800 mb-1">
                        Team<span class="text-red-500">*</span>
                    </label>
                    <select wire:model.live="form.teamId" id="teamId"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600">
                        <option value="">-- Select a Team --</option>
                        @foreach ($form->teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name_en }}</option>
                        @endforeach
                    </select>
                    @error("form.teamId")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
            <h2 class="text-lg text-gray-900 dark:text-gray-300 font-medium mb-4">Score Information</h2>
            <div class="flex" x-data="{ tab: 'batting' }">

                <!-- Main Content -->
                <main class="flex-1 overflow-y-auto">
                    <div class="mt-0 space-y-6">
                        <!-- Tabs -->
                        <section class="bg-white p-0 rounded-xl shadow">
                            <div class="flex space-x-6 border-b mb-4">
                                <button type="button" @click="tab = 'batting'"
                                    :class="tab === 'batting' ? 'border-b-2 border-blue-600 text-blue-600' :
                                        'text-gray-900'"
                                    class="text-[14.5px] font-medium">Batting</button>
                                <button type="button" @click="tab = 'bowling'"
                                    :class="tab === 'bowling' ? 'border-b-2 border-blue-600 text-blue-600' :
                                        'text-gray-900'"
                                    class="text-[14.5px] font-medium">Bowling</button>
                                <button type="button" @click="tab = 'extras'"
                                    :class="tab === 'extras' ? 'border-b-2 border-blue-600 text-blue-600' :
                                        'text-gray-900'"
                                    class="text-[14.5px] font-medium">Extras</button>
                                <button type="button" @click="tab = 'fall'"
                                    :class="tab === 'fall' ? 'border-b-2 border-blue-600 text-blue-600' :
                                        'text-gray-900'"
                                    class="text-[14.5px] font-medium">Fall of Wickets</button>
                            </div>

                            <!-- Batting -->
                            {{-- <div x-show="tab === 'batting'" class="space-y-4">
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                                        <div>
                                            <label class="block text-sm text-gray-800 mb-1">
                                                Batter<span class="text-red-500">*</span>
                                            </label>
                                            <select wire:model="batterId"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5">
                                                <option value="">-- Select Batter --</option>
                                                @foreach ($batters as $player)
                                                    <option value="{{ $player->id }}">{{ $player->first_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Runs -->
                                        <div>
                                            <label for="runs" class="block text-sm text-gray-800 mb-1">
                                                Runs<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model='runs' id="runs" placeholder="Runs"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Balls -->
                                        <div>
                                            <label for="balls" class="block text-sm text-gray-800 mb-1">
                                                Balls<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model='balls' id="runs" placeholder="Balls"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- 4s -->
                                        <div>
                                            <label for="4s" class="block text-sm text-gray-800 mb-1">
                                                4s<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model='4s' id="4s" placeholder="4s"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- 6s -->
                                        <div>
                                            <label for="6s" class="block text-sm text-gray-800 mb-1">
                                                6s<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model='6s' id="6s" placeholder="6s"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                        <!-- Dismissal Type -->
                                        <div>
                                            <label for="dismissal" class="block text-sm text-gray-800 mb-1">
                                                Dismissal Type<span class="text-red-500">*</span>
                                            </label>
                                            <select wire:model='dismissal' id="dismissal"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                <option value="">-- Select Dismissal --</option>
                                                @foreach (\App\Enums\DismissalType::cases() as $type)
                                                    <option value="{{ $type->value }}">
                                                        {{ $type->value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error("form.religion")
                                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Fielder -->
                                        <div>
                                            <label class="block text-sm text-gray-800 mb-1">Fielder</label>
                                            <select wire:model="fielderId"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5">
                                                <option value="">-- Select Fielder --</option>
                                                @foreach ($opponentPlayers as $player)
                                                    <option value="{{ $player->id }}">{{ $player->first_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Bowler -->
                                        <div>
                                            <label class="block text-sm text-gray-800 mb-1">Bowler</label>
                                            <select wire:model="bowlerId"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5">
                                                <option value="">-- Select Bowler --</option>
                                                @foreach ($opponentPlayers as $player)
                                                    <option value="{{ $player->id }}">{{ $player->first_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg">+ Add
                                        Batter
                                    </button>
                                </div>
                            </div> --}}
                            <div x-show="tab === 'batting'" class="space-y-4">
                                @foreach ($form->batting as $i => $row)
                                    <div class="space-y-4">
                                        <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                                            <!-- Batter -->
                                            <div>
                                                <label for="batterId" class="block text-sm text-gray-800 mb-1">
                                                    Batter<span class="text-red-500">*</span>
                                                </label>
                                                <select wire:model="form.batting.{{ $i }}.batterId"
                                                    id="batterId"
                                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                    <option value="">-- Select Batter --</option>
                                                    @foreach ($form->batters as $player)
                                                        <option value="{{ $player->id }}">
                                                            {{ $player->first_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Runs -->
                                            <div>
                                                <label for="runs" class="block text-sm text-gray-800 mb-1">
                                                    Runs<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" wire:model="form.batting.{{ $i }}.runs"
                                                    id="runs" placeholder="Runs"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Balls -->
                                            <div>
                                                <label for="balls" class="block text-sm text-gray-800 mb-1">
                                                    Balls<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" wire:model="form.batting.{{ $i }}.balls"
                                                    id="balls" placeholder="Balls"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Fours -->
                                            <div>
                                                <label for="fours" class="block text-sm text-gray-800 mb-1">
                                                    4s<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" wire:model="form.batting.{{ $i }}.fours"
                                                    id="fours" placeholder="4s"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Sixes -->
                                            <div>
                                                <label for="sixes" class="block text-sm text-gray-800 mb-1">
                                                    6s<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" wire:model="form.batting.{{ $i }}.sixes"
                                                    id="sixes" placeholder="6s"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                            <div>
                                                <label for="sixes" class="block text-sm text-gray-800 mb-1">
                                                    Dismissal Type<span class="text-red-500">*</span>
                                                </label>
                                                <select wire:model="form.batting.{{ $i }}.dismissal"
                                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                    <option value="">-- Select Dismissal --</option>
                                                    @foreach (\App\Enums\DismissalType::cases() as $type)
                                                        <option value="{{ $type->value }}">{{ $type->value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label for="fielderId" class="block text-sm text-gray-800 mb-1">
                                                    Fielder<span class="text-red-500">*</span>
                                                </label>
                                                <select wire:model="form.batting.{{ $i }}.fielderId"
                                                    id="fielderId"
                                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                    <option value="">-- Select Fielder --</option>
                                                    @foreach ($form->opponentPlayers as $player)
                                                        <option value="{{ $player->id }}">
                                                            {{ $player->first_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label for="bowlerId" class="block text-sm text-gray-800 mb-1">
                                                    Bowler<span class="text-red-500">*</span>
                                                </label>
                                                <select wire:model="form.batting.{{ $i }}.bowlerId"
                                                    id="bowlerId"
                                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                    <option value="">-- Select Bowler --</option>
                                                    @foreach ($form->opponentPlayers as $player)
                                                        <option value="{{ $player->id }}">
                                                            {{ $player->first_name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @if (count($form->batting) > 1)
                                            <button type="button" wire:click="removeBatterRow({{ $i }})"
                                                class="bg-red-500 text-white px-4 py-2 text-sm rounded-md">
                                                Remove
                                            </button>
                                        @endif
                                    </div>
                                @endforeach

                                {{-- <button type="button" wire:click="addBatterRow"
                                    class="mt-3 bg-blue-600 text-white px-4 py-2 rounded-lg">
                                    + Add Batter
                                </button> --}}
                                <button type="button" wire:click="addBatterRow"
                                    class="mt-2 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    + Add Batter
                                </button>
                            </div>


                            <!-- Bowling -->
                            {{-- <div x-show="tab === 'bowling'" class="space-y-4">
                                <div>
                                    <div class="grid grid-cols-4 gap-2">
                                        <input x-ref="bowler" placeholder="Bowler" class="border p-2 rounded"
                                            required>
                                        <input x-ref="overs" type="number" step="0.1" placeholder="Overs"
                                            class="border p-2 rounded" required>
                                        <input x-ref="runsB" type="number" placeholder="Runs"
                                            class="border p-2 rounded" required>
                                        <input x-ref="wickets" type="number" placeholder="Wickets"
                                            class="border p-2 rounded">
                                    </div>
                                    <button class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg">+ Add
                                        Bowler</button>
                                </div>

                                <table class="min-w-full border">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-3 py-2">Bowler</th>
                                            <th class="px-3 py-2">Overs</th>
                                            <th class="px-3 py-2">Runs</th>
                                            <th class="px-3 py-2">Wickets</th>
                                            <th class="px-3 py-2">Economy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="row in bowling" :key="row.player">
                                            <tr class="border-t">
                                                <td class="px-3 py-2" x-text="row.player"></td>
                                                <td class="px-3 py-2" x-text="row.overs"></td>
                                                <td class="px-3 py-2" x-text="row.runs"></td>
                                                <td class="px-3 py-2" x-text="row.wickets"></td>
                                                <td class="px-3 py-2" x-text="row.economy"></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div> --}}
                            <div x-show="tab === 'bowling'" class="space-y-4">
                                @foreach ($form->bowling as $i => $row)
                                    <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
                                        {{-- <input wire:model="bowling.{{ $i }}.bowlerName"
                                            placeholder="Bowler" class="border p-2 rounded"> --}}
                                        <div>
                                            <label for="bowlerId" class="block text-sm text-gray-800 mb-1">
                                                Bowler<span class="text-red-500">*</span>
                                            </label>
                                            <select wire:model="form.bowling.{{ $i }}.bowlerId" id="bowlerId"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                <option value="">-- Select Bowler --</option>
                                                @foreach ($form->opponentPlayers as $player)
                                                    <option value="{{ $player->id }}">
                                                        {{ $player->first_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Overs -->
                                        <div>
                                            <label for="overs" class="block text-sm text-gray-800 mb-1">
                                                Overs<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model="form.bowling.{{ $i }}.overs"
                                                id="overs" placeholder="Overs"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Maiden -->
                                        <div>
                                            <label for="maiden" class="block text-sm text-gray-800 mb-1">
                                                Maiden<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model="form.bowling.{{ $i }}.maiden"
                                                id="maiden" placeholder="Maiden"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Runs -->
                                        <div>
                                            <label for="runs" class="block text-sm text-gray-800 mb-1">
                                                Runs<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model="form.bowling.{{ $i }}.runs"
                                                id="runs" placeholder="Runs"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Wickets -->
                                        <div>
                                            <label for="wickets" class="block text-sm text-gray-800 mb-1">
                                                Wickets<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model="form.bowling.{{ $i }}.wickets"
                                                id="wickets" placeholder="Wickets"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        @if (count($form->bowling) > 1)
                                            <button type="button" wire:click="removeBowlerRow({{ $i }})"
                                                class="bg-red-500 text-white px-4 py-2 text-sm rounded-md">
                                                Remove
                                            </button>
                                        @endif
                                    </div>
                                @endforeach

                                <button type="button" wire:click="addBowlerRow"
                                    class="mt-2 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    + Add Bowler
                                </button>
                            </div>


                            <!-- Extras -->
                            <div x-show="tab === 'extras'" class="space-y-4">
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                    <div>
                                        <label for="byes" class="block text-sm text-gray-800 mb-1">
                                            Byes
                                        </label>
                                        <input type="number" wire:model="form.byes" id="byes"
                                            placeholder="Byes"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <div>
                                        <label for="leg_byes" class="block text-sm text-gray-800 mb-1">
                                            Leg Byes
                                        </label>
                                        <input type="number" wire:model="form.leg_byes" id="leg_byes"
                                            placeholder="Leg Byes"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <div>
                                        <label for="wides" class="block text-sm text-gray-800 mb-1">
                                            Wides
                                        </label>
                                        <input type="number" wire:model="form.wides" id="wides"
                                            placeholder="Wides"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <div>
                                        <label for="no_balls" class="block text-sm text-gray-800 mb-1">
                                            No Balls
                                        </label>
                                        <input type="number" wire:model="form.no_balls" id="no_balls"
                                            placeholder="No Balls"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>
                                </div>
                                {{-- <p class="mt-2 font-medium">Total Extras: <span
                                        x-text="extras.byes + extras.leg_byes + extras.wides + extras.no_balls + extras.penalty_runs"></span>
                                </p> --}}
                            </div>

                            <!-- Fall of Wickets -->
                            {{-- <div x-show="tab === 'fall'" class="space-y-4">
                                <div>
                                    <div class="grid grid-cols-4 gap-2">
                                        <input x-ref="order" type="number" placeholder="Wkt No."
                                            class="border p-2 rounded" required>
                                        <input x-ref="score" type="number" placeholder="Score"
                                            class="border p-2 rounded" required>
                                        <input x-ref="playerOut" placeholder="Player Out" class="border p-2 rounded"
                                            required>
                                        <input x-ref="over" placeholder="Over (e.g. 12.3)"
                                            class="border p-2 rounded" required>
                                    </div>
                                    <button class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg">
                                        + Add Wicket
                                    </button>
                                </div>

                                <ul class="list-disc pl-5">
                                    <template x-for="w in wickets" :key="w.order">
                                        <li x-text="`${w.order}-${w.score} (${w.player}, ${w.over} ov)`"></li>
                                    </template>
                                </ul>
                            </div> --}}
                            <div x-show="tab === 'fall'" class="space-y-4">
                                @foreach ($form->wickets as $i => $row)
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                        <!-- Score -->
                                        <div>
                                            <label for="score" class="block text-sm text-gray-800 mb-1">
                                                Score<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model="form.wickets.{{ $i }}.score"
                                                id="score" placeholder="Score"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Wkt No. -->
                                        <div>
                                            <label for="wicket" class="block text-sm text-gray-800 mb-1">
                                                Wkt No.<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model="form.wickets.{{ $i }}.wicket"
                                                id="wicket" placeholder="Wkt No."
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Player Out -->
                                        <div>
                                            <label for="playerOut" class="block text-sm text-gray-800 mb-1">
                                                Player Out<span class="text-red-500">*</span>
                                            </label>
                                            <select wire:model="form.wickets.{{ $i }}.playerOut" id="playerOut"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                <option value="">-- Select Player Out --</option>
                                                @foreach ($form->batters as $player)
                                                    <option value="{{ $player->id }}">
                                                        {{ $player->first_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Over -->
                                        <div>
                                            <label for="over" class="block text-sm text-gray-800 mb-1">
                                                Over<span class="text-red-500">*</span>
                                            </label>
                                            <input type="number" wire:model="form.wickets.{{ $i }}.over"
                                                id="over" placeholder="Over (e.g. 12.3)"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        @if (count($form->wickets) > 1)
                                            <button type="button" wire:click="removeWicketRow({{ $i }})"
                                                class="bg-red-500 text-white px-4 py-2 text-sm rounded-md">
                                                Remove
                                            </button>
                                        @endif
                                    </div>
                                @endforeach

                                <button type="button" wire:click="addWicketRow"
                                    class="mt-2 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    + Add Bowler
                                </button>
                            </div>
                        </section>
                    </div>
                </main>
            </div>

            <!-- Status -->
            {{-- <div class="text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">
                    Status
                </span>
                <div class="flex flex-wrap gap-x-5 mt-3.5 gap-y-1.5">
                    <div class="flex items-center space-x-3">
                        <label for="active" class="relative flex items-center">
                            <input type="radio" wire:model='form.status' value="1"
                                class="peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-gray-200 bg-gray-100 checked:border-blue-600"
                                id="active" />
                            <span
                                class="pointer-events-none absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 text-blue-600 opacity-0 transition-opacity peer-checked:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </label>
                        <label for="active" class="text-gray-700 dark:text-gray-400 cursor-pointer">
                            Active
                        </label>
                    </div>
                    <div class="flex items-center space-x-3">
                        <label for="inactive" class="relative flex items-center">
                            <input type="radio" wire:model="form.status" value="0"
                                class="peer relative h-5 w-5 cursor-pointer appearance-none rounded-full border border-gray-200 bg-gray-100 checked:border-blue-600"
                                id="inactive" checked />
                            <span
                                class="pointer-events-none absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 text-blue-600 opacity-0 transition-opacity peer-checked:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </label>
                        <label for="inactive" class="text-gray-700 dark:text-gray-400 cursor-pointer">
                            Inactive
                        </label>
                    </div>
                </div>
            </div> --}}

            <!-- Create Button -->
            <div class="flex justify-end space-x-3 mt-5">
                <button type="reset"
                    class="px-4 py-2.5 rounded-md text-sm text-red-500 hover:bg-red-100 transition-colors duration-300">
                    Reset
                </button>
                <button wire:click='store' type="button"
                    class="flex items-center justify-center w-full px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md sm:w-auto sm:px-4 sm:py-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-2 h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
