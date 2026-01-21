<div>
    <div>
        <!-- Hero Section -->
        <section class="mt-14 lg:mt-40">
            <div class="swiper hero-swiper h-[600px] relative overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <img src="{{ asset(@$slider->media?->path) }}" alt="{{ $slider->title }}"
                                class="w-full h-full object-cover" />
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>

                <!-- Navigation Buttons -->
                <div>
                    <button
                        class="hero-swiper-prev absolute top-1/2 left-2 transform -translate-y-1/2 z-10 flex h-11 w-11 items-center justify-center rounded-full bg-teal-500 text-white focus:outline-none">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                    </button>
                    <button
                        class="hero-swiper-next absolute top-1/2 right-2 transform -translate-y-1/2 z-10 flex h-11 w-11 items-center justify-center rounded-full bg-teal-500 text-white focus:outline-none">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>

        </section>

        <!-- Latest Result -->
        <section class="pt-10 pb-14">
            <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
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
                                <a href="{{ route("frontend.scoreboard", $match->id) }}"
                                    @click.prevent="Livewire.navigate('{{ route("frontend.scoreboard", $match->id) }}')"
                                    class="block">
                                    <div class="bg-white rounded-md border shadow-sm flex flex-col h-[220px] relative">

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
                                                    <img class="w-11 h-11 rounded-full ring-1 ring-gray-200"
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
                                                    <img class="w-11 h-11 rounded-full ring-1 ring-gray-200"
                                                        src="{{ asset(@$match->team2?->media?->path) }}"
                                                        alt="{{ @$match->team2?->name_en }}">
                                                </div>
                                            </div>

                                            <!-- Team Names -->
                                            <div class="mt-3 flex justify-between text-sm font-semibold">
                                                <span class="text-gray-800 text-left w-1/2 pr-2"
                                                    title="{{ @$match->team1?->name_en }}">
                                                    {{ @$match->team1?->name_en }}
                                                    {{-- {{ app()->getLocale() === 'bn' ? $match->team1?->name_bn : $match->team1?->name_en }} --}}
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
            </div>
        </section>

        <!-- Upcoming Fixtures -->
        <section class="pt-10 pb-14">
            <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
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
                                    <div class="bg-white rounded-md border shadow-sm flex flex-col h-[220px] relative">

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
                                                    <img class="w-11 h-11 rounded-full ring-1 ring-gray-200"
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
                                                    <img class="w-11 h-11 rounded-full ring-1 ring-gray-200"
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
            </div>
        </section>


        <!-- News Section -->
        <section class="pb-14">
            <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4">
                <div class="flex items-center justify-between mb-6">
                    <!-- Centered Title with Borders -->
                    <h3 class="flex items-center flex-grow">
                        <span class="text-xl font-bold text-gray-800 uppercase">
                            {{ __("messages.latest_news") }}
                        </span>
                    </h3>

                    <!-- View All -->
                    <a href="{{ route("frontend.news") }}"
                        class="inline-block px-5 py-2 text-sm font-semibold border border-teal-500 text-gray-800 hover:bg-teal-500 hover:text-white rounded-full transition duration-300 ease-in-out">
                        {{ __("messages.view_all") }}
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @foreach ($news as $item)
                        <div
                            class="bg-white border border-gray-200 shadow-sm rounded-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out">

                            <!-- News Image -->
                            <img src="{{ asset(@$item->media?->path) }}" alt="{{ $item->title_en }}"
                                class="w-full h-48 object-cover" />

                            <!-- News Content -->
                            <div class="p-4">
                                <span class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($item->date)->format("d M Y") }}
                                </span>

                                <h3
                                    class="text-lg font-semibold my-2 hover:text-teal-600 cursor-pointer transition duration-200 ease-in-out">
                                    <a href="{{ route("frontend.news.detail", $item->slug) }}"
                                        title='{{ $item->title_en }}'>
                                        {{ str()->limit(strip_tags($item->title_en), 50) }}
                                    </a>
                                </h3>

                                <p class="text-gray-600 text-sm line-clamp-3">
                                    {!! Str::limit(strip_tags($item->desc_en), 120) !!}
                                </p>

                                <a href="{{ route("frontend.news.detail", $item->slug) }}"
                                    class="text-gray-700 text-sm font-semibold mt-3 inline-block hover:text-teal-500 hover:underline">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Players Section -->
        <section class="text-white pb-0 relative">
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
                {{-- <div class="player-swiper overflow-hidden">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div
                            class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                            <img src="https://media.gqindia.com/wp-content/uploads/amp-stories/babar-azams-expensive-car-bikes/assets/5.jpeg"
                                alt="Player"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                <h3 class="text-lg font-semibold mb-4">Player Stats</h3>
                                <ul class="text-lg text-white/90 space-y-1 mb-6">
                                    <li><span class="font-medium">Matches:</span> 52</li>
                                    <li><span class="font-medium">Runs:</span> 1490</li>
                                    <li><span class="font-medium">Average:</span> 34.0</li>
                                </ul>
                                <a class="inline-block px-5 py-2 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                    href="#">
                                    View Profile
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-4 py-3 flex items-center">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                        🏏
                                    </div>
                                    <div class="w-px h-6 bg-white/20"></div>
                                    <div class="ml-0 text-white text-sm font-semibold tracking-wide">SYED ADIB
                                        RAHMAN</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                            class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                            <img src="https://media.gqindia.com/wp-content/uploads/amp-stories/babar-azams-expensive-car-bikes/assets/5.jpeg"
                                alt="Player"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                <h3 class="text-lg font-semibold mb-4">Player Stats</h3>
                                <ul class="text-lg text-white/90 space-y-1 mb-6">
                                    <li><span class="font-medium">Matches:</span> 52</li>
                                    <li><span class="font-medium">Runs:</span> 1490</li>
                                    <li><span class="font-medium">Average:</span> 34.0</li>
                                </ul>
                                <a class="inline-block px-5 py-2 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                    href="#">
                                    View Profile
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-4 py-3 flex items-center">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                        🏏
                                    </div>
                                    <div class="w-px h-6 bg-white/20"></div>
                                    <div class="ml-0 text-white text-sm font-semibold tracking-wide">SYED ADIB
                                        RAHMAN 2</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                            class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                            <img src="https://media.gqindia.com/wp-content/uploads/amp-stories/babar-azams-expensive-car-bikes/assets/5.jpeg"
                                alt="Player"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                <h3 class="text-lg font-semibold mb-4">Player Stats</h3>
                                <ul class="text-lg text-white/90 space-y-1 mb-6">
                                    <li><span class="font-medium">Matches:</span> 52</li>
                                    <li><span class="font-medium">Runs:</span> 1490</li>
                                    <li><span class="font-medium">Average:</span> 34.0</li>
                                </ul>
                                <a class="inline-block px-5 py-2 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                    href="#">
                                    View Profile
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-4 py-3 flex items-center">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                        🏏
                                    </div>
                                    <div class="w-px h-6 bg-white/20"></div>
                                    <div class="ml-0 text-white text-sm font-semibold tracking-wide">SYED ADIB
                                        RAHMAN 3</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                            class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                            <img src="https://media.gqindia.com/wp-content/uploads/amp-stories/babar-azams-expensive-car-bikes/assets/5.jpeg"
                                alt="Player"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                <h3 class="text-lg font-semibold mb-4">Player Stats</h3>
                                <ul class="text-lg text-white/90 space-y-1 mb-6">
                                    <li><span class="font-medium">Matches:</span> 52</li>
                                    <li><span class="font-medium">Runs:</span> 1490</li>
                                    <li><span class="font-medium">Average:</span> 34.0</li>
                                </ul>
                                <a class="inline-block px-5 py-2 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                    href="#">
                                    View Profile
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-4 py-3 flex items-center">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                        🏏
                                    </div>
                                    <div class="w-px h-6 bg-white/20"></div>
                                    <div class="ml-0 text-white text-sm font-semibold tracking-wide">SYED ADIB
                                        RAHMAN 4</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="swiper-slide">
                        <div
                            class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                            <img src="https://media.gqindia.com/wp-content/uploads/amp-stories/babar-azams-expensive-car-bikes/assets/5.jpeg"
                                alt="Player"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                <h3 class="text-lg font-semibold mb-4">Player Stats</h3>
                                <ul class="text-lg text-white/90 space-y-1 mb-6">
                                    <li><span class="font-medium">Matches:</span> 52</li>
                                    <li><span class="font-medium">Runs:</span> 1490</li>
                                    <li><span class="font-medium">Average:</span> 34.0</li>
                                </ul>
                                <a class="inline-block px-5 py-2 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                    href="#">
                                    View Profile
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-4 py-3 flex items-center">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                        🏏
                                    </div>
                                    <div class="w-px h-6 bg-white/20"></div>
                                    <div class="ml-0 text-white text-sm font-semibold tracking-wide">SYED ADIB
                                        RAHMAN 5</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="swiper-slide">
                        <div
                            class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                            <img src="https://media.gqindia.com/wp-content/uploads/amp-stories/babar-azams-expensive-car-bikes/assets/5.jpeg"
                                alt="Player"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                <h3 class="text-lg font-semibold mb-4">Player Stats</h3>
                                <ul class="text-lg text-white/90 space-y-1 mb-6">
                                    <li><span class="font-medium">Matches:</span> 52</li>
                                    <li><span class="font-medium">Runs:</span> 1490</li>
                                    <li><span class="font-medium">Average:</span> 34.0</li>
                                </ul>
                                <a class="inline-block px-5 py-2 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                    href="#">
                                    View Profile
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-4 py-3 flex items-center">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                        🏏
                                    </div>
                                    <div class="w-px h-6 bg-white/20"></div>
                                    <div class="ml-0 text-white text-sm font-semibold tracking-wide">SYED ADIB
                                        RAHMAN 6</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                            class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                            <img src="https://media.gqindia.com/wp-content/uploads/amp-stories/babar-azams-expensive-car-bikes/assets/5.jpeg"
                                alt="Player"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                <h3 class="text-lg font-semibold mb-4">Player Stats</h3>
                                <ul class="text-lg text-white/90 space-y-1 mb-6">
                                    <li><span class="font-medium">Matches:</span> 52</li>
                                    <li><span class="font-medium">Runs:</span> 1490</li>
                                    <li><span class="font-medium">Average:</span> 34.0</li>
                                </ul>
                                <a class="inline-block px-5 py-2 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                    href="#">
                                    View Profile
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-4 py-3 flex items-center">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                        🏏
                                    </div>
                                    <div class="w-px h-6 bg-white/20"></div>
                                    <div class="ml-0 text-white text-sm font-semibold tracking-wide">SYED ADIB
                                        RAHMAN 7</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div
                            class="group relative h-80 rounded-2xl overflow-hidden border border-white/10 bg-white/3 backdrop-blur-sm">
                            <img src="https://media.gqindia.com/wp-content/uploads/amp-stories/babar-azams-expensive-car-bikes/assets/5.jpeg"
                                alt="Player"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />
                            <div
                                class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                <h3 class="text-lg font-semibold mb-4">Player Stats</h3>
                                <ul class="text-lg text-white/90 space-y-1 mb-6">
                                    <li><span class="font-medium">Matches:</span> 52</li>
                                    <li><span class="font-medium">Runs:</span> 1490</li>
                                    <li><span class="font-medium">Average:</span> 34.0</li>
                                </ul>
                                <a class="inline-block px-5 py-2 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                    href="#">
                                    View Profile
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 z-50 bg-black/70 px-4 py-3 flex items-center">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-white/10 border border-white/20 flex items-center justify-center text-sm">
                                        🏏
                                    </div>
                                    <div class="w-px h-6 bg-white/20"></div>
                                    <div class="ml-0 text-white text-sm font-semibold tracking-wide">SYED ADIB
                                        RAHMAN 8</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- add more slides -->
                </div>
            </div> --}}

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
                                    <img src="{{ asset($player->media?->path ?? "images/user_profile.webp") }}"
                                        alt="{{ $player->first_name_en }}"
                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 transform group-hover:scale-105" />

                                    <!-- Hover Overlay -->
                                    <div
                                        class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col items-center justify-center text-center p-6">
                                        <h3 class="text-lg font-semibold mb-3">{{ __('messages.player_stats') }}</h3>
                                        <ul class="text-lg text-white/90 space-y-1 mb-3">
                                            <li><span class="font-medium">{{ __('messages.matches') }}:</span>
                                                {{ $player->matches ?? 0 }}
                                            </li>
                                            <li><span class="font-medium">{{ __('messages.runs') }}:</span>
                                                {{ $player->runs ?? 0 }}</li>
                                            <li><span class="font-medium">{{ __('messages.average') }}:</span>
                                                {{ $player->average ?? 0 }}
                                            </li>
                                        </ul>
                                        <a class="inline-block px-5 py-1.5 text-sm font-medium rounded-full bg-teal-500 text-white hover:bg-teal-600 transition"
                                            href="{{ route("frontend.profile", $player->slug) }}">
                                            {{ __('messages.view_profile') }}
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
                                                {{ strtoupper(app()->getLocale() === 'bn' ? $player->first_name_bn : $player->first_name_en) }}
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
        </section>

        <style>
            /* All bullets */
            .swiper .swiper-pagination-bullet {
                width: 11px !important;
                height: 11px !important;
                background-color: #14b8a6 !important;
                /* teal-500 */
                opacity: 0.5 !important;
            }

            /* Active bullet */
            .swiper .swiper-pagination-bullet-active {
                background-color: #0d9488 !important;
                /* teal-600 */
                opacity: 1 !important;
                transform: scale(1.2);
            }
        </style>

        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


        <!-- Hero Script -->
        <script>
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
        </script>

        <!-- Swiper Init -->
        <script>
            document.addEventListener("livewire:navigated", () => {
                const upcomingSwiper = new Swiper(".upcoming-swiper", {
                    speed: 800,
                    loop: true,
                    slidesPerView: 1,
                    // spaceBetween: 1,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 14
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 14
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
                    // spaceBetween: 10,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 14
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 14
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

                const playerSwiper = new Swiper(".player-swiper", {
                    speed: 800,
                    loop: true,
                    slidesPerView: 4,
                    spaceBetween: 14,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2
                        },
                        1024: {
                            slidesPerView: 4
                        },
                    },
                    navigation: {
                        nextEl: ".player-next",
                        prevEl: ".player-prev",
                    },
                    on: {
                        init: function() {
                            document.querySelector(".player-swiper").classList.remove("opacity-0");
                        }
                    }
                });
            });
        </script>
    </div>
</div>
