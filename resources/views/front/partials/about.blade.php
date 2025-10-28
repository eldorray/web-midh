 @section('title', 'About - ' . config('app.name', 'School'))
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
                         <h1 class="breadcrumb-title">About Us</h1>
                         <ul class="breadcrumb-nav">
                             <li><a href="/">Home</a></li>
                             <li>About</li>
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

         <!--...::: About Gallery Section Start :::... -->
         <div class="section-about-gallery">
             <!-- Section Spacer -->
             <div class="section-space">
                 <!-- Section Container -->
                 <div class="container-default">
                     <!-- About Gallery Area -->
                     <div class="grid gap-x-6 gap-y-10 sm:grid-cols-3">
                         <!-- Single Gallery Image -->
                         <div class="jos" data-jos_animation="fade-up" data-jos_delay="0">
                             <img src="{{ asset('assets/img-about/img3.jpg') }}" alt="about-gallery-img-1"
                                 width="416" height="286" class="rounded-lg" />
                         </div>
                         <!-- Single Gallery Image -->
                         <!-- Single Gallery Image -->
                         <div class="jos sm:translate-y-10" data-jos_animation="fade-down" data-jos_delay="0.3">
                             <img src="{{ asset('assets/img-about/img1.jpg') }}" alt="about-gallery-img-2"
                                 width="416" height="381" class="rounded-lg" />
                         </div>
                         <!-- Single Gallery Image -->
                         <!-- Single Gallery Image -->
                         <div class="jos" data-jos_animation="fade-up" data-jos_delay="0.6">
                             <img src="{{ asset('assets/img-about/img2.jpg') }}" alt="about-gallery-img-3"
                                 width="416" height="286" class="rounded-lg" />
                         </div>
                         <!-- Single Gallery Image -->
                     </div>
                     <!-- About Gallery Area -->
                 </div>
                 <!-- Section Container -->
             </div>
             <!-- Section Spacer -->
         </div>
         <!--...::: About Gallery Section End :::... -->

         <!--...::: Brand Section Start :::... -->
         <div class="section-brand">
             <div class="jos">
                 <!-- Section Space -->
                 <div class="pb-[60px] md:pb-20 lg:pb-[100px]">
                     <!-- Section Container -->
                     <div class="container-default">

                         <!-- Brand Slider -->
                         <div class="swiper brand-slider">
                             <!-- Additional required wrapper -->
                             <div class="swiper-wrapper">
                                 <!-- Slides -->
                                 <div
                                     class="swiper-slide flex items-center justify-center rounded-lg bg-white/80 p-2 shadow-sm">
                                     <img src="{{ asset('assets/img-about/akreditasi.png') }}" alt="brand-1"
                                         class="h-12 w-auto object-contain" />
                                     <h2 class="mx-2 font-bold">Akreditasi Unggul</h2>
                                 </div>
                                 <div
                                     class="swiper-slide flex items-center justify-center rounded-lg bg-white/80 p-2 shadow-sm">
                                     <img src="{{ asset('assets/img-about/logo-kemenag.png') }}" alt="brand-2"
                                         class="h-12 w-auto object-contain" />
                                     <h2 class="mx-2 font-bold">Kemenag</h2>
                                 </div>
                                 <div
                                     class="swiper-slide flex items-center justify-center rounded-lg bg-white/80 p-2 shadow-sm">
                                     <img src="{{ asset('assets/img-about/logo-kemdikbud.png') }}" alt="brand-3"
                                         class="h-12 w-auto object-contain" />
                                     <h2 class="mx-2 font-bold">Kemdikbud</h2>
                                 </div>
                                 <div
                                     class="swiper-slide flex items-center justify-center rounded-lg bg-white/80 p-2 shadow-sm">
                                     <img src="{{ asset('assets/img-about/emis.png') }}" alt="brand-4"
                                         class="h-12 w-auto object-contain" />
                                     <h2 class="mx-2 font-bold">Emis</h2>
                                 </div>
                                 <div
                                     class="swiper-slide flex items-center justify-center rounded-lg bg-white/80 p-2 shadow-sm">
                                     <img src="{{ asset('assets/img-about/erkam.png') }}" alt="brand-5"
                                         class="h-12 w-auto object-contain" />
                                     <h2 class="mx-2 font-bold">Erkam</h2>
                                 </div>
                             </div>
                         </div>
                         <!-- Brand Slider -->
                     </div>
                     <!-- Section Container -->
                 </div>
                 <!-- Section Space -->
             </div>
         </div>
         <!--...::: Brand Section End :::... -->

         <!--...::: About Hero Section Start :::... -->
         @foreach ($visiMisis as $visiMisi)
             <section class="section-about-hero">
                 <div class="relative z-10 overflow-hidden bg-[#FAF9F5]">
                     <!-- Section Space -->
                     <div class="section-space">
                         <!-- Section Container -->
                         <div class="container-custom has-container-custom">
                             <!-- About Hero Area -->
                             <div
                                 class="grid items-center gap-10 lg:grid-cols-2 lg:gap-[60px] xl:gap-[100px] xxl:grid-cols-[1fr_minmax(0,_1.1fr)]">
                                 <!-- About Hero Image Block -->
                                 <div class="jos order-2 lg:order-1" data-jos_animation="fade-left" data-jos_delay="0">
                                     <div
                                         class="relative flex items-center justify-center mx-auto lg:mx-0 max-w-full sm:max-w-[80%] md:max-w-[70%] lg:max-w-full">
                                         <img src="{{ $visiMisi->image }}" alt="hero image" width="600"
                                             height="579" class="h-auto w-full rounded-xl shadow-lg" />
                                     </div>
                                 </div>
                                 <!-- About Hero Image Block -->
                                 <!-- About Hero Content Block -->
                                 <div class="jos order-1 lg:order-2" data-jos_animation="fade-right"
                                     data-jos_delay="0.3">
                                     <!-- Section Wrapper -->
                                     <div>
                                         <!-- Section Block -->
                                         <div class="mb-5">
                                             <h2
                                                 class="text-3xl font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                                                 Visi
                                             </h2>
                                         </div>
                                         <!-- Section Block -->
                                         <p>
                                             {!! nl2br(e($visiMisi->visi)) !!}
                                         </p>
                                         <h2
                                             class="text-3xl mt-4 font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                                             Misi
                                         </h2>
                                         <p>
                                             {!! $visiMisi->misi !!}
                                         </p>
                                         <!-- Horizontal Line Separator -->
                                         <div class="my-7 h-px w-full bg-ColorBlack opacity-10 xl:my-10 xxl:my-14">
                                         </div>
                                         <!-- BlockQuote Block-->
                                         <h2
                                             class="text-3xl mt-4 font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                                             Motto
                                         </h2>
                                         <div>
                                             <blockquote class="mb-6 font-semibold italic text-ColorBlack/80">
                                                 {!! nl2br(e($visiMisi->motto)) !!}
                                             </blockquote>
                                         </div>
                                     </div>
                                     <!-- Section Wrapper -->
                                 </div>
                                 <!-- About Hero Content Block -->
                             </div>
                             <!-- About Hero Area -->
                         </div>
                         <!-- Section Container -->
                     </div>
                     <!-- Section Space -->
                 </div>
             </section>
             <!--...::: About Hero Section End :::... -->
             <section>
                 <div class="mt-8 container-custom has-container-custom">
                     <div
                         class="grid p-10 rounded-xl bg-gray-100 items-center gap-10 lg:grid-cols-2 lg:gap-24 xl:grid-cols-[1.4fr_minmax(0,_1fr)] xl:gap-[209px]">
                         <!-- Content Block Left -->
                         <div class="jos" data-jos_animation="fade-right">
                             <!-- Section Wrapper -->
                             <div>
                                 <!-- Section Block -->
                                 <div class="mb-5">
                                     <h2 class="text-3xl font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                                         Tujuan Kami
                                     </h2>
                                 </div>
                                 <!-- Section Block -->
                             </div>
                             <!-- Section Wrapper -->
                             <p>
                                 {!! $visiMisi->tujuan !!}
                             </p>
                         </div>
                         <!-- Content Block Left -->
                         <!-- Content Block Right -->
                         <div class="jos relative" data-jos_animation="fade-left">
                             <!-- Content Image -->
                             <img src="{{ asset('school.gif') }}" alt="content-img-2" width="451" height="456"
                                 class="h-auto w-full" />
                         </div>
                         <!-- Content Block Right -->
                     </div>
                     <!-- Content Area Single -->
                 </div>
             </section>
             <!--...::: Fact Section Start :::... -->
             <section class="section-fact">
                 <!-- Section Space -->
                 <div class="section-space">
                     <!-- Section Container -->
                     <div class="container-custom has-container-custom">
                         <!-- Fact Area Block -->
                         <div
                             class="grid gap-10 gap-x-12 lg:grid-cols-2 xl:grid-cols-[1fr_minmax(0,_0.7fr)] xxl:gap-x-[185px]">
                             <!-- Content Block Left -->
                             <div class="jos" data-jos_animation="fade-right" data-jos_delay="0">
                                 <!-- Section Wrapper -->
                                 <div>
                                     <!-- Section Block -->
                                     <div class="mb-5">
                                         <h2
                                             class="text-3xl font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                                             History & Achievements
                                         </h2>
                                     </div>
                                     <!-- Section Block -->
                                     <p>
                                         {!! $visiMisi->sejarah !!}
                                     </p>
                                 </div>
                                 <!-- Section Wrapper -->
                                 <a href="/contact-us"
                                     class="btn is-blue is-rounded btn-animation is-large group mt-8 inline-block lg:mt-[50px]"><span>Get
                                         in touch</span></a>
                             </div>
                             <!-- Content Block Left -->
                             <!-- Content Block Right -->
                             <div>
                                 <!-- Counter List -->
                                 <div
                                     class="grid items-center justify-center gap-6 sm:grid-cols-2 sm:gap-0.5 sm:bg-ColorOffWhite">
                                     <!-- Counter Item -->
                                     <div class="text-center sm:bg-white sm:pb-10">
                                         <div class="mb-1 font-PlusJakartaSans text-4xl font-extrabold leading-[1.2] -tracking-[1px] text-ColorBlack sm:text-5xl lg:text-[64px] xl:text-[70px]"
                                             data-module="countup">
                                             <span class="start-number" data-countup-number="1000">1000</span>+
                                         </div>
                                         <span class="text-xl font-semibold text-ColorBlue">Jumlah Lulusan Sejak
                                             berdiri</span>
                                     </div>
                                     <!-- Counter Item -->
                                     <!-- Counter Item -->
                                     <div class="text-center sm:bg-white sm:pb-10">
                                         <div class="mb-1 font-PlusJakartaSans text-4xl font-extrabold leading-[1.2] -tracking-[1px] text-ColorBlack sm:text-5xl lg:text-[64px] xl:text-[70px]"
                                             data-module="countup">
                                             <span class="start-number" data-countup-number="80">80++</span>
                                         </div>
                                         <span class="text-xl font-semibold text-ColorBlue">Piala Tingkat
                                             Nasional</span>
                                     </div>
                                     <!-- Counter Item -->
                                     <!-- Counter Item -->
                                     <div class="text-center sm:bg-white sm:pt-10">
                                         <div class="mb-1 font-PlusJakartaSans text-4xl font-extrabold leading-[1.2] -tracking-[1px] text-ColorBlack sm:text-5xl lg:text-[64px] xl:text-[70px]"
                                             data-module="countup">
                                             <span class="start-number" data-countup-number="60">60</span>%
                                         </div>
                                         <span class="text-xl font-semibold text-ColorBlue">Meneruskan Pendidikan
                                             Negeri</span>
                                     </div>
                                     <!-- Counter Item -->
                                     <!-- Counter Item -->
                                     <div class="text-center sm:bg-white sm:pt-10">
                                         <div class="mb-1 font-PlusJakartaSans text-4xl font-extrabold leading-[1.2] -tracking-[1px] text-ColorBlack sm:text-5xl lg:text-[64px] xl:text-[70px]"
                                             data-module="countup">
                                             <span class="start-number" data-countup-number="100">100</span>%
                                         </div>
                                         <span class="text-xl font-semibold text-ColorBlue">Tingkat Kelulusan</span>
                                     </div>
                                     <!-- Counter Item -->
                                 </div>
                                 <!-- Counter List -->
                             </div>
                             <!-- Content Block Right -->
                         </div>
                         <!-- Fact Area Block -->
                     </div>
                     <!-- Section Container -->
                 </div>
                 <!-- Section Space -->
             </section>
             <!--...::: Fact Section End :::... -->
         @endforeach
         @include('front.footer')
     </main>
 </x-layouts.app>
