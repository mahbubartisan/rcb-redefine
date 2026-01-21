<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Edit Player
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit Player</li>
            </ol>
        </nav>
    </div>
    <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow">
        <h2 class="text-[15px] text-gray-900 dark:text-gray-300 font-medium mb-4">Player Information</h2>
        <form method="post" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Image -->
                <div x-data="{ previewChanging: false }" x-on:livewire-upload-start="previewChanging = true"
                    x-on:livewire-upload-finish="previewChanging = false"
                    x-on:livewire-upload-error="previewChanging = false"
                    x-on:livewire-upload-cancel="previewChanging = false">

                    <!-- Input -->
                    <label for="photo" class="block text-sm text-gray-700 dark:text-gray-400">
                        Player Image
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
                        @elseif($form->player->media?->path)
                            <img src="{{ asset($form->player->media?->path) }}" alt="Current Image"
                                class="w-full h-full object-cover transition duration-500"
                                :class="{ 'blur-sm scale-105': previewChanging }" />
                        @else
                            <img src="{{ asset("images/user_profile.webp") }}" alt="Default Preview"
                                class="w-full h-full object-cover transition duration-500"
                                :class="{ 'blur-sm scale-105': previewChanging }" />
                        @endif
                    </div>

                </div>

                <!-- Role Icon -->
                <div>
                    <label for="role_icon" class="block text-sm text-gray-700 dark:text-gray-400">
                        Role Icon
                    </label>
                    <div class="mt-2 flex gap-4">
                        @foreach ($icons as $icon)
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="radio" wire:model="form.role_icon" value="{{ $icon->id }}"
                                    class="text-blue-600 focus:ring-0" />
                                <img src="{{ asset($icon->media?->path) }}" alt="Icon"
                                    class="w-12 h-12 rounded-full object-cover border border-gray-200" />
                            </label>
                        @endforeach
                    </div>
                    @error("form.role_icon")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- First Name -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- First Name (EN) -->
                <div>
                    <label for="first_name_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        First Name (EN)
                    </label>
                    <input type="text" wire:model="form.first_name_en" id="first_name_en"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.first_name_en")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- First Name (BAN) -->
                <div>
                    <label for="first_name_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        First Name (BAN)
                    </label>
                    <input type="text" wire:model="form.first_name_bn" id="first_name_bn"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.first_name_bn")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Last Name -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Last Name (EN) -->
                <div>
                    <label for="last_name_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Last Name (EN)
                    </label>
                    <input type="text" wire:model="form.last_name_en" id="last_name_en"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.last_name_en")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Last Name (BAN) -->
                <div>
                    <label for="last_name_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Last Name (BAN)
                    </label>
                    <input type="text" wire:model="form.last_name_bn" id="last_name_bn"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.last_name_bn")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- District & Thana -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- District -->
                <div>
                    <label for="district_id" class="block text-sm text-gray-700 dark:text-gray-400">
                        District
                    </label>
                    <select wire:model.live='form.district_id' id="district_id"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a District --</option>
                        @foreach ($form->districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                    @error("form.district_id")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Thana -->
                <div>
                    <label for="thana_id" class="block text-sm text-gray-700 dark:text-gray-400">
                        Thana
                    </label>
                    <select wire:model='form.thana_id' id="thana_id"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed"
                        @disabled(empty($form->thanas))>
                        <option value="">-- Select a Thana --</option>
                        @foreach ($form->thanas as $thana)
                            <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                        @endforeach
                    </select>
                    @error("form.thana_id")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Village & Post Office -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Village -->
                <div>
                    <label for="village" class="block text-sm text-gray-700 dark:text-gray-400">
                        Village
                    </label>
                    <input type="text" wire:model="form.village" id="village"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.village")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Post Office  -->
                <div>
                    <label for="post_office" class="block text-sm text-gray-700 dark:text-gray-400">
                        Post Office
                    </label>
                    <input type="text" wire:model="form.post_office" id="post_office"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 rounded-md dark:border-[#233A57] focus:ring-0 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.post_office")
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Religion & Blood Group -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Religion -->
                <div>
                    <label for="religion" class="block text-sm text-gray-800 mb-1">
                        Religion
                    </label>
                    <select wire:model='form.religion' id="religion"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a Religion --</option>
                        @foreach (\App\Enums\Religion::cases() as $religion)
                            <option value="{{ $religion->value }}">{{ $religion->value }}</option>
                        @endforeach
                    </select>
                    @error("form.religion")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Blood Group -->
                <div>
                    <label for="blood_group" class="block text-sm text-gray-800 mb-1">
                        Blood Group
                    </label>
                    <select wire:model='form.blood_group' id="blood_group"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a Blood Group --</option>
                        @foreach (\App\Enums\BloodGroup::cases() as $bloodGroup)
                            <option value="{{ $bloodGroup->value }}">{{ $bloodGroup->value }}</option>
                        @endforeach
                    </select>
                    @error("form.blood_group")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Playing Role & Date of Birth -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Playing Role -->
                <div>
                    <label for="playing_role" class="block text-sm text-gray-800 mb-1">
                        Playing Role
                    </label>
                    <select wire:model='form.playing_role' id="playing_role"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select a Role --</option>
                        @foreach (\App\Enums\PlayerRole::cases() as $role)
                            <option value="{{ $role->value }}">{{ $role->value }}</option>
                        @endforeach
                    </select>
                    @error("form.playing_role")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="dob" class="block text-sm text-gray-800 mb-1">
                        Date of Birth
                    </label>
                    <input type="date" wire:model='form.dob' id="dob"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.dob")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Nationality -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nationality -->
                <div>
                    <label for="nationality_en" class="block text-sm text-gray-800 mb-1">
                        Nationality (EN)
                    </label>
                    <select wire:model='form.nationality_en' id="nationality_en"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="Bangladesh ">Bangladesh</option>
                    </select>
                    @error("form.nationality_en")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nationality(BAN) -->
                <div>
                    <label for="nationality_bn" class="block text-sm text-gray-800 mb-1">
                        Nationality (BAN)
                    </label>
                    <select wire:model='form.nationality_bn' id="nationality_bn"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="বাংলাদেশ ">বাংলাদেশ</option>
                    </select>
                    @error("form.nationality_bn")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Style -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Batting Style -->
                <div>
                    <label for="batting_style" class="block text-sm text-gray-800 mb-1">
                        Batting Style
                    </label>
                    <select wire:model='form.batting_style' id="batting_style"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select Batting Style --</option>
                        <option value="Right Handed">Right Handed</option>
                        <option value="Left Handed">Left Handed</option>
                    </select>
                    @error("form.batting_style")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Bowling Style -->
                <div>
                    <label for="bowling_style" class="block text-sm text-gray-800 mb-1">
                        Bowling Style
                    </label>
                    <select wire:model='form.bowling_style' id="bowling_style"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out">
                        <option value="">-- Select Bowling Style --</option>
                        <option value="Right Arm Fast">Right Arm Fast</option>
                        <option value="Right Arm Medium">Right Arm Medium</option>
                        <option value="Left Arm Fast">Left Arm Fast</option>
                        <option value="Left Arm Medium">Left Arm Medium</option>
                        <option value="Right Arm Off Break">Right Arm Off Break</option>
                        <option value="Right Arm Leg Break">Right Arm Leg Break</option>
                        <option value="Left Arm Orthodox Spin">Left Arm Orthodox Spin</option>
                        <option value="Left Arm Wrist Spin">Left Arm Wrist Spin</option>
                    </select>
                    @error("form.bowling_style")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Debut & Player Tag -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Debut -->
                <div>
                    <label for="debut" class="block text-sm text-gray-800 mb-1">
                        Debut
                    </label>
                    <input type="date" wire:model='form.debut' id="debut"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.debut")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Player Tag -->
                <div>
                    <label for="player_tag" class="block text-sm text-gray-800 mb-1">
                        Player Tag
                    </label>
                    <input type="text" wire:model='form.player_tag' id="player_tag"
                        class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-blue-600 transition duration-300 ease-in-out" />
                    @error("form.player_tag")
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Description EN -->
            <div>
                <label for="description_en" class="mb-2 block text-sm text-gray-700 dark:text-gray-400">
                    Description (EN)
                </label>
                <div wire:ignore>
                    <textarea wire:model="form.description_en" id="description_en"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] focus:ring-0 focus:outline-none resize-none focus:border-blue-600 transition duration-300 ease-in-out">
                    </textarea>
                </div>
                @error("form.description_en")
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description BN -->
            <div>
                <label for="description_bn" class="mb-2 block text-sm text-gray-700 dark:text-gray-400">
                    Description (BAN)
                </label>
                <div wire:ignore>
                    <textarea wire:model="form.description_bn" id="description_bn"
                        class="w-full mt-2 px-4 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] focus:ring-0 focus:outline-none resize-none focus:border-blue-600 transition duration-300 ease-in-out">
                    </textarea>
                </div>
                @error("form.description_bn")
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
            // English Summernote
            $('#description_en').summernote({
                height: 200,

                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "italic", "underline", "clear"]],
                    ["fontname", ["fontname"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["insert", ["link"]],
                    ["view", ["fullscreen"]],
                ],

                callbacks: {
                    onChange: function(contents) {
                        @this.set('form.description_en', contents);
                    },
                }
            });

            // Bengali Summernote
            $('#description_bn').summernote({
                height: 200,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "italic", "underline", "clear"]],
                    ["fontname", ["fontname"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["table", ["table"]],
                    ["insert", ["link"]],
                    ["view", ["fullscreen"]],
                ],
                callbacks: {
                    onChange: function(contents) {
                        @this.set('form.description_bn', contents);
                    },
                }
            });

            // --- Load existing values into Summernote (edit mode) ---
            Livewire.hook('message.processed', (message, component) => {
                let descEn = @this.get('form.description_en');
                if ($('#description_en').summernote('isEmpty') && descEn) {
                    $('#description_en').summernote('code', descEn);
                }

                let descBn = @this.get('form.description_bn');
                if ($('#description_bn').summernote('isEmpty') && descBn) {
                    $('#description_bn').summernote('code', descBn);
                }
            });
        });
    </script>

</div>
