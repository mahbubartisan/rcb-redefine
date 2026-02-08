<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Edit About
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Edit About</li>
            </ol>
        </nav>
    </div>
    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-[15px] font-medium text-gray-900 dark:text-gray-300">About Information</h2>
        <form method="post" class="space-y-6">
            <!-- Image -->
            <div>
                <label for="image" class="block text-sm text-gray-700 dark:text-gray-400">
                    Image<span class="text-red-500">*</span>
                </label>
                <input type="file" wire:model="form.image" id="image"
                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                @error("form.image")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Established -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Established EN -->
                <div>
                    <label for="established_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Established(EN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.established_en" id="established_en"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.established_en")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Established BN -->
                <div>
                    <label for="established_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Established(BN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.established_bn" id="established_bn"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.established_bn")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Location -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Location -->
                <div>
                    <label for="location_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Location(EN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.location_en" id="location_en"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.location_en")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="location_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Location(BN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.location_bn" id="location_bn"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.location_bn")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Player -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Player EN -->
                <div>
                    <label for="player_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Players(EN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.player_en" id="player_en"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.player_en")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Player BN -->
                <div>
                    <label for="player_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Players(BN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.player_bn" id="player_bn"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.player_bn")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Fans -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Fans EN -->
                <div>
                    <label for="fan_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Fans(EN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.fan_en" id="fan_en"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.fan_en")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Fans BN -->
                <div>
                    <label for="fan_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Fans(BN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.fan_bn" id="fan_bn"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.fan_bn")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Contact -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Contact EN -->
                <div>
                    <label for="contact_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Contact(EN)<span class="text-red-500">*</span>
                    </label>
                    <input type="number" wire:model="form.contact_en" id="contact_en"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.contact_en")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Contact BN -->
                <div>
                    <label for="contact_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Contact(BN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.contact_bn" id="contact_bn"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.contact_bn")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Years -->
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Years EN -->
                <div>
                    <label for="year_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Years(EN)<span class="text-red-500">*</span>
                    </label>
                    <input type="number" min="0" wire:model="form.year_en" id="year_en"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.year_en")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Years BN -->
                <div>
                    <label for="year_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Years(BN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" min="0" wire:model="form.year_bn" id="year_bn"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.year_bn")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <div wire:ignore>
                    <label for="editorDescEn" class="mb-2 block text-sm text-gray-700 dark:text-gray-400">
                        Description(EN)<span class="text-red-500">*</span>
                    </label>
                    <div id="editorDescEn" style="height: 200px;"></div>
                    <input type="hidden" wire:model="form.description_en" id="description_en">
                </div>
                <div class="mt-1">
                    @error("form.description_en")
                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <div wire:ignore>
                    <label for="editorDescBn" class="mb-2 block text-sm text-gray-700 dark:text-gray-400">
                        Description(BN)<span class="text-red-500">*</span>
                    </label>
                    <div id="editorDescBn" style="height: 200px;"></div>
                    <input type="hidden" wire:model="form.description_bn" id="description_bn">
                </div>
                <div class="mt-1">
                    @error("form.description_bn")
                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Create Button -->
            <div class="mt-5 flex justify-end space-x-3">
                <button type="reset"
                    class="rounded-md px-4 py-2.5 text-sm text-red-500 transition-colors duration-300 hover:bg-red-100">
                    Reset
                </button>
                <button wire:click='update' type="button"
                    class="flex w-full items-center justify-center rounded-md bg-blue-500 px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out hover:bg-blue-600 focus:outline-none sm:w-auto sm:px-4 sm:py-2">
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

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function initQuill(editorId, livewireKey, initialValue) {
                const quill = new Quill(editorId, {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{
                                header: [1, 2, 3, false]
                            }],
                            ['bold', 'italic', 'underline'],
                            [{
                                list: 'ordered'
                            }, {
                                list: 'bullet'
                            }],
                            ['link'],
                        ]
                    }
                });

                // Set initial content
                quill.root.innerHTML = initialValue ?? '';

                // Update Livewire when typing
                quill.on('text-change', function() {
                    @this.set(livewireKey, quill.root.innerHTML);
                });

                // Sync back from Livewire (avoid cursor jump)
                Livewire.hook('message.processed', () => {
                    const updated = @this.get(livewireKey);
                    if (updated !== quill.root.innerHTML) {
                        quill.root.innerHTML = updated ?? '';
                    }
                });

                return quill;
            }

            // EN editor
            initQuill(
                '#editorDescEn',
                'form.description_en',
                @json($form->description_en)
            );

            // BN editor
            initQuill(
                '#editorDescBn',
                'form.description_bn',
                @json($form->description_bn)
            );

        });
    </script>

</div>
