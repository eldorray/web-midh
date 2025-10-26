<x-layouts.app>
    <!--...::: Main Wrapper Start :::... -->
    <div class="page-wrapper relative z-[1] bg-white">
        @include('front.header')

        <main class="main-wrapper relative overflow-hidden">
            @include('front.hero')

            <!--...::: Features Section Start :::... -->
            @include('front.feature')
            <!--...::: Features Section End :::... -->

            <!--...::: Visi misi Section Start :::... -->
            @include('front.visimisi')
            <!--...::: Visi misi Section End :::... -->

            <!--...::: Video Section Start :::... -->
            @include('front.video')
            <!--...::: Video Section End :::... -->

            <!--...::: Testimonial Section Start :::... -->
            @include('front.blog')
            <!--...::: Testimonial Section End :::... -->

            <!-- Horizontal Text Slider -->
            <div
                class="overflow-hidden bg-ColorBlack py-5 text-3xl font-bold uppercase leading-[1.4] tracking-widest text-white">
                <!-- Horizontal Slider Block-->
                <div class="horizontal-slide-from-right-to-left flex gap-x-[30px]">
                    <span class="inline-block min-w-[855px]">MI Daarul Hikmah</span>
                    <img src="assets/img/icons/fire-icon.png" alt="fire-icon" width="40" height="40" />
                    <span class="inline-block min-w-[855px]">Open PPDB 2026-2027</span>
                    <img src="assets/img/icons/fire-icon.png" alt="fire-icon" width="40" height="40" />
                    <span class="inline-block min-w-[855px]">Daftarkan Segera Putra-putri anda</span>
                    <img src="assets/img/icons/fire-icon.png" alt="fire-icon" width="40" height="40" />
                    <span class="inline-block min-w-[855px]">Jangan Sampai Ketinggalan</span>
                    <img src="assets/img/icons/fire-icon.png" alt="fire-icon" width="40" height="40" />
                </div>
                <!-- Horizontal Slider Block-->
            </div>
            <!-- Horizontal Text Slider -->

            <!--...::: Teacher Section Start :::... -->
            @include('front.teacher')
            <!--...::: Teacher Section End :::... -->

            <!--...::: Content Section Start :::... -->
            <section class="section-content">
                <!-- Section Space -->
                <div class="section-space">
                    <!-- Section Container -->
                    <div class="container-custom">
                        <!-- Content Area Single -->
                        <div
                            class="grid items-center gap-10 lg:grid-cols-2 lg:gap-24 xl:grid-cols-[1fr_minmax(0,_0.82fr)] xl:gap-[143px]">
                            <!-- Content Block Left -->
                            <div class="jos" data-jos_animation="fade-right">
                                <!-- Section Wrapper -->
                                <div>
                                    <!-- Section Block -->
                                    <div class="mb-5">
                                        <h2>Seamless integration with all your favorite tools</h2>
                                    </div>
                                    <!-- Section Block -->
                                </div>
                                <!-- Section Wrapper -->
                                <p class="max-w-[627px]">
                                    Connect our software with the apps you use and love. With
                                    the increasing number of integrations with communications.
                                    Bring in customer data from your favourite tools.
                                </p>
                                <div class="mt-[50px]">
                                    <a href=""
                                        class="btn is-black btn-animation is-large inline-block rounded"><span>See all
                                            integrations</span></a>
                                </div>
                            </div>
                            <!-- Content Block Left -->
                            <!-- Content Block Right -->
                            <div class="jos relative" data-jos_animation="fade-left">
                                <!-- Content Image -->
                                <img src="assets/img/th-2/content-img-3.png" alt="content-img-3" width="472"
                                    height="348" class="h-auto w-full" />
                            </div>
                            <!-- Content Block Right -->
                        </div>
                        <!-- Content Area Single -->
                    </div>
                    <!-- Section Container -->
                </div>
                <!-- Section Space -->
            </section>
            <!--...::: Content Section End :::... -->

            <!--...::: CTA Section Start :::... -->
            <section class="section-cta">
                <!-- Section Background -->
                <div class="relative bg-ColorPurple">
                    <!-- Section Space -->
                    <div class="py-[60px] lg:py-20 xl:py-[100px]">
                        <!-- Section Container -->
                        <div class="container-default">
                            <!-- Section Content Wrapper -->
                            <div class="jos mb-[50px]">
                                <!-- Section Content Block -->
                                <div class="mx-auto max-w-[700px]">
                                    <h2 class="text-center text-white">
                                        Sign up for your free trial today & add live chat to your
                                        site
                                    </h2>
                                </div>
                                <!-- Section Content Block -->
                            </div>
                            <!-- Section Content Wrapper -->
                            <div class="jos flex justify-center">
                                <a href="" class="btn is-black btn-animation is-large inline-block rounded">
                                    <span>Get started free</span>
                                </a>
                            </div>
                        </div>
                        <!-- Section Container -->
                    </div>
                    <!-- Section Space -->

                    <!-- Newsletter Shape 1 -->
                    <img src="assets/img/elements/flower-shape-1.svg" alt="flower-shape-1" width="92" height="116"
                        class="absolute left-[152px] top-[44px] hidden md:block" />
                    <!-- Newsletter Shape 2 -->
                    <img src="assets/img/elements/flower-shape-2.svg" alt="flower-shape-2" width="129" height="164"
                        class="absolute bottom-0 right-[57px] hidden md:block" />
                </div>
                <!-- Section Background -->
            </section>
            <!--...::: CTA Section End :::... -->
        </main>

        <!--...::: Footer Section Start :::... -->
        <footer class="section-footer">
            <div class="bg-white">
                <!-- Footer Area Center -->
                <div class="text-ColorBlack">
                    <!-- Footer Center Spacing -->
                    <div class="py-[60px] lg:py-20">
                        <!-- Section Container -->
                        <div class="container-default">
                            <!-- Footer Widget List -->
                            <div
                                class="grid gap-x-4 lg:gap-x-16 gap-y-10 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-[1fr_repeat(3,_auto)] xl:lg:grid-cols-[1fr_repeat(4,_auto)]  xl:gap-x-20">
                                <!-- Footer Widget Item -->
                                <div class="flex flex-col gap-y-7 md:col-span-4 lg:col-span-1">
                                    <!-- Footer Logo -->
                                    <a href="index.html">
                                        <img src="assets/img/logo-purple-dark.png" alt="Masco" width="109"
                                            height="24" />
                                    </a>
                                    <!-- Footer Content -->
                                    <div>
                                        <!-- Footer About Text -->
                                        <div class="lg:max-w-[320px]">
                                            Email, SMS, Facebook, Chat, CRM, & more, all-in-one
                                            platform to help you grow your business through building
                                            stronger customer relationships.
                                        </div>
                                        <!-- Footer Mail -->
                                        <a href="mailto:yourdemo@email.com"
                                            class="my-6 block underline-offset-4 transition-all duration-300 hover:underline">yourdemo@email.com</a>
                                        <!-- Footer Social Link -->
                                        <div class="flex flex-wrap gap-5">
                                            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"
                                                class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-ColorBlack/10 text-sm text-ColorBlack transition-all duration-300 hover:bg-ColorBlack hover:text-white"
                                                aria-label="twitter">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>
                                            <a href="https://www.facebook.com/" target="_blank"
                                                rel="noopener noreferrer"
                                                class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-ColorBlack/10 text-sm text-ColorBlack transition-all duration-300 hover:bg-ColorBlack hover:text-white"
                                                aria-label="facebook">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                            <a href="https://www.instagram.com/" target="_blank"
                                                rel="noopener noreferrer"
                                                class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-ColorBlack/10 text-sm text-ColorBlack transition-all duration-300 hover:bg-ColorBlack hover:text-white"
                                                aria-label="instagram">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                            <a href="https://www.github.com/" target="_blank" rel="noopener noreferrer"
                                                class="flex h-[30px] w-[30px] items-center justify-center rounded-[50%] bg-ColorBlack/10 text-sm text-ColorBlack transition-all duration-300 hover:bg-ColorBlack hover:text-white"
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
                                            <a href="https://www.example.com/" target="_blank"
                                                rel="noopener noreferrer"
                                                class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Support</a>
                                        </li>
                                        <li>
                                            <a href="https://www.example.com/" target="_blank"
                                                rel="noopener noreferrer"
                                                class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Privacy
                                                policy</a>
                                        </li>
                                        <li>
                                            <a href="https://www.example.com/" target="_blank"
                                                rel="noopener noreferrer"
                                                class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Terms
                                                & Conditions</a>
                                        </li>
                                        <li>
                                            <a href="https://www.example.com/" target="_blank"
                                                rel="noopener noreferrer"
                                                class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Strategic
                                                finance</a>
                                        </li>
                                        <li>
                                            <a href="https://www.example.com/" target="_blank"
                                                rel="noopener noreferrer"
                                                class="hover:opcity-100 underline-offset-4 opacity-80 transition-all duration-300 ease-linear hover:underline">Video
                                                guide</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Footer Widget Item -->
                                <!-- Footer Widget Item -->
                                <div class="flex flex-col gap-y-6 md:col-span-1 lg:col-span-1">
                                    <!-- Footer Title -->
                                    <div class="text-xl font-semibold capitalize">
                                        Download now
                                    </div>
                                    <!-- Footer Title -->

                                    <div class="flex flex-col gap-3">
                                        <a href="#">
                                            <img src="assets/img/icons/icon-apple-app-store.svg"
                                                alt="icon-apple-app-store" width="166" height="54" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/img/icons/icon-google-play-store.svg"
                                                alt="icon-apple-app-store" width="166" height="51" />
                                        </a>
                                    </div>
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
                <div class="horizontal-line bg-ColorBlack"></div>
                <!-- Footer Bottom -->
                <div>
                    <!-- Footer Bottom Spacing -->
                    <div class="py-[18px]">
                        <!-- Section Container -->
                        <div class="container-default">
                            <div class="text-center">
                                &copy; Copyright 2024, All Rights Reserved by Mthemeus
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
    <!--...::: Main Wrapper End :::... -->
</x-layouts.app>
