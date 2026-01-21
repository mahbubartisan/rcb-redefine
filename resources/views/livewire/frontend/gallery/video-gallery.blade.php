<div>
    <section class="mt-20 lg:mt-8">
        {{-- <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
            <div x-data="{ open: false, activeVideo: '' }">
                <!-- Video Grid -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    @foreach ($videos as $video)
                        <div class="group relative cursor-pointer overflow-hidden rounded-xl shadow-sm"
                            @click="open = true; activeVideo = '{{ $video->video_code }}'">

                            <!-- Thumbnail -->
                            <img src="{{ asset(@$video->media?->path) }}" alt="Video Thumbnail"
                                class="h-[180px] w-full object-fill lg:h-[350px]">

                            <!-- Always Visible Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-full bg-teal-500 text-white shadow-lg transition group-hover:scale-110">
                                    <!-- Youtube SVG -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M18 3a5 5 0 0 1 5 5v8a5 5 0 0 1 -5 5h-12a5 5 0 0 1 -5 -5v-8a5 5 0 0 1 5 -5zm-9 6v6a1 1 0 0 0 1.514 .857l5 -3a1 1 0 0 0 0 -1.714l-5 -3a1 1 0 0 0 -1.514 .857z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <!-- Modal Player -->
                <div x-show="open" x-transition
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4"
                    @keydown.escape.window="open = false; activeVideo = ''" @click.self="open = false; activeVideo = ''"
                    style="display: none">

                    <div class="relative w-full max-w-4xl">
                        <!-- Video Player -->
                        <iframe x-show="activeVideo" :src="`https://www.youtube.com/embed/${activeVideo}?autoplay=1`"
                            class="aspect-video w-full rounded-lg" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                    </div>

                    <!-- Close Button (outside modal, top-right of screen) -->
                    <button @click="open = false; activeVideo = ''"
                        class="absolute right-6 top-6 flex h-9 w-9 items-center justify-center rounded-full bg-black/70 text-white shadow-lg transition hover:bg-black/90 md:h-12 md:w-12">
                        ✕
                    </button>
                </div>

            </div>

            <!-- Responsive Pagination -->
            <div class="mt-14 flex justify-center">
                <nav
                    class="inline-flex items-center space-x-2 rounded-full bg-white/70 px-2 py-1 shadow-sm backdrop-blur-md sm:space-x-3 sm:px-4 sm:py-2">

                    <!-- Previous Button -->
                    @if ($videos->onFirstPage())
                        <span
                            class="cursor-not-allowed rounded-full px-3 py-2 text-xs text-gray-400 sm:px-4 sm:text-sm">
                            ‹ Prev
                        </span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="rounded-full px-3 py-2 text-xs text-gray-600 transition hover:bg-gray-200 sm:px-4 sm:text-sm">
                            ‹ Prev
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    <div class="hidden space-x-2 sm:flex">
                        @foreach ($videos->links()->elements[0] as $page => $url)
                            @if ($page == $videos->currentPage())
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-500 text-sm font-semibold text-white shadow">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                    class="flex h-10 w-10 items-center justify-center rounded-full text-sm text-gray-600 transition hover:bg-gray-200">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <!-- Mobile Page Indicator -->
                    <span class="px-3 py-2 text-xs text-gray-600 sm:hidden">
                        Page {{ $videos->currentPage() }} of {{ $videos->lastPage() }}
                    </span>

                    <!-- Next Button -->
                    @if ($videos->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                            class="rounded-full px-3 py-2 text-xs text-gray-600 transition hover:bg-gray-200 sm:px-4 sm:text-sm">
                            Next ›
                        </a>
                    @else
                        <span
                            class="cursor-not-allowed rounded-full px-3 py-2 text-xs text-gray-400 sm:px-4 sm:text-sm">
                            Next ›
                        </span>
                    @endif
                </nav>
            </div>

        </div> --}}
        <div class="mx-auto max-w-7xl px-3 py-10 sm:px-6 lg:px-6">
            <div x-data="{ open: false, activeVideo: '' }">

                <!-- Video Grid -->
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    @foreach ($videos as $video)
                        <div @click="open = true; activeVideo = '{{ $video->video_code }}'"
                            class="group relative cursor-pointer overflow-hidden rounded-2xl bg-black shadow-md transition-all duration-500 hover:shadow-2xl">

                            <!-- Thumbnail -->
                            <img src="{{ asset(@$video->media?->path) }}" alt="Video Thumbnail"
                                class="h-[200px] w-full object-cover transition-transform duration-700 group-hover:scale-105 md:h-[320px] lg:h-[360px]">

                            <!-- Dark Gradient Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-80 transition group-hover:opacity-100">
                            </div>

                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="relative flex h-16 w-16 items-center justify-center rounded-full bg-white/90 shadow-xl backdrop-blur transition-all duration-500 group-hover:scale-110 group-hover:bg-white">

                                    <!-- Pulse Ring -->
                                    <span
                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-white/40 opacity-75">
                                    </span>

                                    <!-- Play Icon -->
                                    <svg class="relative h-7 w-7 text-teal-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Modal Player -->
                <div x-show="open" x-transition.opacity.duration.300ms
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4 backdrop-blur-sm"
                    style="display: none" @keydown.escape.window="open = false; activeVideo = ''"
                    @click.self="open = false; activeVideo = ''">

                    <!-- Video Wrapper -->
                    <div class="relative w-full max-w-5xl">
                        <div class="overflow-hidden rounded-2xl shadow-2xl">

                            <iframe x-show="activeVideo"
                                :src="`https://www.youtube.com/embed/${activeVideo}?autoplay=1&rel=0`"
                                class="aspect-video w-full" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>

                        </div>
                    </div>

                    <!-- Close Button -->
                    <button @click="open = false; activeVideo = ''"
                        class="absolute right-6 top-6 flex h-11 w-11 items-center justify-center rounded-full bg-white/10 text-lg text-white shadow-lg backdrop-blur transition hover:bg-white/20 md:right-8 md:top-8 md:h-12 md:w-12">
                        ✕
                    </button>
                </div>

            </div>

            <!-- Responsive Pagination -->
            <div class="mt-14 flex justify-center">
                <nav
                    class="inline-flex items-center space-x-2 rounded-full bg-white/70 px-2 py-1 shadow-sm backdrop-blur-md sm:space-x-3 sm:px-4 sm:py-2">

                    <!-- Previous Button -->
                    @if ($videos->onFirstPage())
                        <span
                            class="cursor-not-allowed rounded-full px-3 py-2 text-xs text-gray-400 sm:px-4 sm:text-sm">
                            ‹ Prev
                        </span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="rounded-full px-3 py-2 text-xs text-gray-600 transition hover:bg-gray-200 sm:px-4 sm:text-sm">
                            ‹ Prev
                        </a>
                    @endif

                    <!-- Page Numbers -->
                    <div class="hidden space-x-2 sm:flex">
                        @foreach ($videos->links()->elements[0] as $page => $url)
                            @if ($page == $videos->currentPage())
                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-500 text-sm font-semibold text-white shadow">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                    class="flex h-10 w-10 items-center justify-center rounded-full text-sm text-gray-600 transition hover:bg-gray-200">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <!-- Mobile Page Indicator -->
                    <span class="px-3 py-2 text-xs text-gray-600 sm:hidden">
                        Page {{ $videos->currentPage() }} of {{ $videos->lastPage() }}
                    </span>

                    <!-- Next Button -->
                    @if ($videos->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                            class="rounded-full px-3 py-2 text-xs text-gray-600 transition hover:bg-gray-200 sm:px-4 sm:text-sm">
                            Next ›
                        </a>
                    @else
                        <span
                            class="cursor-not-allowed rounded-full px-3 py-2 text-xs text-gray-400 sm:px-4 sm:text-sm">
                            Next ›
                        </span>
                    @endif
                </nav>
            </div>
        </div>

    </section>

    @push("title")
        RCB - Video Gallery
    @endpush
</div>
