<div>

    <!-- About Section -->
    {{-- <section class="py-16">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Left Image -->
            <div>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkmZGn4ZqHIE4DlUb6q4BUO-VcB4ypaJASkSRb08F6Y6Kci875u5MvY8UE9WHdTQxNo2o&usqp=CAU"
                    alt="Cricket Ground" class="rounded-xl shadow-lg w-full h-full object-contain">
            </div>

            <!-- Right Content -->
            <div>
                <h2 class="text-4xl font-bold text-teal-600 mb-4">About RCB</h2>
                <p class="mb-4 text-base text-gray-800">
                    Welcome to Cricket World — your ultimate destination for everything cricket! From live match updates
                    to player profiles, historical records, and cricket tips, we bring the sport closer to you.
                </p>
                <p class="mb-4 text-base text-gray-800">
                    Whether you’re a seasoned player, an aspiring cricketer, or just a passionate fan, our mission is to
                    celebrate the spirit of cricket across the globe. We cover international tournaments, local leagues,
                    and everything in between.
                </p>
                <p class="text-base text-gray-800">
                    Cricket is more than just a game — it’s a passion, a tradition, and a unifying force that brings
                    millions together.
                </p>
            </div>
        </div>
    </section> --}}

    <!-- About Section -->
    @foreach ($abouts as $about)
        <section class="mt-20 lg:mt-8">
            {{-- <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
                <section id="about" class="flex flex-col gap-14 md:flex-row">
                    <!-- About Illustration -->
                    <div class="flex w-full justify-center md:w-1/2 md:justify-start">
                        <img src="{{ asset($about->media?->path) }}" alt="About us team"
                            class="h-[550px] w-full object-cover" />
                    </div>
                    <!-- About Text -->
                    <div class="w-full space-y-6 md:w-1/2">
                        <div>
                            <div class="ql-editor mb-4 text-[15px] leading-7 text-gray-500">
                                {!! $about->description !!}
                            </div>
                        </div>
                    </div>
                </section>
            </div> --}}
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-4">

                <section id="about" class="relative grid grid-cols-1 gap-6 lg:grid-cols-2">

                    <!-- Image Column -->
                    <div class="relative order-2 lg:order-1">
                        <div
                            class="relative overflow-hidden rounded-xl shadow-[0_30px_80px_-20px_rgba(0,0,0,0.25)] ring-1 ring-gray-200">

                            <img src="{{ asset(@$about->media?->path) }}" alt="About us team"
                                class="h-[420px] w-full object-cover transition-transform duration-700 hover:scale-105 sm:h-[480px] lg:h-[550px]" />
                        </div>
                    </div>

                    <!-- Text Column -->
                    <div class="relative order-1 lg:order-2">

                        <!-- Glass Content Card -->
                        <div
                            class="rounded-xl border border-gray-100 bg-white/80 p-8 shadow-[0_20px_60px_-25px_rgba(0,0,0,0.15)] backdrop-blur-xl sm:p-10 lg:p-8">

                            <!-- Optional Section Label -->
                            <span
                                class="mb-4 inline-block text-xl font-semibold uppercase tracking-widest text-teal-600">
                                {{ __("messages.about") }}
                            </span>

                            <!-- Content -->
                            <div class="ql-editor space-y-4 text-[15px] leading-7 text-gray-600">
                                {!! app()->getLocale() === "bn" ? @$about->description_bn : @$about->description_en !!}

                            </div>

                        </div>
                    </div>

                </section>
            </div>

        </section>


        <!-- At A Glance -->
        {{-- <section class="py-9">
            <!-- Title -->
            <div class="mb-6">
                <h3 class="flex items-center">
                    <span class="flex-grow border-t border-gray-200"></span>
                    <span class="mx-4 text-2xl font-bold uppercase text-teal-800">At A Glance</span>
                    <span class="flex-grow border-t border-gray-200"></span>
                </h3>
                <p class="text-center text-[15px] text-gray-500">
                    Explore our club’s legacy, achievements, and passion — a quick glance tells it all!
                </p>
            </div>
            <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-11">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                    <div
                        class="flex flex-col items-center rounded-xl bg-gradient-to-tr from-teal-50 to-white p-6 text-center shadow transition hover:shadow-lg">
                        <ion-icon name="business-outline" class="mb-2 h-10 w-10 text-teal-700"></ion-icon>
                        <h3 class="text-base font-semibold">{{ __("messages.established") }}</h3>
                        <p class="mt-1 text-[21px] font-semibold text-gray-800">
                            {{ \Carbon\Carbon::parse($about->established)->format("jS F, Y") }}
                        </p>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl bg-gradient-to-tr from-teal-50 to-white p-6 text-center shadow transition hover:shadow-lg">
                        <svg class="mb-2 h-10 w-10 text-teal-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>

                        <h3 class="text-base font-semibold">{{ __("messages.players") }}</h3>
                        <p class="mt-1 text-[21px] font-semibold text-gray-800">{{ $about->players }}</p>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl bg-gradient-to-tr from-teal-50 to-white p-6 text-center shadow transition hover:shadow-lg">
                        <ion-icon name="location-outline" class="mb-2 h-10 w-10 text-teal-700"></ion-icon>
                        <h3 class="text-base font-semibold">{{ __("messages.location") }}</h3>
                        <p class="mt-1 text-base font-semibold text-gray-800">{{ $about->location }}</p>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl bg-gradient-to-tr from-teal-50 to-white p-6 text-center shadow transition hover:shadow-lg">
                        <ion-icon name="thumbs-up-outline" class="mb-2 h-10 w-10 text-teal-700"></ion-icon>
                        <h3 class="text-base font-semibold">{{ __("messages.fans") }}</h3>
                        <p class="mt-1 text-[21px] font-semibold text-gray-800">
                            {{ number_format($about->fans >= 1000 ? $about->fans / 1000 : $about->fans, $about->fans >= 10000 ? 0 : 1) }}{{ $about->fans >= 1000 ? "K" : "" }}
                        </p>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl bg-gradient-to-tr from-teal-50 to-white p-6 text-center shadow transition hover:shadow-lg">
                        <ion-icon name="call-outline" class="mb-2 h-10 w-10 text-teal-700"></ion-icon>
                        <h3 class="text-base font-semibold">{{ __("messages.contact") }}</h3>
                        <p class="mt-1 text-[21px] font-semibold text-gray-800">{{ $about->contact }}</p>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl bg-gradient-to-tr from-teal-50 to-white p-6 text-center shadow transition hover:shadow-lg">
                        <ion-icon name="calendar-number-outline" class="mb-2 h-10 w-10 text-teal-700"></ion-icon>
                        <h3 class="text-base font-semibold">{{ __("messages.years") }}</h3>
                        <p class="mt-1 text-[21px] font-semibold text-gray-800">{{ $about->years }}</p>
                    </div>

                </div>
            </div>
        </section> --}}
        <section class="relative py-16">

            <!-- Section Header -->
            <div class="mb-10 text-center">
                <h3 class="flex items-center justify-center">
                    <span class="hidden flex-grow border-t border-gray-200 sm:block"></span>
                    <span class="mx-4 text-3xl font-bold uppercase tracking-widest text-teal-800 lg:text-4xl">
                        {{ __("messages.at_galance") }}
                    </span>
                    <span class="hidden flex-grow border-t border-gray-200 sm:block"></span>
                </h3>
                <p class="mx-auto mt-3 max-w-2xl text-[15px] text-gray-500">
                    {{ __("messages.at_galance_desc") }}
                </p>
            </div>

            <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                    <!-- Card -->
                    @php
                        $cards = [
                            [
                                "icon" => "business-outline",
                                "label" => __("messages.established"),
                                "value" =>
                                    app()->getLocale() === "bn"
                                        ? $about->established_bn
                                        : \Carbon\Carbon::parse($about->established_en)->format("jS F, Y")
                            ],

                            [
                                "svg" => "true",
                                "label" => __("messages.players"),
                                "value" => app()->getLocale() === "bn" ? $about->player_bn : $about->player_en
                            ],
                            [
                                "icon" => "location-outline",
                                "label" => __("messages.location"),
                                "value" => app()->getLocale() === "bn" ? $about->location_bn : $about->location_en
                            ],
                            [
                                "icon" => "thumbs-up-outline",
                                "label" => __("messages.fans"),
                                "value" =>
                                    app()->getLocale() === "bn"
                                        ? $about->fan_bn . " হাজার"
                                        : number_format(
                                                $about->fan_en >= 1000 ? $about->fan_en / 1000 : $about->fan_en,
                                                $about->fan_en >= 10000 ? 0 : 1
                                            ) . "K"
                            ],
                            [
                                "icon" => "call-outline",
                                "label" => __("messages.contact"),
                                "value" => app()->getLocale() === "bn" ? $about->contact_bn : $about->contact_en
                            ],
                            [
                                "icon" => "calendar-number-outline",
                                "label" => __("messages.years"),
                                "value" => app()->getLocale() === "bn" ? $about->year_bn : $about->year_en
                            ]
                        ];
                    @endphp


                    @foreach ($cards as $card)
                        <div
                            class="group relative overflow-hidden rounded-3xl border border-gray-100 bg-white/80 p-7 text-center shadow-[0_20px_60px_-25px_rgba(0,0,0,0.15)] backdrop-blur-xl transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_30px_80px_-30px_rgba(0,0,0,0.25)]">

                            <!-- Soft Glow -->
                            <div
                                class="absolute inset-0 bg-gradient-to-tr from-teal-200/20 via-transparent to-transparent opacity-0 transition group-hover:opacity-100">
                            </div>

                            <!-- Icon -->
                            <div
                                class="relative z-10 mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-teal-700">
                                @if (!empty($card["svg"]))
                                    <!-- Players SVG -->
                                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        >
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                    </svg>
                                @else
                                    <ion-icon name="{{ $card["icon"] }}" class="h-8 w-8"></ion-icon>
                                @endif
                            </div>

                            <!-- Label -->
                            <h3 class="relative z-10 text-sm font-semibold uppercase tracking-wide text-gray-600">
                                {{ $card["label"] }}
                            </h3>

                            <!-- Value -->
                            <p class="relative z-10 mt-2 break-words text-2xl font-bold tracking-tight text-gray-900">
                                {{ $card["value"] }}
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endforeach



    <!-- FAQ Section -->
    {{-- <section class="px-2 py-9 sm:px-6 lg:px-11" x-data="{ faqOpen: null }">
        <!-- Title -->
        <div class="mb-6">
            <h3 class="flex items-center">
                <span class="flex-grow border-t border-gray-200"></span>
                <span class="mx-4 text-2xl font-bold uppercase text-teal-800">FAQ</span>
                <span class="flex-grow border-t border-gray-200"></span>
            </h3>
            <p class="text-center text-[15px] text-gray-500">
                Find answers to the questions we get asked most about our team and journey!
            </p>
        </div>
        <div class="mx-auto max-w-4xl" x-data="{ faqOpen: null }">
            <div class="space-y-4">
                @foreach ($faqs as $index => $faq)
                    <div class="rounded-lg bg-white shadow">
                        <!-- Toggle Button -->
                        <button
                            @click="faqOpen === {{ $index }} ? faqOpen = null : faqOpen = {{ $index }}"
                            class="flex w-full items-center justify-between px-6 py-4 text-left">
                            <span class="text-lg font-semibold text-gray-800">
                                {{ $faq->question }}
                            </span>
                            <svg :class="faqOpen === {{ $index }} ? 'rotate-180' : ''"
                                class="h-5 w-5 transition-transform" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Answer -->
                        <div x-show="faqOpen === {{ $index }}" x-collapse class="px-6 pb-4 text-sm text-gray-600"
                            style="display: none">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <section class="relative px-4 py-16 sm:px-6 lg:px-10" x-data="{ faqOpen: null }">

        <!-- Section Header -->
        <div class="mb-10 text-center">
            <h3 class="flex items-center justify-center">
                <span class="hidden flex-grow border-t border-gray-200 sm:block"></span>
                <span class="mx-4 text-3xl font-bold uppercase tracking-widest text-teal-800 lg:text-4xl">
                    {{ __("messages.faq") }}
                </span>
                <span class="hidden flex-grow border-t border-gray-200 sm:block"></span>
            </h3>
            <p class="mx-auto mt-3 max-w-2xl text-[15px] text-gray-500">
                {{ __("messages.faq_desc") }}
            </p>
        </div>

        <div class="mx-auto max-w-4xl">
            <div class="space-y-5">

                @foreach ($faqs as $index => $faq)
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-gray-100 bg-white/80 shadow-[0_20px_60px_-25px_rgba(0,0,0,0.15)] backdrop-blur-xl transition-all duration-500 hover:shadow-[0_30px_80px_-30px_rgba(0,0,0,0.25)]">


                        <!-- Toggle Button -->
                        <button
                            @click="faqOpen === {{ $index }} ? faqOpen = null : faqOpen = {{ $index }}"
                            class="relative z-10 flex w-full items-center justify-between gap-4 px-6 py-5 text-left">

                            <span class="text-base font-semibold tracking-tight text-gray-800 md:text-lg">
                                {{ app()->getLocale() === "bn" ? $faq->question_bn : $faq->question_en }}
                            </span>

                            <!-- Icon -->
                            <span
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-teal-100 text-teal-700 transition-transform duration-100"
                                :class="faqOpen === {{ $index }} ? 'rotate-180' : ''">

                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </button>

                        <!-- Answer -->
                        <div x-show="faqOpen === {{ $index }}" x-collapse
                            class="relative z-10 px-6 pb-6 text-sm leading-relaxed text-gray-600" style="display: none">
                            {{ app()->getLocale() === "bn" ? $faq->answer_bn : $faq->answer_en }}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    @push("title")
        RCB - About Us
    @endpush
</div>
