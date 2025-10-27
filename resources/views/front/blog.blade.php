 <section class="section-blog">
     <!-- Section Space -->
     <div class="section-space">
         <!-- Section Container -->
         <div class="container-default">
             <!-- Section Content Wrapper -->
             <div class="jos mb-[60px] xl:mb-20">
                 <!-- Section Content Block -->
                 <div class="mx-auto max-w-[640px]">
                     <div class="mb-5">
                         <h2
                             class="mb-5 text-center font-PublicSans text-4xl font-bold leading-[1.14] text-[#1212121] lg:text-5xl xl:text-[56px]">
                             Berita dan Artikel Kami
                         </h2>
                     </div>
                     <p class="text-center">
                         Temukan berbagai informasi terbaru, tips, dan wawasan seputar dunia kewirausahaan dan
                         teknologi melalui blog kami.
                     </p>
                 </div>
                 <!-- Section Content Block -->
             </div>
             <!-- Section Content Wrapper -->

             <!-- Blog List -->
             <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                 <!-- Blog Item -->
                 @foreach ($blogs as $blog)
                     <div class="jos" data-jos_animation="flip-left">
                         <div class="group h-full rounded-[5px] border border-[#121212] p-5">
                             <!-- Blog Image -->
                             <div class="relative overflow-hidden rounded-[5px]">
                                 <a href="{{ route('front.partials.blog-detail', $blog->slug) }}" class="block">
                                     <img src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : asset('assets/img/placeholder.jpg') }}"
                                         style="height:280px; object-fit:cover; object-position:center;"class="h-auto w-full transition-all duration-300 group-hover:scale-105" />
                                 </a>
                                 <a href="#"
                                     class="absolute right-[10px] top-[10px] inline-block rounded-[3px] bg-[#FDFBF9] px-5 py-[10px] text-base font-bold hover:bg-ColorLime">
                                     {{ $blog->tags }}
                                 </a>
                             </div>
                             <div class="mt-6">
                                 <!-- Post Meta -->
                                 <div
                                     class="mb-[15px] flex flex-col gap-x-[15px] gap-y-2 text-base font-bold xl:flex-row">
                                     <a href="#" class="flex gap-[10px] hover:text-ColorPurple">
                                         <span class="text-lg"><i class="fa-regular fa-circle-user"></i></span>
                                         {{ $blog->author }}
                                     </a>
                                     <a href="#" class="flex gap-[10px] hover:text-ColorPurple">
                                         <span class="text-lg"><i class="fa-light fa-calendar"></i></span>
                                         {{ $blog->created_at->format('M d, Y') }}
                                     </a>
                                 </div>
                                 <a href="{{ route('front.partials.blog-detail', $blog->slug) }}"
                                     class="mb-[30px] block font-PublicSans font-bold leading-[1.35] text-[#121212] group-hover:text-ColorPurple xl:text-2xl xxl:text-[28px]">Benefits
                                     {{ $blog->title }}</a>

                                 <a href="{{ route('front.partials.blog-detail', $blog->slug) }}"
                                     class="mt-auto inline-flex items-center gap-x-2 text-base font-bold text-[#121212] hover:text-ColorPurple">Read
                                     more
                                     <span class="transition-all duration-300 ease-in-out hover:translate-x-2">
                                         <i class="fa-solid fa-arrow-right"></i>
                                     </span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 @endforeach
             </div>
             <!-- Blog List -->
         </div>
         <!-- Section Container -->
     </div>
     <!-- Section Space -->
 </section>
