<div>
    <!-- Personal Info -->
    <section class="mt-24 py-12 min-h-screen px-2 sm:px-6 lg:px-11">
        <!-- Title -->
        <div class="text-center mb-4">
            <h1 class="text-3xl font-semibold text-gray-800">
                Let’s Play Together
            </h1>
            <p class="text-[15px] text-gray-500">
                Join our team, make new friends, and enjoy the game you love!
            </p>
        </div>

        <div class="mx-auto bg-gradient-to-tr from-teal-50 to-white shadow-sm py-11 px-4 sm:px-6 lg:px-11 max-w-4xl">
            <!-- Form -->
            <form wire:submit.prevent='store' class="space-y-8">
                <!-- Image Upload Section -->
                {{-- <div class="flex flex-col items-center mb-6">
                    <!-- Clickable upload area -->
                    <label for="playerImage"
                        class="w-full max-w-md mx-auto flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-md cursor-pointer hover:border-teal-500 transition-colors duration-300 py-12">
                        <ion-icon name="cloud-upload-outline" class="h-12 w-12 text-gray-500"></ion-icon>
                        <span class="text-gray-500 text-sm mt-3">Click to upload</span>
                        <input type="file" wire:model='image' id="playerImage" accept="image/*" class="hidden" />
                    </label>

                    <!-- Preview -->
                    <div class="mt-4 w-40 h-40 rounded-full overflow-hidden border border-gray-300 hidden"
                        id="previewContainer">
                        <img id="imagePreview" src="" alt="Preview" class="w-full h-full object-cover" />
                    </div>
                </div> --}}
                <div class="flex flex-col items-center mb-6" x-data="{ previewChanging: false }"
                    x-on:livewire-upload-start="previewChanging = true"
                    x-on:livewire-upload-finish="previewChanging = false"
                    x-on:livewire-upload-error="previewChanging = false"
                    x-on:livewire-upload-cancel="previewChanging = false">

                    <!-- Clickable upload area -->
                    <label for="playerImage"
                        class="w-full max-w-md mx-auto flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-md cursor-pointer hover:border-teal-500 transition-colors duration-300 py-12">
                        <ion-icon name="cloud-upload-outline" class="h-12 w-12 text-gray-500"></ion-icon>
                        <span class="text-gray-500 text-sm mt-3">Click to upload</span>
                        <input type="file" wire:model="form.image" id="playerImage" accept="image/*"
                            class="hidden" />
                    </label>

                    <!-- Preview -->
                    <div class="mt-4 w-24 h-24 rounded-md overflow-hidden border border-gray-300">
                        @if ($form->image)
                            <img src="{{ $form->image->temporaryUrl() }}" alt="Preview"
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
                        <span class="mx-4 text-base font-semibold text-gray-800">Personal Address</span>
                        <span class="flex-grow border-t border-gray-200"></span>
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="full_name" class="block text-sm text-gray-800 mb-1">
                                Full Name<span class="text-red-500">*</span>
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
                                Email Address<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- Email Icon -->
                                    <ion-icon name="mail-outline" class="w-5 h-5"></ion-icon>
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
                                Phone Number<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- Phone Icon -->
                                    <ion-icon name="call-outline" class="w-5 h-5"></ion-icon>
                                </span>
                                <input type="number" wire:model='form.phone' id="phone" placeholder="Phone Number"
                                    class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                            </div>
                            @error("form.phone")
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-gray-800 mb-1">Date of Birth<span
                                    class="text-red-500">*</span></label>
                            <input type="date" wire:model='form.dob'
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-[9px] focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                            @error("form.dob")
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="role" class="block text-sm text-gray-800 mb-1">Playing Role<span
                                    class="text-red-500">*</span></label>
                            <select wire:model='form.role' id="role"
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                <option value="">-- Select a Role --</option>
                                <option>Batsman</option>
                                <option>Bowler</option>
                                <option>All-rounder</option>
                                <option>Wicket-keeper</option>
                            </select>
                            @error("form.role")
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="jersey_no" class="block text-sm text-gray-800 mb-1">Jersey Size<span
                                    class="text-red-500">*</span></label>
                            <select wire:model='form.jersey_no' id="jersey_no"
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                <option value="">-- Select a Jersey Size --</option>
                                <option>S/36</option>
                                <option>M/38</option>
                                <option>L/40</option>
                                <option>XL/42</option>
                                <option>XXL/44</option>
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
                        <span class="mx-4 text-base font-semibold text-gray-800">Present Address</span>
                        <span class="flex-grow border-t border-gray-200"></span>
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="present_village" class="block text-sm text-gray-800 mb-1">
                                Village<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- Home Icon -->
                                    <ion-icon name="storefront-outline" class="w-5 h-5"></ion-icon>
                                </span>
                                <input type="text" wire:model='form.present_village' id="present_village"
                                    placeholder="Village Name"
                                    class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                District<span class="text-red-500">*</span>
                            </label>
                            <select wire:model='form.present_district'
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                <option value="">-- Select a District --</option>
                                <option>Dhaka</option>
                                <option>Manikganj</option>
                                <option>Chittagong</option>
                                <option>Comilla</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Thana<span class="text-red-500">*</span>
                            </label>
                            <select wire:model='form.present_thana'
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                <option value="">-- Select a Thana --</option>
                                <option>Savar</option>
                                <option>Mirpur</option>
                                <option>Motijeel</option>
                                <option>Gabtoli</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Postal Code<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- Location Icon -->
                                    <ion-icon name="location-outline" class="w-5 h-5"></ion-icon>
                                </span>
                                <input type="text" wire:model='form.present_postal_code' id="postal_code"
                                    placeholder="Postal Code"
                                    class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Permanent Address -->
                <div x-data="{ sameAsPresent: false }" class="">
                    <h3 class="flex items-center mb-4">
                        <span class="flex-grow border-t border-gray-200"></span>
                        <span class="mx-4 text-base font-semibold text-gray-800">Permanent Address</span>
                        <span class="flex-grow border-t border-gray-200"></span>
                    </h3>
                    <div class="mb-4 flex items-center justify-center space-x-2">
                        <input type="checkbox" id="sameAsPresent" x-model="sameAsPresent"
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
                        <label for="sameAsPresent" class="text-sm text-gray-700 select-none cursor-pointer">
                            Same as Present Address
                        </label>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Village -->
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Village<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- Home Icon -->
                                    <ion-icon name="storefront-outline" class="w-5 h-5"></ion-icon>
                                </span>
                                <input type="text" wire:model='form.permanent_village' id="permanent_village"
                                    placeholder="Village Name" :disabled="sameAsPresent"
                                    class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed" />
                            </div>
                        </div>

                        <!-- District -->
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                District<span class="text-red-500">*</span>
                            </label>
                            <select :disabled="sameAsPresent" wire:model='form.permanent_district'
                                id="permanent_district"
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed">
                                <option value="">-- Select a District --</option>
                                <option>Dhaka</option>
                                <option>Manikganj</option>
                                <option>Chittagong</option>
                                <option>Comilla</option>
                            </select>
                        </div>

                        <!-- Thana -->
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Thana<span class="text-red-500">*</span>
                            </label>
                            <select :disabled="sameAsPresent" wire:model='form.permanent_thana' id="permanent_thana"
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed">
                                <option value="">-- Select a Thana --</option>
                                <option>Savar</option>
                                <option>Mirpur</option>
                                <option>Motijeel</option>
                                <option>Gabtoli</option>
                            </select>
                        </div>

                        <!-- Post Code -->
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Postal Code<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- Location Icon -->
                                    <ion-icon name="location-outline" class="w-5 h-5"></ion-icon>
                                </span>
                                <input type="text" wire:model='form.permanent_postal_code'
                                    id="permanent_postal_code" placeholder="Postal Code" :disabled="sameAsPresent"
                                    class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out disabled:bg-gray-100 disabled:cursor-not-allowed" />
                            </div>
                        </div>

                        <!-- Nationality -->
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Nationality <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- Globe Icon -->
                                    <ion-icon name="earth-outline" class="w-5 h-5"></ion-icon>
                                </span>
                                <input type="text" id="nationality" placeholder="Nationality"
                                    class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                            </div>
                        </div>

                        <!-- Religion -->
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Religion<span class="text-red-500">*</span>
                            </label>
                            <select
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                <option value="">-- Select a Religion --</option>
                                <option>Islam</option>
                                <option>Hindu</option>
                                <option>Christian</option>
                                <option>Buddhist</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <!-- Blood Group -->
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Blood Group<span class="text-red-500">*</span>
                            </label>
                            <select
                                class="w-full text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out">
                                <option value="">-- Select a Blood Group --</option>
                                <option>O-</option>
                                <option>O+</option>
                                <option>A-</option>
                                <option>A+</option>
                                <option>B-</option>
                                <option>B+</option>
                            </select>
                        </div>

                        <!-- Height -->
                        <div>
                            <label class="block text-sm text-gray-800 mb-1">
                                Height<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <!-- Ruler Icon -->
                                    <ion-icon name="pin-outline" class="w-5 h-5"></ion-icon>
                                </span>
                                <input type="text" id="height" placeholder="e.g. 5'8&quot;"
                                    class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                            </div>
                        </div>

                        <!-- Facebook ID -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm text-gray-800 mb-1">
                                Facebook ID<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
                                    <!-- Facebook Icon -->
                                    <ion-icon name="logo-facebook" class="w-5 h-5"></ion-icon>
                                </span>
                                <input type="text" id="facebook_id" placeholder="Facebook ID"
                                    class="w-full pl-10 text-sm text-gray-700 border border-gray-200 rounded-md px-4 py-2.5 focus:outline-none focus:border-teal-500 transition duration-300 ease-in-out" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-teal-500 to-teal-700 text-white px-6 py-3 rounded-md font-medium shadow hover:opacity-90 transition-colors uppercase">
                        <!-- User Plus Icon -->
                        <ion-icon name="checkmark-circle" class="w-6 h-6"></ion-icon>
                        Register
                    </button>
                </div>
            </form>
        </div>
    </section>




</div>
