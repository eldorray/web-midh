@section('title', 'Home')
<section class="section-hero bg-[#FAF9F5]">
    <!-- Section Space -->
    <div class="pb-20 pt-28 md:pt-36 lg:pb-[100px] lg:pt-[150px] xxl:pb-[120px] xxl:pt-[185px]">
        <!-- Section Container -->
        <div class="container-default">
            <!-- Hero Area -->
            <div class="grid items-center gap-12 lg:grid-cols-[1fr,minmax(0,_0.8fr)] lg:gap-[50px]">
                <!-- Hero Content Block -->
                <div class="jos mx-auto max-w-[500px] lg:mx-0 lg:max-w-none">
                    <div
                        class="flex flex-col items-center justify-center text-center lg:items-start lg:justify-normal lg:text-left">
                        <h1
                            class="mb-6 text-3xl font-extrabold leading-[1.11] -tracking-[1px] md:text-4xl lg:text-5xl xl:text-6xl xxl:text-[90px]">
                            {{ $heroes->title ?? 'Your Hero Title Here' }}
                        </h1>
                        <p class="mb-10 max-w-[624px] xl:mb-[50px]">
                            {{ $heroes->description ?? 'Your hero description goes here. This is a placeholder text to show where the description will be displayed.' }}
                        </p>
                        <div class="mb-6 flex flex-wrap justify-center gap-5 sm:justify-normal">
                            <a href="/ppdb"
                                class="btn is-purple btn-animation is-large inline-block rounded"><span>Daftarkan
                                    Segera</span></a>
                        </div>
                        <p class="flex gap-[10px] text-base font-semibold">
                            <img src="assets/img/icons/icon-green-star.svg" alt="icon-green-star" width="25"
                                height="24" />
                            {{ $heroes->small_text ?? 'Your small supporting text goes here.' }}
                        </p>
                    </div>
                </div>
                <!-- Hero Content Block -->

                <!-- Hero Image Block -->
                <div class="jos">
                    <div class="relative mx-auto h-auto max-w-[280px] sm:max-w-[500px] lg:ml-auto lg:mr-0">
                        <!-- Hero Main Image -->
                        <img src="{{ $heroes->image ? asset('storage/' . $heroes->image) : asset('assets/img/th-2/hero-img.png') }}"
                            alt="hero-img" width="499" height="505" />
                        <!-- Hero Avatar Image -->

                    </div>
                </div>
                <!-- Hero Image Block -->
            </div>
            <!-- Hero Area -->
        </div>
        <!-- Section Container -->
    </div>
    <!-- Section Space -->
</section>
<!--...::: Hero Section End :::... -->
