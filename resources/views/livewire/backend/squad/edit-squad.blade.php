<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Edit Squad
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit Squad</li>
            </ol>
        </nav>
    </div>
    <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
        <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Squad Information</h2>
        <form method="post" class="space-y-6">
            <!-- Squad Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tournament -->
                <div>
                    <div x-data="{
                        tournamentSelect: null,
                        initTomSelect() {
                            this.tournamentSelect = new TomSelect(this.$refs.tournamentSelect, {
                                plugins: ['remove_button'],
                                create: false,
                                persist: false,
                                placeholder: 'Select tournament',
                                maxItems: 1,
                                mode: 'multi',
                                onChange: (value) => {
                                    Livewire.find('{{ $this->getId() }}').set('form.tournamentId', value);
                                }
                            });
                    
                            let tournaments = @js($form->tournaments);
                            tournaments.forEach(tournament => {
                                this.tournamentSelect.addOption({ value: tournament.id, text: tournament.name_en });
                            });
                            this.tournamentSelect.refreshOptions(false);
                    
                            let selectedTournament = @js($form->tournamentId);
                            if (selectedTournament) {
                                this.tournamentSelect.setValue(selectedTournament);
                            }
                    
                            Livewire.on('tournament-updated', (data) => {
                                this.tournamentSelect.clearOptions();
                                data.tournaments.forEach(tournament => {
                                    this.tournamentSelect.addOption({ value: tournament.id, text: tournament.name_en });
                                });
                                this.tournamentSelect.refreshOptions(false);
                                this.tournamentSelect.clear();
                            });
                        }
                    }" x-init="initTomSelect()" wire:ignore>
                        <label for="tournamentId" class="block text-sm text-neutral-600 dark:text-neutral-400 mb-1">
                            Tournament <span class="text-red-500">*</span>
                        </label>
                        <select x-ref="tournamentSelect" id="tournamentId" style="display:none"></select>
                    </div>
                    @error("form.tournamentId")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Match -->
                <div>
                    <div x-data="{
                        matchSelect: null,
                        initTomSelect() {
                            this.matchSelect = new TomSelect(this.$refs.matchSelect, {
                                plugins: ['remove_button'],
                                create: false,
                                persist: false,
                                placeholder: 'Select match',
                                maxItems: 1,
                                mode: 'multi',
                                onChange: (value) => {
                                    Livewire.find('{{ $this->getId() }}').set('form.matchId', value);
                                }
                            });
                
                            let matches = @js($form->matches);
                            matches.forEach(match => {
                                this.matchSelect.addOption({ value: match.id, text: match.name });
                            });
                            this.matchSelect.refreshOptions(false);
                            let selectedMatch = @js($form->matchId);
                            if (selectedMatch) {
                                this.matchSelect.setValue(selectedMatch);
                            }
                            Livewire.on('match-updated', (data) => {
                                this.matchSelect.clearOptions();
                                data.matches.forEach(match => {
                                    this.matchSelect.addOption({ value: match.id, text: match.name });
                                });
                                this.matchSelect.refreshOptions(false);
                                this.matchSelect.clear();
                            });
                        }
                    }" x-init="initTomSelect()" wire:ignore>
                        <label for="matchId" class="block text-sm text-neutral-600 dark:text-neutral-400 mb-1">
                            Match <span class="text-red-500">*</span>
                        </label>

                        <select x-ref="matchSelect" id="matchId" style="display:none"></select>
                    </div>
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

                <!-- Players -->
                <div>
                    <div x-data="{
                        playerSelect: null,
                        initialPlayers: @js($initialPlayers),
                        initialSelectedPlayerIds: @js($initialSelectedPlayerIds),
                        initTomSelect() {
                            this.playerSelect = new TomSelect(this.$refs.playerSelect, {
                                plugins: ['remove_button'],
                                create: false,
                                persist: false,
                                placeholder: 'Select players',
                                valueField: 'id',
                                labelField: 'first_name_en',
                                searchField: 'first_name_en',
                                onChange: (value) => {
                                    Livewire.find('{{ $this->getId() }}').set('form.playerId', value);
                                },
                                render: {
                                    option: (data, escape) => `<div>${escape(data.first_name_en)}</div>`,
                                    item: (data, escape) => `<div>${escape(data.first_name_en)}</div>`
                                }
                            });
                    
                            (this.initialPlayers || []).forEach(p => {
                                this.playerSelect.addOption({ id: String(p.id), first_name_en: p.first_name_en });
                            });
                            this.playerSelect.refreshOptions(false);
                    
                            if (this.initialSelectedPlayerIds && this.initialSelectedPlayerIds.length) {
                                this.playerSelect.setValue(this.initialSelectedPlayerIds.map(String));
                            }
                    
                            Livewire.on('players-updated', (data) => {
                                this.playerSelect.clear();
                                this.playerSelect.clearOptions(); 
                    
                                (data.players || []).forEach(p => {
                                    this.playerSelect.addOption({
                                        id: String(p.id),
                                        first_name_en: p.first_name_en
                                    });
                                });
                    
                                this.playerSelect.refreshOptions(false);
                            });
                    
                        }
                    }" x-init="initTomSelect()" wire:ignore>
                        <label for="playerId" class="block text-sm text-neutral-600 dark:text-neutral-400 mb-1">
                            Players<span class="text-red-500">*</span>
                        </label>
                        <select x-ref="playerSelect" id="playerId" multiple style="display:none"></select>
                    </div>
                    @error("form.playerId")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
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
</div>
