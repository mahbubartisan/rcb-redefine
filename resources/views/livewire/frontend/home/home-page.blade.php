<div>
    <div>
        <!-- Hero Section -->
        <div class="mt-[68px] lg:mt-[1px]">
            <div x-data="{
                activeSlide: 1,
                slides: @js($sliders),
                loopSlides: [],
                transitioning: false,
                timer: null,
            
                next() {
                    if (this.transitioning) return;
                    this.transitioning = true;
                    this.activeSlide++;
                    this.move();
            
                    setTimeout(() => {
                        if (this.activeSlide >= this.loopSlides.length - 1) {
                            this.$refs.wrapper.style.transition = 'none';
                            this.activeSlide = 1;
                            this.$refs.wrapper.style.transform = `translateX(-${this.activeSlide * 100}%)`;
                            void this.$refs.wrapper.offsetWidth;
                            this.$refs.wrapper.style.transition = 'transform 0.7s ease-in-out';
                        }
                        this.transitioning = false;
                        this.startAutoSlide();
                    }, 700);
                },
            
                prev() {
                    if (this.transitioning) return;
                    this.transitioning = true;
                    this.activeSlide--;
                    this.move();
            
                    setTimeout(() => {
                        if (this.activeSlide <= 0) {
                            this.$refs.wrapper.style.transition = 'none';
                            this.activeSlide = this.loopSlides.length - 2;
                            this.$refs.wrapper.style.transform = `translateX(-${this.activeSlide * 100}%)`;
                            void this.$refs.wrapper.offsetWidth;
                            this.$refs.wrapper.style.transition = 'transform 0.7s ease-in-out';
                        }
                        this.transitioning = false;
                        this.startAutoSlide();
                    }, 700);
                },
            
                move() {
                    this.$refs.wrapper.style.transition = 'transform 0.7s ease-in-out';
                    this.$refs.wrapper.style.transform = `translateX(-${this.activeSlide * 100}%)`;
                },
            
                startAutoSlide() {
                    this.stopAutoSlide();
                    this.timer = setTimeout(() => this.next(), 5000);
                },
                stopAutoSlide() {
                    clearTimeout(this.timer);
                },
            
                realIndex() {
                    if (this.activeSlide === 0) return this.slides.length - 1;
                    if (this.activeSlide === this.slides.length + 1) return 0;
                    return this.activeSlide - 1;
                },
            
                init() {
                    const first = this.slides[0];
                    const last = this.slides[this.slides.length - 1];
                    this.loopSlides = [last, ...this.slides, first];
            
                    this.$nextTick(() => {
                        this.$refs.wrapper.style.transform = `translateX(-${this.activeSlide * 100}%)`;
                    });
            
                    this.startAutoSlide();
                },
            }" x-init="init" @mouseenter="stopAutoSlide" @mouseleave="startAutoSlide"
                class="relative w-full overflow-hidden">
                <!-- Slides Wrapper -->
                <div x-ref="wrapper" class="flex" style="transition: transform 0.9s ease-in-out;">
                    <template x-for="(slide, index) in loopSlides" :key="index">
                        <div class="relative w-full flex-shrink-0">
                            <img :src="slide.image" alt="" class="h-auto w-full object-contain" />

                            <!-- Optional overlay title -->
                            {{-- <template x-if="slide.title">
                                <div class="absolute bottom-6 left-6 bg-black/40 text-white px-4 py-2 rounded-xl">
                                    <h2 x-text="slide.title" class="text-lg font-semibold"></h2>
                                </div>
                            </template> --}}
                        </div>
                    </template>
                </div>

                {{-- <!-- Previous Button -->
                <button @click="prev"
                    class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-2 text-2xl leading-none">‹</button>

                <!-- Next Button -->
                <button @click="next"
                    class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-2 text-2xl leading-none">›</button> --}}

                <!-- Dots -->
                <div class="absolute bottom-1 left-1/2 flex -translate-x-1/2 space-x-2 lg:bottom-2">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="activeSlide = index + 1; move(); startAutoSlide();"
                            class="h-1.5 w-1.5 rounded-full transition-all lg:h-2.5 lg:w-2.5"
                            :class="realIndex() === index ? 'bg-teal-500 scale-110' : 'bg-gray-300'"></button>
                    </template>
                </div>
            </div>
        </div>

        <!-- Latest Result -->
        <section class="pb-10 pt-5">
            {{-- <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
                <!-- Header with Arrows -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-3">
                    <h2 class="text-xl font-bold text-gray-800 uppercase">
                        {{ __("messages.latest_result") }}
                    </h2>
                    <div class="flex gap-3 mt-3 md:mt-0">
                        <button class="latest-prev bg-teal-500 rounded-full w-9 h-9 flex items-center justify-center">
                            <ion-icon name="chevron-back-outline" class="text-white"></ion-icon>
                        </button>
                        <button class="latest-next bg-teal-500 rounded-full w-9 h-9 flex items-center justify-center">
                            <ion-icon name="chevron-forward-outline" class="text-white"></ion-icon>
                        </button>
                    </div>
                </div>

                <!-- Swiper Container -->
                <div class="latest-swiper overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($latestResults as $match)
                            <div class="swiper-slide p-0">
                                <a href="{{ route("frontend.scoreboard", $match->id) }}" class="block">
                                    <a href="{{ route("frontend.scoreboard", $match->id) }}"
                                    @click.prevent="Livewire.navigate('{{ route("frontend.scoreboard", $match->id) }}')"
                                    class="block">
                                    <div
                                        class="bg-white rounded-md border shadow-sm hover:border-gray-300 flex flex-col h-[220px] relative transition duration-300 ease-in-out">
                                        <!-- Type Pill -->
                                        <div class="flex justify-between items-center pt-2">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-r-full text-xs font-medium 
                                        bg-yellow-100 text-yellow-700">
                                                Match {{ $match->id }}
                                            </span>
                                            <div
                                                class="bg-{{ $match->type == 0 ? "yellow" : ($match->type == 2 ? "red" : "teal") }}-500 text-white text-[12px] font-semibold px-2 py-0.5 rounded-l-full shadow-sm tracking-wide">
                                                {{ $match->type == 0 ? "Upcoming" : ($match->type == 2 ? "Abandoned" : "Completed") }}
                                            </div>
                                        </div>

                                        <!-- Match Number & Date -->
                                        <div class="flex justify-center items-center mt-1">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                        bg-gray-100 text-black-700 border border-gray-100">
                                                {{ \Carbon\Carbon::parse($match->date_time)->format("d M Y") }}
                                            </span>
                                        </div>

                                        <div class="relative px-3 pb-4 flex-1">
                                            <!-- VS line -->
                                            <div class="absolute inset-y-4 left-1/2 -translate-x-1/2 w-px bg-gray-200">
                                            </div>
                                            <div class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
                                                <span
                                                    class="bg-red-600 text-white text-[10px] font-bold rounded px-1.5 py-0.5 tracking-wider">VS</span>
                                            </div>

                                            <!-- Scores and Team Logos -->
                                            <div class="flex items-center justify-between mt-4">
                                                <div class="flex items-center gap-3">
                                                    <img class="w-11 h-11 rounded-full object-fit ring-1 ring-gray-200"
                                                        src="{{ asset(@$match->team1?->media?->path) }}"
                                                        alt="{{ @$match->team1?->name_en }}">
                                                    <div class="leading-tight">
                                                        <div class="text-base font-semibold text-red-600">
                                                            {{ $match->team1_score }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            ({{ $match->team1_played_over }})
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-3">
                                                    <div class="text-right leading-tight">
                                                        <div class="text-base font-semibold text-red-600">
                                                            {{ $match->team2_score }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            ({{ $match->team2_played_over }})</div>
                                                    </div>
                                                    <img class="w-11 h-11 rounded-full object-fit ring-1 ring-gray-200"
                                                        src="{{ asset(@$match->team2?->media?->path) }}"
                                                        alt="{{ @$match->team2?->name_en }}">
                                                </div>
                                            </div>

                                            <!-- Team Names -->
                                            <div class="mt-3 flex justify-between text-sm font-semibold">
                                                <span class="text-gray-800 text-left w-1/2 pr-2"
                                                    title="{{ @$match->team1?->name_en }}">
                                                    {{ @$match->team1?->name_en }}
                                                    {{ app()->getLocale() === 'bn' ? $match->team1?->name_bn : $match->team1?->name_en }}
                                                </span>
                                                <span class="text-gray-800 text-right w-1/2 pl-2"
                                                    title="{{ @$match->team2?->name_en }}">
                                                    {{ @$match->team2?->name_en }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Result -->
                                        <div class="border-t p-3 text-center">
                                            <p class="text-sm text-teal-600" title="{{ $match->match_result }}">
                                                {{ $match->match_result }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}

            {{-- <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
                <!-- Header -->
                <div class="flex justify-between items-center mb-3">
                    <h2 class="text-lg md:text-xl font-bold text-gray-800 uppercase">
                        {{ __("messages.latest_result") }}
                    </h2>
                    <a href="{{ route("frontend.fixture") }}"
                        class="inline-block px-4 py-1.5 text-sm font-medium bg-teal-500 text-white rounded-full">
                        {{ __("messages.view_all") }}
                    </a>
                </div>

                <!-- Slider Container -->
                <div class="relative">
                    <!-- Prev Button -->
                    <button
                        class="latest-prev absolute -left-5 top-1/2 -translate-y-1/2 z-10 bg-teal-500 rounded-full w-8 h-8 flex items-center justify-center shadow hover:bg-teal-600 hidden md:flex">
                        <ion-icon name="chevron-back-outline" class="text-white text-lg"></ion-icon>
                    </button>

                    <!-- Swiper -->
                    <div class="latest-swiper overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($latestResults as $match)
                                <div class="swiper-slide p-0">
                                    <a href="{{ route("frontend.scoreboard", [
                                        "matchId" => $match->id,
                                        "team1" => @$match->team1?->slug,
                                        "team2" => @$match->team2?->slug,
                                    ]) }}"
                                        class="block">
                                        <div
                                            class="bg-white rounded-md border shadow-sm hover:border-teal-300 flex flex-col min-h-[220px] relative transition duration-300 ease-in-out">
                                            <!-- Type Pill -->
                                            <div class="flex justify-between items-center pt-2">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-r-full text-xs font-medium 
                                                         bg-yellow-100 text-yellow-700">
                                                    Match {{ $match->id }}
                                                </span>
                                                <div
                                                    class="bg-{{ $match->type == 0 ? "yellow" : ($match->type == 2 ? "red" : "teal") }}-500 text-white text-[12px] font-semibold px-2 py-0.5 rounded-l-full shadow-sm tracking-wide">
                                                    {{ $match->type == 0 ? "Upcoming" : ($match->type == 2 ? "Abandoned" : "Completed") }}
                                                </div>
                                            </div>

                                            <!-- Match Date -->
                                            <div class="flex justify-center items-center mt-1">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                            bg-gray-100 text-black-700 border border-gray-100">
                                                    {{ \Carbon\Carbon::parse($match->date_time)->format("d M Y") }}
                                                </span>
                                            </div>

                                            <!-- Main Content -->
                                            <div class="relative px-3 pb-4 flex-1">
                                                <!-- VS line -->
                                                <div
                                                    class="absolute inset-y-4 left-1/2 -translate-x-1/2 w-px bg-gray-200">
                                                </div>
                                                <div
                                                    class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
                                                    <span
                                                        class="bg-red-600 text-white text-[10px] font-bold rounded px-1.5 py-0.5 tracking-wider">VS</span>
                                                </div>

                                                <!-- Scores -->
                                                <div class="flex items-center justify-between mt-4">
                                                    <div class="flex items-center gap-3">
                                                        <img class="w-11 h-11 rounded-full object-fill ring-1 ring-gray-200"
                                                            src="{{ asset(@$match->team1?->media?->path) }}"
                                                            alt="{{ @$match->team1?->name_en }}">
                                                        <div class="leading-tight">
                                                            <div class="text-base font-semibold text-red-600">
                                                                {{ $match->team1_score }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                ({{ $match->team1_played_over }})
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <div class="text-right leading-tight">
                                                            <div class="text-base font-semibold text-red-600">
                                                                {{ $match->team2_score }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                ({{ $match->team2_played_over }})
                                                            </div>
                                                        </div>
                                                        <img class="w-11 h-11 rounded-full object-fill ring-1 ring-gray-200"
                                                            src="{{ asset(@$match->team2?->media?->path ?? "images/user_profile.webp") }}"
                                                            alt="{{ @$match->team2?->name_en }}">
                                                    </div>
                                                </div>

                                                <!-- Team Names -->
                                                <div class="mt-3 flex justify-between text-sm font-semibold">
                                                    <span class="text-gray-800 text-left w-1/2 pr-2"
                                                        title="{{ @$match->team1?->name_en }}">
                                                        {{ app()->getLocale() === "bn" ? @$match->team1?->name_bn : @$match->team1?->name_en }}
                                                    </span>
                                                    <span class="text-gray-800 text-right w-1/2 pl-2"
                                                        title="{{ @$match->team2?->name_en }}">
                                                        {{ app()->getLocale() === "bn" ? @$match->team2?->name_bn : @$match->team2?->name_en }}
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Result -->
                                            <div class="border-t p-3 text-center">
                                                <p class="text-sm text-teal-600" title="{{ $match->match_result }}">
                                                    {{ $match->match_result }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Next Button -->
                    <button
                        class="latest-next absolute -right-5 top-1/2 -translate-y-1/2 z-10 bg-teal-500 rounded-full w-8 h-8 flex items-center justify-center shadow hover:bg-teal-600 hidden md:flex">
                        <ion-icon name="chevron-forward-outline" class="text-white text-lg"></ion-icon>
                    </button>
                </div>
            </div> --}}
            <div class="mx-auto max-w-6xl px-3 sm:px-6 lg:px-4">

                <!-- Header -->
                <div class="mb-6 flex items-center justify-between">
                    <div class="relative">
                        <span class="absolute -left-4 top-1 h-9 w-1 rounded-full bg-teal-500"></span>
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                            {{ __("messages.latest_result") }}
                        </h2>
                    </div>

                    <a href="{{ route("frontend.fixture") }}"
                        class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 px-5 py-2 text-sm font-semibold text-white shadow-lg transition hover:scale-105">
                        {{ __("messages.view_all") }}
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </a>
                </div>

                <!-- Slider Wrapper -->
                <div class="relative">

                    <!-- Prev -->
                    <button
                        class="latest-prev absolute -left-6 top-1/2 z-10 hidden h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/80 text-teal-600 shadow-xl backdrop-blur-md transition hover:scale-110 md:flex">
                        <ion-icon name="chevron-back-outline" class="text-xl"></ion-icon>
                    </button>

                    <!-- Swiper -->
                    <div class="latest-swiper overflow-hidden">
                        <div class="swiper-wrapper">

                            @foreach ($latestResults as $match)
                                <div class="swiper-slide">
                                    <div class="block h-full cursor-pointer"
                                        onclick="window.location='{{ route("frontend.scoreboard", [
                                            "matchId" => $match->id,
                                            "team1" => @$match->team1?->slug,
                                            "team2" => @$match->team2?->slug
                                        ]) }}'">

                                        <div
                                            class="group relative flex h-full min-h-[240px] flex-col overflow-hidden rounded-2xl border border-white/40 bg-white/80 backdrop-blur-xl hover:border-teal-300">

                                            <!-- Match ID Pill -->
                                            <div class="absolute left-0 top-4 z-10">
                                                <span
                                                    class="inline-flex items-center rounded-r-full bg-gradient-to-r from-yellow-400 to-yellow-500 px-4 py-1 text-xs font-bold text-white shadow-md">
                                                    Match {{ $match->id }}
                                                </span>
                                            </div>

                                            <!-- Status Pill -->
                                            <div class="absolute right-0 top-4 z-10">
                                                <span
                                                    class="{{ $match->type == 0
                                                        ? "from-yellow-400 to-yellow-500"
                                                        : ($match->type == 2
                                                            ? "from-red-500 to-rose-600"
                                                            : "from-teal-500 to-emerald-500") }} inline-flex items-center rounded-l-full bg-gradient-to-r px-4 py-1 text-xs font-bold text-white shadow-md">
                                                    {{ $match->type == 0 ? "Upcoming" : ($match->type == 2 ? "Abandoned" : "Completed") }}
                                                </span>
                                            </div>

                                            <!-- Date -->
                                            <div class="mt-14 flex justify-center">
                                                <span
                                                    class="rounded-full bg-gray-100 px-4 py-1 text-xs font-medium text-gray-600 backdrop-blur">
                                                    {{ \Carbon\Carbon::parse($match->date_time)->format("d M Y") }}
                                                </span>
                                            </div>

                                            <!-- Gap -->
                                            <div class="h-6"></div>

                                            <!-- Main -->
                                            <div class="relative flex flex-1 items-center px-4">

                                                <!-- Full Height Divider -->
                                                <div class="absolute inset-y-0 left-1/2 w-px bg-gray-200"></div>

                                                <!-- VS Badge -->
                                                <div
                                                    class="absolute left-1/2 top-1/2 z-10 -translate-x-1/2 -translate-y-1/2">
                                                    <span
                                                        class="rounded bg-gradient-to-r from-red-500 to-rose-600 px-2 py-0.5 text-[11px] font-bold text-white shadow-md">
                                                        VS
                                                    </span>
                                                </div>

                                                <!-- Team 1 -->
                                                <div class="flex w-1/2 items-center gap-3">
                                                    <img class="h-12 w-12 rounded-full object-cover shadow ring-2 ring-white"
                                                        src="{{ asset(@$match->team1?->media?->path ?? "images/user_profile.webp") }}"
                                                        alt="{{ @$match->team1?->name_en }}">
                                                    <div>
                                                        <div class="text-lg font-bold text-gray-800">
                                                            {{ $match->team1_score ?? "-" }}
                                                        </div>
                                                        @if (!empty($match->team1_played_over))
                                                            <div class="text-xs text-gray-500">
                                                                ({{ $match->team1_played_over }})
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- Team 2 -->
                                                <div class="flex w-1/2 items-center justify-end gap-3">
                                                    <div class="text-right">
                                                        <div class="text-lg font-bold text-gray-800">
                                                            {{ $match->team2_score ?? "-" }}
                                                        </div>
                                                        @if (!empty($match->team2_played_over))
                                                            <div class="text-xs text-gray-500">
                                                                ({{ $match->team2_played_over }})
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <img class="h-12 w-12 rounded-full object-cover shadow ring-2 ring-white"
                                                        src="{{ asset(@$match->team2?->media?->path ?? "images/user_profile.webp") }}"
                                                        alt="{{ @$match->team2?->name_en }}">
                                                </div>

                                            </div>

                                            <!-- Team Names -->
                                            <div
                                                class="mt-2 flex justify-between px-4 text-sm font-semibold text-gray-800">

                                                <!-- Team 1 -->
                                                <a href="{{ route("frontend.team", @$match->team1?->slug) }}"
                                                    class="max-w-1/2 inline-block truncate pr-2 transition hover:text-teal-600 hover:underline"
                                                    onclick="event.stopPropagation()">
                                                    {{ app()->getLocale() === "bn" ? @$match->team1?->name_bn : @$match->team1?->name_en }}
                                                </a>

                                                <!-- Team 2 -->
                                                <a href="{{ route("frontend.team", @$match->team2?->slug) }}"
                                                    class="max-w-1/2 inline-block truncate pr-2 transition hover:text-teal-600 hover:underline"
                                                    onclick="event.stopPropagation()">
                                                    {{ app()->getLocale() === "bn" ? @$match->team2?->name_bn : @$match->team2?->name_en }}
                                                </a>

                                            </div>

                                            <!-- Result -->
                                            <div class="mt-3 border-t border-gray-200 px-4 py-3 text-center">
                                                <p class="text-sm font-medium text-teal-600">
                                                    {{ $match->match_result }}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Next -->
                    <button
                        class="latest-next absolute -right-6 top-1/2 z-10 hidden h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/80 text-teal-600 shadow-xl backdrop-blur-md transition hover:scale-110 md:flex">
                        <ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
                    </button>

                </div>
            </div>

        </section>

        <!-- Upcoming Fixtures -->
        <section class="pb-10">
            {{-- <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
                <!-- Header with Arrows -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-3">
                    <h2 class="text-xl font-bold text-gray-800 uppercase">
                        {{ __("messages.upcoming_fixtures") }}
                    </h2>
                    <div class="flex gap-3 mt-3 md:mt-0">
                        <button class="upcoming-prev bg-teal-500 rounded-full w-9 h-9 flex items-center justify-center">
                            <ion-icon name="chevron-back-outline" class="text-white"></ion-icon>
                        </button>
                        <button class="upcoming-next bg-teal-500 rounded-full w-9 h-9 flex items-center justify-center">
                            <ion-icon name="chevron-forward-outline" class="text-white"></ion-icon>
                        </button>
                    </div>
                </div>

                <!-- Swiper Container -->
                <div class="upcoming-swiper overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($upcomingMatches as $match)
                            <div class="swiper-slide p-0">
                                <a href="{{ route("frontend.scoreboard", $match->id) }}"
                                    @click.prevent="Livewire.navigate('{{ route("frontend.scoreboard", $match->id) }}')"
                                    class="block">
                                    <div
                                        class="bg-white rounded-md border hover:border-gray-300 shadow-sm flex flex-col h-[220px] relative transition duration-300 ease-in-out">

                                        <!-- Type Pill -->
                                        <div class="flex justify-between items-center pt-2">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-r-full text-xs font-medium 
                                              bg-yellow-100 text-yellow-700">
                                                Match {{ $match->id }}
                                            </span>
                                            <!-- Type Pill -->
                                            @if ($match->type == 0)
                                                <div class="flex justify-end pt-2">
                                                    <div
                                                        class="bg-yellow-500 text-white text-[12px] font-semibold px-2 py-0.5 rounded-l-full shadow-sm tracking-wide">
                                                        Upcoming
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Match Number & Date -->
                                        <div class="flex justify-center items-center mt-1">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                        bg-gray-100 text-black-700 border border-gray-100">
                                                {{ \Carbon\Carbon::parse($match->date_time)->format("d M Y") }}
                                            </span>
                                        </div>

                                        <div class="relative px-3 pb-4 flex-1">
                                            <!-- VS line -->
                                            <div class="absolute inset-y-4 left-1/2 -translate-x-1/2 w-px bg-gray-200">
                                            </div>
                                            <div class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
                                                <span
                                                    class="bg-red-600 text-white text-[10px] font-bold rounded px-1.5 py-0.5 tracking-wider">VS</span>
                                            </div>

                                            <!-- Scores and Team Logos -->
                                            <div class="flex items-center justify-between mt-4">
                                                <div class="flex items-center gap-3">
                                                    <img class="w-11 h-11 rounded-full object-fit ring-1 ring-gray-200"
                                                        src="{{ asset(@$match->team1?->media?->path) }}"
                                                        alt="{{ @$match->team1?->name_en }}">
                                                    <div class="leading-tight">
                                                        <div class="text-base font-semibold text-red-600">
                                                            {{ $match->team1_score }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            ({{ $match->team1_played_over }})
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-3">
                                                    <div class="text-right leading-tight">
                                                        <div class="text-base font-semibold text-red-600">
                                                            {{ $match->team2_score }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            ({{ $match->team2_played_over }})</div>
                                                    </div>
                                                    <img class="w-11 h-11 rounded-full object-fit ring-1 ring-gray-200"
                                                        src="{{ asset(@$match->team2?->media?->path) }}"
                                                        alt="{{ @$match->team2?->name_en }}">
                                                </div>
                                            </div>

                                            <!-- Team Names -->
                                            <div class="mt-3 flex justify-between text-sm font-semibold">
                                                <span class="text-gray-800 text-left w-1/2 pr-2"
                                                    title="{{ @$match->team1?->name_en }}">
                                                    {{ @$match->team1?->name_en }}
                                                </span>
                                                <span class="text-gray-800 text-right w-1/2 pl-2"
                                                    title="{{ @$match->team2?->name_en }}">
                                                    {{ @$match->team2?->name_en }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Result -->
                                        <div class="border-t p-3 text-center">
                                            <p class="text-sm text-teal-600" title="{{ $match->match_result }}">
                                                {{ $match->match_result }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}

            {{-- <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
                <!-- Header -->
                <div class="mb-3 flex items-center justify-between">
                    <h2 class="text-lg font-bold uppercase text-gray-800 md:text-xl">
                        {{ __("messages.upcoming_fixtures") }}
                    </h2>
                    <a href="{{ route("frontend.fixture") }}"
                        class="inline-block rounded-full bg-teal-500 px-4 py-1.5 text-sm font-medium text-white">
                        {{ __("messages.view_all") }}
                    </a>
                </div>

                <!-- Slider Container -->
                <div class="relative">
                    <!-- Prev Button -->
                    <button
                        class="upcoming-prev absolute -left-5 top-1/2 z-10 flex hidden h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full bg-teal-500 shadow hover:bg-teal-600 md:flex">
                        <ion-icon name="chevron-back-outline" class="text-lg text-white"></ion-icon>
                    </button>

                    <!-- Swiper -->
                    <div class="upcoming-swiper overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($upcomingMatches as $match)
                                <div class="swiper-slide p-0">
                                    <a href="{{ route("frontend.scoreboard", [
                                        "matchId" => $match->id,
                                        "team1" => @$match->team1?->slug,
                                        "team2" => @$match->team2?->slug
                                    ]) }}"
                                        class="block">
                                        <div
                                            class="relative flex min-h-[220px] flex-col rounded-md border bg-white shadow-sm transition duration-300 ease-in-out hover:border-teal-300">

                                            <!-- Type Pill -->
                                            <div class="flex items-center justify-between pt-2">
                                                <span
                                                    class="inline-flex items-center rounded-r-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-700">
                                                    Match {{ $match->id }}
                                                </span>
                                                <!-- Type Pill -->
                                                @if ($match->type == 0)
                                                    <div
                                                        class="rounded-l-full bg-yellow-500 px-2 py-0.5 text-[12px] font-semibold tracking-wide text-white shadow-sm">
                                                        Upcoming
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Match Number & Date -->
                                            <div class="mt-1 flex items-center justify-center">
                                                <span
                                                    class="text-black-700 inline-flex items-center rounded-full border border-gray-100 bg-gray-100 px-3 py-1 text-xs font-medium">
                                                    {{ \Carbon\Carbon::parse($match->date_time)->format("d M Y") }}
                                                </span>
                                            </div>

                                            <div class="relative flex-1 px-3 pb-4">
                                                <!-- VS line -->
                                                <div
                                                    class="absolute inset-y-4 left-1/2 w-px -translate-x-1/2 bg-gray-200">
                                                </div>
                                                <div
                                                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                                                    <span
                                                        class="rounded bg-red-600 px-1.5 py-0.5 text-[10px] font-bold tracking-wider text-white">VS</span>
                                                </div>

                                                <!-- Scores and Team Logos -->
                                                <div class="mt-4 flex items-center justify-between">
                                                    <div class="flex items-center gap-3">
                                                        <img class="h-11 w-11 rounded-full object-fill ring-1 ring-gray-200"
                                                            src="{{ asset(@$match->team1?->media?->path ?? "images/user_profile.webp") }}"
                                                            alt="{{ @$match->team1?->name_en }}">
                                                        <div class="leading-tight">
                                                            <div class="text-base font-semibold text-red-600">
                                                                {{ $match->team1_score }}
                                                            </div>
                                                            @if (!empty($match->team1_played_over))
                                                                <div class="text-sm text-gray-500">
                                                                    ({{ $match->team1_played_over }})
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <div class="text-right leading-tight">
                                                            <div class="text-base font-semibold text-red-600">
                                                                {{ $match->team2_score }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                @if (!empty($match->team2_played_over))
                                                                    <div class="text-sm text-gray-500">
                                                                        ({{ $match->team2_played_over }})
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <img class="h-11 w-11 rounded-full object-fill ring-1 ring-gray-200"
                                                            src="{{ asset(@$match->team2?->media?->path) }}"
                                                            alt="{{ @$match->team2?->name_en }}">
                                                    </div>
                                                </div>

                                                <!-- Team Names -->
                                                <div class="mt-3 flex justify-between text-sm font-semibold">
                                                    <span class="w-1/2 pr-2 text-left text-gray-800"
                                                        title="{{ @$match->team1?->name_en }}">
                                                        {{ app()->getLocale() === "bn" ? @$match->team1?->name_bn : @$match->team1?->name_en }}
                                                    </span>
                                                    <span class="w-1/2 pl-2 text-right text-gray-800"
                                                        title="{{ @$match->team2?->name_en }}">
                                                        {{ app()->getLocale() === "bn" ? @$match->team2?->name_bn : @$match->team2?->name_en }}
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Result -->
                                            <div class="border-t p-3 text-center">
                                                <p class="text-sm text-teal-600" title="{{ $match->match_result }}">
                                                    {{ $match->venue }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Next Button -->
                    <button
                        class="upcoming-next absolute -right-5 top-1/2 z-10 flex hidden h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full bg-teal-500 shadow hover:bg-teal-600 md:flex">
                        <ion-icon name="chevron-forward-outline" class="text-lg text-white"></ion-icon>
                    </button>
                </div>
            </div> --}}
            <div class="mx-auto max-w-6xl px-3 sm:px-6 lg:px-4">

                <!-- Header -->
                <div class="mb-6 flex items-center justify-between">
                    <div class="relative">
                        <span class="absolute -left-4 top-1 h-9 w-1 rounded-full bg-teal-500"></span>
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                            {{ __("messages.upcoming_fixtures") }}
                        </h2>
                    </div>

                    <a href="{{ route("frontend.fixture") }}"
                        class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 px-5 py-2 text-sm font-semibold text-white shadow-lg transition hover:scale-105">
                        {{ __("messages.view_all") }}
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </a>
                </div>

                <!-- Slider -->
                <div class="relative">

                    <!-- Prev -->
                    <button
                        class="upcoming-prev absolute -left-6 top-1/2 z-10 hidden h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/80 text-teal-600 shadow-xl backdrop-blur-md transition hover:scale-110 md:flex">
                        <ion-icon name="chevron-back-outline" class="text-xl"></ion-icon>
                    </button>

                    <!-- Swiper -->
                    <div class="upcoming-swiper overflow-hidden">
                        <div class="swiper-wrapper">

                            @foreach ($upcomingMatches as $match)
                                <div class="swiper-slide">
                                    <div class="block h-full cursor-pointer"
                                        onclick="window.location='{{ route("frontend.scoreboard", [
                                            "matchId" => $match->id,
                                            "team1" => @$match->team1?->slug,
                                            "team2" => @$match->team2?->slug
                                        ]) }}'">

                                        <div
                                            class="group relative flex h-full min-h-[240px] flex-col overflow-hidden rounded-2xl border border-white/40 bg-white/80 backdrop-blur-xl hover:border-teal-300">

                                            <!-- Match Pill -->
                                            <div class="absolute left-0 top-4 z-10">
                                                <span
                                                    class="inline-flex items-center rounded-r-full bg-gradient-to-r from-yellow-400 to-yellow-500 px-4 py-1 text-xs font-bold text-white shadow-md">
                                                    Match {{ $match->id }}
                                                </span>
                                            </div>

                                            <!-- Upcoming Pill -->
                                            <div class="absolute right-0 top-4 z-10">
                                                <span
                                                    class="inline-flex items-center rounded-l-full bg-gradient-to-r from-yellow-400 to-amber-500 px-4 py-1 text-xs font-bold text-white shadow-md">
                                                    Upcoming
                                                </span>
                                            </div>

                                            <!-- Date -->
                                            <div class="mt-14 flex justify-center">
                                                <span
                                                    class="rounded-full bg-gray-100 px-4 py-1 text-xs font-medium text-gray-600 backdrop-blur">
                                                    {{ \Carbon\Carbon::parse($match->date_time)->format("d M Y") }}
                                                </span>
                                            </div>

                                            <!-- Gap -->
                                            <div class="h-6"></div>

                                            <!-- Main -->
                                            <div class="relative flex flex-1 items-center px-4">

                                                <!-- Full Height Divider -->
                                                <div class="absolute inset-y-0 left-1/2 w-px bg-gray-200"></div>

                                                <!-- VS Badge -->
                                                <div
                                                    class="absolute left-1/2 top-1/2 z-10 -translate-x-1/2 -translate-y-1/2">
                                                    <span
                                                        class="rounded bg-gradient-to-r from-red-500 to-rose-600 px-2 py-0.5 text-[11px] font-bold text-white shadow-md">
                                                        VS
                                                    </span>
                                                </div>

                                                <!-- Team 1 -->
                                                <div class="flex w-1/2 items-center gap-3">
                                                    <img class="h-12 w-12 rounded-full object-cover shadow ring-2 ring-white"
                                                        src="{{ asset(@$match->team1?->media?->path ?? "images/user_profile.webp") }}"
                                                        alt="{{ @$match->team1?->name_en }}">
                                                    <div>
                                                        <div class="text-lg font-bold text-gray-800">
                                                            {{ $match->team1_score ?? "-" }}
                                                        </div>
                                                        @if (!empty($match->team1_played_over))
                                                            <div class="text-xs text-gray-500">
                                                                ({{ $match->team1_played_over }})
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- Team 2 -->
                                                <div class="flex w-1/2 items-center justify-end gap-3">
                                                    <div class="text-right">
                                                        <div class="text-lg font-bold text-gray-800">
                                                            {{ $match->team2_score ?? "-" }}
                                                        </div>
                                                        @if (!empty($match->team2_played_over))
                                                            <div class="text-xs text-gray-500">
                                                                ({{ $match->team2_played_over }})
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <img class="h-12 w-12 rounded-full object-cover shadow ring-2 ring-white"
                                                        src="{{ asset(@$match->team2?->media?->path ?? "images/user_profile.webp") }}"
                                                        alt="{{ @$match->team2?->name_en }}">
                                                </div>

                                            </div>

                                            <!-- Team Names -->
                                            <div
                                                class="mt-2 flex justify-between px-4 text-sm font-semibold text-gray-800">

                                                <!-- Team 1 -->
                                                <a href="{{ route("frontend.team", @$match->team1?->slug) }}"
                                                    class="max-w-1/2 inline-block truncate pr-2 transition hover:text-teal-600 hover:underline"
                                                    onclick="event.stopPropagation()">
                                                    {{ app()->getLocale() === "bn" ? @$match->team1?->name_bn : @$match->team1?->name_en }}
                                                </a>

                                                <!-- Team 2 -->
                                                <a href="{{ route("frontend.team", @$match->team2?->slug) }}"
                                                    class="max-w-1/2 inline-block truncate pr-2 transition hover:text-teal-600 hover:underline"
                                                    onclick="event.stopPropagation()">

                                                    {{ app()->getLocale() === "bn" ? @$match->team2?->name_bn : @$match->team2?->name_en }}
                                                </a>

                                            </div>

                                            <!-- Venue -->
                                            <div class="mt-3 border-t border-gray-200 px-4 py-3 text-center">
                                                <p class="text-sm font-medium text-teal-600">
                                                    {{ $match->venue ?? "N/A" }}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <!-- Next -->
                    <button
                        class="upcoming-next absolute -right-6 top-1/2 z-10 hidden h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-white/80 text-teal-600 shadow-xl backdrop-blur-md transition hover:scale-110 md:flex">
                        <ion-icon name="chevron-forward-outline" class="text-xl"></ion-icon>
                    </button>

                </div>
            </div>
        </section>


        <!-- News Section -->
        <section class="pb-10">
            {{-- <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
                <div class="mb-6 flex items-center justify-between">
                    <!-- Centered Title with Borders -->
                    <h3 class="flex flex-grow items-center">
                        <span class="text-lg font-bold uppercase text-gray-800 md:text-xl">
                            {{ __("messages.latest_news") }}
                        </span>
                    </h3>

                    <!-- View All -->
                    <a href="{{ route("frontend.news") }}"
                        class="inline-block rounded-full bg-teal-500 px-4 py-1.5 text-sm font-medium text-white">
                        {{ __("messages.view_all") }}
                    </a>
                </div>
                <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                    @foreach ($news as $index => $item)
                        <a href="{{ route("frontend.news.detail", $item->slug) }}"
                            class="{{ $index > 0 ? "hidden md:block" : "" }} block overflow-hidden rounded-md border border-gray-200 bg-white shadow-sm transition duration-300 ease-in-out hover:shadow-xl">

                            <!-- News Image -->
                            <img src="{{ asset(@$item->media?->path) }}" alt="{{ $item->title_en }}"
                                class="h-48 w-full object-cover" />

                            <!-- News Content -->
                            <div class="p-4">
                                <span class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($item->date)->format("d M Y") }}
                                </span>

                                <h3
                                    class="my-2 cursor-pointer text-lg font-semibold transition duration-200 ease-in-out hover:text-teal-600">
                                    {{ str()->limit(strip_tags(app()->getLocale() === "bn" ? $item->title_bn : $item->title_en), 50) }}
                                </h3>

                                <div class="text-sm leading-relaxed text-gray-600">
                                    {{ str()->limit(
                                        trim(
                                            preg_replace(
                                                '/[ \t]+/u',
                                                " ",
                                                str_replace(
                                                    ["\xC2\xA0", "\xA0", "&nbsp;"],
                                                    " ",
                                                    str_replace(
                                                        ["<br>", "<br/>", "<br />", "</div>", "</p>"],
                                                        "\n",
                                                        html_entity_decode(strip_tags(app()->getLocale() === "bn" ? $item->desc_bn : $item->desc_en))
                                                    )
                                                )
                                            )
                                        ),
                                        120
                                    ) }}
                                </div>

                                <span
                                    class="mt-3 inline-block text-sm font-semibold text-gray-700 hover:text-teal-500 hover:underline">
                                    Read More →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div> --}}
            <div class="mx-auto max-w-6xl px-3 sm:px-6 lg:px-4">

                <!-- Header -->
                <div class="mb-6 flex items-center justify-between">
                    <div class="relative">
                        <span class="absolute -left-4 top-1 h-9 w-1 rounded-full bg-teal-500"></span>
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                            {{ __("messages.latest_news") }}
                        </h2>
                    </div>

                    <a href="{{ route("frontend.news") }}"
                        class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 px-5 py-2 text-sm font-semibold text-white shadow-lg transition hover:scale-105">
                        {{ __("messages.view_all") }}
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </a>
                </div>

                <!-- News Grid -->
                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                    @foreach ($news as $index => $item)
                        <a href="{{ route("frontend.news.detail", $item->slug) }}"
                            class="{{ $index > 0 ? "hidden md:block" : "" }} group relative overflow-hidden rounded-2xl border border-white/40 bg-white/80 shadow-[0_25px_70px_-30px_rgba(0,0,0,0.25)] backdrop-blur-xl transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_40px_90px_-35px_rgba(0,0,0,0.35)]">

                            <!-- Image -->
                            <div class="relative h-52 overflow-hidden">
                                <img src="{{ asset(@$item->media?->path) }}" alt="{{ $item->title_en }}"
                                    class="h-full w-full object-cover transition duration-700 group-hover:scale-105">

                                <!-- Image Overlay -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent">
                                </div>

                                <!-- Date Pill -->
                                <div class="absolute bottom-3 left-3">
                                    <span
                                        class="inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-gray-800 shadow backdrop-blur">
                                        {{ \Carbon\Carbon::parse($item->date)->format("d M Y") }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-5">

                                <h3
                                    class="mb-2 line-clamp-2 text-lg font-bold leading-snug text-gray-900 transition group-hover:text-teal-600">
                                    {{ str()->limit(strip_tags(app()->getLocale() === "bn" ? $item->title_bn : $item->title_en), 70) }}
                                </h3>

                                <p class="line-clamp-3 text-sm leading-relaxed text-gray-600">
                                    {{ str()->limit(
                                        trim(
                                            preg_replace(
                                                '/[ \t]+/u',
                                                " ",
                                                str_replace(
                                                    ["\xC2\xA0", "\xA0", "&nbsp;"],
                                                    " ",
                                                    str_replace(
                                                        ["<br>", "<br/>", "<br />", "</div>", "</p>"],
                                                        "\n",
                                                        html_entity_decode(strip_tags(app()->getLocale() === "bn" ? $item->desc_bn : $item->desc_en))
                                                    )
                                                )
                                            )
                                        ),
                                        130
                                    ) }}
                                </p>

                                <!-- Read More -->
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-sm font-semibold text-teal-600 transition group-hover:underline">
                                        Read More
                                    </span>

                                    <ion-icon name="arrow-forward-outline"
                                        class="text-lg text-teal-600 transition group-hover:translate-x-1"></ion-icon>
                                </div>
                            </div>

                        </a>
                    @endforeach

                </div>
            </div>

        </section>

        <!-- Players Section -->
        {{-- <section class="text-white pb-0 relative">
            <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
                <!-- header -->
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl text-gray-800 font-bold tracking-wider">{{ __("messages.team") }} /
                        {{ __("messages.players") }}</h2>
                    <a href="#"
                        class="inline-block px-5 py-2 text-sm font-semibold border border-teal-500 text-gray-800 hover:bg-teal-500 hover:text-white rounded-full transition duration-300 ease-in-out">
                        {{ __("messages.view_all") }}
                    </a>
                </div>

                <!-- Swiper -->
                <div class="player-swiper overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($players ?? [] as $player)
                            <div class="swiper-slide">
                                <div
                                    class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                                    <!-- Pill Badge -->
                                    @if (!empty($player->player_tag))
                                        <div
                                            class="absolute top-3 right-0 z-50 bg-teal-200 text-teal-700 text-xs font-semibold px-3 py-1 rounded-l-full shadow">
                                            {{ $player->player_tag }}
                                        </div>
                                    @endif
                                    <!-- Player Image -->
                                    <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                        alt="{{ $player->first_name_en }}"
                                        class="absolute inset-0 w-full h-full object-fit transition-transform duration-500 transform group-hover:scale-105" />

                                    <!-- Hover Overlay -->
                                    <div
                                        class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                        <h3 class="text-lg font-semibold mb-3">{{ __("messages.player_stats") }}</h3>
                                        <ul class="text-lg text-white/90 space-y-1 mb-3">
                                            <li><span class="font-medium">{{ __("messages.matches") }}:</span>
                                                {{ $player->matches ?? 0 }}
                                            </li>
                                            <li><span class="font-medium">{{ __("messages.runs") }}:</span>
                                                {{ $player->runs ?? 0 }}</li>
                                            <li><span class="font-medium">{{ __("messages.average") }}:</span>
                                                {{ $player->average ?? 0 }}
                                            </li>
                                        </ul>
                                        <a class="inline-block px-5 py-1.5 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                            href="{{ route("frontend.profile", $player->slug) }}">
                                            {{ __("messages.view_profile") }}
                                        </a>
                                    </div>

                                    <!-- Bottom Info -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-3 py-3 flex items-center">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                                @if (@$player->icon?->media?->path)
                                                    <img src="{{ asset(@$player->icon?->media?->path) }}"
                                                        alt="{{ $player->first_name_en }}" class="rounded-full">
                                                @else
                                                    <span>🏏</span>
                                                @endif
                                            </div>
                                            <div class="w-px h-6 bg-white/20"></div>
                                            <div class="ml-0 text-white text-[13px] font-semibold">
                                                {{ strtoupper(app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>


            </div>
            <!-- Navigation Buttons -->
            <div>
                <button
                    class="player-prev absolute top-1/2 left-24 transform -translate-y-1/2 z-10 flex h-11 w-11 items-center justify-center rounded-full bg-teal-500 text-white focus:outline-none">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 6l-6 6l6 6" />
                    </svg>
                </button>
                <button
                    class="player-next absolute top-1/2 right-24 transform -translate-y-1/2 z-10 flex h-11 w-11 items-center justify-center rounded-full bg-teal-500 text-white focus:outline-none">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 6l6 6l-6 6" />
                    </svg>
                </button>
            </div>
        </section> --}}
        {{-- <div class="w-full h-64 flex items-center justify-center">
            <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                alt="{{ $player->first_name_en }}" class="absolute inset-0 w-full h-full object-fill" />
        </div> --}}


        {{-- <section>
            <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
                <!-- header -->
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg md:text-xl text-gray-800 font-bold tracking-wider">{{ __("messages.team") }} /
                        {{ __("messages.players") }}</h2>
                    <a href="{{ route("frontend.team") }}"
                        class="inline-block px-4 py-1.5 text-sm font-medium bg-teal-500 text-white rounded-full">
                        {{ __("messages.view_all") }}
                    </a>
                </div>
                <!-- wrapper for slider + nav (must be relative) -->
                <div class="px-12 lg:px-0">
                    <div class="relative">
                        <!-- Swiper container -->
                        <div class="player-swiper swiper overflow-visible px-12"> <!-- px-12 gives space for arrows -->
                            <div class="swiper-wrapper">
                                @foreach ($players ?? [] as $player)
                                    <!-- important: w-auto so slide width is driven by content -->
                                    <div class="swiper-slide">
                                        <!-- card (fixed visual width) -->
                                        <div
                                            class="group relative h-80 w-64 sm:w-full rounded-2xl overflow-hidden shadow-lg">

                                            <!-- Background image -->
                                            <div class="absolute inset-0 bg-center bg-no-repeat bg-contain opacity-30"
                                                style="background-image: url('{{ asset("images/player-bg-image.png") }}'); background-size: 80% auto;">
                                            </div>

                                            <!-- Pill Badge -->
                                            @if (!empty($player->player_tag))
                                                <div
                                                    class="absolute top-3 right-0 z-50 bg-teal-200 text-teal-700 text-xs font-semibold px-3 py-1 rounded-l-full shadow">
                                                    {{ $player->player_tag }}
                                                </div>
                                            @endif

                                            <!-- image area -->
                                            <div class="w-full aspect-[3/4] overflow-hidden rounded-lg">
                                                <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                                    alt="{{ $player->first_name_en }}"
                                                    class="absolute w-full h-full object-cover object-[center_top]" />
                                            </div>


                                            <!-- Hover Overlay -->
                                            <div
                                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                                <h3 class="text-lg text-white font-semibold mb-3">
                                                    {{ __("messages.player_stats") }}
                                                </h3>
                                                <ul class="text-lg text-white/90 space-y-1 mb-3">
                                                    <li><span class="font-medium">{{ __("messages.matches") }}:</span>
                                                        {{ $player->matches ?? 0 }}
                                                    </li>
                                                    <li><span class="font-medium">{{ __("messages.runs") }}:</span>
                                                        {{ $player->runs ?? 0 }}</li>
                                                    <li><span class="font-medium">{{ __("messages.average") }}:</span>
                                                        {{ $player->average ?? 0 }}
                                                    </li>
                                                </ul>
                                                <a class="inline-block px-5 py-1.5 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                                    href="{{ route("frontend.profile", $player->slug) }}">
                                                    {{ __("messages.view_profile") }}
                                                </a>
                                            </div>

                                            <!-- Bottom Info -->
                                            <div
                                                class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-3 py-3 flex items-center">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                                        @if (@$player->icon?->media?->path)
                                                            <img src="{{ asset(@$player->icon?->media?->path) }}"
                                                                alt="{{ $player->first_name_en }}"
                                                                class="rounded-full">
                                                        @else
                                                            <span>🏏</span>
                                                        @endif
                                                    </div>
                                                    <div class="w-px h-6 bg-white/20"></div>
                                                    <div class="ml-0 text-white text-[13px] font-semibold">
                                                        {{ strtoupper(app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- nav buttons (inside same relative parent) -->
                        <button
                            class="player-prev absolute -left-5 lg:left-3 top-1/2 -translate-y-1/2 z-30 flex h-9 w-9 items-center justify-center rounded-full bg-teal-500 text-white shadow hover:bg-teal-600">
                            <!-- svg left -->
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M15 6l-6 6l6 6" />
                            </svg>
                        </button>

                        <button
                            class="player-next absolute right-1 lg:right-3 top-1/2 -translate-y-1/2 z-30 flex h-9 w-9 items-center justify-center rounded-full bg-teal-500 text-white shadow hover:bg-teal-600">
                            <!-- svg right -->
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M9 6l6 6l-6 6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section class="relative max-w-6xl mx-auto px-2 sm:px-6 lg:px-4 py-10">
            <div class="relative swiper player-swiper">
                <!-- Swiper Wrapper -->
                <div class="swiper-wrapper">
                    @foreach ($players ?? [] as $player)
                        <!-- important: w-auto so slide width is driven by content -->
                        <div class="swiper-slide flex justify-center">
                            <!-- card (fixed visual width) -->
                            <div class="group relative h-80 w-64 sm:w-full rounded-2xl overflow-hidden shadow-lg">

                                <!-- Background image -->
                                <div class="absolute inset-0 bg-center bg-no-repeat bg-contain opacity-30"
                                    style="background-image: url('{{ asset("images/player-bg-image.png") }}'); background-size: 80% auto;">
                                </div>

                                <!-- Pill Badge -->
                                @if (!empty($player->player_tag))
                                    <div
                                        class="absolute top-3 right-0 z-50 bg-teal-200 text-teal-700 text-xs font-semibold px-3 py-1 rounded-l-full shadow">
                                        {{ $player->player_tag }}
                                    </div>
                                @endif

                                <!-- image area -->
                                <div class="w-full aspect-[3/4] overflow-hidden rounded-lg">
                                    <img src="{{ asset(@$player->media?->path ?? "images/user_profile.webp") }}"
                                        alt="{{ $player->first_name_en }}"
                                        class="absolute w-full h-full object-cover object-[center_top]" />
                                </div>


                                <!-- Hover Overlay -->
                                <div
                                    class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                    <h3 class="text-lg text-white font-semibold mb-3">
                                        {{ __("messages.player_stats") }}
                                    </h3>
                                    <ul class="text-lg text-white/90 space-y-1 mb-3">
                                        <li><span class="font-medium">{{ __("messages.matches") }}:</span>
                                            {{ $player->matches ?? 0 }}
                                        </li>
                                        <li><span class="font-medium">{{ __("messages.runs") }}:</span>
                                            {{ $player->runs ?? 0 }}</li>
                                        <li><span class="font-medium">{{ __("messages.average") }}:</span>
                                            {{ $player->average ?? 0 }}
                                        </li>
                                    </ul>
                                    <a class="inline-block px-5 py-1.5 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                        href="{{ route("frontend.profile", $player->slug) }}">
                                        {{ __("messages.view_profile") }}
                                    </a>
                                </div>

                                <!-- Bottom Info -->
                                <div
                                    class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-3 py-3 flex items-center">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                            @if (@$player->icon?->media?->path)
                                                <img src="{{ asset(@$player->icon?->media?->path) }}"
                                                    alt="{{ $player->first_name_en }}" class="rounded-full">
                                            @else
                                                <span>🏏</span>
                                            @endif
                                        </div>
                                        <div class="w-px h-6 bg-white/20"></div>
                                        <div class="ml-0 text-white text-[13px] font-semibold">
                                            {{ strtoupper(app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigation Buttons -->
                <div
                    class="player-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-teal-500 text-white w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>

                <div
                    class="player-next absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-teal-500 text-white w-10 h-10 rounded-full flex items-center justify-center hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </section> --}}

        <div>
            <section class="relative mx-auto w-full max-w-6xl px-6" x-data="playerSlider({{ $players->toJson() }})" x-init="init()">
                <!-- Header -->
                <div class="mb-6 flex items-center justify-between">
                    <div class="relative">
                        <span class="absolute -left-4 top-1 hidden h-9 w-1 rounded-full bg-teal-500 sm:block"></span>
                        <h2 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">
                            {{ __("messages.players") }}
                        </h2>
                    </div>

                    <a href="{{ route("frontend.player") }}"
                        class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-teal-500 to-emerald-500 px-5 py-2 text-sm font-semibold text-white shadow-lg transition hover:scale-105">
                        {{ __("messages.view_all") }}
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </a>
                </div>

                <!-- Slider -->
                <div class="relative overflow-hidden">
                    <div x-ref="track" class="flex transition-transform duration-700 ease-in-out"
                        :style="`transform: translateX(-${active * (100 / visibleCards)}%)`"
                        @transitionend="onTransitionEnd">

                        <template x-for="(player, index) in displayList" :key="index">
                            <div class="flex-shrink-0 px-2"
                                :class="{
                                    'w-full': visibleCards === 1,
                                    'md:w-1/2': visibleCards === 2,
                                    'lg:w-1/4': visibleCards === 4
                                }">

                                <!-- Player Card -->
                                <div
                                    class="group relative mx-auto h-80 w-64 overflow-hidden rounded-2xl shadow-lg sm:w-full">

                                    <!-- Background texture -->
                                    <div class="absolute inset-0 bg-contain bg-center bg-no-repeat opacity-30"
                                        style="background-image: url('{{ asset("images/player-bg-image.png") }}'); background-size: 80% auto;">
                                    </div>

                                    <!-- Pill Badge -->
                                    <template x-if="player.role">
                                        <div
                                            class="absolute right-0 top-3 z-50 rounded-l-full bg-teal-200 px-3 py-1 text-xs font-semibold text-teal-700 shadow">
                                            <span x-text="player.role"></span>
                                        </div>
                                    </template>

                                    <!-- Image -->
                                    <div class="aspect-[3/4] w-full overflow-hidden rounded-lg">
                                        <img :src="player.image" :alt="player.name"
                                            class="absolute h-full w-full object-cover object-[center_top]" />
                                    </div>

                                    <!-- Hover Overlay -->
                                    <div
                                        class="absolute inset-0 flex flex-col items-center justify-center bg-black/80 p-6 text-center opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                        <h3 class="mb-2 text-base font-semibold tracking-tight text-white">
                                            {{ __("messages.player_stats") }}
                                        </h3>
                                        <ul class="mb-3 space-y-1 text-base tracking-tight text-white/90">
                                            <li><span class="font-medium">{{ __("messages.matches") }}:</span> <span
                                                    x-text="player.matches ?? 0"></span></li>
                                            <li><span class="font-medium">{{ __("messages.runs") }}:</span> <span
                                                    x-text="player.runs ?? 0"></span></li>
                                            <li><span class="font-medium">{{ __("messages.wickets") }}:</span> <span
                                                    x-text="player.wickets ?? 0"></span></li>
                                            <li><span class="font-medium">{{ __("messages.average") }}:</span> <span
                                                    x-text="player.average ?? 0"></span></li>
                                        </ul>
                                        <a :href="`/profile/${player.slug}`"
                                            class="inline-block rounded-full bg-teal-500 px-5 py-1.5 text-sm font-medium text-white transition hover:bg-teal-600">
                                            {{ __("messages.view_profile") }}
                                        </a>
                                    </div>

                                    <!-- Bottom Info -->
                                    <div
                                        class="absolute bottom-0 left-0 right-0 z-50 flex items-center bg-black/70 px-3 py-3">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex h-8 w-8 items-center justify-center overflow-hidden rounded-full border border-white/20 bg-white/10 text-sm">
                                                <template x-if="player.role_icon">
                                                    <img :src="player.role_icon" :alt="player.name"
                                                        class="h-6 w-6 rounded-full object-contain">
                                                </template>
                                                <template x-if="!player.role_icon">
                                                    <span>🏏</span>
                                                </template>
                                            </div>
                                            <div class="h-6 w-px bg-white/20"></div>
                                            <div class="ml-0 min-w-0 leading-tight text-white">
                                                <!-- Player Name -->
                                                <span class="block truncate text-[13px] font-semibold"
                                                    x-text="player.name.toUpperCase()">
                                                </span>

                                                <!-- Playing Role -->
                                                <template x-if="player.playing_role">
                                                    <span
                                                        class="block truncate text-[11px] font-normal text-white/70"
                                                        x-text="player.playing_role.toUpperCase()">
                                                    </span>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Arrows -->
                    <button @click="prev"
                        class="absolute left-0 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-teal-500 text-white transition hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="next"
                        class="absolute right-0 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-teal-500 text-white transition hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </section>

            <script>
                function playerSlider(playersData) {
                    return {
                        players: playersData.map(p => ({
                            id: p.id,
                            name: p.first_name_en,
                            slug: p.slug,
                            role: p.player_tag ?? '',
                            playing_role: p.playing_role ?? '',
                            image: p.media?.path ? `/${p.media.path}` : '/images/user_profile.webp',
                            role_icon: p.icon?.media?.path ? `/${p.icon.media.path}` : null,
                            matches: p.matches ?? 0,
                            runs: p.runs ?? 0,
                            wickets: p.wickets ?? 0,
                            average: p.average ?? 0,
                        })),

                        visibleCards: 4,
                        active: 0,
                        transitioning: false,
                        interval: null,

                        get displayList() {
                            const first = this.players.slice(0, this.visibleCards);
                            const last = this.players.slice(-this.visibleCards);
                            return [...last, ...this.players, ...first];
                        },

                        init() {
                            this.updateVisibleCards();
                            window.addEventListener("resize", () => this.updateVisibleCards());
                            this.$nextTick(() => {
                                this.active = this.visibleCards;
                                this.startAutoSlide();
                            });
                        },

                        updateVisibleCards() {
                            if (window.innerWidth < 768) this.visibleCards = 1;
                            else if (window.innerWidth < 1024) this.visibleCards = 2;
                            else this.visibleCards = 4;
                        },

                        next() {
                            if (this.transitioning) return;
                            this.transitioning = true;
                            this.active++;
                        },

                        prev() {
                            if (this.transitioning) return;
                            this.transitioning = true;
                            this.active--;
                        },

                        onTransitionEnd() {
                            const total = this.players.length;
                            const el = this.$refs.track;

                            if (this.active >= total + this.visibleCards) {
                                el.style.transition = "none";
                                this.active = this.visibleCards;
                                el.style.transform = `translateX(-${this.active * (100 / this.visibleCards)}%)`;
                                void el.offsetWidth;
                                el.style.transition = "transform 0.7s ease-in-out";
                                this.transitioning = false;
                            } else if (this.active < this.visibleCards) {
                                el.style.transition = "none";
                                this.active = total + this.active;
                                el.style.transform = `translateX(-${this.active * (100 / this.visibleCards)}%)`;
                                void el.offsetWidth;
                                el.style.transition = "transform 0.7s ease-in-out";
                                this.transitioning = false;
                            } else {
                                this.transitioning = false;
                            }
                        },

                        startAutoSlide() {
                            this.interval = setInterval(() => this.next(), 5000);
                        },
                    };
                }
            </script>
        </div>







        {{-- <style>
            .upcoming-swiper .swiper-wrapper {
                display: flex;
                align-items: stretch;
                /* Make all slides equal height */
            }

            .upcoming-swiper .swiper-slide {
                display: flex;
                /* Each slide is flex so content fills */
                height: auto !important;
            }

            .upcoming-swiper .swiper-slide>a {
                display: flex;
                flex: 1;
            }

            .upcoming-swiper .swiper-slide>a>div {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                flex: 1;
                height: 100%;
            }
        </style> --}}

        {{-- <style>
            /* All bullets (as hyphen lines) */
            .swiper .swiper-pagination-bullet {
                width: 20px !important;
                /* wider for line */
                height: 5px !important;
                /* thinner height */
                background-color: #b81414 !important;
                border-radius: 3px !important;
                /* slight rounding for smooth edges */
                opacity: 2 !important;
            }

            /* Active bullet (highlighted line) */
            .swiper .swiper-pagination-bullet-active {
                background-color: #ffffff !important;
                opacity: 1 !important;
                transform: scaleX(1.3);
                /* stretch active line a bit */
            }

            @media (max-width: 640px) {
                .player-swiper .swiper-slide {
                    display: flex;
                    justify-content: center;
                    /* center horizontally */
                    width: 100% !important;
                    /* force full width */
                }
            }
        </style> --}}

        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


        <!-- Hero Script -->
        {{-- <script>
            var swiper = new Swiper(".hero-swiper", {
                loop: true,
                speed: 800,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".hero-swiper-next",
                    prevEl: ".hero-swiper-prev",
                },
            });
        </script> --}}

        {{-- <script>
            $(document).ready(function() {
                $(".hero-slider").owlCarousel({
                    items: 1,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    dots: true,
                    nav: false,
                    autoHeight: true, // 🔥 key option
                    smartSpeed: 600,
                    animateOut: "fadeOut", // optional for smooth transition
                });
            });
        </script> --}}
        <script>
            $(document).ready(function() {
                $(".hero-slider").owlCarousel({
                    margin: 15,
                    items: 1,
                    loop: true,
                    dots: true,
                    autoplay: true,
                    nav: false,
                    autoplayTimeout: 6000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    navText: ["<i class='fa-solid fa-chevron-left'></i>",
                        "<i class='fa-solid fa-chevron-right'></i>"
                    ],
                    responsive: {
                        0: {
                            items: 1,
                            nav: false,
                        },
                        600: {
                            items: 1,
                            nav: false,
                        },
                        1000: {
                            items: 1,
                            dots: true,
                        },
                    },
                });
            });
        </script>


        <!-- Swiper Init -->
        <script>
            document.addEventListener("livewire:navigated", () => {
                const upcomingSwiper = new Swiper(".upcoming-swiper", {
                    speed: 800,
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 15,
                    // autoplay: {
                    //     delay: 4000,
                    //     disableOnInteraction: false
                    // },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 15
                        },
                    },
                    navigation: {
                        nextEl: ".upcoming-next",
                        prevEl: ".upcoming-prev",
                    },
                    on: {
                        init: function() {
                            document.querySelector(".upcoming-swiper").classList.remove("opacity-0");
                        }
                    }
                });

                const latestSwiper = new Swiper(".latest-swiper", {
                    speed: 800,
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 15,
                    // autoplay: {
                    //     delay: 4000,
                    //     disableOnInteraction: false
                    // },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 15
                        },
                    },
                    navigation: {
                        nextEl: ".latest-next",
                        prevEl: ".latest-prev",
                    },
                    on: {
                        init: function() {
                            document.querySelector(".latest-swiper").classList.remove("opacity-0");
                        }
                    }
                });

                // const playerSwiper = new Swiper(".player-swiper", {
                //     speed: 800,
                //     loop: true,
                //     slidesPerView: 1,
                //     centeredSlides: true,
                //     spaceBetween: 20,
                //     autoplay: {
                //         delay: 4000,
                //         disableOnInteraction: false
                //     },
                //     breakpoints: {
                //         640: {
                //             slidesPerView: 2,
                //             centeredSlides: false,
                //             spaceBetween: 15,
                //         },
                //         768: {
                //             slidesPerView: 3,
                //             centeredSlides: false,
                //             spaceBetween: 15,
                //         },
                //         1024: {
                //             slidesPerView: 4,
                //             centeredSlides: false,
                //             spaceBetween: 15,
                //         },
                //     },
                //     navigation: {
                //         nextEl: ".player-next",
                //         prevEl: ".player-prev",
                //     },
                //     on: {
                //         init: function() {
                //             document.querySelector(".player-swiper").classList.remove("opacity-0");
                //         }
                //     }
                // });
                const playerSwiper = new Swiper(".player-swiper", {
                    speed: 800,
                    loop: true,
                    grabCursor: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false
                    },
                    navigation: {
                        nextEl: ".player-next",
                        prevEl: ".player-prev",
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                            centeredSlides: true,
                            spaceBetween: 20,
                            slidesOffsetBefore: 60,
                            slidesOffsetAfter: 60,
                        },
                        640: {
                            slidesPerView: 2,
                            centeredSlides: false,
                            spaceBetween: 30,
                            slidesOffsetBefore: 0,
                            slidesOffsetAfter: 0,
                        },
                        1024: {
                            slidesPerView: 4,
                            centeredSlides: false,
                            spaceBetween: 30,
                        },
                    },
                });
            });
        </script>
    </div>

    @push("title")
        RCB - Homepage
    @endpush
</div>
