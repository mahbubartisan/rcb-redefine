<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Create Team
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Create Team</li>
            </ol>
        </nav>
    </div>
    <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
        <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Team Information</h2>
        <form method="post" class="space-y-4">
            <!-- Team Name (EN) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Team Name (EN) -->
                <div>
                    <label for="name_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Team Name (EN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.name_en" id="name_en"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.name_en")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Team Name (BAN) -->
                <div>
                    <label for="name_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Team Name (BAN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.name_bn" id="name_bn"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.name_bn")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Players -->
            <div x-data x-init="new TomSelect($refs.playerSelect, {
                plugins: ['remove_button'],
                create: false,
                persist: false,
                placeholder: 'Select player',
                onChange: function(value) {
                    Livewire.find('{{ $this->getId() }}').set('form.playerId', value);
                }
            });" wire:ignore>
                <label for="playerId" class="block text-sm text-neutral-600 dark:text-neutral-400">
                    Players<span class="text-red-500">*</span>
                </label>

                <select x-ref="playerSelect" id="playerId" multiple style="display: none" class="tom-select mt-2">
                    @foreach ($form->players as $player)
                        <option value="{{ $player->id }}"
                            {{ in_array($player->id, (array) $form->playerId) ? "selected" : "" }}>
                            {{ $player->first_name_en }}
                        </option>
                    @endforeach
                </select>

                @error("form.playerId")
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image -->
            <div x-data="{ previewChanging: false }" x-on:livewire-upload-start="previewChanging = true"
                x-on:livewire-upload-finish="previewChanging = false"
                x-on:livewire-upload-error="previewChanging = false"
                x-on:livewire-upload-cancel="previewChanging = false">

                <!-- Input -->
                <label for="photo" class="block text-sm text-gray-700 dark:text-gray-400">
                    Team Logo
                </label>
                <input type="file" wire:model="form.photo" id="photo"
                    class="w-full mt-2 px-4 py-2 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                @error("form.photo")
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

                <!-- Preview -->
                <div
                    class="mt-2 w-20 h-20 rounded-md overflow-hidden border border-gray-200 flex items-center justify-center">
                    @if ($form->photo)
                        @php
                            $mime = $form->photo->getMimeType();
                        @endphp

                        @if (Str::startsWith($mime, "image/"))
                            <img src="{{ $form->photo->temporaryUrl() }}" alt="Preview"
                                class="w-full h-full object-cover transition duration-500"
                                :class="{ 'blur-sm scale-105': previewChanging }" />
                        @else
                            <!-- Non-image files -->
                            <div class="text-xs text-gray-600 text-center">
                                {{ $form->photo->getClientOriginalName() }}
                            </div>
                        @endif
                    @else
                        <img src="{{ asset("images/user_profile.webp") }}" alt="Default Preview"
                            class="w-full h-full object-cover transition duration-500"
                            :class="{ 'blur-sm scale-105': previewChanging }" />
                    @endif
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
        </form>
    </div>

</div>
