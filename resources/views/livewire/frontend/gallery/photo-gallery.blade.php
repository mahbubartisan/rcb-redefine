{{-- <div>
    <div x-data="{
        open: false,
        index: 0,
        items: [
            @foreach ($galleries as $g)
                {
                    image: '{{ asset(@$g->media?->path) }}',
                    title: '{{ app()->getLocale() === "bn" ? $g->title_bn : $g->title_en }}',
                    date: '{{ \Carbon\Carbon::parse($g->date)->format("d M Y") }}'
                }@if (!$loop->last),@endif @endforeach
        ],
        next() { this.index = (this.index + 1) % this.items.length },
        prev() { this.index = (this.index - 1 + this.items.length) % this.items.length }
    }" class="max-w-6xl mx-auto px-4 py-10 mt-10 lg:mt-40">
        <!-- Heading -->
        <div class="text-center mb-4">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">🏆 Sports Highlights</h2>
            <p class="text-gray-600 mt-2">Relive the best moments from our games & tournaments</p>
        </div>

        @if ($galleries->count() > 0)
            <!-- First Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Big Featured Image -->
                @if (isset($galleries[0]))
                    <div @click="open = true; index = 0"
                        class="cursor-pointer md:col-span-2 w-full h-[550px] relative group border border-gray-200 rounded-xl overflow-hidden"
                        title="{{ app()->getLocale() === "bn" ? $galleries[0]->title_bn : $galleries[0]->title_en }}">
                        <img src="{{ asset($galleries[0]->media->path) }}" alt="{{ $galleries[0]->title_en }}"
                            class="w-full h-[550px] object-fit transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute left-2 bottom-2">
                            <span class="bg-teal-500 text-white text-sm font-m px-3 py-1.5 rounded-full shadow-sm">
                                {{ app()->getLocale() === "bn" ? $galleries[0]->title_bn : $galleries[0]->title_en }} -
                                {{ \Carbon\Carbon::parse($galleries[0]->date)->format("d M Y") }}
                            </span>
                        </div>
                    </div>
                @endif

                <!-- Side Images -->
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($galleries->slice(1, 2) as $gallery)
                        <div @click="open = true; index = {{ $loop->index + 1 }}"
                            class="cursor-pointer relative group border border-gray-200 rounded-xl overflow-hidden shadow-sm"
                            title="{{ app()->getLocale() === "bn" ? $gallery->title_bn : $gallery->title_en }}">
                            <img src="{{ asset(@$gallery->media?->path) }}" alt="{{ $gallery->title_en }}"
                                class="w-full h-full object-fit transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute left-2 bottom-2">
                                <span class="bg-teal-500 text-white text-sm font-m px-3 py-1.5 rounded-full shadow-sm">
                                    {{ str()->limit(app()->getLocale() === "bn" ? $gallery->title_bn : $gallery->title_en, 30) }}
                                    -
                                    {{ \Carbon\Carbon::parse($gallery->date)->format("d M Y") }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <!-- Second Row -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                @foreach ($galleries->slice(3, 4) as $gallery)
                    <div @click="open = true; index = {{ $loop->index + 3 }}"
                        class="cursor-pointer relative group border border-gray-200 rounded-xl overflow-hidden shadow-sm"
                        title="{{ app()->getLocale() === "bn" ? $gallery->title_bn : $gallery->title_en }}">
                        <img src="{{ asset(@$gallery->media?->path) }}" alt="{{ $gallery->title_en }}"
                            class="w-full object-fit transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute left-2 bottom-2">
                            <span class="bg-teal-500 text-white text-sm font-m px-3 py-1.5 rounded-full shadow-sm">
                                {{ str()->limit(app()->getLocale() === "bn" ? $gallery->title_bn : $gallery->title_en, 30) }}
                                -
                                {{ \Carbon\Carbon::parse($gallery->date)->format("d M Y") }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif

        <!-- Modal -->
        <div x-show="open" x-transition class="fixed inset-0 bg-black/90 flex items-center justify-center z-50 p-4"
            @keydown.escape.window="open = false" style="display: none">

            <div class="relative max-w-4xl w-full">
                <!-- Image -->
                <img :src="items[index].image" class="w-full max-h-[80vh] object-contain">

                <!-- Caption -->
                <div class="mt-4 text-center text-white">
                    <h3 class="text-lg font-semibold" x-text="items[index].title"></h3>
                    <p class="text-sm opacity-80" x-text="items[index].date"></p>
                </div>
            </div>

            <!-- Close (top-right corner OUTSIDE modal box) -->
            <button @click="open = false"
                class="absolute top-6 right-6 bg-black/70 text-white w-9 h-9 md:w-12 md:h-12 flex items-center justify-center rounded-full shadow-lg hover:bg-black/90 transition">
                ✕
            </button>

            <!-- Prev -->
            <button @click="prev()"
                class="absolute left-6 top-1/2 -translate-y-1/2 bg-black/70 text-white w-9 h-9 md:w-12 md:h-12 flex items-center justify-center rounded-full shadow-lg hover:bg-black/90 transition">
                ❮
            </button>

            <!-- Next -->
            <button @click="next()"
                class="absolute right-6 top-1/2 -translate-y-1/2 bg-black/70 text-white w-9 h-9 md:w-12 md:h-12 flex items-center justify-center rounded-full shadow-lg hover:bg-black/90 transition">
                ❯
            </button>
        </div>

        <!-- Responsive Pagination -->
        <div class="flex justify-center mt-14">
            <nav
                class="inline-flex items-center space-x-2 sm:space-x-3 bg-white/70 backdrop-blur-md shadow-sm rounded-full px-2 sm:px-4 py-1 sm:py-2">

                <!-- Previous Button -->
                @if ($galleries->onFirstPage())
                    <span class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-400 cursor-not-allowed">
                        ‹ Prev
                    </span>
                @else
                    <a href="#" wire:click.prevent="previousPage"
                        class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-600 hover:bg-gray-200 transition">
                        ‹ Prev
                    </a>
                @endif

                <!-- Page Numbers -->
                <div class="hidden sm:flex space-x-2">
                    @foreach ($galleries->links()->elements[0] as $page => $url)
                        @if ($page == $galleries->currentPage())
                            <span
                                class="w-10 h-10 flex items-center justify-center text-sm rounded-full bg-teal-500 text-white font-semibold shadow">
                                {{ $page }}
                            </span>
                        @else
                            <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                class="w-10 h-10 flex items-center justify-center text-sm rounded-full text-gray-600 hover:bg-gray-200 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                </div>

                <!-- Mobile Page Indicator -->
                <span class="sm:hidden px-3 py-2 text-xs text-gray-600">
                    Page {{ $galleries->currentPage() }} of {{ $galleries->lastPage() }}
                </span>

                <!-- Next Button -->
                @if ($galleries->hasMorePages())
                    <a href="#" wire:click.prevent="nextPage"
                        class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-600 hover:bg-gray-200 transition">
                        Next ›
                    </a>
                @else
                    <span class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-400 cursor-not-allowed">
                        Next ›
                    </span>
                @endif
            </nav>
        </div>
    </div>
    @push("title")
        RCB - Photo Gallery
    @endpush
</div> --}}



<div>
    <!-- Unique key for each page -->
    <div wire:key="gallery-page-{{ $galleries->currentPage() }}">

        @php
            $items = $galleries
                ->map(
                    fn($g) => [
                        "image" => asset($g->media?->path ?? ""),
                        "title" => app()->getLocale() === "bn" ? $g->title_bn ?? "" : $g->title_en ?? "",
                        "date" => $g->date ? \Carbon\Carbon::parse($g->date)->format("d M Y") : "",
                    ],
                )
                ->values();
        @endphp

        <div x-data="galleryComponent()" x-init="updateItems({{ $items->toJson() }})" x-on:refresh-gallery.window="updateItems($event.detail)"
            class="mt-20 lg:mt-8">
            <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">
                <!-- Heading -->
                <div class="text-center mb-4">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">🏆 Sports Highlights</h2>
                    <p class="text-gray-600 mt-2">Relive the best moments from our games & tournaments</p>
                </div>

                <!-- Top Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4">
                    <template x-if="items.length > 0">
                        <div class="cursor-pointer md:col-span-2 w-full h-[265px] lg:h-[550px] relative group border border-gray-200 rounded-xl overflow-hidden"
                            :title="items[0].title" @click="openModal(0)">
                            <img :src="items[0].image" :alt="items[0].title"
                                class="w-full h-[265px] lg:h-[550px] object-fill transition-transform duration-500 group-hover:scale-105"
                                loading="lazy">
                            <div class="absolute left-2 bottom-2">
                                <span class="bg-teal-500 text-white text-sm font-m px-3 py-1.5 rounded-full shadow-sm">

                                    <span x-text="items[0].title"></span> -
                                    <span x-text="items[0].date"></span>
                                </span>
                            </div>
                        </div>
                    </template>

                    <div class="grid grid-rows-2 gap-4">
                        <template x-for="i in [1, 2]" :key="i">
                            <div class="cursor-pointer relative group border border-gray-200 rounded-xl overflow-hidden shadow-sm"
                                x-show="items[i]" :title="items[i]?.title" @click="openModal(i)">

                                <img :src="items[i]?.image" :alt="items[i]?.title"
                                    class="w-full h-[265px] object-fill transition-transform duration-500 group-hover:scale-105"
                                    loading="lazy">

                                <div class="absolute left-2 bottom-2">
                                    <span
                                        class="bg-teal-500 text-white text-sm font-medium px-3 py-1.5 rounded-full shadow-sm">
                                        <span x-text="items[i]?.title"></span> -
                                        <span class="text-xs opacity-90" x-text="items[i]?.date"></span>
                                    </span>
                                </div>
                            </div>
                        </template>
                    </div>

                </div>

                <!-- Remaining Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <template x-for="(item, i) in items.slice(3)" :key="i">
                        <div class="cursor-pointer relative group border border-gray-200 rounded-xl overflow-hidden shadow-sm"
                            :title="item.title" @click="openModal(i + 3)">
                            <img :src="item.image" :alt="item.title"
                                class="w-full h-[250px] object-fill transition-transform duration-500 group-hover:scale-105"
                                loading="lazy">
                            <div class="absolute left-2 bottom-2">
                                <span class="bg-teal-500 text-white text-sm font-m px-3 py-1.5 rounded-full shadow-sm">
                                    <span class="font-medium truncate" x-text="item.title"></span> -
                                    <span class="text-xs opacity-90" x-text="item.date"></span>
                                </span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Modal -->
            <div x-show="open" x-transition.opacity x-cloak
                class="fixed inset-0 bg-black/90 flex items-center justify-center z-50 p-4"
                @keydown.escape.window="open = false" style="display: none">

                <div class="relative max-w-4xl w-full">
                    <!-- Image -->
                    <img :src="current.image" class="w-full max-h-[80vh] object-contain" loading="lazy">

                    <!-- Caption -->
                    <div class="mt-4 text-center text-white">
                        <h3 class="text-lg font-semibold" x-text="items[index].title"></h3>
                        <p class="text-sm opacity-80" x-text="items[index].date"></p>
                    </div>
                </div>

                <!-- Close (top-right corner OUTSIDE modal box) -->
                <button @click="open = false"
                    class="absolute top-6 right-6 bg-black/70 text-white w-9 h-9 md:w-12 md:h-12 flex items-center justify-center rounded-full shadow-lg hover:bg-black/90 transition">
                    ✕
                </button>

                <!-- Prev -->
                <button @click="prev()"
                    class="absolute left-6 top-1/2 -translate-y-1/2 bg-black/70 text-white w-9 h-9 md:w-12 md:h-12 flex items-center justify-center rounded-full shadow-lg hover:bg-black/90 transition">
                    ❮
                </button>

                <!-- Next -->
                <button @click="next()"
                    class="absolute right-6 top-1/2 -translate-y-1/2 bg-black/70 text-white w-9 h-9 md:w-12 md:h-12 flex items-center justify-center rounded-full shadow-lg hover:bg-black/90 transition">
                    ❯
                </button>
            </div>

            <!--  Pagination -->
            <div class="flex justify-center mt-5">
                <nav
                    class="inline-flex items-center space-x-2 sm:space-x-3 bg-white/70 backdrop-blur-md shadow-sm rounded-full px-2 sm:px-4 py-1 sm:py-2">
                    @if ($galleries->onFirstPage())
                        <span class="px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-400 cursor-not-allowed">‹
                            Prev</span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                            class="px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-600 hover:bg-gray-200 rounded-full transition">
                            ‹ Prev
                        </a>
                    @endif

                    <div class="hidden sm:flex space-x-2">
                        @foreach ($galleries->links()->elements[0] as $page => $url)
                            @if ($page == $galleries->currentPage())
                                <span
                                    class="w-10 h-10 flex items-center justify-center text-sm rounded-full bg-teal-500 text-white font-semibold shadow">{{ $page }}</span>
                            @else
                                <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                    class="w-10 h-10 flex items-center justify-center text-sm rounded-full text-gray-600 hover:bg-gray-200 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    <span class="sm:hidden px-3 py-2 text-xs text-gray-600">
                        Page {{ $galleries->currentPage() }} of {{ $galleries->lastPage() }}
                    </span>

                    @if ($galleries->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                            class="px-3 sm:px-4 py-2 text-xs sm:text-sm rounded-full text-gray-600 hover:bg-gray-200 transition">
                            Next ›
                        </a>
                    @else
                        <span class="px-3 sm:px-4 py-2 text-xs sm:text-sm text-gray-400 cursor-not-allowed">Next
                            ›</span>
                    @endif
                </nav>
            </div>
        </div>
    </div>
    <!--  AlpineJS Component -->
    <script>
        function galleryComponent() {
            return {
                items: [],
                open: false,
                index: 0,
                current: {},
                updateItems(newItems) {
                    this.items = newItems;
                    this.current = {};
                    this.open = false;
                },
                openModal(i) {
                    this.index = i;
                    this.current = this.items[i];
                    this.open = true;
                },
                closeModal() {
                    this.open = false;
                },
                next() {
                    this.index = (this.index + 1) % this.items.length;
                    this.current = this.items[this.index];
                },
                prev() {
                    this.index = (this.index - 1 + this.items.length) % this.items.length;
                    this.current = this.items[this.index];
                },
            };
        }

        // 🚀 When Livewire re-renders (like pagination), update Alpine items instantly
        document.addEventListener('livewire:navigated', () => {
            const newItems = @json($items);
            window.dispatchEvent(new CustomEvent('refresh-gallery', {
                detail: newItems
            }));
        });
    </script>

    @push("title")
        RCB - Photo Gallery
    @endpush
</div>








