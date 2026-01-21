<div>
    <div class="mx-auto mt-32 bg-white px-2 sm:px-6 lg:px-11 pt-9 overflow-hidden">
        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4">
            <!-- Player Image -->
            <div class="bg-gray-200">
                <img src="https://ss-i.thgim.com/public/cricket/5j36mg/article54606378.ece/alternates/FREE_385/malikjpg"
                    alt="Player Photo" class="object-cover h-full w-full" />
            </div>

            <!-- Player Info -->
            <div class="md:col-span-2 flex flex-col p-0 lg:p-6">
                <div class="mt-6 lg:mt-0">
                    <!-- Name & Role -->
                    <h1 class="text-3xl font-semibold text-gray-800">Shoaib Malik</h1>
                    <p class="text-sm text-teal-500">
                        All-rounder | Right-hand bat, Right-arm fast
                    </p>
                    <p class="text-sm text-gray-700 mt-1 mb-4">Karachi, Pakistan</p>

                    <!-- Player Details Panel -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="block text-gray-500">Full Name</span>
                            <span class="font-medium text-gray-800">Shoaib Malik</span>
                        </div>
                        <div>
                            <span class="block text-gray-500">Date of Birth</span>
                            <span class="font-medium text-gray-800">15 May 1981</span>
                        </div>
                        <div>
                            <span class="block text-gray-500">Batting Style</span>
                            <span class="font-medium text-gray-800">Right-hand bat</span>
                        </div>
                        <div>
                            <span class="block text-gray-500">Bowling Style</span>
                            <span class="font-medium text-gray-800">Right-arm fast</span>
                        </div>
                    </div>

                    <!-- Stats Row -->
                    <div class="bg-white mt-6 p-4">
                        <div class="grid grid-cols-3 divide-x divide-gray-300 text-center">
                            <div class="px-2 sm:px-4 min-w-[70px]">
                                <div class="text-2xl sm:text-4xl font-bold text-teal-600">
                                    54
                                </div>
                                <div class="text-sm sm:text-xl font-medium text-gray-700">
                                    Matches
                                </div>
                            </div>
                            <div class="px-2 sm:px-4 min-w-[70px]">
                                <div class="text-2xl sm:text-4xl font-bold text-yellow-600">
                                    1789
                                </div>
                                <div class="text-sm sm:text-xl font-medium text-gray-700">
                                    Runs
                                </div>
                            </div>
                            <div class="px-2 sm:px-4 min-w-[70px]">
                                <div class="text-2xl sm:text-4xl font-bold text-red-600">
                                    76
                                </div>
                                <div class="text-sm sm:text-xl font-medium text-gray-700">
                                    Wickets
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Player -->
        <div class="mt-6">
            <div class="flex items-center justify-between mb-6 border-b border-gray-200 relative">
                <!-- About Player Heading with Colored Border -->
                <h2 class="text-lg font-semibold text-gray-800 relative pb-2">
                    About Player
                    <!-- Colored Border below About Player -->
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-teal-500"></span>
                </h2>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed">
                Shoaib Malik is an all-rounder who has been a consistent performer for
                his country. Known for his aggressive batting and lethal pace bowling,
                he has played key roles in numerous victories. Off the field, he is
                admired for his leadership and sportsmanship.
            </p>
        </div>

        <div class="flex items-center justify-between my-6 border-b border-gray-200 relative">
            <!-- Player Stats Heading with Colored Border -->
            <h2 class="text-lg font-semibold text-gray-800 relative pb-2">
                Statistics
                <!-- Colored Border below Player Stats -->
                <span class="absolute bottom-0 left-0 w-full h-[2px] bg-teal-500"></span>
            </h2>
        </div>

        <!-- Tabs -->
        <div class="mt-6" x-data="{ tab: 'batting' }">
            <div class="flex gap-9 mt-4 border-b border-gray-200">
                <button @click="tab = 'batting'"
                    :class="tab === 'batting' ? 'border-b-2 border-teal-600 text-teal-600 font-semibold' : 'text-gray-700'"
                    class="pb-2 transition">
                    Batting
                </button>
                <button @click="tab = 'bowling'"
                    :class="tab === 'bowling' ? 'border-b-2 border-teal-600 text-teal-600 font-semibold' : 'text-gray-700'"
                    class="pb-2 transition">
                    Bowling
                </button>
                <button @click="tab = 'fielding'"
                    :class="tab === 'fielding' ? 'border-b-2 border-teal-600 text-teal-600 font-semibold' : 'text-gray-700'"
                    class="pb-2 transition">
                    Fielding
                </button>
            </div>

            <!-- Batting Stats -->
            <div x-show="tab === 'batting'" class="mt-4" style="display: none">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse text-sm text-left">
                        <thead class="bg-gray-50 text-gray-800">
                            <tr>
                                <th class="p-3 whitespace-nowrap">Batting</th>
                                <th class="p-3 whitespace-nowrap">M</th>
                                <th class="p-3 whitespace-nowrap">Inns</th>
                                <th class="p-3 whitespace-nowrap">NO</th>
                                <th class="p-3 whitespace-nowrap">Runs</th>
                                <th class="p-3 whitespace-nowrap">Avg</th>
                                <th class="p-3 whitespace-nowrap">HS</th>
                                <th class="p-3 whitespace-nowrap">S/R</th>
                                <th class="p-3 whitespace-nowrap">50s</th>
                                <th class="p-3 whitespace-nowrap">100s</th>
                                <th class="p-3 whitespace-nowrap">4s</th>
                                <th class="p-3 whitespace-nowrap">6s</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            <tr class="border-t">
                                <td class="p-3">2024</td>
                                <td class="p-3">34</td>
                                <td class="p-3">32</td>
                                <td class="p-3">5</td>
                                <td class="p-3">1234</td>
                                <td class="p-3">45.6</td>
                                <td class="p-3">110</td>
                                <td class="p-3">88.5</td>
                                <td class="p-3">8</td>
                                <td class="p-3">3</td>
                                <td class="p-3">120</td>
                                <td class="p-3">25</td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3">2025</td>
                                <td class="p-3">20</td>
                                <td class="p-3">19</td>
                                <td class="p-3">3</td>
                                <td class="p-3">555</td>
                                <td class="p-3">37.8</td>
                                <td class="p-3">75*</td>
                                <td class="p-3">132.1</td>
                                <td class="p-3">5</td>
                                <td class="p-3">0</td>
                                <td class="p-3">60</td>
                                <td class="p-3">22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bowling Stats -->
            <div x-show="tab === 'bowling'" x-cloak class="mt-4" style="display: none">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse text-sm text-left">
                        <thead class="bg-gray-50 text-gray-800">
                            <tr>
                                <th class="p-3 whitespace-nowrap">Bowling</th>
                                <th class="p-3 whitespace-nowrap">M</th>
                                <th class="p-3 whitespace-nowrap">Inns</th>
                                <th class="p-3 whitespace-nowrap">Over</th>
                                <th class="p-3 whitespace-nowrap">Ball</th>
                                <th class="p-3 whitespace-nowrap">Mdns</th>
                                <th class="p-3 whitespace-nowrap">Run</th>
                                <th class="p-3 whitespace-nowrap">Wkts</th>
                                <th class="p-3 whitespace-nowrap">BBI</th>
                                <th class="p-3 whitespace-nowrap">Avg</th>
                                <th class="p-3 whitespace-nowrap">Eco</th>
                                <th class="p-3 whitespace-nowrap">3w</th>
                                <th class="p-3 whitespace-nowrap">5w</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            <tr class="border-t">
                                <td class="p-3">2024</td>
                                <td class="p-3">34</td>
                                <td class="p-3">32</td>
                                <td class="p-3">240.4</td>
                                <td class="p-3">1444</td>
                                <td class="p-3">15</td>
                                <td class="p-3">1200</td>
                                <td class="p-3">45</td>
                                <td class="p-3">5/32</td>
                                <td class="p-3">26.4</td>
                                <td class="p-3">4.8</td>
                                <td class="p-3">3</td>
                                <td class="p-3">1</td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3">2025</td>
                                <td class="p-3">20</td>
                                <td class="p-3">19</td>
                                <td class="p-3">80.0</td>
                                <td class="p-3">480</td>
                                <td class="p-3">2</td>
                                <td class="p-3">500</td>
                                <td class="p-3">31</td>
                                <td class="p-3">4/28</td>
                                <td class="p-3">21.2</td>
                                <td class="p-3">7.1</td>
                                <td class="p-3">2</td>
                                <td class="p-3">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Fielding Stats -->
            <div x-show="tab === 'fielding'" x-cloak class="mt-4" style="display: none">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse text-sm text-left">
                        <thead class="bg-gray-50 text-gray-800">
                            <tr>
                                <th class="p-3 whitespace-nowrap">Fielding</th>
                                <th class="p-3 whitespace-nowrap">M</th>
                                <th class="p-3 whitespace-nowrap">Inns</th>
                                <th class="p-3 whitespace-nowrap">Catches</th>
                                <th class="p-3 whitespace-nowrap">Stumps</th>
                                <th class="p-3 whitespace-nowrap">Run Outs</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            <tr class="border-t">
                                <td class="p-3">2024</td>
                                <td class="p-3">34</td>
                                <td class="p-3">32</td>
                                <td class="p-3">18</td>
                                <td class="p-3">4</td>
                                <td class="p-3">5</td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3">2025</td>
                                <td class="p-3">20</td>
                                <td class="p-3">19</td>
                                <td class="p-3">9</td>
                                <td class="p-3">1</td>
                                <td class="p-3">2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
