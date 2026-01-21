<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Player Information
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Player Information</li>
            </ol>
        </nav>
    </div>
    <div>
        <div>
            <!-- Profile Image -->
            <div class="flex justify-center">
                <img src="{{ asset($this->player->media?->path ?? "images/user_profile.webp") }}" alt="{{ $this->player->full_name }}"
                    class="w-36 h-36 rounded-full object-cover border-2 border-white">
            </div>

            <!-- Player Info Form -->

            <div class="bg-white dark:bg-[#132337] rounded-md px-6 pt-6 pb-3 shadow mt-6 space-y-6">

                <!-- Personal Information -->
                <div class="space-y-4">
                    <h3 class="flex items-center mb-4">
                        <span class="flex-grow border-t border-gray-200 dark:border-[#233A57]"></span>
                        <span class="mx-4 text-base font-semibold text-gray-800 dark:text-gray-200">
                            Personal Information
                        </span>
                        <span class="flex-grow border-t border-gray-200 dark:border-[#233A57]"></span>
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div>
                            <label for="full_name" class="block text-sm text-gray-700 dark:text-gray-400">
                                Full Name
                            </label>
                            <input type="text" wire:model="form.full_name" id="full_name" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm text-gray-700 dark:text-gray-400">
                                Email Address
                            </label>
                            <input type="text" wire:model="form.email" id="email" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="block text-sm text-gray-700 dark:text-gray-400">
                                Phone Number
                            </label>
                            <input type="text" wire:model="form.phone" id="phone" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Date Of Birth -->
                        <div>
                            <label for="dob" class="block text-sm text-gray-700 dark:text-gray-400">
                                Date Of Birth
                            </label>
                            <input type="text" wire:model="form.dob" id="dob" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Playing Role -->
                        <div>
                            <label for="role" class="block text-sm text-gray-700 dark:text-gray-400">
                                Playing Role
                            </label>
                            <input type="text" wire:model="form.role" id="role" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Jersey No -->
                        <div>
                            <label for="jersey_no" class="block text-sm text-gray-700 dark:text-gray-400">
                                Jersey NO.
                            </label>
                            <input type="text" wire:model="form.jersey_no" id="jersey_no" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                    </div>
                </div>

                <!-- Present Address -->
                <div class="space-y-4">
                    <h3 class="flex items-center mb-4">
                        <span class="flex-grow border-t border-gray-200 dark:border-[#233A57]"></span>
                        <span class="mx-4 text-base font-semibold text-gray-800 dark:text-gray-200">
                            Present Address
                        </span>
                        <span class="flex-grow border-t border-gray-200 dark:border-[#233A57]"></span>
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Village -->
                        <div>
                            <label for="present_village"
                                class="block text-sm text-gray-700 dark:text-gray-400">Village</label>
                            <input type="text" wire:model="form.present_village" id="present_village" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- District -->
                        <div>
                            <label for="present_district"
                                class="block text-sm text-gray-700 dark:text-gray-400">District</label>
                            <input type="text" wire:model="form.present_district" id="present_district" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Thana -->
                        <div>
                            <label for="present_thana"
                                class="block text-sm text-gray-700 dark:text-gray-400">Thana</label>
                            <input type="text" wire:model="form.present_thana" id="present_thana" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Post Code -->
                        <div>
                            <label for="present_post_office"
                                class="block text-sm text-gray-700 dark:text-gray-400">Post Office</label>
                            <input type="text" wire:model="form.present_post_office" id="present_post_office"
                                readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                    </div>
                </div>

                <!-- Permanent Address -->
                <div class="space-y-4">
                    <h3 class="flex items-center mb-4">
                        <span class="flex-grow border-t border-gray-200 dark:border-[#233A57]"></span>
                        <span class="mx-4 text-base font-semibold text-gray-800 dark:text-gray-200">
                            Permanent Address
                        </span>
                        <span class="flex-grow border-t border-gray-200 dark:border-[#233A57]"></span>
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Village -->
                        <div>
                            <label for="permanent_village"
                                class="block text-sm text-gray-700 dark:text-gray-400">Village</label>
                            <input type="text" wire:model="form.permanent_village" id="permanent_village" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- District -->
                        <div>
                            <label for="permanent_district"
                                class="block text-sm text-gray-700 dark:text-gray-400">District</label>
                            <input type="text" wire:model="form.permanent_district" id="permanent_district"
                                readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Thana -->
                        <div>
                            <label for="permanent_thana"
                                class="block text-sm text-gray-700 dark:text-gray-400">Thana</label>
                            <input type="text" wire:model="form.permanent_thana" id="permanent_thana" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Post Office -->
                        <div>
                            <label for="permanent_post_office"
                                class="block text-sm text-gray-700 dark:text-gray-400">Post Office</label>
                            <input type="text" wire:model="form.permanent_post_office" id="permanent_post_office" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Nationality -->
                        <div>
                            <label for="nationality"
                                class="block text-sm text-gray-700 dark:text-gray-400">Nationality</label>
                            <input type="text" wire:model="form.nationality" id="nationality" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Religion -->
                        <div>
                            <label for="religion"
                                class="block text-sm text-gray-700 dark:text-gray-400">Religion</label>
                            <input type="text" wire:model="form.religion" id="religion" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Blood Group -->
                        <div>
                            <label for="blood_group" class="block text-sm text-gray-700 dark:text-gray-400">
                                Blood Group
                            </label>
                            <input type="text" wire:model="form.blood_group" id="blood_group" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Height -->
                        <div>
                            <label for="height"
                                class="block text-sm text-gray-700 dark:text-gray-400">Height</label>
                            <input type="text" wire:model="form.height" id="height" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                        <!-- Facebook ID -->
                        <div class="sm:col-span-2">
                            <label for="facebook_id" class="block text-sm text-gray-700 dark:text-gray-400">
                                Facebook ID
                            </label>
                            <input type="text" wire:model="form.facebook_id" id="facebook_id" readonly
                                class="w-full mt-2 px-3 py-2.5 bg-white dark:bg-[#132337] text-gray-800 dark:text-gray-300 text-sm border border-gray-200 dark:border-[#233A57] rounded-md focus:outline-none cursor-not-allowed" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
