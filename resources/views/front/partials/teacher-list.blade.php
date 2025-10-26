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
                        <h1 class="breadcrumb-title">Our Teachers</h1>
                        <ul class="breadcrumb-nav">
                            <li><a href="/">Home</a></li>
                            <li>Our Teachers</li>
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

        <!--...::: Team Section Start :::... -->
        <div class="section-team">
            <!-- Section Space -->
            <div class="section-space">
                <!-- Section Container -->

                <div class="mb-4">
                    <form class="max-w-md mx-auto">
                        <label for="default-search"
                            class="mt-6 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="search" name="search" value="{{ request('search') }}"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari Guru" />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                </div>

                <div class="container-default">
                    <!-- Team List -->
                    <div class="grid gap-x-6 gap-y-8 sm:grid-cols-2 lg:grid-cols-4">
                        <!-- Team Item -->
                        @forelse ($teachers as $teacher)
                            <div class="jos flex flex-col items-center justify-center rounded-[10px] bg-white p-5 text-center shadow-[0_4px_80px_0_rgba(0,0,0,0.08)]"
                                data-jos_animation="flip-left">
                                <img src="{{ $teacher->photo }}" alt="team-img-1" width="266" height="250"
                                    class="h-auto w-full rounded-[10px] lg:w-auto" />
                                <div class="mb-4 mt-6">
                                    <div class="mb-1 text-xl font-semibold text-ColorBlack">
                                        {{ $teacher->name }}
                                    </div>
                                    <span class="block text-opacity-80">{{ $teacher->subject }}</span>
                                </div>

                                <div class="flex flex-wrap gap-[10px] xl:gap-4">
                                    <a href="https://twitter.com/{{ $teacher->twitter }}" target="_blank"
                                        rel="noopener noreferrer"
                                        class="flex h-[35px] w-[35px] items-center justify-center rounded-[50%] bg-ColorBlack bg-opacity-5 text-sm text-ColorBlack transition-all duration-300 hover:bg-ColorBlack hover:bg-opacity-100 hover:text-white"
                                        aria-label="twitter">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                    <a href="https://www.facebook.com/{{ $teacher->facebook }}" target="_blank"
                                        rel="noopener noreferrer"
                                        class="flex h-[35px] w-[35px] items-center justify-center rounded-[50%] bg-ColorBlack bg-opacity-5 text-sm text-ColorBlack transition-all duration-300 hover:bg-ColorBlack hover:bg-opacity-100 hover:text-white"
                                        aria-label="facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="https://www.instagram.com/{{ $teacher->instagram }}" target="_blank"
                                        rel="noopener noreferrer"
                                        class="flex h-[35px] w-[35px] items-center justify-center rounded-[50%] bg-ColorBlack bg-opacity-5 text-sm text-ColorBlack transition-all duration-300 hover:bg-ColorBlack hover:bg-opacity-100 hover:text-white"
                                        aria-label="instagram">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Team Item -->
                        @empty
                            <div class="col-span-12 text-center">
                                <p class="text-lg text-ColorBlack">Guru yang anda cari tidak ditemukan.</p>
                            </div>
                        @endforelse
                    </div>
                    <!-- Team List -->

                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
        </div>
        <!--...::: Team Section End :::... -->
    </main>
</x-layouts.app>
