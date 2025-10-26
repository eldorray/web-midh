<x-layouts.app>
    @include('front.header')
    <main class="main-wrapper relative overflow-hidden">
        <!--...::: Breadcrumb Section Start :::... -->
        <section class="section-breadcrumb">
            <!-- Breadcrumb Section Spacer -->
            <div class="breadcrumb-wrapper">
                <!-- Section Container -->
                <div class="container-default">
                    <div class="breadcrumb-block">
                        <h1 class="breadcrumb-title">Blog</h1>
                        <ul class="breadcrumb-nav">
                            <li><a href="/">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
                <!-- Section Container -->

                <!-- Breadcrumb Shape - 1 -->
                <div class="absolute left-0 top-0 -z-10">
                    <img src="assets/img/elements/breadcrumb-shape-1.svg" alt="hero-shape-1" width="291"
                        height="380" />
                </div>

                <!-- Breadcrumb Shape - 2 -->
                <div class="absolute bottom-0 right-0 -z-[1]">
                    <img src="assets/img/elements/breadcrumb-shape-2.svg" alt="hero-shape-2" width="291"
                        height="380" />
                </div>
            </div>
            <!-- Breadcrumb Section Spacer -->
        </section>
        <!--...::: Breadcrumb Section End :::... -->

        <!--...::: Blog Section Start :::... -->
        <section class="blog-section">
            <!-- Section Spacer -->
            <div class="section-space">
                <!-- Section Container -->
                <div class="container-default">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-[1fr,minmax(416px,_0.45fr)]">
                        <div class="flex flex-col gap-y-10 lg:gap-y-14 xl:gap-y-20">
                            <!-- Blog Post List -->
                            <div class="grid gap-y-10">
                                <!-- Blog Post Single Item -->
                                @forelse ($blogs as $blog)
                                    <div class="jos">
                                        <div
                                            class="group overflow-hidden rounded-[10px] border border-[#E1E1E] bg-white hover:border-white hover:shadow-[0_4px_60px_rgba(10,16,47,0.08)]">
                                            <a href="blog-details.html" class="block overflow-hidden">
                                                <img src="{{ $blog->thumbnail }}" alt="blog-main-1" width="856"
                                                    height="450"
                                                    class="h-auto w-full scale-100 object-cover transition-all duration-300 group-hover:scale-105" />
                                            </a>
                                            <div class="p-[30px]">
                                                <!-- Blog Post Meta -->
                                                <ul
                                                    class="flex flex-wrap items-center gap-4 text-base font-semibold sm:gap-6">
                                                    <li>
                                                        <a href="blog-details.html"
                                                            class="flex items-center gap-x-[10px] hover:text-ColorBlue">
                                                            <img src="assets/img/th-1/blog-author-img-1.jpg"
                                                                alt="blog-author-img-1" width="45" height="45"
                                                                class="rounded-[50%]" />
                                                            By {{ $blog->author }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-details.html"
                                                            class="flex items-center gap-x-[10px] hover:text-ColorBlue">
                                                            <i class="fa-regular fa-calendar"></i>
                                                            {{ $blog->created_at->format('M d, Y') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-details.html"
                                                            class="rounded-[50px] bg-ColorBlack/5 px-[26px] py-1.5 text-ColorBlack/60 hover:bg-ColorBlue hover:text-white">{{ $blog->tagsw }}</a>
                                                    </li>
                                                </ul>
                                                <!-- Blog Post Meta -->
                                                <h2
                                                    class="mb-5 mt-8 line-clamp-2 font-body text-2xl font-bold leading-[1.4] -tracking-[1px] lg:text-3xl">
                                                    <a href="blog-details.html">
                                                        {{ $blog->title }}</a>
                                                </h2>
                                                <p class="mb-7 line-clamp-2 last:mb-0">
                                                    {{ Str::limit(strip_tags($blog->content), 150, '...') }}
                                                </p>
                                                <a href="#"
                                                    class="inline-flex items-center gap-x-2 text-base font-bold text-ColorBlack group-hover:text-ColorBlue">Read
                                                    More
                                                    <span
                                                        class="transition-all duration-300 ease-in-out group-hover:translate-x-2">
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div
                                        class="flex flex-col items-center justify-center gap-3 rounded-[10px] border border-dashed border-ColorBlack/10 bg-ColorOffWhite/60 p-10 text-center">
                                        <span
                                            class="flex h-14 w-14 items-center justify-center rounded-full bg-white text-2xl text-ColorBlue">
                                            <i class="fa-regular fa-face-frown"></i>
                                        </span>
                                        <p class="text-base font-semibold text-ColorBlack/80">Tidak ada postingan blog
                                            ditemukan.</p>
                                        <p class="text-sm text-ColorBlack/60">Coba perbarui pencarian atau kembali lagi
                                            nanti.</p>
                                    </div>
                                @endforelse
                            </div>
                            <!-- Blog Post List -->
                            <!-- Pagination -->
                            <div class="flex flex-wrap items-center justify-center gap-4 pt-10 lg:justify-end lg:pt-14">
                                {{ $blogs->links() }}
                            </div>
                            <!-- Pagination -->
                        </div>
                        <!-- Blog Aside -->
                        <aside class="jos flex flex-col gap-y-[30px]">
                            <!-- Single Sidebar -->
                            <div class="rounded-[10px] bg-ColorOffWhite p-5">
                                <!-- Sidebar Search -->
                                <form action="{{ url()->current() }}" method="GET" class="relative h-[60px]">
                                    <input type="search" name="search" id="sidebar-search"
                                        placeholder="Type to search..." value="{{ request('search') }}"
                                        class="focus:border-colortext-ColorBlue h-full w-full rounded-[50px] border border-[#E1E1E1] bg-white py-[15px] pl-16 pr-8 text-lg text-ColorBlack outline-none transition-all placeholder:text-ColorBlack" />
                                    <button type="submit"
                                        class="absolute left-[30px] top-0 h-full hover:text-ColorBlue">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                                <!-- Sidebar Search -->
                            </div>

                            <div class="rounded-[10px] bg-ColorOffWhite p-8">
                                <div
                                    class="relative mb-[30px] inline-block pb-[10px] text-lg font-semibold text-ColorBlack after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-black">
                                    Recent Posts
                                </div>

                                <!-- Blog Recent Post List -->
                                <ul class="flex flex-col gap-y-6">
                                    @php
                                        $recentBlogsList = isset($recentBlogs)
                                            ? $recentBlogs
                                            : (isset($blogs)
                                                ? $blogs->take(3)
                                                : collect());
                                    @endphp

                                    @forelse ($recentBlogsList as $recent)
                                        <li class="group flex flex-col items-center gap-x-4 gap-y-4 sm:flex-row">
                                            <a href="blog-details.html"
                                                class="inline-block h-[100px] w-full overflow-hidden rounded-[5px] sm:w-[150px]">
                                                <img src="{{ $recent->thumbnail ?? asset('assets/img/th-1/blog-recent-img-1.jpg') }}"
                                                    alt="{{ $recent->title }}" width="150" height="100"
                                                    class="h-full w-full scale-100 object-cover transition-all duration-300 group-hover:scale-105" />
                                            </a>
                                            <div class="flex w-full flex-col gap-y-3 sm:w-auto sm:flex-1">
                                                <a href="blog-details.html"
                                                    class="flex items-center gap-[10px] text-sm hover:text-ColorBlue">
                                                    <i class="fa-regular fa-calendar"></i>
                                                    {{ optional($recent->created_at)->format('M d, Y') }}
                                                </a>
                                                <a href="blog-details.html"
                                                    class="line-clamp-2 text-base font-semibold text-ColorBlack hover:text-ColorBlue">
                                                    {{ $recent->title }}
                                                </a>
                                            </div>
                                        </li>
                                    @empty
                                        <li class="text-sm text-ColorBlack/70">Tidak ada postingan terbaru.</li>
                                    @endforelse
                                </ul>
                                <!-- Blog Recent Post List -->
                            </div>
                            <!-- Single Sidebar -->
                            <!-- Single Sidebar -->
                            <div class="rounded-[10px] bg-ColorOffWhite p-8">
                                <div
                                    class="relative mb-[30px] inline-block pb-[10px] text-lg font-semibold text-ColorBlack after:absolute after:bottom-0 after:left-0 after:h-[2px] after:w-full after:bg-black">
                                    Tags
                                </div>

                                <!-- Blog Tags Post List -->
                                <ul class="flex flex-wrap gap-x-2 gap-y-4">
                                    @foreach ($collectTags as $tag)
                                        <li>
                                            <a href="blog-details.html"
                                                class="inline-block rounded-[55px] bg-ColorBlack bg-opacity-5 px-5 py-1 hover:bg-ColorBlue hover:text-white">{{ $tag }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Blog Tags Post List -->
                            </div>
                            <!-- Single Sidebar -->
                        </aside>
                        <!-- Blog Aside -->
                    </div>
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Spacer -->
        </section>
        <!--...::: Blog Section End :::... -->
    </main>

    <!--...::: Footer Section Start :::... -->
    <footer class="section-footer">
        <div class="bg-ColorBlack">
            <!-- Footer Area Top -->
            <div class="relative z-10">
                <!-- Footer Top Spacing -->
                <div class="pb-[60px] pt-20 lg:pb-20 lg:pt-[100px] xl:pt-[120px]">
                    <!-- Section Container -->
                    <div class="container-default">
                        <!-- Section Wrapper -->
                        <div
                            class="flex flex-wrap items-center justify-center text-center lg:text-left lg:justify-between gap-8">
                            <!-- Section Block -->
                            <div class="max-w-[400px] md:max-w-[500px] lg:max-w-[550px]">
                                <h2 class="text-white">
                                    Ready to grow your business digitally?
                                </h2>
                            </div>
                            <!-- Section Block -->
                            <a href="portfolio.html"
                                class="btn is-blue is-rounded btn-animation is-large group"><span>Let's start the
                                    project</span></a>
                        </div>
                        <!-- Section Wrapper -->
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Footer Top Spacing -->

                <!-- CTA Shape -->
                <div class="absolute right-[9%] top-8 -z-10 hidden xxl:block">
                    <img src="assets/img/elements/cta-1-shape-1.svg" alt="cta-1-shape-1" width="115"
                        height="130" />
                </div>
            </div>
            <!-- Footer Area Top -->

            <!-- Horizontal Line Separator -->
            <div class="horizontal-line bg-white"></div>
            <!-- Horizontal Line Separator -->

            <!-- Footer Area Center -->
            <div class="text-white">
                <!-- Footer Center Spacing -->
                <div class="py-[60px] lg:py-20">
                    <!-- Section Container -->
                    <div class="container-default">
                        <!-- Footer Widget List -->
                        <div
                            class="grid gap-x-16 gap-y-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-[1fr_repeat(3,_auto)] xl:gap-x-24 xxl:gap-x-[134px]">
                            <!-- Footer Widget Item -->
                            <div class="flex flex-col gap-y-7 md:col-span-3 lg:col-span-1">
                                <!-- Footer Logo -->
                                <a href="index.html">
                                    <img src="assets/img/logo-blue-light.png" alt="Masco" width="109"
                                        height="24" />
                                </a>
                                <!-- Footer Content -->
                                <div>
                                    <!-- Footer About Text -->
                                    <div class="lg:max-w-[416px]">
                                        We are strategic & creative digital agency who are
                                        focused on user experience, mobile, social, data
                                        gathering and promotional offerings.
                                    </div>
                                    <!-- Footer Mail -->
                                    <a href="mailto:yourdemo@email.com"
                                        class="my-6 block underline-offset-4 transition-all duration-300 hover:underline">yourdemo@email.com</a>
                                    <!-- Footer Social Link -->
                                    <div class="flex flex-wrap gap-5">
                                        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"
                                            class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-white bg-opacity-5 text-sm text-white transition-all duration-300 hover:bg-ColorBlue"
                                            aria-label="twitter">
                                            <i class="fa-brands fa-x-twitter"></i>
                                        </a>
                                        <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer"
                                            class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-white bg-opacity-5 text-sm text-white transition-all duration-300 hover:bg-ColorBlue"
                                            aria-label="facebook">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                        <a href="https://www.instagram.com/" target="_blank"
                                            rel="noopener noreferrer"
                                            class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-white bg-opacity-5 text-sm text-white transition-all duration-300 hover:bg-ColorBlue"
                                            aria-label="instagram">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                        <a href="https://www.github.com/" target="_blank" rel="noopener noreferrer"
                                            class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-white bg-opacity-5 text-sm text-white transition-all duration-300 hover:bg-ColorBlue"
                                            aria-label="github">
                                            <i class="fa-brands fa-github"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Footer Content -->
                            </div>
                            <!-- Footer Widget Item -->

                            <!-- Footer Widget Item -->
                            <div class="flex flex-col gap-y-7 md:col-span-1 lg:col-span-1">
                                <!-- Footer Widget Title -->
                                <div class="text-xl font-semibold capitalize">
                                    Primary Pages
                                </div>
                                <!-- Footer Navbar -->
                                <ul class="flex flex-col gap-y-[10px] capitalize">
                                    <li>
                                        <a href="index.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Home</a>
                                    </li>
                                    <li>
                                        <a href="about.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">About
                                            Us</a>
                                    </li>
                                    <li>
                                        <a href="services.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Services</a>
                                    </li>
                                    <li>
                                        <a href="pricing.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">pricing</a>
                                    </li>
                                    <li>
                                        <a href="contact.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Widget Item -->

                            <!-- Footer Widget Item -->
                            <div class="flex flex-col gap-y-6 md:col-span-1 lg:col-span-1">
                                <!-- Footer Title -->
                                <div class="text-xl font-semibold capitalize">
                                    Utility pages
                                </div>
                                <!-- Footer Title -->

                                <!-- Footer Navbar -->
                                <ul class="flex flex-col gap-y-[10px] capitalize">
                                    <li>
                                        <a href="signup.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Signup</a>
                                    </li>
                                    <li>
                                        <a href="login.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Login</a>
                                    </li>
                                    <li>
                                        <a href="error-404.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">404
                                            Not found</a>
                                    </li>
                                    <li>
                                        <a href="reset-password.html"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Password
                                            Reset</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Widget Item-->

                            <!-- Footer Widget Item -->
                            <div class="flex flex-col gap-y-6 md:col-span-1 lg:col-span-1">
                                <!-- Footer Title -->
                                <div class="text-xl font-semibold capitalize">
                                    Resources
                                </div>
                                <!-- Footer Title -->

                                <!-- Footer Navbar -->
                                <ul class="flex flex-col gap-y-[10px] capitalize">
                                    <li>
                                        <a href="https://www.example.com/" target="_blank" rel="noopener noreferrer"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Support</a>
                                    </li>
                                    <li>
                                        <a href="https://www.example.com/" target="_blank" rel="noopener noreferrer"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Privacy
                                            policy</a>
                                    </li>
                                    <li>
                                        <a href="https://www.example.com/" target="_blank" rel="noopener noreferrer"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Terms
                                            & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="https://www.example.com/" target="_blank" rel="noopener noreferrer"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Strategic
                                            finance</a>
                                    </li>
                                    <li>
                                        <a href="https://www.example.com/" target="_blank" rel="noopener noreferrer"
                                            class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Video
                                            guide</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Widget Item -->
                        </div>
                        <!-- Footer Widget List -->
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Footer Center Spacing -->
            </div>
            <!-- Footer Area Center -->

            <!-- Footer Bottom -->
            <div class="bg-white bg-opacity-5">
                <!-- Footer Bottom Spacing -->
                <div class="py-[18px]">
                    <!-- Section Container -->
                    <div class="container-default">
                        <div class="text-center text-white text-opacity-80">
                            &copy; Copyright 2025
                        </div>
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Footer Bottom Spacing -->
            </div>
            <!-- Footer Bottom -->
        </div>
    </footer>
    <!--...::: Footer Section End :::... -->
    </div>
</x-layouts.app>
