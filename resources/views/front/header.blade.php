<!--...::: Header Start :::... -->
<header class="site-header site-header--absolute is--white py-3" id="sticky-menu">
    <div class="container-default">
        <div class="flex items-center justify-between gap-x-4">
            <!-- Header Logo -->
            <a href="/" class="shrink-0">
                <img src="{{ asset('logo-midh.png') }}" alt="MIDH Logo" class="h-20 md:h-20 lg:h-20 w-auto" />
            </a>
            <!-- Header Logo -->
            <!-- Header Navigation -->
            <div class="menu-block-wrapper">
                <div class="menu-overlay"></div>
                <nav class="menu-block" id="append-menu-header">
                    <div class="mobile-menu-head">
                        <div class="go-back">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="current-menu-title"></div>
                        <div class="mobile-menu-close">&times;</div>
                    </div>
                    <ul class="site-menu-main">
                        <li class="nav-item nav-item-has-children">
                            <a href="/" class="nav-link-item drop-trigger">Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.partials.blog-list') }}" class="nav-link-item">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.partials.teacher-list') }}" class="nav-link-item">Teacher</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('front.partials.about') }}" class="nav-link-item">About</a>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="{{ route('ppdb.index') }}" class="nav-link-item drop-trigger">PPDB
                            </a>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="#" class="nav-link-item drop-trigger">Contact
                            </a>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="#" class="nav-link-item drop-trigger">Halaman Lain <i
                                    class="fa-solid fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu" id="submenu-3">
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="https://rdm.ypdhalmadani.sch.id" class="nav-link-item drop-trigger">Raport
                                        Digital (RDM)
                                    </a>
                                </li>
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">Teacher
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                    <ul class="sub-menu shape-none" id="submenu-5">
                                        <li class="sub-menu--item">
                                            <a href="teams.html">Teams</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Header Navigation -->

            <!-- Header User Event -->
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="btn is-black btn-animation group hidden rounded sm:inline-block">
                        <span>Hello, {{ Auth::user()->name }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="btn is-black btn-animation group hidden rounded sm:inline-block">Login</a>
                @endauth

                <!-- Mobile Menu Trigger -->
                <button type="button" class="mobile-menu-trigger block lg:hidden" aria-label="Toggle mobile menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <!-- Header User Event -->
        </div>
    </div>
</header>
<!--...::: Header End :::... -->
