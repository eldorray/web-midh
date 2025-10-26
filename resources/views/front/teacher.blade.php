<section class="section-pricing">
    <!-- Section Background -->
    <div class="bg-ColorPurple/5">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container-default">
                <!-- Section Content Wrapper -->
                <div class="jos">
                    <!-- Section Content Block -->
                    <div class="mx-auto max-w-[600px]">
                        <div class="mb-5">
                            <h2 class="text-center text-3xl font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                                Our Professional Teachers
                            </h2>
                        </div>
                    </div>
                    <!-- Section Content Block -->
                </div>
                <!-- Section Content Wrapper -->

                <!-- Pricing Area -->
                <div>

                    <!-- Pricing List -->

                    <!-- Team List -->

                    <div class="grid gap-x-6 mt-8 gap-y-8 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach ($teachers as $teacher)
                            <!-- Team Item -->
                            <div class="jos flex flex-col items-center justify-center rounded-[10px] bg-white p-5 text-center shadow-[0_4px_80px_0_rgba(0,0,0,0.08)]"
                                data-jos_animation="flip-left">
                                <img src="{{ $teacher->photo }}" alt="{{ $teacher->name }}" width="266"
                                    height="250" class="h-auto w-full rounded-[10px] lg:w-auto" />
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
                        @endforeach
                    </div>
                    <!-- Team List -->
                    <div class="flex justify-center mt-8">
                        <a href="#"
                            class="inline-block rounded-md bg-ColorPurple px-6 py-3 text-center text-white font-semibold transition-all duration-300 hover:bg-opacity-90">See
                            More >></a>
                    </div>
                </div>

                <!-- Pricing Area -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </div>
    <!-- Section Background -->
</section>
