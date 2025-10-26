 <section class="section-visimisi">
     @foreach ($visiMisis as $visiMisi)
         <!-- Section Spacer -->
         <div class="section-space">
             <!-- Section Container -->
             <div class="container-custom">
                 <div class="flex flex-col gap-y-20 lg:gap-y-[100px] xl:gap-y-[120px]">
                     <!-- Content Area Single -->
                     <div class="mx-auto max-w-[636px]">
                         <h2 class="text-center text-3xl font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                             Visi & Misi Kami
                         </h2>
                     </div>

                     <div
                         class="grid p-10 bg-gray-100 rounded-xl items-center gap-10 lg:grid-cols-2 lg:gap-24 xl:grid-cols-[1fr_minmax(0,_1.2fr)] xl:gap-[148px]">
                         <!-- Content Block Left -->
                         <div class="jos lg:order-2" data-jos_animation="fade-left">
                             <!-- Section Wrapper -->
                             <div>
                                 <!-- Section Block -->
                                 <div class="mb-3">
                                     <h2 class="text-3xl font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                                         Visi Kami
                                     </h2>
                                 </div>
                                 <!-- Section Block -->
                             </div>
                             <!-- Section Wrapper -->
                             <p>
                                 {{ $visiMisi->visi }}
                             </p>

                             <div class="my-4 h-[1px] w-full bg-ColorBlack/10 lg:my-[50px]"></div>
                             <div class="mb-3">
                                 <h2 class="text-3xl font-extrabold leading-[1.33] -tracking-[1px] lg:text-4xl">
                                     Misi Kami
                                 </h2>
                             </div>

                             {!! $visiMisi->misi !!}


                         </div>
                         <!-- Content Block Left -->
                         <!-- Content Block Right -->
                         <div class="jos relative lg:order-1" data-jos_animation="fade-right">
                             <!-- Content Image -->
                             <img src="{{ $visiMisi->image ? asset('storage/' . $visiMisi->image) : asset('assets/img/th-2/content-img-1.png') }}"
                                 alt="content-img-1" width="512" height="456" class="h-auto w-full rounded-xl" />
                         </div>
                         <!-- Content Block Right -->
                     </div>
                     <!-- Content Area Single -->
                     <!-- Content Area Single -->
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
             </div>
             <!-- Section Container -->
         </div>
         <!-- Section Spacer -->
     @endforeach
 </section>
