@section('title', 'Blog Detail - ' . config('app.name', 'School'))
<x-layouts.app>
    @include('front.header')
    <main class="main-wrapper relative overflow-hidden">
        <section class="section-breadcrumb">
            <div class="breadcrumb-wrapper">
                <div class="container-default">
                    <div class="breadcrumb-block">
                        <h1 class="breadcrumb-title">{{ $blog->title }}</h1>
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/blog') }}">Blog</a></li>
                            <li>{{ $blog->title }}</li>
                        </ul>
                    </div>
                </div>
                <div class="absolute left-0 top-0 -z-10">
                    <img src="{{ asset('assets/img/elements/breadcrumb-shape-1.svg') }}" alt="breadcrumb-shape-1"
                        width="291" height="380" />
                </div>
                <div class="absolute bottom-0 right-0 -z-[1]">
                    <img src="{{ asset('assets/img/elements/breadcrumb-shape-2.svg') }}" alt="breadcrumb-shape-2"
                        width="291" height="380" />
                </div>
            </div>
        </section>

        <div class="blog-section">
            <div class="section-space">
                <div class="container-default">
                    <div class="flex justify-center">
                        <div class="w-full max-w-3xl flex flex-col gap-y-10 lg:gap-y-14 xl:gap-y-20">
                            <div class="flex flex-col gap-6">
                                <article class="jos overflow-hidden bg-white">
                                    @if ($thumbnail)
                                        <div class="mb-7 block overflow-hidden rounded-[10px]">
                                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}" width="856"
                                                height="540" class="h-auto w-full object-cover" />
                                        </div>
                                    @endif

                                    <div class="px-[30px]">
                                        <ul
                                            class="mb-[30px] flex flex-wrap items-center justify-center gap-4 text-base font-semibold sm:gap-6">
                                            <li class="flex items-center gap-x-[10px]">
                                                <i class="fa-regular fa-user"></i>
                                                <span>{{ $blog->author }}</span>
                                            </li>
                                            <li class="flex items-center gap-x-[10px]">
                                                <i class="fa-regular fa-calendar"></i>
                                                <span>{{ $blog->created_at->format('M d, Y') }}</span>
                                            </li>
                                            @if (!empty($blog->category))
                                                <li>
                                                    <span
                                                        class="rounded-[50px] bg-ColorBlack/5 px-[26px] py-1.5 text-ColorBlack/60">
                                                        {{ $blog->category }}
                                                    </span>
                                                </li>
                                            @endif
                                        </ul>

                                        <div class="text-center">
                                            <h2
                                                class="mb-5 mt-8 font-body text-2xl font-bold leading-[1.4] -tracking-[1px] lg:text-3xl">
                                                {{ $blog->title }}
                                            </h2>

                                            <div class="prose mx-auto max-w-none text-left">
                                                {!! $blog->content !!}
                                            </div>

                                            <p class="mb-7 mt-6 font-semibold last:mb-0">
                                                Thanks for reading ❤
                                            </p>
                                        </div>
                                    </div>
                                </article>

                                <div class="jos my-[30px] h-[1px] w-full bg-[#EAEDF0]"></div>
                                <div class="horizontal-line bg-ColorBlack"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
