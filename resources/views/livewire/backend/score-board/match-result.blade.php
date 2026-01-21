<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
           Match Result
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Match Result</li>
            </ol>
        </nav>
    </div>
    <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
        <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Match Result Information</h2>
        <form method="post" class="space-y-6">
            <!-- Toss -->
            <div>
                <label for="toss" class="block text-sm text-gray-800 mb-1">
                    Toss
                </label>
                <input type="text" wire:model="form.toss" id="toss" placeholder="Toss"
                    class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="team1_score" class="block text-sm text-gray-800 mb-1">
                        Team A Score
                    </label>
                    <input type="text" wire:model="form.team1_score" id="team1_score" placeholder="Team A Score"
                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>

                <div>
                    <label for="team1_played_over" class="block text-sm text-gray-800 mb-1">
                        Team A Played Over
                    </label>
                    <input type="text" wire:model="form.team1_played_over" id="team1_played_over" placeholder="Team A Played Over"
                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>

                <div>
                    <label for="team2_score" class="block text-sm text-gray-800 mb-1">
                        Team B Score
                    </label>
                    <input type="text" wire:model="form.team2_score" id="team2_score" placeholder="Team 2 Score"
                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>

                <div>
                    <label for="team2_played_over" class="block text-sm text-gray-800 mb-1">
                        Team B Played Over
                    </label>
                    <input type="text" wire:model="form.team2_played_over" id="team2_played_over" placeholder="Team B Played Over"
                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>

                <div>
                    <label for="match_result" class="block text-sm text-gray-800 mb-1">
                        Match Result
                    </label>
                    <input type="text" wire:model="form.match_result" id="match_result" placeholder="Match Result"
                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                </div>

                <!-- Player Of Match -->
                <div>
                    <label for="player_of_match" class="block text-sm text-gray-800 mb-1">
                        Player Of Match
                    </label>
                    <select wire:model="form.player_of_match" id="player_of_match"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select Player --</option>
                        @foreach ($form->players as $player)
                            <option value="{{ $player->id }}">
                                {{ $player->first_name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Who Won -->
                <div>
                    <label for="won" class="block text-sm text-gray-800 mb-1">
                        Who Won
                    </label>
                    <select wire:model="form.won" id="won"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select Team --</option>
                        @foreach ($form->teams as $team)
                            <option value="{{ $team->id }}">
                                {{ $team->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Match Status -->
                <div>
                    <label for="type" class="block text-sm text-gray-800 mb-1">
                        Match Status
                    </label>
                    <select wire:model="form.type" id="type"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[10.5px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select Type --</option>
                        <option value="0">Upcoming</option>
                        <option value="1">Complete</option>
                        <option value="2">Abandoned</option>
                    </select>
                </div>
            </div>

            <!-- Create Button -->
            <div class="flex justify-end space-x-3 mt-5">
                <button type="reset"
                    class="px-4 py-2.5 rounded-md text-sm text-red-500 hover:bg-red-100 transition-colors duration-300">
                    Reset
                </button>
                <button wire:click='matchResult' type="button"
                    class="flex items-center justify-center w-full px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 rounded-md sm:w-auto sm:px-4 sm:py-2 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mr-2 h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
