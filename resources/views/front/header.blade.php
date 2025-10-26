<!--...::: Header Start :::... -->
<header class="site-header site-header--absolute is--white py-3" id="sticky-menu">
    <div class="container-default">
        <div class="flex items-center justify-between gap-x-4">
            <!-- Header Logo -->
            <a href="/" class="shrink-0">
                <img src="{{ asset('logo-midh.png') }}" alt="MIDH Logo" class="h-14 md:h-16 lg:h-20 w-auto" />
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
                            <a href="about.html" class="nav-link-item">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.partials.blog-list') }}" class="nav-link-item">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.partials.teacher-list') }}" class="nav-link-item">Teacher</a>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="#" class="nav-link-item drop-trigger">Pages <i
                                    class="fa-solid fa-angle-down"></i>
                            </a>
                            <ul class="sub-menu" id="submenu-3">
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">blogs <i
                                            class="fa-solid fa-angle-right"></i></a>
                                    <ul class="sub-menu shape-none" id="submenu-4">
                                        <li class="sub-menu--item">
                                            <a href="blog.html">blogs</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="blog-details.html">blog details</a>
                                        </li>
                                    </ul>
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
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">FAQ
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </li>
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">Portfolio
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </li>
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">Pricing
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                    <ul class="sub-menu shape-none" id="submenu-8">
                                        <li class="sub-menu--item">
                                            <a href="pricing.html">Pricing-1</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="pricing-2.html">Pricing-2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">Careers
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                    <ul class="sub-menu shape-none" id="submenu-9">
                                        <li class="sub-menu--item">
                                            <a href="careers.html">Career</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="career-details.html">Career Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu--item nav-item-has-children">
                                    <a href="#" data-menu-get="h3" class="drop-trigger">Utilities
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                    <ul class="sub-menu shape-none" id="submenu-10">
                                        <li class="sub-menu--item">
                                            <a href="login.html">Login</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="signup.html">Signup</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="reset-password.html">Reset Password</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="coming-soon.html">Coming Soon</a>
                                        </li>
                                        <li class="sub-menu--item">
                                            <a href="error-404.html">Error 404</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="https://rdm.ypdhalmadani.sch.id" class="nav-link-item drop-trigger">Raport
                                Digital
                            </a>
                        </li>
                        <li class="nav-item nav-item-has-children">
                            <a href="#" class="nav-link-item drop-trigger">Contact
                            </a>
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
