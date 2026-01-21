<div>
    <!-- Hero Section -->
    <section class="h-96 bg-cover bg-center relative flex items-center justify-center text-center text-white"
        style="
        background-image: url('https://images.unsplash.com/photo-1600353061844-6a6f95c8ecfe?auto=format&fit=crop&w=1950&q=80');
      ">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Welcome to RCB</h1>
            <p class="text-lg md:text-xl mb-6">
                Live Scores, Match Updates, and News – All in One Place
            </p>
            <a href="#"
                class="bg-teal-500 text-white px-6 py-3 rounded-md shadow font-medium hover:bg-teal-600 transition">
                View Latest Matches
            </a>
        </div>
    </section>

    <!-- Latest Match -->
    {{-- <section class="max-w-6xl mx-auto py-9 px-4 lg:px-11">
        <div class="flex items-center justify-between mb-4 border-b border-gray-200 relative">
            <!-- Latest Match Heading with Colored Border -->
            <h2 class="text-xl font-medium text-gray-800 relative pb-2">
                Latest Match
                <!-- Colored Border below Latest Match -->
                <span class="absolute bottom-0 left-0 w-full h-[3px] bg-teal-600"></span>
            </h2>
            <!-- View All -->
            <a href="#" class="text-gray-800 text-[14px] -mt-2 flex items-center uppercase">
                View All
                <!-- Arrow Icon -->
                <svg class="ml-2 w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M15 16l4 -4"></path>
                    <path d="M15 8l4 4"></path>
                </svg>
            </a>
        </div>
        <!-- Title -->
        <div class="relative mb-6 flex justify-center items-center">
            <!-- Title with borders -->
            <div class="flex items-center w-full max-w-3xl"> <!-- full width container -->
                <!-- Left Border -->
                <div class="border-t border-gray-200 flex-1 mr-4"></div>

                <!-- Title Text -->
                <div class="text-xl md:text-2xl font-bold text-teal-800 uppercase whitespace-nowrap">
                    Latest Match
                </div>

                <!-- Right Border -->
                <div class="border-t border-gray-200 flex-1 ml-4"></div>
            </div>

            <!-- View All Link -->
            <a href="#" class="absolute right-0 text-sm text-gray-600 hover:text-gray-700">
                View All
            </a>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
            <!-- Match Card -->
            <a wire:navigate href="{{ route("scoreboard") }}">
                <div
                    class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                    <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                        Individual Match
                    </p>
                    <div class="px-4">
                        <p class="my-3 text-xs text-gray-800">
                            Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                        </p>

                        <div class="mb-1 flex items-center justify-between">
                            <p class="text-sm font-semibold text-black">RCB</p>
                            <p class="text-base font-medium">
                                23<span class="text-black">/0</span>
                                <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                            </p>
                        </div>

                        <div class="mb-2 flex items-center justify-between">
                            <p class="text-sm font-semibold text-black">Team B4U</p>
                            <p class="text-sm font-medium">
                                <span class="text-gray-600 italic">Yet to bat</span>
                            </p>
                        </div>
                    </div>

                    <!-- Add bottom border here -->
                    <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                        RCB won <span class="text-gray-800 font-semibold">the toss and elected
                            to bat</span>.
                    </p>
                </div>
            </a>
            <a wire:navigate href="{{ route("scoreboard") }}">
                <div
                    class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                    <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                        Mirpur Sports Fest
                    </p>
                    <div class="px-4">
                        <p class="my-3 text-xs text-gray-800">
                            Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                        </p>

                        <div class="mb-1 flex items-center justify-between">
                            <p class="text-sm font-semibold text-black">IBCC</p>
                            <p class="text-base font-semibold">
                                23<span class="text-black">/0</span>
                                <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                            </p>
                        </div>

                        <div class="mb-2 flex items-center justify-between">
                            <p class="text-sm font-semibold text-black">Bela</p>
                            <p class="text-sm font-medium">
                                <span class="text-gray-600 italic">Yet to bat</span>
                            </p>
                        </div>
                    </div>
                    <!-- Add bottom border here -->
                    <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                        IBCC won <span class="text-gray-800 font-semibold">the toss and elected
                            to bat</span>.
                    </p>
                </div>
            </a>
            <a wire:navigate href="{{ route("scoreboard") }}">
                <div
                    class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                    <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                        Dhaka Series
                    </p>
                    <div class="px-4">
                        <p class="my-3 text-xs text-gray-800">
                            Banijjo Melar Maath, Agargaon, Dhaka, 20-Aug-25, 20 Ov.
                        </p>

                        <div class="mb-1 flex items-center justify-between">
                            <p class="text-sm font-semibold text-black">RCB</p>
                            <p class="text-base font-semibold">
                                133<span class="text-black">/7</span>
                                <span class="ml-1 text-sm font-normal text-gray-500">(20)</span>
                            </p>
                        </div>

                        <div class="mb-2 flex items-center justify-between">
                            <p class="text-sm font-semibold text-black">
                                Farmgate Stars
                            </p>
                            <p class="text-base font-semibold">
                                116<span class="text-black">/5</span>
                                <span class="ml-1 text-sm font-normal text-gray-500">(20)</span>
                            </p>
                        </div>
                    </div>

                    <!-- Add bottom border here -->
                    <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                        RCB won by <span class="text-gray-800 font-semibold">17 runs</span>.
                    </p>
                </div>
            </a>
            <a wire:navigate href="{{ route("scoreboard") }}">
                <div
                    class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                    <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                        Dhaka Series
                    </p>
                    <div class="px-4">
                        <p class="my-3 text-xs text-gray-800">
                            Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                        </p>

                        <div class="mb-1 flex items-center justify-between">
                            <p class="text-sm font-semibold text-gray-800">Shawon XI</p>
                            <p class="text-base font-semibold">
                                23<span class="text-black">/0</span>
                                <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                            </p>
                        </div>

                        <div class="mb-2 flex items-center justify-between">
                            <p class="text-sm font-semibold text-black">RCB</p>
                            <p class="text-sm font-medium">
                                <span class="text-gray-600 italic">Yet to bat</span>
                            </p>
                        </div>
                    </div>

                    <!-- Add bottom border here -->
                    <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                        RCB won by <span class="text-gray-800 font-semibold">8 wickets</span>.
                    </p>
                </div>
            </a>
        </div>
    </section> --}}

    <!-- Latest Match (Swiper) -->
    <section class="max-w-6xl mx-auto py-9 px-4 lg:px-11">
        <!-- Header with Arrows -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Latest Match</h2>
            <!-- Navigation Arrows -->
            <div class="flex gap-3 mt-3 md:mt-0">
                <button
                    class="match-prev bg-slate-200 group hover:bg-[#FFCB01] rounded-full w-10 h-10 flex items-center justify-center transition">
                    <i class="ti ti-chevron-left text-gray-800 group-hover:text-white" style="font-size: 21px"></i>
                </button>
                <button
                    class="match-next bg-slate-200 group hover:bg-[#FFCB01] rounded-full w-10 h-10 flex items-center justify-center transition">
                    <i class="ti ti-chevron-right text-gray-800 group-hover:text-white" style="font-size: 21px"></i>
                </button>
            </div>
        </div>

        <!-- Swiper Container -->
        <div class="match-swiper overflow-hidden opacity-0 transition-opacity">
            <div class="swiper-wrapper">
                <!-- Match Card -->
                <div class="swiper-slide">
                    <a wire:navigate href="{{ route("scoreboard") }}">
                        <div
                            class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                                Individual Match
                            </p>
                            <div class="px-4">
                                <p class="my-3 text-xs text-gray-800">
                                    Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                                </p>
                                <div class="mb-1 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">RCB</p>
                                    <p class="text-base font-medium">
                                        23<span class="text-black">/0</span>
                                        <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                                    </p>
                                </div>
                                <div class="mb-2 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">Team B4U</p>
                                    <p class="text-sm font-medium">
                                        <span class="text-gray-600 italic">Yet to bat</span>
                                    </p>
                                </div>
                            </div>
                            <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                                RCB won <span class="text-gray-800 font-semibold">the toss and elected to bat</span>.
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Repeat More Matches -->
                <div class="swiper-slide">
                    <a wire:navigate href="{{ route("scoreboard") }}">
                        <div
                            class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                                Mirpur Sports Fest
                            </p>
                            <div class="px-4">
                                <p class="my-3 text-xs text-gray-800">
                                    Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                                </p>
                                <div class="mb-1 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">IBCC</p>
                                    <p class="text-base font-semibold">
                                        23<span class="text-black">/0</span>
                                        <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                                    </p>
                                </div>
                                <div class="mb-2 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">Bela</p>
                                    <p class="text-sm font-medium">
                                        <span class="text-gray-600 italic">Yet to bat</span>
                                    </p>
                                </div>
                            </div>
                            <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                                IBCC won <span class="text-gray-800 font-semibold">the toss and elected to bat</span>.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a wire:navigate href="{{ route("scoreboard") }}">
                        <div
                            class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                                Mirpur Sports Fest
                            </p>
                            <div class="px-4">
                                <p class="my-3 text-xs text-gray-800">
                                    Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                                </p>
                                <div class="mb-1 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">IBCC</p>
                                    <p class="text-base font-semibold">
                                        23<span class="text-black">/0</span>
                                        <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                                    </p>
                                </div>
                                <div class="mb-2 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">Bela</p>
                                    <p class="text-sm font-medium">
                                        <span class="text-gray-600 italic">Yet to bat</span>
                                    </p>
                                </div>
                            </div>
                            <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                                IBCC won <span class="text-gray-800 font-semibold">the toss and elected to bat</span>.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a wire:navigate href="{{ route("scoreboard") }}">
                        <div
                            class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                                Mirpur Sports Fest 2
                            </p>
                            <div class="px-4">
                                <p class="my-3 text-xs text-gray-800">
                                    Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                                </p>
                                <div class="mb-1 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">IBCC</p>
                                    <p class="text-base font-semibold">
                                        23<span class="text-black">/0</span>
                                        <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                                    </p>
                                </div>
                                <div class="mb-2 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">Bela</p>
                                    <p class="text-sm font-medium">
                                        <span class="text-gray-600 italic">Yet to bat</span>
                                    </p>
                                </div>
                            </div>
                            <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                                IBCC won <span class="text-gray-800 font-semibold">the toss and elected to bat</span>.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a wire:navigate href="{{ route("scoreboard") }}">
                        <div
                            class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                                Mirpur Sports Fest 3
                            </p>
                            <div class="px-4">
                                <p class="my-3 text-xs text-gray-800">
                                    Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                                </p>
                                <div class="mb-1 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">IBCC</p>
                                    <p class="text-base font-semibold">
                                        23<span class="text-black">/0</span>
                                        <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                                    </p>
                                </div>
                                <div class="mb-2 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">Bela</p>
                                    <p class="text-sm font-medium">
                                        <span class="text-gray-600 italic">Yet to bat</span>
                                    </p>
                                </div>
                            </div>
                            <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                                IBCC won <span class="text-gray-800 font-semibold">the toss and elected to bat</span>.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a wire:navigate href="{{ route("scoreboard") }}">
                        <div
                            class="border border-gray-200 bg-white shadow-sm rounded-md hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="px-4 border-b border-gray-200 pt-2 text-sm text-gray-500 italic pb-2">
                                Mirpur Sports Fest 4
                            </p>
                            <div class="px-4">
                                <p class="my-3 text-xs text-gray-800">
                                    Banijjo Melar Maath, Agargaon, Dhaka, 15-Aug-25, 20 Ov.
                                </p>
                                <div class="mb-1 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">IBCC</p>
                                    <p class="text-base font-semibold">
                                        23<span class="text-black">/0</span>
                                        <span class="ml-1 text-sm font-normal text-gray-500">(1.0)</span>
                                    </p>
                                </div>
                                <div class="mb-2 flex items-center justify-between">
                                    <p class="text-sm font-semibold text-black">Bela</p>
                                    <p class="text-sm font-medium">
                                        <span class="text-gray-600 italic">Yet to bat</span>
                                    </p>
                                </div>
                            </div>
                            <p class="px-4 py-2 border-t border-gray-200 text-sm text-gray-500">
                                IBCC won <span class="text-gray-800 font-semibold">the toss and elected to bat</span>.
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Add other match cards in swiper-slide -->
            </div>
        </div>
    </section>




    <!-- Upcoming Fixtures -->
    {{-- <section class="py-9">
        <div class="max-w-6xl mx-auto px-4 lg:px-11">
            <div class="flex items-center justify-between mb-4 border-b border-gray-200 relative">
                <!-- Upcoming Fixtures Heading with Colored Border -->
                <h2 class="text-xl font-medium text-gray-800 relative pb-2">
                    Upcoming Fixtures
                    <!-- Colored Border below Upcoming Fixtures -->
                    <span class="absolute bottom-0 left-0 w-full h-[3px] bg-teal-600"></span>
                </h2>
                <!-- View All -->
                <a href="#" class="text-gray-800 text-[14px] -mt-2 flex items-center uppercase">
                    View All
                    <!-- Arrow Icon -->
                    <svg class="ml-2 w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
                        <path d="M15 16l4 -4"></path>
                        <path d="M15 8l4 4"></path>
                    </svg>
                </a>
            </div>
            <div class="flex items-center justify-between mb-6">
                <!-- Centered Title with Borders -->
                <h3 class="flex items-center flex-grow">
                    <span class="flex-grow border-t border-gray-200"></span>
                    <span class="mx-4 text-xl md:text-2xl font-bold text-teal-800 uppercase">Upcoming Fixtures</span>
                    <span class="flex-grow border-t border-gray-200"></span>
                </h3>

                <!-- View All Link -->
                <a href="#" class="ml-4 text-sm text-gray-600 hover:text-gray-700 whitespace-nowrap">
                    View All
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                <!-- Fixture Card -->
                <div
                    class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                    <p class="text-sm text-gray-500 italic mb-1">ODI Match</p>
                    <h3 class="text-base font-semibold text-black">
                        BAN vs IN
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Dhaka Stadium, 15 Aug 2025, 14:00
                    </p>
                    <div class="flex items-center justify-end text-sm">
                        <a href="#"
                            class="text-teal-600 hover:underline transition duration-300 ease-in-out">Match
                            Details</a>
                    </div>
                </div>
                <!-- Fixture Card -->
                <div
                    class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                    <p class="text-sm text-gray-500 italic mb-1">ODI Match</p>
                    <h3 class="text-base font-semibold text-black">WI vs PAK</h3>
                    <p class="text-gray-600 text-sm mb-3">Kansas, 15 Aug 2025, 14:00</p>
                    <div class="flex items-center justify-end text-sm">
                        <a href="#"
                            class="text-teal-600 hover:underline transition duration-300 ease-in-out">Match
                            Details</a>
                    </div>
                </div>

                <!-- Fixture Card -->
                <div
                    class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                    <p class="text-sm text-gray-500 italic mb-1">T20 Match</p>
                    <h3 class="text-base font-semibold text-black">
                        AUS vs ENG
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">MCG, 20 Aug 2025, 18:30</p>
                    <div class="flex items-center justify-end text-sm">
                        <a href="#"
                            class="text-teal-600 hover:underline transition duration-300 ease-in-out">Match
                            Details</a>
                    </div>
                </div>

                <!-- Fixture Card -->
                <div
                    class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                    <p class="text-sm text-gray-500 italic mb-1">Test Match</p>
                    <h3 class="text-base font-semibold text-black">
                        PAK vs SA
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">
                        Karachi Stadium, 25 Aug 2025, 10:00
                    </p>
                    <div class="flex items-center justify-end text-sm">
                        <a href="#"
                            class="text-teal-600 hover:underline transition duration-300 ease-in-out">Match
                            Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Upcoming Fixtures (Swiper) -->
    <section class="py-9">
        <div class="max-w-6xl mx-auto px-4 lg:px-11">

            <!-- Header with Arrows -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Upcoming Fixtures</h2>
                <!-- Navigation Arrows -->
                <div class="flex gap-3 mt-3 md:mt-0">
                    <button
                        class="fixture-prev bg-slate-200 group hover:bg-[#FFCB01] rounded-full w-10 h-10 flex items-center justify-center transition">
                        <i class="ti ti-chevron-left text-gray-800 group-hover:text-white"
                            style="font-size: 21px"></i>
                    </button>
                    <button
                        class="fixture-next bg-slate-200 group hover:bg-[#FFCB01] rounded-full w-10 h-10 flex items-center justify-center transition">
                        <i class="ti ti-chevron-right text-gray-800 group-hover:text-white"
                            style="font-size: 21px"></i>
                    </button>
                </div>
            </div>

            <!-- Swiper Container -->
            <div class="fixture-swiper overflow-hidden opacity-0 transition-opacity">
                <div class="swiper-wrapper">
                    <!-- Fixture Card -->
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="text-sm text-gray-500 italic mb-1">ODI Match</p>
                            <h3 class="text-base font-semibold text-black">BAN vs IN</h3>
                            <p class="text-gray-600 text-sm mb-3">Dhaka Stadium, 15 Aug 2025, 14:00</p>
                            <div class="flex items-center justify-end text-sm">
                                <a href="#" class="text-teal-600 hover:underline">Match Details</a>
                            </div>
                        </div>
                    </div>

                    <!-- Fixture Card -->
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="text-sm text-gray-500 italic mb-1">ODI Match</p>
                            <h3 class="text-base font-semibold text-black">WI vs PAK</h3>
                            <p class="text-gray-600 text-sm mb-3">Kansas, 15 Aug 2025, 14:00</p>
                            <div class="flex items-center justify-end text-sm">
                                <a href="#" class="text-teal-600 hover:underline">Match Details</a>
                            </div>
                        </div>
                    </div>

                    <!-- Fixture Card -->
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="text-sm text-gray-500 italic mb-1">T20 Match</p>
                            <h3 class="text-base font-semibold text-black">AUS vs ENG</h3>
                            <p class="text-gray-600 text-sm mb-3">MCG, 20 Aug 2025, 18:30</p>
                            <div class="flex items-center justify-end text-sm">
                                <a href="#" class="text-teal-600 hover:underline">Match Details</a>
                            </div>
                        </div>
                    </div>

                    <!-- Fixture Card -->
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="text-sm text-gray-500 italic mb-1">Test Match</p>
                            <h3 class="text-base font-semibold text-black">PAK vs SA</h3>
                            <p class="text-gray-600 text-sm mb-3">Karachi Stadium, 25 Aug 2025, 10:00</p>
                            <div class="flex items-center justify-end text-sm">
                                <a href="#" class="text-teal-600 hover:underline">Match Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="text-sm text-gray-500 italic mb-1">Test Match 2</p>
                            <h3 class="text-base font-semibold text-black">PAK vs SA</h3>
                            <p class="text-gray-600 text-sm mb-3">Karachi Stadium, 25 Aug 2025, 10:00</p>
                            <div class="flex items-center justify-end text-sm">
                                <a href="#" class="text-teal-600 hover:underline">Match Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-sm rounded-md p-4 border border-gray-200 hover:shadow-xl transition duration-500 ease-in-out">
                            <p class="text-sm text-gray-500 italic mb-1">Test Match 3</p>
                            <h3 class="text-base font-semibold text-black">PAK vs SA</h3>
                            <p class="text-gray-600 text-sm mb-3">Karachi Stadium, 25 Aug 2025, 10:00</p>
                            <div class="flex items-center justify-end text-sm">
                                <a href="#" class="text-teal-600 hover:underline">Match Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- News Section -->
    <section class="py-9">
        <div class="max-w-6xl mx-auto px-4 lg:px-11">
            {{-- <div class="flex items-center justify-between mb-4 border-b border-gray-200 relative">
                <!-- Latest News Heading with Colored Border -->
                <h2 class="text-xl font-medium text-gray-800 relative pb-2">
                    Latest News
                    <!-- Colored Border below Latest News -->
                    <span class="absolute bottom-0 left-0 w-full h-[3px] bg-teal-600"></span>
                </h2>
                <!-- View All -->
                <a href="#" class="text-gray-800 text-[14px] -mt-2 flex items-center uppercase">
                    View All
                    <!-- Arrow Icon -->
                    <svg class="ml-2 w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
                        <path d="M15 16l4 -4"></path>
                        <path d="M15 8l4 4"></path>
                    </svg>
                </a>
            </div> --}}
            <div class="flex items-center justify-between mb-6">
                <!-- Centered Title with Borders -->
                <h3 class="flex items-center flex-grow">
                    <span class="flex-grow border-t border-gray-200"></span>
                    <span class="mx-4 text-xl md:text-2xl font-bold text-teal-800 uppercase">Latest News</span>
                    <span class="flex-grow border-t border-gray-200"></span>
                </h3>

                <!-- View All Link -->
                <a href="#" class="ml-4 text-sm text-gray-600 hover:text-gray-700 whitespace-nowrap">
                    View All
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                <!-- News Card 1 -->
                <div
                    class="bg-white border border-gray-200 shadow-sm rounded-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out">
                    <img src="https://source.unsplash.com/400x250/?cricket,stadium" alt="News Image"
                        class="w-full h-48 object-cover" />
                    <div class="p-5">
                        <span class="text-sm text-gray-500">August 11, 2025</span>
                        <h3
                            class="text-base font-semibold mt-2 mb-3 hover:text-teal-600 cursor-pointer transition duration-200 ease-in-out">
                            আলহামদুলিল্লাহ গত ম্যাচ হারার পর আজকে বড় একটা ম্যাচ জিতেছি
                        </h3>
                        <p class="text-gray-600 text-sm">
                            In an electrifying match, Team A secured the championship with a
                            stunning performance...
                        </p>
                        <a href="#" class="text-gray-700 text-sm font-semibold mt-3 inline-block">Read More
                            →</a>
                    </div>
                </div>

                <!-- News Card 2 -->
                <div
                    class="bg-white border border-gray-200 shadow-sm rounded-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out">
                    <img src="https://source.unsplash.com/400x250/?cricket,bat" alt="News Image"
                        class="w-full h-48 object-cover" />
                    <div class="p-5">
                        <span class="text-sm text-gray-500">August 10, 2025</span>
                        <h3
                            class="text-base font-semibold mt-2 mb-3 hover:text-teal-600 cursor-pointer transition duration-200 ease-in-out">
                            Star Player Breaks Record
                        </h3>
                        <p class="text-gray-600 text-sm">
                            With an outstanding batting performance, the star player
                            shattered previous records...
                        </p>
                        <a href="#" class="text-gray-700 text-sm font-semibold mt-3 inline-block">Read More
                            →</a>
                    </div>
                </div>

                <!-- News Card 3 -->
                <div
                    class="bg-white border border-gray-200 shadow-sm rounded-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out">
                    <img src="https://resources.cricket-australia.pulselive.com/photo-resources/2024/12/18/6c38da33-f835-42cd-a345-4f74628b38c4/Cummins-bats.jpg?width=950&height=535"
                        alt="News Image" class="w-full h-48 object-cover" />
                    <div class="p-5">
                        <span class="text-sm text-gray-500">August 8, 2025</span>
                        <h3
                            class="text-base font-semibold mt-2 mb-3 hover:text-teal-600 cursor-pointer transition duration-200 ease-in-out">
                            Upcoming Tournament Announced
                        </h3>
                        <p class="text-gray-600 text-sm">
                            Cricket lovers rejoice! The national cricket board has just
                            announced the schedule...
                        </p>
                        <a href="#" class="text-gray-700 text-sm font-semibold mt-3 inline-block">Read More
                            →</a>
                    </div>
                </div>

                <!-- News Card 4 -->
                <div
                    class="bg-white border border-gray-200 shadow-sm rounded-md overflow-hidden hover:shadow-xl transition duration-300 ease-in-out">
                    <img src="https://source.unsplash.com/400x250/?cricket,ball" alt="News Image"
                        class="w-full h-48 object-cover" />
                    <div class="p-5">
                        <span class="text-sm text-gray-500">August 8, 2025</span>
                        <h3
                            class="text-base font-semibold mt-2 mb-3 hover:text-teal-600 cursor-pointer transition duration-200 ease-in-out">
                            Upcoming Tournament Announced
                        </h3>
                        <p class="text-gray-600 text-sm">
                            Cricket lovers rejoice! The national cricket board has just
                            announced the schedule...
                        </p>
                        <a href="#" class="text-gray-700 text-sm font-semibold mt-3 inline-block">Read More
                            →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SwiperJS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- SwiperJS Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Swiper Init -->
    <script>
        const matchSwiper = new Swiper(".match-swiper", {
            speed: 800,
            loop: true,
            slidesPerView: 1,
            spaceBetween: 16,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 16
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 16
                },
            },
            navigation: {
                nextEl: ".match-next",
                prevEl: ".match-prev",
            },
            on: {
                init: function() {
                    document.querySelector(".match-swiper").classList.remove("opacity-0");
                }
            }
        });

        const fixtureSwiper = new Swiper(".fixture-swiper", {
            speed: 800,
            loop: true,
            slidesPerView: 1,
            spaceBetween: 16,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 16
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 16
                },
            },
            navigation: {
                nextEl: ".fixture-next",
                prevEl: ".fixture-prev",
            },
            on: {
                init: function() {
                    document.querySelector(".fixture-swiper").classList.remove("opacity-0");
                }
            }
        });
    </script>

    <!-- Swiper Init -->
    {{-- <script>
        const fixtureSwiper = new Swiper(".fixture-swiper", {
            speed: 800,
            loop: true,
            slidesPerView: 1,
            spaceBetween: 16,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 16
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 16
                },
            },
            navigation: {
                nextEl: ".fixture-next",
                prevEl: ".fixture-prev",
            },
            on: {
                init: function() {
                    document.querySelector(".fixture-swiper").classList.remove("opacity-0");
                }
            }
        });
    </script> --}}
</div>
