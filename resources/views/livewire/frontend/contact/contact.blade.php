<div>
    @php
        $settings = App\Models\Settings::first();
    @endphp
    <section class="mt-20 lg:mt-8">
        {{-- <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
            <!-- Heading -->
            <div class="mb-4 text-center">
                <h1 class="text-3xl font-bold text-gray-800 lg:text-4xl">Give Us a Shout</h1>
                <p class="text-[15px] text-gray-500">
                    Any question or remarks? Just write us a message!
                </p>
            </div>

            <!-- Contact Card -->
            <div class="flex flex-col overflow-hidden rounded bg-white shadow-sm lg:flex-row">
                <!-- Left Side -->
                <div
                    class="relative flex w-full flex-col justify-between overflow-hidden bg-gradient-to-tr from-teal-50 to-white p-8 text-gray-800 sm:justify-center lg:w-2/5 lg:justify-between">
                    <div class="text-center lg:text-left">
                        <h2 class="mb-1 text-lg font-semibold">For Quick Assist</h2>
                        <p class="mb-8 text-gray-400">Say something to connect with us!</p>

                        <!-- Phone -->
                        <div class="mb-6 flex flex-col items-center gap-4 lg:flex-row lg:items-center lg:justify-start">
                            <ion-icon name="call-outline" class="h-6 w-6 text-gray-500"></ion-icon>
                            <span class="text-center text-[15px] text-gray-500 lg:text-left">
                                {{ $settings->phone }}
                            </span>
                        </div>

                        <!-- Email -->
                        <div class="mb-6 flex flex-col items-center gap-4 lg:flex-row lg:items-center lg:justify-start">
                            <ion-icon name="mail-outline" class="h-6 w-6 text-gray-500"></ion-icon>
                            <span class="text-center text-[15px] text-gray-500 lg:text-left">
                                {{ $settings->email }}
                            </span>
                        </div>

                        <!-- Address -->
                        <div class="flex flex-col items-center gap-4 lg:flex-row lg:items-center lg:justify-start">
                            <ion-icon name="location-outline" class="h-6 w-6 flex-shrink-0 text-gray-500"></ion-icon>
                            <span class="text-center text-[15px] text-gray-500 lg:text-left">
                                {{ $settings->address }}
                            </span>
                        </div>
                    </div>

                    <!-- Social Icons -->
                    <div class="mt-10 flex justify-center space-x-4 lg:mt-52 lg:justify-start">
                        <!-- Facebook -->
                        <a href="{{ $settings->facebook }}"
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-500">
                            <ion-icon name="logo-facebook" class="h-5 w-5 text-white"></ion-icon>
                        </a>

                        <!-- Twitter -->
                        <a href="{{ $settings->twitter }}"
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-500">
                            <ion-icon name="logo-twitter" class="h-5 w-5 text-white"></ion-icon>
                        </a>

                        <!-- Linkedin -->
                        <a href="{{ $settings->linkedin }}"
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-500">
                            <ion-icon name="logo-linkedin" class="h-5 w-5 text-white"></ion-icon>
                        </a>

                        <!-- Youtube -->
                        <a href="{{ $settings->youtube }}"
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-500">
                            <ion-icon name="logo-youtube" class="h-5 w-5 text-white"></ion-icon>
                        </a>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="p-8 lg:w-2/3">
                    <form wire:submit.prevent="submit" class="space-y-6">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="first_name" class="block text-[15px] text-gray-600">
                                    {{ __("messages.first_name") }}<span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="form.first_name" id="first_name"
                                    class="w-full border-b border-gray-300 text-sm text-gray-700 transition duration-300 ease-in-out focus:border-teal-500 focus:outline-none" />
                                @error("form.first_name")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="last_name" class="block text-[15px] text-gray-600">
                                    {{ __("messages.last_name") }}<span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model="form.last_name" id="last_name"
                                    class="w-full border-b border-gray-300 text-sm text-gray-700 transition duration-300 ease-in-out focus:border-teal-500 focus:outline-none" />
                                @error("form.last_name")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-[15px] text-gray-600">
                                    {{ __("messages.email") }}<span class="text-red-500">*</span>
                                </label>
                                <input type="email" wire:model="form.email" id="email"
                                    class="w-full border-b border-gray-300 text-sm text-gray-700 transition duration-300 ease-in-out focus:border-teal-500 focus:outline-none" />
                                @error("form.email")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="block text-[15px] text-gray-600">
                                    {{ __("messages.phone_number") }}<span class="text-red-500">*</span>
                                </label>
                                <input type="number" wire:model="form.phone" id="phone"
                                    class="w-full border-b border-gray-300 text-sm text-gray-700 transition duration-300 ease-in-out focus:border-teal-500 focus:outline-none" />
                                @error("form.phone")
                                    <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-[15px] text-gray-600">
                                {{ __("messages.subject") }}<span class="text-red-500">*</span>
                            </label>
                            <input type="text" wire:model="form.subject" id="subject"
                                class="w-full border-b border-gray-300 text-sm text-gray-700 transition duration-300 ease-in-out focus:border-teal-500 focus:outline-none" />
                            @error("form.subject")
                                <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-[15px] text-gray-600">
                                {{ __("messages.message") }}<span class="text-red-500">*</span>
                            </label>
                            <textarea wire:model="form.message" id="message" rows="1"
                                class="w-full border-b border-gray-300 text-sm text-gray-700 transition duration-300 ease-in-out focus:border-teal-500 focus:outline-none"></textarea>
                            @error("form.message")
                                <span class="block text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="rounded-md bg-gradient-to-r from-teal-500 to-teal-700 px-6 py-2.5 text-base font-medium text-white shadow transition-colors hover:opacity-90">
                                {{ __("messages.send_message") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

            <!-- Heading -->
            <div class="mb-12 text-center">
                <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 lg:text-4xl">
                    Give Us a Shout
                </h1>
                <p class="mt-2 text-base text-gray-500">
                    Any question or remarks? Just write us a message.
                </p>
            </div>

            <!-- Main Card -->
            <div
                class="relative flex flex-col overflow-hidden rounded-3xl border border-gray-100 bg-white/80 shadow-[0_20px_60px_-20px_rgba(0,0,0,0.15)] backdrop-blur-xl lg:flex-row">

                <!-- Left Info Panel -->
                <div class="relative bg-gradient-to-br from-teal-50 via-white to-white p-10 lg:w-2/5 lg:p-12">

                    <!-- Decorative Blur -->
                    <div class="absolute -left-24 -top-24 h-72 w-72 rounded-full bg-teal-200/30 blur-3xl"></div>

                    <div class="relative z-10">
                        <h2 class="text-xl font-semibold text-gray-900">
                            For Quick Assist
                        </h2>
                        <p class="mt-1 text-sm text-gray-500">
                            Say something to connect with us
                        </p>

                        <!-- Contact Info -->
                        <div class="mt-10 space-y-6">

                            <div class="flex items-center gap-4">
                                <span class="flex flex-shrink-0 h-10 w-10 items-center justify-center rounded-full bg-teal-100">
                                    <ion-icon name="call-outline" class="text-lg text-teal-600"></ion-icon>
                                </span>
                                <span class="text-sm text-gray-700">
                                    {{ $settings->phone }}
                                </span>
                            </div>

                            <div class="flex items-center gap-4">
                                <span class="flex flex-shrink-0 h-10 w-10 items-center justify-center rounded-full bg-teal-100">
                                    <ion-icon name="mail-outline" class="text-lg text-teal-600"></ion-icon>
                                </span>
                                <span class="text-sm text-gray-700">
                                    {{ $settings->email }}
                                </span>
                            </div>

                            <div class="flex items-start gap-4">
                                <span
                                    class="mt-0.5 flex flex-shrink-0 h-10 w-10 items-center justify-center rounded-full bg-teal-100">
                                    <ion-icon name="location-outline" class="text-lg text-teal-600"></ion-icon>
                                </span>
                                <span class="text-sm leading-relaxed text-gray-700">
                                    {{ $settings->address }}
                                </span>
                            </div>

                        </div>

                        <!-- Social Icons -->
                        <div class="mt-12 flex gap-4">
                            @foreach ([
        "facebook" => "logo-facebook",
        "twitter" => "logo-twitter",
        "linkedin" => "logo-linkedin",
        "youtube" => "logo-youtube"
    ] as $key => $icon)
                                <a href="{{ $settings->$key }}"
                                    class="group flex h-10 w-10 items-center justify-center rounded-full bg-white shadow transition hover:bg-teal-500">
                                    <ion-icon name="{{ $icon }}"
                                        class="text-gray-500 group-hover:text-white"></ion-icon>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Form Panel -->
                <div class="p-10 lg:w-3/5 lg:p-12">
                    <form wire:submit.prevent="submit" class="space-y-8">

                        <!-- Inputs -->
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                            @foreach ([["first_name", "First Name"], ["last_name", "Last Name"], ["email", "Email"], ["phone", "Phone Number"]] as [$field, $label])
                                <div class="relative">
                                    <label class="text-sm text-gray-600">
                                        {{ __("messages.$field") }} <span class="text-red-500">*</span>
                                    </label>
                                    <input wire:model="form.{{ $field }}"
                                        type="{{ $field === "email" ? "email" : ($field === "phone" ? "number" : "text") }}"
                                        class="mt-1 w-full border-b border-gray-300 bg-transparent py-2 text-sm text-gray-800 transition focus:border-teal-500 focus:outline-none">
                                    @error("form.$field")
                                        <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach

                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="text-sm text-gray-600">
                                {{ __("messages.subject") }} <span class="text-red-500">*</span>
                            </label>
                            <input wire:model="form.subject" type="text"
                                class="mt-1 w-full border-b border-gray-300 bg-transparent py-2 text-sm text-gray-800 transition focus:border-teal-500 focus:outline-none">
                            @error("form.subject")
                                <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="text-sm text-gray-600">
                                {{ __("messages.message") }} <span class="text-red-500">*</span>
                            </label>
                            <textarea wire:model="form.message" rows="2"
                                class="mt-1 w-full resize-none border-b border-gray-300 bg-transparent py-2 text-sm text-gray-800 transition focus:border-teal-500 focus:outline-none"></textarea>
                            @error("form.message")
                                <span class="mt-1 block text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-teal-500 to-teal-700 px-8 py-3 text-sm font-semibold text-white shadow-lg transition hover:opacity-90">
                                {{ __("messages.send_message") }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>


    <!-- Success Modal -->
    @if ($showModal)
        @include("livewire.frontend.contact.fragments.success-modal")
    @endif

    @push("title")
        RCB - Contact Us
    @endpush
</div>
