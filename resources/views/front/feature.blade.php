<section class="section-features">
    <!-- Section Background -->
    <div class="bg-ColorPurple/5">
        <!-- Section Space -->
        <div class="section-space">
            <!-- Section Container -->
            <div class="container-default">
                <!-- Section Content Wrapper -->
                <div class="jos mb-[60px] xl:mb-20">
                    <!-- Section Content Block -->
                    <div class="mx-auto max-w-[636px]">
                        <h2 class="text-center text-3xl font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                            Program Unggulan Kami
                        </h2>
                    </div>
                    <!-- Section Content Block -->
                </div>
                <!-- Section Content Wrapper -->

                <!-- Feature List -->
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Feature Item -->
                    @foreach ($features as $feature)
                        <div class="jos" data-jos_delay="0">
                            <div class="hover-solid-shadow h-full">
                                <div class="h-full rounded-[10px] border-2 border-ColorBlack bg-white p-[30px]">
                                    <img src="{{ asset('storage/' . $feature->icon) ?? asset('default-icon.png') }}"
                                        alt="{{ $feature->title ?? 'Belum ada gambar' }} Icon" width="60"
                                        height="60" class="mb-[30px] h-[60px] w-auto" />
                                    <div
                                        class="mb-4 text-xl font-semibold leading-[1.33] -tracking-[0.5px] text-ColorBlack lg:text-2xl">
                                        {{ $feature->title ?? 'Belum ada judul' }}
                                    </div>
                                    <p>
                                        {{ $feature->description ?? 'Belum ada deskripsi' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Feature List -->
            </div>
            <!-- Section Container -->
        </div>
        <!-- Section Space -->
    </div>
    <!-- Section Background -->
</section>
