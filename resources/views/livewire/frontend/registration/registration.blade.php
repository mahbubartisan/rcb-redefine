<div>
    <!-- Personal Info -->
    <section class="mt-20 lg:mt-8">
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
            <!-- Title -->
            <div class="text-center mb-4">
                <h1 class="text-3xl font-bold text-gray-900">
                    Let’s Play Together
                </h1>
                <p class="text-[15px] text-gray-500">
                    Join our team, make new friends, and enjoy the game you love!
                </p>
            </div>
    
            <div
                class="mx-auto bg-gradient-to-tr from-teal-50 to-white rounded-xl shadow-sm py-11 px-4 sm:px-6 lg:px-11 max-w-4xl">
                <!-- Form -->
                <form wire:submit.prevent='store' class="space-y-8">
                    <!-- Image Upload Section -->
                    <div class="flex flex-col items-center mb-6" x-data="{ previewChanging: false }"
                        x-on:livewire-upload-start="previewChanging = true"
                        x-on:livewire-upload-finish="previewChanging = false"
                        x-on:livewire-upload-error="previewChanging = false"
                        x-on:livewire-upload-cancel="previewChanging = false">
    
                        <!-- Clickable upload area -->
                        <label for="photo"
                            class="w-full max-w-md mx-auto flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-md cursor-pointer hover:border-teal-500 transition-colors duration-300 py-12">
                            <svg class="h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M320 367.79h76c55 0 100-29.21 100-83.6s-53-81.47-96-83.6c-8.89-85.06-71-136.8-144-136.8-69 0-113.44 45.79-128 91.2-60 5.7-112 43.88-112 106.4s54 106.4 120 106.4h56"
                                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="21" />
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="21" d="M320 255.79l-64-64-64 64M256 448.21V207.79" />
                            </svg>
                            <span class="text-gray-500 text-sm mt-3">Click to upload</span>
                            <span class="text-gray-400 text-xs mt-1">Supported formats: JPG, PNG, WEBP (Max 2MB)</span>
                            <input type="file" wire:model="form.photo" id="photo" accept="image/*" class="hidden" />
                        </label>
    
                        <!-- Preview -->
                        <div class="mt-4 w-24 h-24 rounded-md overflow-hidden border border-gray-200">
                            @if ($form->photo)
                                <img src="{{ $form->photo->temporaryUrl() }}" alt="Preview"
                                    class="w-full h-full object-cover transition duration-500"
                                    :class="{ 'blur-sm scale-105': previewChanging }" />
                            @else
                                <img src="{{ asset("images/user_profile.webp") }}" alt="Default Preview"
                                    class="w-full h-full object-cover transition duration-500"
                                    :class="{ 'blur-sm scale-105': previewChanging }" />
                            @endif
                        </div>
    
                        <!-- Preview text -->
                        <p class="mt-2 text-sm text-gray-500">
                            Image Preview
                        </p>
                    </div>
    
                    <!-- Personal Information -->
                    <div>
                        <h3 class="flex items-center mb-4">
                            <span class="flex-grow border-t border-gray-200"></span>
                            <span class="mx-4 text-base font-semibold text-gray-800">
                                {{ __("messages.personal_information") }}
                            </span>
                            <span class="flex-grow border-t border-gray-200"></span>
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="full_name" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.full_name") }}<span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <!-- User Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
                                        </svg>
                                    </span>
                                    <input type="text" wire:model='form.full_name' id="full_name" placeholder="Fullname"
                                        class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                                </div>
                                @error("form.full_name")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div>
                                <label for="email" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.email") }}<span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <!-- Email Icon -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <rect x="48" y="96" width="416" height="320" rx="40" ry="40"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32" d="M112 160l144 112 144-112" />
                                        </svg>
                                    </span>
                                    <input type="email" wire:model='form.email' id="email" placeholder="Email Address"
                                        class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                                </div>
                                @error("form.email")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div>
                                <label for="phone" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.phone_number") }}<span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <!-- Phone Icon -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M451 374c-15.88-16-54.34-39.35-73-48.76-24.3-12.24-26.3-13.24-45.4.95-12.74 9.47-21.21 17.93-36.12 14.75s-47.31-21.11-75.68-49.39-47.34-61.62-50.53-76.48 5.41-23.23 14.79-36c13.22-18 12.22-21 .92-45.3-8.81-18.9-32.84-57-48.9-72.8C119.9 44 119.9 47 108.83 51.6A160.15 160.15 0 0083 65.37C67 76 58.12 84.83 51.91 98.1s-9 44.38 23.07 102.64 54.57 88.05 101.14 134.49S258.5 406.64 310.85 436c64.76 36.27 89.6 29.2 102.91 23s22.18-15 32.83-31a159.09 159.09 0 0013.8-25.8C465 391.17 468 391.17 451 374z"
                                                fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                stroke-width="32" />
                                        </svg>
                                    </span>
                                    <input type="number" wire:model='form.phone' id="phone"
                                        placeholder="Phone Number"
                                        class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                                </div>
                                @error("form.phone")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div>
                                <label for="dob"
                                    class="block text-sm text-gray-800 mb-1">{{ __("messages.dob") }}<span
                                        class="text-red-500">*</span></label>
                                <input type="date" wire:model='form.dob' id="dob"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                                @error("form.dob")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div>
                                <label for="role"
                                    class="block text-sm text-gray-800 mb-1">{{ __("messages.playing_role") }}<span
                                        class="text-red-500">*</span></label>
                                <select wire:model='form.role' id="role"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                    <option value="">-- Select a Role --</option>
                                    @foreach (\App\Enums\PlayerRole::cases() as $role)
                                        <option value="{{ $role->value }}">{{ $role->value }}</option>
                                    @endforeach
                                </select>
                                @error("form.role")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <div>
                                <label for="jersey_no"
                                    class="block text-sm text-gray-800 mb-1">{{ __("messages.jersey_size") }}<span
                                        class="text-red-500">*</span></label>
                                <select wire:model='form.jersey_no' id="jersey_no"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                    <option value="">-- Select a Jersey Size --</option>
                                    @foreach (\App\Enums\JerseySize::cases() as $size)
                                        <option value="{{ $size->value }}">{{ $size->value }}</option>
                                    @endforeach
                                </select>
                                @error("form.jersey_no")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                    <!-- Present Address -->
                    <div>
                        <h3 class="flex items-center mb-4">
                            <span class="flex-grow border-t border-gray-200"></span>
                            <span class="mx-4 text-base font-semibold text-gray-800">
                                {{ __("messages.present_address") }}
                            </span>
                            <span class="flex-grow border-t border-gray-200"></span>
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="present_village" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.village") }}<span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <!-- Home Icon -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32"
                                                d="M448 448V240M64 240v208M382.47 48H129.53c-21.79 0-41.47 12-49.93 30.46L36.3 173c-14.58 31.81 9.63 67.85 47.19 69h2c31.4 0 56.85-25.18 56.85-52.23 0 27 25.46 52.23 56.86 52.23s56.8-23.38 56.8-52.23c0 27 25.45 52.23 56.85 52.23s56.86-23.38 56.86-52.23c0 28.85 25.45 52.23 56.85 52.23h1.95c37.56-1.17 61.77-37.21 47.19-69l-43.3-94.54C423.94 60 404.26 48 382.47 48zM32 464h448M136 288h80a24 24 0 0124 24v88h0-128 0v-88a24 24 0 0124-24zM288 464V312a24 24 0 0124-24h64a24 24 0 0124 24v152" />
                                        </svg>
                                    </span>
                                    <input type="text" wire:model='form.present_village' id="present_village"
                                        placeholder="Village Name"
                                        class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                                </div>
                                @error("form.present_village")
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="present_district" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.district") }}<span class="text-red-500">*</span>
                                </label>
                                <select wire:model.live='form.present_district' id="present_district"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                    <option value="">-- Select a District --</option>
                                    @foreach ($form->districts as $district)
                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                                @error("form.present_district")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="present_thana" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.thana") }}<span class="text-red-500">*</span>
                                </label>
                                <select wire:model='form.present_thana' id="present_thana"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed"
                                    @disabled(empty($form->thanas))>
                                    <option value="">-- Select a Thana --</option>
                                    @foreach ($form->thanas as $thana)
                                        <option value="{{ $thana->name }}">{{ $thana->name }}</option>
                                    @endforeach
                                </select>
                                @error("form.present_thana")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="present_post_office" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.post_office") }}<span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <!-- Location Icon -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M256 48c-79.5 0-144 61.39-144 137 0 87 96 224.87 131.25 272.49a15.77 15.77 0 0025.5 0C304 409.89 400 272.07 400 185c0-75.61-64.5-137-144-137z"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <circle cx="256" cy="192" r="48" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="32" />
                                        </svg>
                                    </span>
                                    <input type="text" wire:model='form.present_post_office' id="present_post_office"
                                        placeholder="Postal Code"
                                        class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                                </div>
                                @error("form.present_post_office")
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                    <!-- Permanent Address -->
                    <div x-data="{ sameAsPresent: @entangle("form.sameAsPresent") }" class="">
                        <h3 class="flex items-center mb-4">
                            <span class="flex-grow border-t border-gray-200"></span>
                            <span class="mx-4 text-base font-semibold text-gray-800">
                                {{ __("messages.permanent_address") }}
                            </span>
                            <span class="flex-grow border-t border-gray-200"></span>
                        </h3>
                        <div class="mb-4 flex items-center justify-center space-x-2">
                            <input type="checkbox" id="sameAsPresent" wire:model="form.sameAsPresent"
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
                            <label for="sameAsPresent" class="text-sm text-gray-700 select-none cursor-pointer">
                                {{ __("messages.same_as_present_address") }}
                            </label>
                        </div>
    
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Village -->
                            <div>
                                <label for="permanent_village" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.village") }}<span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <!-- Home Icon -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32"
                                                d="M448 448V240M64 240v208M382.47 48H129.53c-21.79 0-41.47 12-49.93 30.46L36.3 173c-14.58 31.81 9.63 67.85 47.19 69h2c31.4 0 56.85-25.18 56.85-52.23 0 27 25.46 52.23 56.86 52.23s56.8-23.38 56.8-52.23c0 27 25.45 52.23 56.85 52.23s56.86-23.38 56.86-52.23c0 28.85 25.45 52.23 56.85 52.23h1.95c37.56-1.17 61.77-37.21 47.19-69l-43.3-94.54C423.94 60 404.26 48 382.47 48zM32 464h448M136 288h80a24 24 0 0124 24v88h0-128 0v-88a24 24 0 0124-24zM288 464V312a24 24 0 0124-24h64a24 24 0 0124 24v152" />
                                        </svg>
                                    </span>
                                    <input type="text" wire:model='form.permanent_village' id="permanent_village"
                                        placeholder="Village Name" x-bind:disabled="sameAsPresent"
                                        :value="sameAsPresent ? $wire.form.present_village : $wire.form.permanent_village"
                                        @input="$wire.set('form.permanent_village', $event.target.value)"
                                        class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed" />
                                </div>
                            </div>
    
                            <!-- District -->
                            <div>
                                <label for="permanent_district" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.district") }}<span class="text-red-500">*</span>
                                </label>
                                <select wire:model.live='form.permanent_district' id="permanent_district"
                                    x-bind:disabled="sameAsPresent"
                                    :value="sameAsPresent ? $wire.form.present_district : $wire.form.permanent_district"
                                    @input="$wire.set('form.permanent_district', $event.target.value)"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed">
                                    <option value="">-- Select a District --</option>
                                    @foreach ($form->districts as $district)
                                        <option value="{{ $district->name }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <!-- Thana -->
                            <div>
                                <label for="permanent_thana" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.thana") }}<span class="text-red-500">*</span>
                                </label>
                                <select wire:model='form.permanent_thana' id="permanent_thana"
                                    x-bind:disabled="sameAsPresent || {{ count($form->thanas ?? []) }} === 0"
                                    :value="sameAsPresent ? $wire.form.present_thana : $wire.form.permanent_thana"
                                    @input="$wire.set('form.permanent_thana', $event.target.value)"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed">
                                    <option value="">-- Select a Thana --</option>
                                    @foreach ($form->thanas as $thana)
                                        <option value="{{ $thana->name }}">{{ $thana->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <!-- Post Office -->
                            <div>
                                <label for="permanent_post_office" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.post_office") }}<span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <!-- Location Icon -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M256 48c-79.5 0-144 61.39-144 137 0 87 96 224.87 131.25 272.49a15.77 15.77 0 0025.5 0C304 409.89 400 272.07 400 185c0-75.61-64.5-137-144-137z"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32" />
                                            <circle cx="256" cy="192" r="48" fill="none"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="32" />
                                        </svg>
                                    </span>
                                    <input type="text" wire:model='form.permanent_post_office'
                                        id="permanent_post_office" placeholder="Post Office"
                                        x-bind:disabled="sameAsPresent"
                                        :value="sameAsPresent ? $wire.form.present_post_office : $wire.form.permanent_post_office"
                                        @input="$wire.set('form.permanent_post_office', $event.target.value)"
                                        class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed" />
                                </div>
                            </div>
    
                            <!-- Nationality -->
                            <div>
                                <label for="nationality" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.nationality") }}<span class="text-red-500">*</span>
                                </label>
                                <select wire:model='form.nationality' id="nationality"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                    <option value="Bangladeshi">Bangladeshi</option>
                                </select>
                                @error("form.nationality")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <!-- Religion -->
                            <div>
                                <label for="religion" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.religion") }}<span class="text-red-500">*</span>
                                </label>
                                <select wire:model='form.religion' id="religion"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
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
                                    {{ __("messages.blood_group") }}<span class="text-red-500">*</span>
                                </label>
                                <select wire:model='form.blood_group' id="blood_group"
                                    class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                    <option value="">-- Select a Blood Group --</option>
                                    @foreach (\App\Enums\BloodGroup::cases() as $bloodGroup)
                                        <option value="{{ $bloodGroup->value }}">{{ $bloodGroup->value }}</option>
                                    @endforeach
                                </select>
                                @error("form.blood_group")
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <!-- Height -->
                            <div>
                                <label for="height" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.height") }}<span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <!-- Ruler Icon -->
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12 19.875c0 .621 -.512 1.125 -1.143 1.125h-5.714a1.134 1.134 0 0 1 -1.143 -1.125v-15.875a1 1 0 0 1 1 -1h5.857c.631 0 1.143 .504 1.143 1.125z" />
                                            <path d="M12 9h-2" />
                                            <path d="M12 6h-3" />
                                            <path d="M12 12h-3" />
                                            <path d="M12 18h-3" />
                                            <path d="M12 15h-2" />
                                            <path d="M21 3h-4" />
                                            <path d="M19 3v18" />
                                            <path d="M21 21h-4" />
                                        </svg>
                                    </span>
                                    <input type="text" wire:model='form.height' id="height"
                                        placeholder="e.g. 5'8&quot;"
                                        class="w-full pl-11 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                                </div>
                                @error("form.height")
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <!-- Facebook ID -->
                            <div class="sm:col-span-2">
                                <label for="facebook_id" class="block text-sm text-gray-800 mb-1">
                                    {{ __("messages.facebook_id") }}
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-600">
                                        <!-- Facebook Icon -->
                                        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M480 257.35c0-123.7-100.3-224-224-224s-224 100.3-224 224c0 111.8 81.9 204.47 189 221.29V322.12h-56.89v-64.77H221V208c0-56.13 33.45-87.16 84.61-87.16 24.51 0 50.15 4.38 50.15 4.38v55.13H327.5c-27.81 0-36.51 17.26-36.51 35v42h62.12l-9.92 64.77H291v156.54c107.1-16.81 189-109.48 189-221.31z"
                                                fill-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <input type="text" wire:model='form.facebook_id' id="facebook_id"
                                        placeholder="Facebook ID"
                                        class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                                    @error("form.facebook_id")
                                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Submit -->
                    <div class="text-center">
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-teal-500 to-teal-700 text-white px-6 py-3 rounded-md font-medium shadow hover:opacity-90 transition-colors uppercase">
                            <!-- User Plus Icon -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z"
                                    fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="32" d="M352 176L217.6 336 160 272" />
                            </svg>
                            {{ __("messages.register") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    @if ($showModal)
        @include("livewire.frontend.registration.fragments.success-modal")
    @endif

    @push("title")
        RCB - Player Registration
    @endpush
</div>
