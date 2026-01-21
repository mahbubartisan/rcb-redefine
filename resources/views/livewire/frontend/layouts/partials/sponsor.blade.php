<div>
    <section class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-4 mb-16 mt-12">
        <!-- Header with Arrows -->
        <div class="flex justify-between items-center mb-3">
            <h2 class="text-xl font-bold text-gray-800 uppercase">{{ __("messages.our_sponsors") }}</h2>
            <!-- Navigation Arrows -->
            <div class="flex gap-3 mt-3 md:mt-0">
                <button class="sponsor-prev bg-teal-500 rounded-full w-8 h-8 flex items-center justify-center">
                    <ion-icon name="chevron-back-outline" class="text-white"></ion-icon>
                </button>
                <button class="sponsor-next bg-teal-500 rounded-full w-8 h-8 flex items-center justify-center">
                    <ion-icon name="chevron-forward-outline" class="text-white"></ion-icon>
                </button>
            </div>
        </div>

        <!-- Swiper Container -->
        {{-- <div class="sponsor-swiper overflow-hidden opacity-0 transition-opacity">
                <div class="swiper-wrapper">
                    <!-- Sponsor Slide -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiVpPayRdxevjlTspsn70ZlqgWGp7FWdxPfmnUxhGj8jAiNT-RLjUtbmOeNLUKOkRGZek&usqp=CAU"
                                alt="Sponsor 1" class="w-full h-full object-contain" />
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                            <img src="https://img.freepik.com/premium-vector/sh-letter-logo-design_646665-537.jpg"
                                alt="Sponsor 2" class="w-full h-full object-contain" />
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                            <img src="https://img.freepik.com/premium-vector/letter-s-logo_747896-783.jpg"
                                alt="Sponsor 3" class="w-full h-full object-contain" />
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                            <img src="https://img.freepik.com/premium-vector/l-c-letter-logo-design_679026-2910.jpg"
                                alt="Sponsor 4" class="w-full h-full object-contain" />
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                            <img src="https://img.freepik.com/premium-vector/letter-dd-logo-design-vector-template-design-brand_1059144-2236.jpg"
                                alt="Sponsor 5" class="w-full h-full object-contain" />
                        </div>
                    </div>

                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                            <img src="https://img.freepik.com/premium-vector/letter-dd-logo-design-vector-template-design-brand_1059144-2236.jpg"
                                alt="Sponsor 6" class="w-full h-full object-contain" />
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                            <img src="https://img.freepik.com/premium-vector/letter-dd-logo-design-vector-template-design-brand_1059144-2236.jpg"
                                alt="Sponsor 6" class="w-full h-full object-contain" />
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                            <img src="https://img.freepik.com/premium-vector/letter-dd-logo-design-vector-template-design-brand_1059144-2236.jpg"
                                alt="Sponsor 6" class="w-full h-full object-contain" />
                        </div>
                    </div>
                </div>
            </div> --}}
        <div class="sponsor-swiper overflow-hidden opacity-0 transition-opacity">
            <div class="swiper-wrapper">
                @foreach ($sponsors as $sponsor)
                    <div class="swiper-slide h-auto">
                        <a href="{{ $sponsor->url }}" target="__blank">
                            <div
                                class="bg-white rounded-md border border-gray-200 shadow-sm hover:shadow-xl transition overflow-hidden flex items-center justify-center aspect-[4/2]">
                                <img src="{{ asset(@$sponsor->media?->path) }}" alt="{{ $sponsor->title }}"
                                    class="w-full h-full object-contain" />
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </section>



    <!-- SwiperJS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> --}}


    <script>
        document.addEventListener("livewire:navigated", () => {
            const sponsorSwiper = new Swiper(".sponsor-swiper", {
                speed: 800,
                loop: true,
                slidesPerView: 2,
                spaceBetween: 12,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false
                },
                breakpoints: {
                    480: {
                        slidesPerView: 3,
                        spaceBetween: 12,
                    },
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 12
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 14
                    },
                    1024: {
                        slidesPerView: 6,
                        spaceBetween: 16
                    },
                },
                navigation: {
                    nextEl: ".sponsor-next",
                    prevEl: ".sponsor-prev",
                },
                on: {
                    init: function() {
                        document.querySelector(".sponsor-swiper").classList.remove("opacity-0");
                    }
                }
            });
        });
    </script>
</div>
