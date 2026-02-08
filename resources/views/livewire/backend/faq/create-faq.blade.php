<div>
    <!-- Breadcrumb Start -->
    <div class="my-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300">
            Create FAQ
        </h2>
        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="text-[13.5px] text-gray-500 dark:text-blue-200" href="{{ route("dashboard") }}">Dashboard
                        /</a>
                </li>
                <li class="text-[13.5px] text-gray-700 dark:text-gray-300">Create FAQ</li>
            </ol>
        </nav>
    </div>
    <div class="rounded-md bg-white px-6 pb-3 pt-6 shadow dark:bg-[#132337]">
        <h2 class="mb-4 text-[15px] font-medium text-gray-900 dark:text-gray-300">FAQ Information</h2>
        <form method="post" class="space-y-6">

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <!-- Question EN -->
                <div>
                    <label for="question_en" class="block text-sm text-gray-700 dark:text-gray-400">
                        Question(EN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.question_en" id="question_en" placeholder="Enter Question(EN)"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.question_en")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Question BN -->
                <div>
                    <label for="question_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                        Question(BN)<span class="text-red-500">*</span>
                    </label>
                    <input type="text" wire:model="form.question_bn" id="question_bn" placeholder="Enter Question(BN)"
                        class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300" />
                    @error("form.question_bn")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Answer EN -->
            <div>
                <label for="answer_en" class="block text-sm text-gray-700 dark:text-gray-400">
                    Answer(EN)<span class="text-red-500">*</span>
                </label>
                <textarea wire:model="form.answer_en" id="answer_en" placeholder="Enter Answer(EN)" rows="4"
                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300"></textarea>
                @error("form.answer_en")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Answer BN -->
            <div>
                <label for="answer_bn" class="block text-sm text-gray-700 dark:text-gray-400">
                    Answer(BN)<span class="text-red-500">*</span>
                </label>
                <textarea wire:model="form.answer_bn" id="answer_bn" placeholder="Enter Answer(BN)" rows="4"
                    class="mt-2 w-full rounded-md border border-gray-200 bg-white px-4 py-3 text-sm text-gray-800 transition duration-300 ease-in-out focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-[#233A57] dark:bg-[#132337] dark:text-gray-300"></textarea>
                @error("form.answer_bn")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status -->
            <div class="text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Status
                </span>
                <div class="mt-3.5 flex flex-wrap gap-x-5 gap-y-1.5">
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
                        <label for="active" class="cursor-pointer text-gray-700 dark:text-gray-400">
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
                        <label for="inactive" class="cursor-pointer text-gray-700 dark:text-gray-400">
                            Inactive
                        </label>
                    </div>
                </div>
            </div>

            <!-- Create Button -->
            <div class="mt-5 flex justify-end space-x-3">
                <button type="reset"
                    class="rounded-md px-4 py-2.5 text-sm text-red-500 transition-colors duration-300 hover:bg-red-100">
                    Reset
                </button>
                <button wire:click='store' type="button"
                    class="flex w-full items-center justify-center rounded-md bg-blue-500 px-5 py-3 text-sm leading-5 text-white transition duration-300 ease-in-out hover:bg-blue-600 focus:outline-none sm:w-auto sm:px-4 sm:py-2">
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
