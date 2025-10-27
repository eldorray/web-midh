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

            @include('front.about')
            <!--...::: Popup Advertisement Start :::... -->
            <div x-data="{
                showPopup: false,
                init() {
                    const lastShown = localStorage.getItem('popupLastShown');
                    const now = Date.now();
                    const thirtyMinutes = 30 * 60 * 1000;
            
                    if (!lastShown || (now - parseInt(lastShown)) > thirtyMinutes) {
                        this.showPopup = true;
                        localStorage.setItem('popupLastShown', now.toString());
                    }
                }
            }" x-show="showPopup" x-cloak
                class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm"
                @click.self="showPopup = false">
                <div
                    class="relative max-w-2xl w-full mx-4 bg-white rounded-lg shadow-2xl overflow-hidden animate-fade-in">
                    <!-- Close Button -->
                    <button @click="showPopup = false"
                        class="absolute top-4 right-4 z-10 w-10 h-10 flex items-center justify-center bg-white/90 hover:bg-white rounded-full shadow-lg transition-all duration-300 hover:scale-110">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <!-- Popup Content -->
                    <div class="p-8 text-center">
                        <img src="assets/img/icons/fire-icon.png" alt="PPDB Icon" class="w-20 h-20 mx-auto mb-4" />
                        <h2 class="text-3xl font-bold text-ColorBlack mb-3">PPDB 2026-2027</h2>
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">MI Daarul Hikmah</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Daftarkan segera putra-putri Anda! <br>
                            Pendaftaran sudah dibuka untuk tahun ajaran 2026-2027
                        </p>
                        <div class="flex gap-4 justify-center">
                            <a href="/ppdb"
                                class="px-8 py-3 bg-ColorBlack text-white font-semibold rounded-lg hover:bg-gray-800 transition-all duration-300 transform hover:scale-105">
                                Daftar Sekarang
                            </a>
                            <button @click="showPopup = false"
                                class="px-8 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-all duration-300">
                                Nanti Saja
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--...::: Popup Advertisement End :::... -->
        </main>

        @include('front.footer')
    </div>
    <!--...::: Main Wrapper End :::... -->
</x-layouts.app>
