<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Edit Scoreboard
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit Scoreboard</li>
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
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out
                        disabled:bg-gray-100 disabled:cursor-not-allowed disabled:text-gray-900"
                        disabled>
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
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out
                        disabled:bg-gray-100 disabled:cursor-not-allowed disabled:text-gray-900"
                        disabled>
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
                <div>
                    <label for="teamId" class="block text-sm text-gray-800 mb-1">
                        Team<span class="text-red-500">*</span>
                    </label>
                    <select wire:model.live="form.teamId" id="teamId"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600
                        disabled:bg-gray-100 disabled:cursor-not-allowed disabled:text-gray-900"
                        disabled>
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

        {{-- <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
            <h2 class="text-lg text-gray-900 dark:text-gray-300 font-medium mb-4">Score Information</h2>
            <div class="flex" x-data="{ tab: 'batting', batting: [], bowling: [], extras: { byes: 0, wides: 0, leg_byes: 0, no_balls: 0, penalty_runs: 0 }, wickets: [] }">

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
                                <button type="button" @click="tab = 'commentary'"
                                    :class="tab === 'commentary' ? 'border-b-2 border-blue-600 text-blue-600' :
                                        'text-gray-900'"
                                    class="text-[14.5px] font-medium">Commentary</button>
                            </div>

                            <!-- Batting -->
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
                                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">

                                                    <option value="">-- Select Batter --</option>

                                                    @foreach ($this->getAvailableBatters($i) as $player)
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
                                                <input type="number"
                                                    wire:model="form.batting.{{ $i }}.runs" id="runs"
                                                    placeholder="Runs"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Balls -->
                                            <div>
                                                <label for="balls" class="block text-sm text-gray-800 mb-1">
                                                    Balls<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number"
                                                    wire:model="form.batting.{{ $i }}.balls" id="balls"
                                                    placeholder="Balls"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Fours -->
                                            <div>
                                                <label for="fours" class="block text-sm text-gray-800 mb-1">
                                                    4s<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number"
                                                    wire:model="form.batting.{{ $i }}.fours" id="fours"
                                                    placeholder="4s"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Sixes -->
                                            <div>
                                                <label for="sixes" class="block text-sm text-gray-800 mb-1">
                                                    6s<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number"
                                                    wire:model="form.batting.{{ $i }}.sixes"
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
                                                    Fielder
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
                                                    Bowler
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

                                <button type="button" wire:click="addBatterRow"
                                    class="mt-2 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    + Add Batter
                                </button>
                            </div>

                            <!-- Bowling -->
                            <div x-show="tab === 'bowling'" class="space-y-4">
                                @foreach ($form->bowling as $i => $row)
                                    <div class="space-y-4">
                                        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                                            <!-- Bowler -->
                                            <div>
                                                <label for="bowlerId" class="block text-sm text-gray-800 mb-1">
                                                    Bowler<span class="text-red-500">*</span>
                                                </label>
                                                <select wire:model="form.bowling.{{ $i }}.bowlerId"
                                                    id="bowlerId"
                                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                    <option value="">-- Select Bowler --</option>
                                                    @foreach ($this->getAvailableBowlers($i) as $player)
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
                                                <input type="number"
                                                    wire:model="form.bowling.{{ $i }}.overs"
                                                    id="overs" placeholder="Overs"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Maiden -->
                                            <div>
                                                <label for="maiden" class="block text-sm text-gray-800 mb-1">
                                                    Maiden<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number"
                                                    wire:model="form.bowling.{{ $i }}.maiden"
                                                    id="maiden" placeholder="Maiden"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Runs -->
                                            <div>
                                                <label for="runs" class="block text-sm text-gray-800 mb-1">
                                                    Runs<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number"
                                                    wire:model="form.bowling.{{ $i }}.runs" id="runs"
                                                    placeholder="Runs"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                            <!-- Wickets -->
                                            <div>
                                                <label for="wickets" class="block text-sm text-gray-800 mb-1">
                                                    Wickets<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number"
                                                    wire:model="form.bowling.{{ $i }}.wickets"
                                                    id="wickets" placeholder="Wickets"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- No Balls -->
                                            <div>
                                                <label for="no_balls" class="block text-sm text-gray-800 mb-1">
                                                    No Balls<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number"
                                                    wire:model="form.bowling.{{ $i }}.no_balls"
                                                    id="no_balls" placeholder="No Balls"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>

                                            <!-- Wides -->
                                            <div>
                                                <label for="wides" class="block text-sm text-gray-800 mb-1">
                                                    Wides<span class="text-red-500">*</span>
                                                </label>
                                                <input type="number"
                                                    wire:model="form.bowling.{{ $i }}.wides"
                                                    id="wides" placeholder="Wides"
                                                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </div>
                                        </div>
                                        @if (count($form->bowling) > 1)
                                            <button type="button" wire:click="removeBowlerRow({{ $i }})"
                                                class="bg-red-500 text-white mt-2 px-4 py-2 text-sm rounded-md">
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
                                <p class="mt-2 font-medium">Total Extras: <span
                                        x-text="extras.byes + extras.leg_byes + extras.wides + extras.no_balls + extras.penalty_runs"></span>
                                </p>
                            </div>

                            <!-- Fall of Wickets -->
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
                                            <input type="number"
                                                wire:model="form.wickets.{{ $i }}.wicket" id="wicket"
                                                placeholder="Wkt No."
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Player Out -->
                                        <div>
                                            <label for="playerOut" class="block text-sm text-gray-800 mb-1">
                                                Player Out<span class="text-red-500">*</span>
                                            </label>
                                            <select wire:model="form.wickets.{{ $i }}.playerOut"
                                                id="playerOut"
                                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                                <option value="">-- Select Player Out --</option>
                                                @foreach ($this->getAvailableWicket($i) as $player)
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
                                                class="w-24 bg-red-500 text-white px-4 py-2 text-sm rounded-md">
                                                Remove
                                            </button>
                                        @endif
                                    </div>
                                @endforeach

                                <button type="button" wire:click="addWicketRow"
                                    class="mt-2 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    + Fall of Wicket
                                </button>
                            </div>

                            <!-- Commentary -->
                            <div x-show="tab === 'commentary'" class="space-y-4">
                                @foreach ($form->commentary as $index => $item)
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2 items-end">
                                        <!-- Over -->
                                        <div>
                                            <label class="block text-sm text-gray-800 mb-1">End Of Over</label>
                                            <input type="number" step="0.1"
                                                wire:model="form.commentary.{{ $index }}.over_number"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Runs -->
                                        <div>
                                            <label class="block text-sm text-gray-800 mb-1">Score At</label>
                                            <input type="text"
                                                wire:model="form.commentary.{{ $index }}.score_at"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Balls -->
                                        <div>
                                            <label class="block text-sm text-gray-800 mb-1">Ball Number</label>
                                            <input type="text"
                                                wire:model="form.commentary.{{ $index }}.ball_number"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>

                                        <!-- Ball Runs -->
                                        <div>
                                            <label class="block text-sm text-gray-800 mb-1">Ball Per Runs</label>
                                            <input type="text"
                                                wire:model="form.commentary.{{ $index }}.ball_per_run"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                        </div>



                                        <!-- Commentary Text -->
                                        <div class="md:col-span-5">
                                            <label class="block text-sm text-gray-800 mb-1">Description</label>
                                            <textarea wire:model="form.commentary.{{ $index }}.description" rows="2"
                                                class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                            </textarea>
                                        </div>

                                        <!-- Remove Button -->
                                        <div>
                                            @if (count($form->commentary) > 1)
                                                <button type="button"
                                                    wire:click="removeCommentaryRow({{ $index }})"
                                                    class="w-full bg-red-500 text-white px-4 py-2 text-sm rounded-md hover:bg-red-600">
                                                    Remove
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <button type="button" wire:click="addCommentaryRow"
                                    class="mt-2 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    + Add Commentary
                                </button>
                            </div>
                        </section>
                    </div>
                </main>
            </div>

            <!-- Create Button -->
            <div class="flex justify-end space-x-3 mt-5">
                <button type="reset"
                    class="px-4 py-2.5 rounded-md text-sm text-red-500 hover:bg-red-100 transition-colors duration-300">
                    Reset
                </button>
                <button wire:click="update" type="button"
                    class="flex items-center justify-center px-5 py-3 text-sm leading-5 text-white 
                           transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 
                           rounded-md focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-2 h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    Update
                </button>
            </div>
        </div> --}}

        <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
            <h2 class="text-lg text-gray-900 dark:text-gray-300 font-medium mb-4">Score Information</h2>

            <div class="flex flex-col" x-data="{ tab: 'batting', batting: [], bowling: [], extras: { byes: 0, wides: 0, leg_byes: 0, no_balls: 0, penalty_runs: 0 }, wickets: [] }">

                <!-- Fixed Tabs -->
                <div class="bg-white dark:bg-[#132337] p-0 rounded-t-md  sticky top-0 z-20 border-b border-gray-200">
                    <div class="flex space-x-6 overflow-x-auto scrollbar-hide">
                        <button type="button" @click="tab = 'batting'"
                            :class="tab === 'batting'
                                ?
                                'border-b-2 border-blue-600 text-blue-600' :
                                'text-gray-900 dark:text-gray-300'"
                            class="text-[14.5px] font-medium pb-1 whitespace-nowrap">
                            Batting
                        </button>
                        <button type="button" @click="tab = 'bowling'"
                            :class="tab === 'bowling'
                                ?
                                'border-b-2 border-blue-600 text-blue-600' :
                                'text-gray-900 dark:text-gray-300'"
                            class="text-[14.5px] font-medium pb-1 whitespace-nowrap">
                            Bowling
                        </button>
                        <button type="button" @click="tab = 'extras'"
                            :class="tab === 'extras'
                                ?
                                'border-b-2 border-blue-600 text-blue-600' :
                                'text-gray-900 dark:text-gray-300'"
                            class="text-[14.5px] font-medium pb-1 whitespace-nowrap">
                            Extras
                        </button>
                        <button type="button" @click="tab = 'fall'"
                            :class="tab === 'fall'
                                ?
                                'border-b-2 border-blue-600 text-blue-600' :
                                'text-gray-900 dark:text-gray-300'"
                            class="text-[14.5px] font-medium pb-1 whitespace-nowrap">
                            Fall of Wickets
                        </button>
                        <button type="button" @click="tab = 'commentary'"
                            :class="tab === 'commentary'
                                ?
                                'border-b-2 border-blue-600 text-blue-600' :
                                'text-gray-900 dark:text-gray-300'"
                            class="text-[14.5px] font-medium pb-1 whitespace-nowrap">
                            Overs
                        </button>
                    </div>
                </div>

                <!-- Scrollable Main Content -->
                <main class="flex-1 overflow-y-auto max-h-[70vh] mt-4">
                    <!-- Batting -->
                    <div x-show="tab === 'batting'" class="space-y-4">
                        {{-- @foreach ($form->batting as $key => $bat)
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-5 gap-2"
                                    wire:key="batting-{{ $key }}">
                                    <!-- Batter -->
                                    <div>
                                        <label for="batterId" class="block text-sm text-gray-800 mb-1">
                                            Batter<span class="text-red-500">*</span>
                                        </label>
                                        <select wire:model="form.batting.{{ $key }}.batterId"
                                            class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                            <option value="">-- Select Batter --</option>
                                            @foreach ($form->batters as $player)
                                                @php
                                                    $selectedIds = collect($form->batting)
                                                        ->pluck("batterId")
                                                        ->filter()
                                                        ->toArray();

                                                    // Disable if selected elsewhere, but not for this current row
                                                    $isDisabled =
                                                        in_array($player->id, $selectedIds) &&
                                                        $player->id != $bat["batterId"];
                                                @endphp

                                                <option value="{{ $player->id }}"
                                                    @if ($isDisabled) disabled @endif
                                                    @if ($player->id == $bat["batterId"]) selected @endif>
                                                    {{ $player->first_name_en }}
                                                    @if ($isDisabled && $player->id != $bat["batterId"])
                                                        (selected)
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>

                                        <select wire:model="form.batting.{{ $key }}.batterId"
                                            class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                            <option value="">-- Select Batter --</option>
                                            @foreach ($form->batters as $player)
                                                @php
                                                    $selectedIds = collect($form->batting)
                                                        ->pluck("batterId")
                                                        ->filter()
                                                        ->toArray();

                                                    $currentBatterId = $bat["batterId"] ?? ""; // ✅ prevents undefined key
                                                    $isDisabled =
                                                        in_array($player->id, $selectedIds) &&
                                                        $player->id != $currentBatterId;
                                                @endphp

                                                <option value="{{ $player->id }}"
                                                    @if ($isDisabled) disabled @endif
                                                    @if ($player->id == $currentBatterId) selected @endif>
                                                    {{ $player->first_name_en }}
                                                    @if ($isDisabled && $player->id != $currentBatterId)
                                                        (selected)
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        @php
                                            $selectedIds = collect($form->batting)
                                                ->pluck("batterId")
                                                ->filter()
                                                ->toArray();

                                            $currentBatterId = $bat["batterId"] ?? "";

                                            // Sort batters: unselected first, then selected
                                            $sortedBatters = collect($form->batters)->sortBy(function ($player) use (
                                                $selectedIds,
                                                $currentBatterId,
                                            ) {
                                                // If player is selected elsewhere (disabled), give it higher order
                                                $isDisabled =
                                                    in_array($player->id, $selectedIds) &&
                                                    $player->id != $currentBatterId;
                                                return $isDisabled ? 1 : 0; // unselected first (0), selected later (1)
                                            });
                                        @endphp

                                        <select wire:model="form.batting.{{ $key }}.batterId"
                                            class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                            <option value="">-- Select Batter --</option>

                                            @foreach ($sortedBatters as $player)
                                                @php
                                                    $isDisabled =
                                                        in_array($player->id, $selectedIds) &&
                                                        $player->id != $currentBatterId;
                                                @endphp

                                                <option value="{{ $player->id }}"
                                                    @if ($isDisabled) disabled @endif
                                                    @if ($player->id == $currentBatterId) selected @endif
                                                    class="@if ($isDisabled && $player->id != $currentBatterId) opacity-50 italic line-through @endif">
                                                    {{ $player->first_name_en }}
                                                    @if ($isDisabled && $player->id != $currentBatterId)
                                                        (selected)
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Runs -->
                                    <div>
                                        <label for="runs" class="block text-sm text-gray-800 mb-1">
                                            Runs<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.batting.{{ $key }}.runs"
                                            id="runs" placeholder="Runs"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Balls -->
                                    <div>
                                        <label for="balls" class="block text-sm text-gray-800 mb-1">
                                            Balls<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.batting.{{ $key }}.balls"
                                            id="balls" placeholder="Balls"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Fours -->
                                    <div>
                                        <label for="fours" class="block text-sm text-gray-800 mb-1">
                                            4s<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.batting.{{ $key }}.fours"
                                            id="fours" placeholder="4s"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Sixes -->
                                    <div>
                                        <label for="sixes" class="block text-sm text-gray-800 mb-1">
                                            6s<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.batting.{{ $key }}.sixes"
                                            id="sixes" placeholder="6s"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                    <div>
                                        <label for="sixes" class="block text-sm text-gray-800 mb-1">
                                            Dismissal Type<span class="text-red-500">*</span>
                                        </label>
                                        <select wire:model="form.batting.{{ $key }}.dismissal"
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
                                            Fielder
                                        </label>
                                        <select wire:model="form.batting.{{ $key }}.fielderId"
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
                                            Bowler
                                        </label>
                                        <select wire:model="form.batting.{{ $key }}.bowlerId" id="bowlerId"
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
                                <!-- Remove button -->
                                @if (count($form->batting) > 1)
                                    <button wire:click.prevent="removeBatterRow('{{ $key }}')"
                                        class="bg-red-500 text-white px-4 py-2 text-sm rounded-md">
                                        Remove
                                    </button>
                                @endif
                            </div>
                        @endforeach

                        <div class="mt-3">
                            <button wire:click.prevent="addBatterRow"
                                class="px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                + Add Batter
                            </button>
                        </div> --}}
                        @php
                            // Collect all selected batter IDs so we can filter them out later
                            $selectedBatterIds = collect($form->batting)->pluck("batterId")->filter()->toArray();
                        @endphp

                        @foreach ($form->batting as $key => $bat)
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-5 gap-2"
                                    wire:key="batting-{{ $key }}">
                                    <!-- Batter -->
                                    <div>
                                        <label for="batterId" class="block text-sm text-gray-800 mb-1">
                                            Batter<span class="text-red-500">*</span>
                                        </label>
                                        <select wire:model="form.batting.{{ $key }}.batterId"
                                            class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px]
                                                   focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                            <option value="">-- Select Batter --</option>
                                            @foreach ($form->batters as $player)
                                                @php
                                                    $showPlayer =
                                                        !in_array($player->id, $selectedBatterIds) ||
                                                        $player->id == $bat["batterId"];
                                                @endphp

                                                @if ($showPlayer)
                                                    <option value="{{ $player->id }}"
                                                        @if ($player->id == $bat["batterId"]) selected @endif>
                                                        {{ $player->first_name_en }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Runs -->
                                    <div>
                                        <label for="runs" class="block text-sm text-gray-800 mb-1">
                                            Runs<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.batting.{{ $key }}.runs"
                                            id="runs" placeholder="Runs"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Balls -->
                                    <div>
                                        <label for="balls" class="block text-sm text-gray-800 mb-1">
                                            Balls<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.batting.{{ $key }}.balls"
                                            id="balls" placeholder="Balls"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Fours -->
                                    <div>
                                        <label for="fours" class="block text-sm text-gray-800 mb-1">
                                            4s<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.batting.{{ $key }}.fours"
                                            id="fours" placeholder="4s"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Sixes -->
                                    <div>
                                        <label for="sixes" class="block text-sm text-gray-800 mb-1">
                                            6s<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.batting.{{ $key }}.sixes"
                                            id="sixes" placeholder="6s"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                    <div>
                                        <label for="dismissal" class="block text-sm text-gray-800 mb-1">
                                            Dismissal Type<span class="text-red-500">*</span>
                                        </label>
                                        <select wire:model="form.batting.{{ $key }}.dismissal"
                                            class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px]
                                                   focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                            <option value="">-- Select Dismissal --</option>
                                            @foreach (\App\Enums\DismissalType::cases() as $type)
                                                <option value="{{ $type->value }}">{{ $type->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="fielderId" class="block text-sm text-gray-800 mb-1">
                                            Fielder
                                        </label>
                                        <select wire:model="form.batting.{{ $key }}.fielderId"
                                            id="fielderId"
                                            class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px]
                                                   focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
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
                                            Bowler
                                        </label>
                                        <select wire:model="form.batting.{{ $key }}.bowlerId" id="bowlerId"
                                            class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px]
                                                   focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                            <option value="">-- Select Bowler --</option>
                                            @foreach ($form->opponentPlayers as $player)
                                                <option value="{{ $player->id }}">
                                                    {{ $player->first_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Remove button -->
                                @if (count($form->batting) > 1)
                                    <button wire:click.prevent="removeBatterRow('{{ $key }}')"
                                        class="bg-red-500 text-white px-4 py-2 text-sm rounded-md hover:bg-red-600">
                                        Remove
                                    </button>
                                @endif
                            </div>
                        @endforeach

                        <!-- Add Batter button -->
                        <div class="mt-3">
                            <button wire:click.prevent="addBatterRow"
                                class="px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                + Add Batter
                            </button>
                        </div>

                    </div>

                    <!-- Bowling -->
                    <div x-show="tab === 'bowling'" class="space-y-4">
                        @php
                            // Collect all selected bowler IDs once
                            $selectedBowlerIds = collect($form->bowling)->pluck("bowlerId")->filter()->toArray();
                        @endphp

                        @foreach ($form->bowling as $i => $row)
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-2"
                                    wire:key="bowler-{{ $key }}">
                                    <!-- Bowler -->
                                    <div>
                                        <label for="bowlerId" class="block text-sm text-gray-800 mb-1">
                                            Bowler<span class="text-red-500">*</span>
                                        </label>
                                        <select wire:model="form.bowling.{{ $i }}.bowlerId" id="bowlerId"
                                            class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px]
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                            <option value="">-- Select Bowler --</option>
                                            @foreach ($form->opponentPlayers as $player)
                                                @php
                                                    // Show only if:
                                                    // 1. Not selected elsewhere, OR
                                                    // 2. It's the current row’s selected bowler
                                                    $showPlayer =
                                                        !in_array($player->id, $selectedBowlerIds) ||
                                                        $player->id == ($row["bowlerId"] ?? "");
                                                @endphp

                                                @if ($showPlayer)
                                                    <option value="{{ $player->id }}"
                                                        @if ($player->id == ($row["bowlerId"] ?? "")) selected @endif>
                                                        {{ $player->first_name_en }}
                                                    </option>
                                                @endif
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
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Maiden -->
                                    <div>
                                        <label for="maiden" class="block text-sm text-gray-800 mb-1">
                                            Maiden<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.bowling.{{ $i }}.maiden"
                                            id="maiden" placeholder="Maiden"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Runs -->
                                    <div>
                                        <label for="runs" class="block text-sm text-gray-800 mb-1">
                                            Runs<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.bowling.{{ $i }}.runs"
                                            id="runs" placeholder="Runs"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                    <!-- Wickets -->
                                    <div>
                                        <label for="wickets" class="block text-sm text-gray-800 mb-1">
                                            Wickets<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.bowling.{{ $i }}.wickets"
                                            id="wickets" placeholder="Wickets"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- Wides -->
                                    <div>
                                        <label for="wides" class="block text-sm text-gray-800 mb-1">
                                            Wides<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.bowling.{{ $i }}.wides"
                                            id="wides" placeholder="Wides"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                        border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                        focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>

                                    <!-- No Balls -->
                                    <div>
                                        <label for="no_balls" class="block text-sm text-gray-800 mb-1">
                                            No Balls<span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" wire:model="form.bowling.{{ $i }}.no_balls"
                                            id="no_balls" placeholder="No Balls"
                                            class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                            border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                            focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </div>
                                </div>

                                <!-- Remove button -->
                                @if (count($form->bowling) > 1)
                                    <button type="button" wire:click="removeBowlerRow({{ $i }})"
                                        class="bg-red-500 text-white mt-2 px-4 py-2 text-sm rounded-md hover:bg-red-600">
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
                                <input type="number" wire:model="form.byes" id="byes" placeholder="Byes"
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
                                <input type="number" wire:model="form.wides" id="wides" placeholder="Wides"
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
                    </div>

                    <!-- Fall of Wickets -->
                    <div x-show="tab === 'fall'" class="space-y-4">
                        {{-- @foreach ($form->wickets as $i => $row)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                <!-- Score -->
                                <div>
                                    <label for="score_{{ $i }}" class="block text-sm text-gray-800 mb-1">
                                        Score<span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" id="score_{{ $i }}"
                                        wire:model.defer="form.wickets.{{ $i }}.score" placeholder="Score"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Wicket Number -->
                                <div>
                                    <label for="wicket_{{ $i }}" class="block text-sm text-gray-800 mb-1">
                                        Wkt No.<span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" id="wicket_{{ $i }}"
                                        wire:model.defer="form.wickets.{{ $i }}.wicket"
                                        placeholder="Wicket No."
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Player Out -->
                                <div>
                                    <label for="playerOut_{{ $i }}"
                                        class="block text-sm text-gray-800 mb-1">
                                        Player Out<span class="text-red-500">*</span>
                                    </label>
                                    <select id="playerOut_{{ $i }}"
                                        wire:model.defer="form.wickets.{{ $i }}.playerOut"
                                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                        <option value="">-- Select Player Out --</option>
                                        @php
                                            // Collect all selected player IDs (from all wickets)
                                            $selectedIds = collect($form->wickets)
                                                ->pluck("playerOut")
                                                ->filter()
                                                ->toArray();

                                            // Separate batters into selected and unselected
                                            $unselected = collect($form->batters)->filter(
                                                fn($p) => !in_array($p->id, $selectedIds),
                                            );
                                            $selected = collect($form->batters)->filter(
                                                fn($p) => in_array($p->id, $selectedIds),
                                            );

                                            // Merge so unselected appear first, then selected
                                            $sortedBatters = $unselected->merge($selected);

                                            $currentPlayerOut = $form->wickets[$i]["playerOut"] ?? null;
                                        @endphp

                                        @foreach ($sortedBatters as $player)
                                            @php
                                                // Disable if already selected in another wicket
                                                $isSelectedInOther =
                                                    in_array($player->id, $selectedIds) &&
                                                    $player->id != $currentPlayerOut;
                                            @endphp

                                            <option value="{{ $player->id }}" @selected($currentPlayerOut == $player->id)
                                                @disabled($isSelectedInOther)
                                                class="{{ $isSelectedInOther ? "italic line-through text-gray-500 cursor-not-allowed opacity-60" : "text-gray-800" }}">
                                                {{ $player->first_name_en }}
                                                @if ($isSelectedInOther)
                                                    (selected)
                                                @endif
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <!-- Over -->
                                <div>
                                    <label for="over_{{ $i }}" class="block text-sm text-gray-800 mb-1">
                                        Over<span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="over_{{ $i }}"
                                        wire:model.defer="form.wickets.{{ $i }}.over"
                                        placeholder="Over (e.g. 12.3)"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Remove Button -->

                                @if (count($form->wickets) > 1)
                                    <button type="button" wire:click="removeWicketRow({{ $i }})"
                                        class="w-20 bg-red-500 text-white px-4 py-2 text-sm rounded-md hover:bg-red-600 transition">
                                        Remove
                                    </button>
                                @endif

                            </div>
                        @endforeach

                        <!-- Add Row Button -->
                        <button type="button" wire:click="addWicketRow"
                            class="mt-3 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                            + Add Wicket
                        </button> --}}
                        @php
                            // Collect all selected player IDs (who got out)
                            $selectedPlayerOutIds = collect($form->wickets)->pluck("playerOut")->filter()->toArray();
                        @endphp

                        @foreach ($form->wickets as $key => $row)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 items-end"
                                wire:key="wickets-{{ $key }}">
                                <!-- Score -->
                                <div>
                                    <label for="score_{{ $key }}" class="block text-sm text-gray-800 mb-1">
                                        Score<span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" id="score_{{ $key }}"
                                        wire:model.defer="form.wickets.{{ $key }}.score" placeholder="Score"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                        border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                        focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Wicket Number -->
                                <div>
                                    <label for="wicket_{{ $key }}" class="block text-sm text-gray-800 mb-1">
                                        Wkt No.<span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" id="wicket_{{ $key }}"
                                        wire:model.defer="form.wickets.{{ $key }}.wicket" disabled
                                        class="w-full px-4 py-2.5 bg-gray-100 text-gray-500 text-sm border border-gray-200 rounded-md focus:ring-0 focus:outline-none" />
                                </div>

                                <!-- Player Out -->
                                <div>
                                    <label for="playerOut_{{ $key }}"
                                        class="block text-sm text-gray-800 mb-1">
                                        Player Out<span class="text-red-500">*</span>
                                    </label>
                                    <select id="playerOut_{{ $key }}"
                                        wire:model.defer="form.wickets.{{ $key }}.playerOut"
                                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px]
                                        focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                                        <option value="">-- Select Player Out --</option>

                                        @foreach ($form->batters as $player)
                                            @php
                                                // Show only unselected or currently selected player
                                                $currentPlayerOut = $row["playerOut"] ?? "";
                                                $showPlayer =
                                                    !in_array($player->id, $selectedPlayerOutIds) ||
                                                    $player->id == $currentPlayerOut;
                                            @endphp

                                            @if ($showPlayer)
                                                <option value="{{ $player->id }}"
                                                    @if ($player->id == $currentPlayerOut) selected @endif>
                                                    {{ $player->first_name_en }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Over -->
                                <div>
                                    <label for="over_{{ $key }}" class="block text-sm text-gray-800 mb-1">
                                        Over<span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="over_{{ $key }}"
                                        wire:model.defer="form.wickets.{{ $key }}.over"
                                        placeholder="Over (e.g. 12.3)"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm
                                        border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0
                                        focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Remove Button -->
                                @if (count($form->wickets) > 1)
                                    <button type="button" wire:click="removeWicketRow({{ $key }})"
                                        class="w-20 bg-red-500 text-white px-4 py-2 text-sm rounded-md hover:bg-red-600 transition">
                                        Remove
                                    </button>
                                @endif
                            </div>
                        @endforeach

                        <!-- Add Row Button -->
                        <button type="button" wire:click="addWicketRow"
                            class="mt-3 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                            + Add Wicket
                        </button>

                    </div>

                    <!-- Commentary -->
                    <div x-show="tab === 'commentary'" class="space-y-4">
                        @foreach ($form->commentary as $index => $item)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2 items-end">
                                <!-- Over -->
                                <div>
                                    <label class="block text-sm text-gray-800 mb-1">End Of Over</label>
                                    <input type="number" step="0.1"
                                        wire:model="form.commentary.{{ $index }}.over_number"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Runs -->
                                <div>
                                    <label class="block text-sm text-gray-800 mb-1">Score At</label>
                                    <input type="text" wire:model="form.commentary.{{ $index }}.score_at"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Balls -->
                                <div>
                                    <label class="block text-sm text-gray-800 mb-1">Ball Number</label>
                                    <input type="text"
                                        wire:model="form.commentary.{{ $index }}.ball_number"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Ball Runs -->
                                <div>
                                    <label class="block text-sm text-gray-800 mb-1">Ball Per Runs</label>
                                    <input type="text"
                                        wire:model="form.commentary.{{ $index }}.ball_per_run"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                </div>

                                <!-- Commentary Text -->
                                <div class="col-span-2 md:col-span-5">
                                    <label class="block text-sm text-gray-800 mb-1">Description</label>
                                    <textarea wire:model="form.commentary.{{ $index }}.description" rows="2"
                                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                                    </textarea>
                                </div>

                                <!-- Remove Button -->
                                <div>
                                    @if (count($form->commentary) > 1)
                                        <button type="button" wire:click="removeCommentaryRow({{ $index }})"
                                            class="w-20 bg-red-500 text-white px-4 py-2 text-sm rounded-md hover:bg-red-600">
                                            Remove
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <button type="button" wire:click="addCommentaryRow"
                            class="mt-2 px-4 py-2 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            + Add Commentary
                        </button>
                    </div>
                </main>
            </div>
        </div>

    </form>
</div>
