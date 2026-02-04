<div>
    <!-- Latest News -->
    <section class="mt-20 lg:mt-8">
        <div class="mx-auto max-w-6xl px-2 sm:px-6 lg:px-4">

            <!-- ===== Section Header ===== -->
            <div class="mb-12 text-center">
                <div class="relative inline-block">
                    <span class="absolute -left-4 top-1/2 h-8 w-1 -translate-y-1/2 rounded-full bg-teal-500"></span>
                    <h3 class="text-3xl font-semibold tracking-tight text-gray-900 lg:text-4xl">
                        Latest News
                    </h3>
                </div>
                <p class="mt-2 text-sm text-gray-500 md:text-base">
                    Stories, updates, and highlights — stay connected with every moment that matters.
                </p>
            </div>
        
            <!-- ===== News Grid ===== -->
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        
                @forelse ($news as $item)
        
                    <!-- ===== News Card ===== -->
                    <a href="{{ route('frontend.news.detail', $item->slug) }}"
                       class="group relative overflow-hidden rounded-3xl
                              bg-white/60 backdrop-blur-xl
                              border border-white/20
                              shadow-[0_20px_50px_rgba(0,0,0,0.08)]
                              transition-all duration-500
                              hover:-translate-y-1 hover:shadow-[0_30px_70px_rgba(0,0,0,0.15)]">
        
                        <!-- Image -->
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset(@$item->media?->path) }}"
                                 alt="{{ $item->title_en }}"
                                 class="h-full w-full object-cover
                                        transition-transform duration-700
                                        group-hover:scale-105">
        
                            <!-- Soft Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                        </div>
        
                        <!-- Content -->
                        <div class="relative p-5">
        
                            <!-- Title -->
                            <h2
                                class="text-base font-semibold tracking-tight text-gray-900
                                       transition-colors duration-300
                                       group-hover:text-teal-600
                                       md:text-lg line-clamp-2">
                                {{ str()->limit(strip_tags(app()->getLocale() === 'bn'
                                    ? $item->title_bn
                                    : $item->title_en)) }}
                            </h2>
        
                            <!-- Excerpt -->
                            <p class="mt-3 text-sm leading-relaxed text-gray-600 line-clamp-3">
                                {{ str()->limit(
                                    trim(
                                        preg_replace(
                                            '/[ \t]+/u',
                                            ' ',
                                            str_replace(
                                                ["\xC2\xA0", "\xA0", "&nbsp;"],
                                                ' ',
                                                html_entity_decode(strip_tags(app()->getLocale() === 'bn'
                                                    ? $item->desc_bn
                                                    : $item->desc_en))
                                            )
                                        )
                                    ),
                                    120
                                ) }}
                            </p>
        
                            <!-- Meta -->
                            <div class="mt-6 flex items-center justify-between text-xs text-gray-500 md:text-sm">
                                <span>
                                    {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                                </span>
                                <span
                                    class="font-medium text-teal-600 transition group-hover:underline">
                                    Read More →
                                </span>
                            </div>
                        </div>
                    </a>
        
                @empty
                    <p class="col-span-full py-16 text-center italic text-gray-400">
                        No news available.
                    </p>
                @endforelse
            </div>
        
            <!-- ===== Pagination (Ultra Premium) ===== -->
            <div class="mt-16 flex justify-center">
                <nav
                    class="inline-flex items-center gap-2
                           rounded-full bg-white/70
                           px-3 py-2
                           backdrop-blur-xl
                           shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                           sm:gap-3 sm:px-5 sm:py-3">
        
                    <!-- Previous -->
                    @if ($news->onFirstPage())
                        <span class="cursor-not-allowed px-3 py-2 text-xs text-gray-400 sm:text-sm">
                            ‹ Prev
                        </span>
                    @else
                        <a href="#" wire:click.prevent="previousPage"
                           class="rounded-full px-3 py-2 text-xs text-gray-600
                                  transition hover:bg-gray-200 sm:text-sm">
                            ‹ Prev
                        </a>
                    @endif
        
                    <!-- Page Numbers (Desktop) -->
                    <div class="hidden items-center gap-2 sm:flex">
                        @foreach ($news->links()->elements[0] as $page => $url)
                            @if ($page == $news->currentPage())
                                <span
                                    class="flex h-10 w-10 items-center justify-center
                                           rounded-full bg-teal-500
                                           text-sm font-semibold text-white
                                           shadow-md">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                   class="flex h-10 w-10 items-center justify-center
                                          rounded-full text-sm text-gray-600
                                          transition hover:bg-gray-200">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>
        
                    <!-- Mobile Indicator -->
                    <span class="px-3 py-2 text-xs text-gray-600 sm:hidden">
                        Page {{ $news->currentPage() }} of {{ $news->lastPage() }}
                    </span>
        
                    <!-- Next -->
                    @if ($news->hasMorePages())
                        <a href="#" wire:click.prevent="nextPage"
                           class="rounded-full px-3 py-2 text-xs text-gray-600
                                  transition hover:bg-gray-200 sm:text-sm">
                            Next ›
                        </a>
                    @else
                        <span class="cursor-not-allowed px-3 py-2 text-xs text-gray-400 sm:text-sm">
                            Next ›
                        </span>
                    @endif
                </nav>
            </div>
        
        </div>
        
    </section>

    @push("title")
        RCB - News
    @endpush
</div>
