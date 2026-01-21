<div>

    <section class="mt-20 lg:mt-8">
        <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-4 bg-white p-6 rounded-md shadow">
            <!-- Hero Image -->
            <div class="relative rounded-md overflow-hidden shadow-sm">
                <img src="{{ asset(@$news->media?->path) }}" alt="{{ $news->title_en }}"
                    class="w-full h-80 sm:h-[650px] object-cover">

                <!-- Overlay Gradient -->
                {{-- <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/20 to-transparent"></div> --}}

                <!-- Meta Info -->
                <div class="absolute bottom-4 left-4 text-black space-y-2">
                    <span
                        class="inline-flex items-center rounded-full bg-teal-500 px-3 py-1 text-sm font-medium text-white shadow-sm">
                        {{ \Carbon\Carbon::parse($news->date)->format("d M Y") }}
                    </span>
                </div>
            </div>

            <h1 class="text-xl sm:text-2xl my-6 font-semibold leading-snug">
                {{ app()->getLocale() === "bn" ? $news->title_bn : $news->title_en }}
            </h1>

            <!-- Article Content -->
            <div class="mt-7 text-gray-700 note-editable">
                {!! app()->getLocale() === "bn" ? $news->desc_bn : $news->desc_en !!}
            </div>
        </div>
    </section>

    @push("title")
        {{ $news->title_en }}
    @endpush
</div>
