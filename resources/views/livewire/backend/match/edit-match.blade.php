<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Edit Match
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit Match</li>
            </ol>
        </nav>
    </div>
    <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
        <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Match Information</h2>
        <form method="post" class="space-y-6">
            <!-- Match Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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

                <!-- Match Name -->
                <div>
                    <label for="name" class="block text-sm text-gray-700 dark:text-gray-400 mb-1">
                        Match Name<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.name" id="name" placeholder="Enter Match Name"
                        class="w-full px-4 py-[9.5px] bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.name")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date & Time -->
                <div>
                    <label for="date_time" class="block text-sm text-gray-700 dark:text-gray-400 mb-1">
                        Date & Time<span class="text-red-500">*</span>
                    </label>
                    <input type="datetime-local" wire:model="form.date_time" id="date_time"
                        class="w-full px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.date_time")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Venue -->
                <div>
                    <label for="venue" class="block text-sm text-gray-700 dark:text-gray-400 mb-1">
                        Venue<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.venue" id="venue" placeholder="Enter Venue Name"
                        class="w-full px-4 py-[11px] bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.venue")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Team 1 -->
                <div>
                    <label for="team1Id" class="block text-sm text-gray-800 mb-1">
                        Team 1<span class="text-red-500">*</span>
                    </label>
                    <select wire:model='form.team1Id' id="team1Id"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a Team --</option>
                        @foreach ($form->teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name_en }}</option>
                        @endforeach
                    </select>
                    @error("form.team1Id")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Team 2 -->
                <div>
                    <label for="team2Id" class="block text-sm text-gray-800 mb-1">
                        Team 2<span class="text-red-500">*</span>
                    </label>
                    <select wire:model='form.team2Id' id="team2Id"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a Team --</option>
                        @foreach ($form->teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name_en }}</option>
                        @endforeach
                    </select>
                    @error("form.team2Id")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Match Info -->
            <div>
                <label for="match_info" class="mb-2 block text-sm text-gray-700 dark:text-gray-400">
                    Match Info
                </label>
                <div wire:ignore>
                    <textarea wire:model="form.match_info" id="match_info"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] focus:ring-0 focus:outline-none resize-none focus:border-blue-600 transition duration-300 ease-in-out">
                    </textarea>
                </div>
                @error("form.match_info")
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status -->
            <div class="text-sm">
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
            </div>

            <!-- Create Button -->
            <div class="flex justify-end space-x-3 mt-5">
                <button type="reset"
                    class="px-4 py-2.5 rounded-md text-sm text-red-500 hover:bg-red-100 transition-colors duration-300">
                    Reset
                </button>
                <button wire:click='update' type="button"
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

    <!-- Summernote JS -->
    <script>
        document.addEventListener("livewire:navigated", function() {
            // Match Info Summernote
            $('#match_info').summernote({
                height: 200,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "italic", "underline", "clear"]],
                    ["fontname", ["fontname"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["insert", ["link"]],
                    ["view", ["fullscreen", "codeview"]],
                ],
                callbacks: {
                    onChange: function(contents) {
                        @this.set('form.match_info', contents);
                    },
                }
            });

            // --- Load existing values into Summernote (edit mode) ---
            Livewire.hook('message.processed', (message, component) => {
                let matchInfo = @this.get('form.match_info');
                if ($('#match_info').summernote('isEmpty') && matchInfo) {
                    $('#match_info').summernote('code', matchInfo);
                }
            });
        });
    </script>
</div>
