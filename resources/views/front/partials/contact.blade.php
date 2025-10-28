@section('title', 'Contact - ' . config('app.name', 'School'))
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
                        <h1 class="breadcrumb-title">Contact Us</h1>
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html">Home</a></li>
                            <li>Contact Us</li>
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

        <!--...::: Contact Info Section Start :::... -->
        <div class="section-contact-info">
            <!-- Section Space -->
            <div class="section-space">
                <!-- Section Container -->
                <div class="container-default">
                    <!-- Contact Info List -->
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Contact Info Item -->
                        <div class="jos" data-jos_delay="0">
                            <div class="hover-solid-shadow h-full">
                                <div class="h-full rounded-[10px] border-2 border-ColorBlack bg-white p-[30px]">
                                    <img src="{{ asset('assets/web-midh-img/whatsapp.png') }}" alt="icon-duotone-chat"
                                        width="64" height="60" class="mb-[30px] h-[60px] w-auto" />
                                    <div>
                                        <div class="mb-4 text-2xl font-semibold -tracking-[0.5]">
                                            <a href="https://wa.me/+6281584455355">Abdul Hamid, S.Pd</a>
                                        </div>
                                        <h2>
                                            <a href="https://wa.me/+6281584455355"
                                                class="font-semibold hover:text-ColorBlue">(081584455355)</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Info Item -->
                        <!-- Contact Info Item -->
                        <div class="jos" data-jos_delay="0.3">
                            <div class="hover-solid-shadow h-full">
                                <div class="h-full rounded-[10px] border-2 border-ColorBlack bg-white p-[30px]">
                                    <img src="{{ asset('assets/web-midh-img/whatsapp.png') }}" alt="icon-duotone-phone"
                                        width="64" height="60" class="mb-[30px] h-[60px] w-auto" />
                                    <div>
                                        <div class="mb-4 text-2xl font-semibold -tracking-[0.5]">
                                            <a href="https://wa.me/+6281294686757">Aspuri, S.Pd.I</a>
                                        </div>
                                        <h2>
                                            <a href="https://wa.me/+6281294686757"
                                                class="font-semibold hover:text-ColorBlue">(081294686757)</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Info Item -->
                        <!-- Contact Info Item -->
                        <div class="jos" data-jos_delay="0">
                            <div class="hover-solid-shadow h-full">
                                <div class="h-full rounded-[10px] border-2 border-ColorBlack bg-white p-[30px]">
                                    <img src="{{ asset('assets/web-midh-img/whatsapp.png') }}" alt="icon-duotone-chat"
                                        width="64" height="60" class="mb-[30px] h-[60px] w-auto" />
                                    <div>
                                        <div class="mb-4 text-2xl font-semibold -tracking-[0.5]">
                                            <a href="https://wa.me/+6281511647842">Yunita Abidin, S.Pd</a>
                                        </div>
                                        <h2>
                                            <a href="https://wa.me/+6281511647842"
                                                class="font-semibold hover:text-ColorBlue">(081511647842)</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Info Item -->
                        <!-- Contact Info List -->
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Section Space -->
            </div>
        </div>
        <!--...::: Contact Info Section End :::... -->

        <!--...::: Contact Section Start :::... -->
        <section class="section-contact">
            <!-- Section Space -->
            <div class="section-space-bottom">
                <!-- Section Container -->
                <div class="container-custom has-container-custom">
                    <!-- Contact Section Area -->
                    <div class="grid gap-[60px] lg:grid-cols-[0.85fr_1fr] lg:gap-20 xl:gap-[100px] xxl:gap-[134px]">
                        <!-- Contact Content Block -->
                        <div class="jos">
                            <!-- Section Wrapper -->
                            <div class="rounded-[10px] border-2 border-ColorBlack bg-white p-[30px] shadow-lg">
                                <!-- Section Block -->
                                <div class="mb-5">
                                    <h2 class="text-2xl font-bold text-ColorBlack">
                                        Kunjungi Kampus Kami
                                    </h2>
                                </div>
                                <!-- Section Block -->

                                <!-- Address Info -->
                                <div class="mb-6">
                                    <div class="mb-4 flex items-start gap-3">
                                        <i class="fa-solid fa-location-dot mt-1 text-xl text-ColorBlue"></i>
                                        <div>
                                            <h3 class="mb-2 font-semibold text-ColorBlack">Alamat Lengkap</h3>
                                            <p class="text-ColorBlack/80">
                                                Informasi lebih lanjut dan detail bisa datang ke Kampus MI Daarul Hikmah
                                                di Jl. Pembangunan 3, Rt. 05/05 Karangsari Kec. Neglasari Kota Tangerang
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Google Maps -->
                                <div class="overflow-hidden rounded-lg border border-ColorBlack/20">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.8!2d106.6!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMDAuMCJTIDEwNsKwMzYnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
                                        width="100%" height="300" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full">
                                    </iframe>
                                </div>

                                <!-- Direction Button -->
                                <div class="mt-6">
                                    <a href="https://maps.google.com/?q=Jl. Pembangunan 3, Karangsari, Neglasari, Tangerang"
                                        target="_blank" class="btn is-blue is-rounded inline-flex items-center gap-2">
                                        <i class="fa-solid fa-map-location-dot"></i>
                                        Buka di Google Maps
                                    </a>
                                </div>
                            </div>
                            <!-- Section Wrapper -->
                        </div>
                        <!-- Contact Content Block -->

                        <!-- Contact Form Block -->
                        <div class="jos xm:p-10 rounded-[10px] border border-ColorBlack/50 bg-ColorOffWhite p-[30px]">
                            <form
                                action="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=midaarulhikmah@gmail.com"
                                method="post">
                                <!-- From Group List -->
                                <div class="flex flex-col gap-6">
                                    <!-- Form Group Item-->
                                    <div>
                                        <label for="name" class="mb-[10px] block text-left font-semibold">Your
                                            name</label>
                                        <input type="text" name="name" id="name"
                                            placeholder="Enter your full name"
                                            class="w-full rounded-[50px] border border-ColorBlack/50 px-[30px] py-[15px] outline-none transition-all duration-300 placeholder:text-ColorBlack/50 focus:border-ColorBlue"
                                            required />
                                    </div>
                                    <!-- Form Group Item-->
                                    <!-- Form Group Item-->
                                    <div>
                                        <label for="email" class="mb-[10px] block text-left font-semibold">Email
                                            address</label>
                                        <input type="email" name="email" id="email"
                                            placeholder="Enter your full name"
                                            class="w-full rounded-[50px] border border-ColorBlack/50 px-[30px] py-[15px] outline-none transition-all duration-300 placeholder:text-ColorBlack/50 focus:border-ColorBlue"
                                            required />
                                    </div>
                                    <!-- Form Group Item-->
                                    <!-- Form Group Item-->
                                    <div>
                                        <label for="message" class="mb-[10px] block text-left font-semibold">Write
                                            your
                                            message</label>
                                        <textarea name="message" id="message" placeholder="Write us your question here..."
                                            class="min-h-[130px] w-full rounded-[30px] border border-ColorBlack/50 px-[30px] py-[15px] outline-none transition-all duration-300 placeholder:text-ColorBlack/50 focus:border-ColorBlue"
                                            required></textarea>
                                    </div>
                                    <!-- Form Group Item-->
                                </div>
                                <!-- From Group List -->
                                <button type="submit" class="btn is-blue is-rounded is-large mt-8">
                                    Send Message
                                </button>
                            </form>
                        </div>
                        <!-- Contact Form Block -->
                    </div>
                    <!-- Contact Section Area -->
                </div>
                <!-- Section Container -->
            </div>
            <!-- Section Space -->
        </section>
        <!--...::: Contact Section End :::... -->
    </main>
    @include('front.footer')
</x-layouts.app>
