<div>
    <div class="max-w-6xl mx-auto bg-white mt-20 lg:mt-8 px-6 lg:px-0 pt-9 overflow-hidden">
        <!-- Top Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 px-3">
            <!-- Player Image -->
            <div class="bg-gray-200">
                <img src="{{ asset(optional($player->media)->path ?? "images/user_profile.webp") }}"
                    alt="{{ $player->first_name_en }}" class="object-cover h-full w-full" loading="lazy" />
            </div>

            <!-- Player Info -->
            <div class="md:col-span-2 flex flex-col p-0 lg:p-6">
                <div class="mt-6 lg:mt-0">
                    <!-- Name & Role -->
                    <h1 class="text-3xl font-semibold text-gray-800">
                        {{ app()->getLocale() === "bn" ? $player->first_name_bn : $player->first_name_en }}
                    </h1>
                    <p class="text-sm text-teal-500">
                        {{ implode(
                            " | ",
                            array_filter([
                                $player->playing_role,
                                implode(", ", array_filter([$player->batting_style, $player->bowling_style])),
                            ]),
                        ) ?:
                            "N/A" }}
                    </p>

                    <p class="text-sm text-gray-700 mt-1 mb-4">
                        @if (@$player->district?->name || @$player->thana?->name)
                            {{ @$player->district?->name ? @$player->district?->name . ", " : "" }}
                            {{ @$player->thana?->name ? @$player->thana?->name . ", " : "" }}
                        @endif
                        Bangladesh
                    </p>


                    <!-- Player Details Panel -->
                    {{-- <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="block text-gray-500">
                                {{ __("messages.full_name") }}
                            </span>
                            <span class="font-medium text-gray-800">
                                {{ app()->getLocale() === "bn"
                                    ? $player->first_name_bn . " " . $player->last_name_bn
                                    : $player->first_name_en . " " . $player->last_name_en }}
                            </span>
                        </div>
                        <div>
                            <span class="block text-gray-500">
                                {{ __("messages.dob") }}
                            </span>
                            <span class="font-medium text-gray-800">
                                {{ \Carbon\Carbon::parse($player->dob)->format("d M Y") }}
                            </span>
                        </div>
                        <div>
                            <span class="block text-gray-500">
                                {{ __("messages.batting_style") }}
                            </span>
                            <span class="font-medium text-gray-800">{{ $player->batting_style ?? "N/A" }}</span>
                        </div>
                        <div>
                            <span class="block text-gray-500">
                                {{ __("messages.bowling_style") }}
                            </span>
                            <span class="font-medium text-gray-800">{{ $player->bowling_style ?? "N/A" }}</span>
                        </div>
                    </div> --}}
                    <div class="bg-white border border-gray-200 rounded-2xl p-5 text-sm">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Full Name -->
                            <div class="flex items-start space-x-3">
                                <div class="bg-lime-100 text-lime-700 p-2 rounded-full">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="12" cy="8" r="5" />
                                        <path d="M20 21a8 8 0 0 0-16 0" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 font-medium">{{ __("messages.full_name") }}</p>
                                    <p class="font-medium text-gray-800">
                                        {{ app()->getLocale() === "bn"
                                            ? $player->first_name_bn . " " . $player->last_name_bn
                                            : $player->first_name_en . " " . $player->last_name_en }}
                                    </p>
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="flex items-start space-x-3">
                                <div class="bg-green-100 text-green-700 p-2 rounded-full">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8" />
                                        <path d="M4 16s.5-1 2-1 2.5 2 4 2 2.5-2 4-2 2.5 2 4 2 2-1 2-1" />
                                        <path d="M2 21h20" />
                                        <path d="M7 8v3" />
                                        <path d="M12 8v3" />
                                        <path d="M17 8v3" />
                                        <path d="M7 4h.01" />
                                        <path d="M12 4h.01" />
                                        <path d="M17 4h.01" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 font-medium">{{ __("messages.dob") }}</p>
                                    <p class="font-medium text-gray-800">
                                        {{ \Carbon\Carbon::parse($player->dob)->format("d M Y") }}
                                    </p>
                                </div>
                            </div>

                            <!-- Batting Style -->
                            <div class="flex items-start space-x-3">
                                <div class="bg-yellow-100 p-2 rounded-full">
                                    <!-- Batting Icon (Cricket Bat) -->
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="" stroke="none" fill="#c2410c" fill-rule="evenodd" />
                                        <path
                                            d="M 437.276 21.276 L 416 42.552 416 47.263 L 416 51.974 394.093 74.737 C 357.461 112.801, 341.747 127.538, 333.066 131.966 C 324.447 136.363, 316.008 133.531, 303.788 122.142 C 300.330 118.919, 295.925 115.471, 294 114.482 C 288.977 111.899, 280.589 112.018, 275 114.750 C 271.672 116.378, 236.742 150.749, 140.879 246.725 C 16.968 370.782, 11.101 376.819, 7.698 383.746 C -0.972 401.396, -1.069 421.171, 7.412 442.168 C 17.502 467.149, 39.698 490.899, 64.590 503.351 C 76.259 509.189, 83.472 511.172, 95.072 511.732 C 107.360 512.325, 113.564 511.240, 122.904 506.866 C 129.093 503.967, 137.670 495.620, 261.854 371.638 C 353.658 279.984, 394.782 238.275, 396.082 235.500 C 398.323 230.717, 398.565 222.288, 396.597 217.578 C 395.825 215.731, 392.196 210.952, 388.531 206.959 C 376.811 194.188, 373.767 186.300, 377.625 178.700 C 381.815 170.444, 401.740 149.159, 433.976 118.500 C 457.583 96.049, 459.425 94.521, 462.522 94.819 C 464.344 94.994, 467.109 94.466, 468.667 93.645 C 472.665 91.540, 509.620 53.993, 510.480 51.163 C 512.270 45.271, 510.762 43.197, 488.692 21.214 C 467.400 0.006, 467.392 0, 462.973 0 L 458.552 0 437.276 21.276 M 153.301 256.249 C 26.066 383.535, 25.073 384.558, 21.440 392.249 C 13.244 409.597, 16.587 430.907, 30.905 452.593 C 40.817 467.603, 55.747 481.308, 70.043 488.517 C 81.355 494.222, 89.688 496.242, 100.274 495.847 C 117.641 495.198, 105.278 506.312, 252.183 359.288 C 323.509 287.905, 381.950 228.825, 382.052 228 C 382.514 224.258, 381.593 222.564, 375.458 215.880 C 371.861 211.960, 367.931 207.038, 366.725 204.943 C 365.170 202.241, 363.657 200.970, 361.517 200.568 C 352.035 198.784, 337.199 189.180, 326.722 178.043 C 318.914 169.743, 310.845 156.023, 309.474 148.716 C 309.025 146.318, 307.867 144.892, 305.057 143.275 C 302.962 142.069, 298.040 138.139, 294.120 134.542 C 288.961 129.807, 286.233 128, 284.246 127.999 C 281.932 127.998, 261.352 148.154, 153.301 256.249 M 199.252 356.256 C 126.476 429.014, 121.696 434.006, 121.785 437.150 C 121.917 441.797, 126.126 445.421, 130.413 444.578 C 132.829 444.103, 150.175 427.296, 210.250 367.222 C 279.177 298.296, 287 290.154, 287 287.347 C 287 283.278, 284.335 280.168, 280.157 279.359 C 276.837 278.717, 276.293 279.234, 199.252 356.256"
                                            stroke="none" fill="#c2410c" fill-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 font-medium">{{ __("messages.batting_style") }}</p>
                                    <p class="font-medium text-gray-800">
                                        {{ $player->batting_style ?? "N/A" }}
                                    </p>
                                </div>
                            </div>

                            <!-- Bowling Style -->
                            <div class="flex items-start space-x-3">
                                <div class="bg-teal-100 text-white p-2 rounded-full">
                                    <!-- Bowling Icon (Ball with motion lines) -->
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="" stroke="none" fill="#0f766e" fill-rule="evenodd" />
                                        <path
                                            d="M 224.258 1.576 C 197.609 4.805, 168.682 13.530, 143.500 25.935 C 134.700 30.270, 124.125 35.966, 120 38.592 C 88.091 58.909, 58.909 88.091, 38.592 120 C 25.169 141.082, 11.327 175.075, 5.581 201.066 C -1.904 234.926, -1.903 277.100, 5.584 310.934 C 13.669 347.471, 31.299 384.803, 54.495 414.500 C 86.011 454.850, 132.814 486.646, 183.041 501.829 C 221.915 513.579, 270.662 515.328, 310.934 506.416 C 337.336 500.574, 370.461 487.082, 392 473.397 C 423.813 453.186, 453.087 423.915, 473.408 392 C 491.427 363.700, 506.735 320.669, 510.078 288.923 C 510.681 283.191, 511.586 277.719, 512.088 276.764 C 513.167 274.710, 513.339 233.328, 512.264 234.403 C 511.859 234.807, 510.973 230.161, 510.295 224.077 C 506.603 190.965, 491.551 148.496, 473.408 120 C 458.917 97.241, 434.636 70.130, 415.175 54.981 C 377.655 25.773, 332.105 6.854, 286.441 1.512 C 270.612 -0.339, 239.809 -0.307, 224.258 1.576 M 244.369 40.250 C 223.435 60.519, 209.278 80.451, 194.470 110.500 C 175.862 148.262, 164.311 186.967, 157.580 234.117 C 153.814 260.494, 152.681 276.975, 152.674 305.500 C 152.662 349.413, 157.312 385.605, 167.527 421.095 C 173.559 442.052, 185.982 470.861, 189.879 472.928 C 191.951 474.027, 211.093 478.668, 217 479.503 C 221.382 480.123, 221.550 480.046, 223.420 476.546 C 228.728 466.613, 243.031 466.442, 249.005 476.241 C 250.098 478.033, 250.994 480.357, 250.996 481.405 C 251 483.217, 251.665 483.278, 264.604 482.658 C 298.362 481.039, 327.084 473.725, 356.078 459.364 C 380.654 447.191, 399.469 433.486, 418.545 413.862 C 436.514 395.376, 447.743 379.465, 459.410 355.956 C 501.903 270.335, 485.505 166.809, 418.574 98.138 C 390.789 69.630, 358.658 50.076, 320.723 38.590 L 309.618 35.227 306.829 39.078 C 301.919 45.855, 295.003 47.757, 288.020 44.248 C 283.859 42.158, 280 36.746, 280 33 C 280 30.332, 279.891 30.288, 271.750 29.654 C 255.470 28.387, 257.387 27.645, 244.369 40.250 M 205.500 34.684 C 204.400 34.932, 199.412 36.270, 194.417 37.657 L 185.333 40.178 181.548 49.015 C 176.668 60.409, 171.925 65, 165.034 65 C 160.192 65, 155.421 62.514, 152.768 58.609 L 150.338 55.033 140.330 60.950 C 119.053 73.530, 95.385 93.856, 80.305 112.500 C 24.175 181.898, 13.359 276.907, 52.590 355.956 C 63.737 378.417, 75.403 395.212, 91.289 411.671 L 100.140 420.841 105.386 420.300 C 114.317 419.378, 119.547 423.490, 122.541 433.789 C 123.619 437.497, 125.298 440.477, 127.431 442.468 C 130.321 445.165, 145.926 455, 147.316 455 C 147.615 455, 145.856 449.038, 143.407 441.750 C 134.804 416.158, 128.935 387.975, 125.338 355 C 122.805 331.770, 122.815 277.510, 125.357 253.500 C 134.463 167.484, 160.260 96.290, 201.385 43.680 C 205.547 38.356, 208.625 34.052, 208.226 34.116 C 207.827 34.180, 206.600 34.435, 205.500 34.684 M 247.379 61.437 C 243.497 63.126, 241.098 66.359, 232.491 81.500 C 225.031 94.624, 224.163 98.584, 227.387 104.794 C 231.057 111.865, 241.265 114.297, 248.102 109.731 C 252.844 106.564, 268 80.145, 268 75.046 C 268 69.617, 264.993 64.829, 259.964 62.250 C 254.972 59.690, 251.855 59.489, 247.379 61.437 M 121.164 84.689 C 119.329 85.593, 117.214 87.271, 116.463 88.417 C 114.130 91.980, 103.296 116.377, 102.561 119.724 C 101.578 124.199, 104.908 131.364, 109.182 133.970 C 114.971 137.499, 123.791 136.282, 128.139 131.352 C 130.551 128.617, 141.966 103.080, 142.598 99.006 C 142.991 96.469, 142.493 94.286, 140.796 91.105 C 136.839 83.691, 128.632 81.009, 121.164 84.689 M 208.415 136.421 C 206.719 137.160, 204.351 139.010, 203.153 140.532 C 200.858 143.451, 195.488 159.339, 192.502 172.049 C 190.757 179.479, 190.762 179.673, 192.796 184.273 C 196.316 192.230, 204.586 195.188, 212.633 191.370 C 217.139 189.232, 218.642 186.935, 221.058 178.500 C 222.161 174.650, 224.445 167.017, 226.135 161.538 C 230.602 147.053, 228.908 140.181, 219.993 136.614 C 215.155 134.678, 212.520 134.634, 208.415 136.421 M 91.500 162.491 C 86.657 164.219, 83.408 167.759, 82.072 172.766 C 79.660 181.810, 75.859 205.547, 76.395 208.225 C 78.884 220.669, 96.413 224.254, 102.886 213.644 C 104.636 210.775, 109.685 187.469, 110.749 177.347 C 111.861 166.777, 101.627 158.879, 91.500 162.491 M 185.206 223.079 C 177.687 226.885, 176.686 230.173, 176.249 252.500 C 175.900 270.293, 176.007 271.707, 177.929 274.759 C 183.506 283.615, 194.602 284.432, 201.984 276.532 C 204.401 273.945, 204.490 273.308, 205.304 252.900 C 206.077 233.529, 206.002 231.689, 204.321 228.818 C 200.178 221.745, 192.435 219.420, 185.206 223.079 M 0.425 256 C 0.425 267.825, 0.569 272.663, 0.746 266.750 C 0.923 260.837, 0.923 251.162, 0.746 245.250 C 0.569 239.338, 0.425 244.175, 0.425 256 M 78.500 249.733 C 75.217 250.555, 71.084 253.948, 69.246 257.329 C 67.845 259.907, 67.566 262.726, 67.750 272.405 C 68.316 302.168, 71.563 309.500, 84.177 309.500 C 90.832 309.500, 94.306 307.424, 97.298 301.658 C 99.087 298.209, 99.149 297.124, 98.114 287.215 C 97.498 281.322, 96.996 272.961, 96.997 268.636 C 97.001 258.818, 94.674 253.989, 88.500 251 C 84.410 249.020, 82.376 248.762, 78.500 249.733 M 182.218 307.607 C 180.413 308.528, 177.938 310.680, 176.718 312.390 C 174.630 315.317, 174.500 316.527, 174.500 333 C 174.500 352.896, 175.320 356.617, 180.588 360.635 C 187.482 365.893, 196.912 364.315, 201.736 357.094 C 203.962 353.761, 203.997 353.288, 203.387 335.094 C 202.715 315.067, 202.120 312.662, 196.864 308.745 C 193.237 306.041, 186.341 305.505, 182.218 307.607 M 80.500 335.861 C 74.611 339.498, 73.534 341.573, 73.150 350.025 C 72.701 359.931, 75.374 377.134, 78.275 383 C 79.957 386.403, 81.636 388.064, 85.159 389.812 C 90.945 392.684, 95.732 392.052, 100.605 387.774 C 105.630 383.362, 106.567 379.035, 104.580 369.425 C 103.680 365.074, 102.665 357.582, 102.324 352.778 C 101.910 346.958, 101.088 343.030, 99.861 341.012 C 95.886 334.476, 86.699 332.032, 80.500 335.861 M 195.741 394.418 C 187.926 397.230, 185.489 401.508, 186.320 410.949 C 187.232 421.303, 194.006 439.733, 198.582 444.309 C 207.178 452.905, 223 446.045, 223 433.722 C 223 431.865, 221.831 427.469, 220.403 423.954 C 218.975 420.440, 216.963 414.266, 215.932 410.235 C 214.901 406.205, 213.309 401.639, 212.393 400.089 C 209.181 394.650, 201.943 392.185, 195.741 394.418"
                                            stroke="none" fill="#0f766e" fill-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-500 font-medium">{{ __("messages.bowling_style") }}</p>
                                    <p class="font-medium text-gray-800">
                                        {{ $player->bowling_style ?? "N/A" }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Stats Row -->
                    <div class="bg-white mt-6 p-4">
                        <div class="grid grid-cols-3 gap-5 text-center">
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-16 h-16 lg:w-20 lg:h-20 text-2xl lg:text-3xl font-bold flex items-center justify-center rounded-full bg-lime-100 text-lime-600">
                                    {{ $player->squads->count() ?? 0 }}
                                </div>
                                <p class="mt-2 text-sm uppercase text-gray-700 font-semibold tracking-tight">
                                    {{ __("messages.matches") }}
                                </p>
                            </div>

                            <div class="flex flex-col items-center">
                                <div
                                    class="w-16 h-16 lg:w-20 lg:h-20 text-2xl lg:text-3xl font-bold flex items-center justify-center rounded-full bg-teal-100 text-teal-600">
                                    {{ $player->battingStats->sum("runs") }}
                                </div>
                                <p class="mt-2 text-sm uppercase text-gray-700 font-semibold tracking-tight">
                                    {{ __("messages.runs") }}
                                </p>
                            </div>

                            <div class="flex flex-col items-center">
                                <div
                                    class="w-16 h-16 lg:w-20 lg:h-20 text-2xl lg:text-3xl font-bold flex items-center justify-center rounded-full bg-red-100 text-red-600">
                                    {{ $player->bowlingStats->sum("wickets") }}
                                </div>
                                <p class="mt-2 text-sm uppercase text-gray-700 font-semibold tracking-tight">
                                    {{ __("messages.wickets") }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Player -->
        <div class="mt-6 px-3">
            <div class="flex items-center justify-between mb-6 border-b border-gray-200 relative">
                <h2 class="text-lg font-semibold text-gray-900 tracking-tight relative pb-1">
                    {{ __("messages.about_player") }}
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-teal-500"></span>
                </h2>
            </div>
            <div class="text-[15px] text-gray-600 leading-relaxed note-editable">
                {!! app()->getLocale() === "bn"
                    ? $player->description_bn ?? "কোনো বর্ণনা পাওয়া যায়নি।"
                    : $player->description_en ?? "No description available." !!}
            </div>
        </div>

        <!-- Stats -->
        <div class="px-3">
            <div class="flex items-center justify-between my-6 border-b border-gray-200 relative">
                <h2 class="text-lg font-semibold text-gray-900 tracking-tight relative pb-1">
                    {{ __("messages.statistics") }}
                    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-teal-500"></span>
                </h2>
            </div>
        </div>

        <!-- Tabs -->
        <div class="px-3" x-data="{ tab: 'batting' }">
            <div class="flex gap-9 mt-4 border-b border-gray-200">
                <button @click="tab = 'batting'"
                    :class="tab === 'batting' ? 'border-b-2 border-teal-500 text-teal-600 font-semibold' : 'text-gray-700'"
                    class="pb-1 transition">{{ __("messages.batting") }}</button>
                <button @click="tab = 'bowling'"
                    :class="tab === 'bowling' ? 'border-b-2 border-teal-500 text-teal-600 font-semibold' : 'text-gray-700'"
                    class="pb-1 transition">{{ __("messages.bowling") }}</button>
                <button @click="tab = 'fielding'"
                    :class="tab === 'fielding' ? 'border-b-2 border-teal-500 text-teal-600 font-semibold' : 'text-gray-700'"
                    class="pb-1 transition">{{ __("messages.fielding") }}</button>
            </div>

            <!-- Batting Stats -->
            <div x-show="tab === 'batting'" class="mt-4" style="display: none">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse text-sm text-left">
                        <thead class="bg-teal-50 text-gray-900">
                            <tr>
                                <th class="p-3">Year</th>
                                <th class="p-3">M</th>
                                <th class="p-3">Inns</th>
                                <th class="p-3">Not Out</th>
                                <th class="p-3">Runs</th>
                                <th class="p-3">Avg</th>
                                <th class="p-3">HS</th>
                                <th class="p-3">S/R</th>
                                <th class="p-3">Ducks</th>
                                <th class="p-3">50s</th>
                                <th class="p-3">100s</th>
                                <th class="p-3">4s</th>
                                <th class="p-3">6s</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @foreach ($battingStats as $stat)
                                <tr class="border-t">
                                    <td class="p-3">{{ $stat["year"] }}</td>
                                    <td class="p-3">{{ $stat["matches"] }}</td>
                                    <td class="p-3">{{ $stat["innings"] }}</td>
                                    <td class="p-3">{{ $stat["not_outs"] }}</td>
                                    <td class="p-3">{{ $stat["runs"] }}</td>
                                    <td class="p-3">{{ $stat["avg"] }}</td>
                                    <td class="p-3">{{ $stat["hs"] }}</td>
                                    <td class="p-3">{{ $stat["sr"] }}</td>
                                    <td class="p-3">{{ $stat["ducks"] }}</td>
                                    <td class="p-3">{{ $stat["fifties"] }}</td>
                                    <td class="p-3">{{ $stat["hundreds"] }}</td>
                                    <td class="p-3">{{ $stat["fours"] }}</td>
                                    <td class="p-3">{{ $stat["sixes"] }}</td>
                                </tr>
                            @endforeach

                            <!-- Overall Totals -->
                            @php
                                $totals = collect($battingStats);
                                $totalMatches = $totals->sum("matches");
                                $totalInnings = $totals->sum("innings");
                                $totalNotOuts = $totals->sum("not_outs");
                                $totalDucks = $totals->sum("ducks");
                                $totalRuns = $totals->sum("runs");
                                $totalFours = $totals->sum("fours");
                                $totalSixes = $totals->sum("sixes");
                                $totalFifties = $totals->sum("fifties");
                                $totalHundreds = $totals->sum("hundreds");
                                $totalBalls = $totals->sum("balls") ?: 0;
                                $overallAvg = $totalInnings > 0 ? round($totalRuns / $totalInnings, 2) : 0;
                                $overallSR = $totalBalls > 0 ? round(($totalRuns / $totalBalls) * 100, 2) : 0;
                                $highestScore = $totals->max("hs");
                            @endphp

                            <tr class="border-t font-semibold text-gray-900">
                                <td class="p-3">Overall</td>
                                <td class="p-3">{{ $totalMatches }}</td>
                                <td class="p-3">{{ $totalInnings }}</td>
                                <td class="p-3">{{ $totalNotOuts }}</td>
                                <td class="p-3">{{ $totalRuns }}</td>
                                <td class="p-3">{{ $overallAvg }}</td>
                                <td class="p-3">{{ $highestScore }}</td>
                                <td class="p-3">{{ $overallSR }}</td>
                                <td class="p-3">{{ $totalDucks }}</td>
                                <td class="p-3">{{ $totalFifties }}</td>
                                <td class="p-3">{{ $totalHundreds }}</td>
                                <td class="p-3">{{ $totalFours }}</td>
                                <td class="p-3">{{ $totalSixes }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bowling Stats -->
            <div x-show="tab === 'bowling'" class="mt-4" style="display: none">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse text-sm text-left">
                        <thead class="bg-teal-50 text-gray-900">
                            <tr>
                                <th class="p-3">Year</th>
                                <th class="p-3">M</th>
                                <th class="p-3">Inns</th>
                                <th class="p-3">Overs</th>
                                <th class="p-3">Balls</th>
                                <th class="p-3">Mdns</th>
                                <th class="p-3">Runs</th>
                                <th class="p-3">Wkts</th>
                                <th class="p-3">BBI</th>
                                <th class="p-3">Avg</th>
                                <th class="p-3">Eco</th>
                                <th class="p-3">3w</th>
                                <th class="p-3">5w</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @foreach ($bowlingStats as $stat)
                                <tr class="border-t">
                                    <td class="p-3">{{ $stat["year"] }}</td>
                                    <td class="p-3">{{ $stat["matches"] }}</td>
                                    <td class="p-3">{{ $stat["innings"] }}</td>
                                    <td class="p-3">{{ $stat["overs"] }}</td>
                                    <td class="p-3">{{ $stat["balls"] }}</td>
                                    <td class="p-3">{{ $stat["maidens"] }}</td>
                                    <td class="p-3">{{ $stat["runs"] }}</td>
                                    <td class="p-3">{{ $stat["wickets"] }}</td>
                                    <td class="p-3">{{ $stat["bbi"] }}</td>
                                    <td class="p-3">{{ $stat["average"] }}</td>
                                    <td class="p-3">{{ $stat["economy"] }}</td>
                                    <td class="p-3">{{ $stat["threes"] }}</td>
                                    <td class="p-3">{{ $stat["fives"] }}</td>
                                </tr>
                            @endforeach
                            <!-- Overall Totals -->
                            @php
                                $totals = collect($bowlingStats);
                                $totalMatches = $totals->sum("matches");
                                $totalInnings = $totals->sum("innings");
                                $totalOvers = $totals->sum("overs");
                                $totalBalls = $totals->sum("balls");
                                $totalMaidens = $totals->sum("maidens");
                                $totalRuns = $totals->sum("runs");
                                $totalWickets = $totals->sum("wickets");
                                $totalThrees = $totals->sum("threes");
                                $totalFives = $totals->sum("fives");
                                $overallAvg = $totalWickets > 0 ? round($totalRuns / $totalWickets, 2) : 0;
                                $overallEco = $totalOvers > 0 ? round($totalRuns / $totalOvers, 2) : 0;
                                $bestBBI = $totals->max("bbi");
                            @endphp
                            <tr class="border-t font-semibold text-gray-900">
                                <td class="p-3">Overall</td>
                                <td class="p-3">{{ $totalMatches }}</td>
                                <td class="p-3">{{ $totalInnings }}</td>
                                <td class="p-3">{{ $totalOvers }}</td>
                                <td class="p-3">{{ $totalBalls }}</td>
                                <td class="p-3">{{ $totalMaidens }}</td>
                                <td class="p-3">{{ $totalRuns }}</td>
                                <td class="p-3">{{ $totalWickets }}</td>
                                <td class="p-3">{{ $bestBBI }}</td>
                                <td class="p-3">{{ $overallAvg }}</td>
                                <td class="p-3">{{ $overallEco }}</td>
                                <td class="p-3">{{ $totalThrees }}</td>
                                <td class="p-3">{{ $totalFives }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Fielding Stats -->
            <div x-show="tab === 'fielding'" class="mt-4" style="display: none">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse text-sm text-left">
                        <thead class="bg-teal-50 text-gray-900 whitespace-nowrap">
                            <tr>
                                <th class="p-3">Year</th>
                                <th class="p-3">M</th>
                                <th class="p-3">Catches</th>
                                <th class="p-3">Stumps</th>
                                <th class="p-3">Run Outs</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @foreach ($fieldingStats as $stat)
                                <tr class="border-t">
                                    <td class="p-3">{{ $stat["year"] }}</td>
                                    <td class="p-3">{{ $stat["matches"] }}</td>
                                    <td class="p-3">{{ $stat["catches"] }}</td>
                                    <td class="p-3">{{ $stat["stumps"] }}</td>
                                    <td class="p-3">{{ $stat["run_outs"] }}</td>
                                </tr>
                            @endforeach
                            <!-- Overall Totals -->
                            @php
                                $totals = collect($fieldingStats);
                                $totalMatches = $totals->sum("matches");
                                $totalCatches = $totals->sum("catches");
                                $totalStumps = $totals->sum("stumps");
                                $totalRunOuts = $totals->sum("run_outs");
                            @endphp
                            <tr class="border-t font-semibold text-gray-900">
                                <td class="p-3">Overall</td>
                                <td class="p-3">{{ $totalMatches }}</td>
                                <td class="p-3">{{ $totalCatches }}</td>
                                <td class="p-3">{{ $totalStumps }}</td>
                                <td class="p-3">{{ $totalRunOuts }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push("title")
        {{ $player->first_name_en }}
    @endpush
</div>
