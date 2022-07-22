<div>
    <div class="container">
        <div class="row py-4 align-items-center">
            <div class="col">
                <img width="40px" height="50px" src="{{ asset('/logo.png') }}" alt="">
            </div>
            <div class="col search-wrapper">
                <input class="search-input" type="text" placeholder="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="feather feather-search" viewBox="0 0 24 24">
                    <defs></defs>
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="M21 21l-4.35-4.35"></path>
                </svg>
            </div>
            <div class="col d-flex justify-content-end align-items-center">
                <img class="nav-icons" width="24px" height="24px" src="{{ asset('/images/icons/heart.svg') }}"
                    alt="icons" />
                <div class="position-relative">
                    <img class="nav-icons" width="24px" height="24px"
                        src="{{ asset('/images/icons/shopping-cart.svg') }}" alt="icons" />
                    <span hidden
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        0
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </div>
                <div class="m-dropdown nav-icons">
                    @if(Auth::check() && Auth::user()->with('shop')->find(Auth::id())->shop->slug)
                        <li class="m-dropdown nav-item">
                            <button class="m-dropbtn">
                                <img class="" width="24px" height="24px"
                                    src="{{ asset('/images/icons/storee.svg') }}" alt="icons" />
                            </button>
                            <div class="m-dropdown-content">
                                <a 
                                href="/s/{{ Auth::user()->with('shop')->find(Auth::id())->shop->slug }}/shops"
                                class="link">Dashboard</a>
                            </div>
                        </li>
                    @endif
                </div>
                <div class="m-dropdown nav-icons">
                    @if (Auth::check())
                        <div class="user-avatar">{{ Str::limit(Auth::user()->name, 1, '') }}</div>
                    @else
                        <button class="m-dropbtn"><img class="" width="24px" height="24px"
                                src="{{ asset('/images/icons/user.svg') }}" alt="icons" /></button>
                    @endif
                    <div class="m-dropdown-content">
                        @if (Auth::User())
                            <a href="/profile"><img class="nav-icons" width="24px" height="24px"
                                    src="{{ asset('/images/icons/settings.svg') }}" alt="icons" /> Mon profile</a>
                            <a href="/profile"><img class="nav-icons" width="24px" height="24px"
                                    src="{{ asset('/images/icons/heart.svg') }}" alt="icons" /> Wishlist</a>
                            <a href="/profile"><img class="nav-icons" width="24px" height="24px"
                                    src="{{ asset('/images/icons/package.svg') }}" alt="icons" /> Mes commandes</a>
                            <a href="/profile"><img class="nav-icons" width="24px" height="24px"
                                    src="{{ asset('/images/icons/percent.svg') }}" alt="icons" /> Couppons</a>
                            <hr class="divider m-0">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                <img class="nav-icons" width="24px" height="24px"
                                    src="{{ asset('/images/icons/user-x.svg') }}" alt="icons" />Se déconnecter
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="/login"><img class="nav-icons" width="24px" height="24px"
                                    src="{{ asset('/images/icons/user-check.svg') }}" alt="icons" /> Se
                                connecter</a>
                            <a href="/register"><img class="nav-icons" width="24px" height="24px"
                                    src="{{ asset('/images/icons/user-plus.svg') }}" alt="icons" /> S'
                                inscrire</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation">
        <nav class="container navbar navbar-expand-lg navbar-light">
            <div class="dropdown">
                <button class="btn p-0 px-2 dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="" width="24px" height="24px" src="{{ asset('/images/icons/list.svg') }}"
                        alt="icons" />Categories
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Categorie 1</a></li>
                    <li><a class="dropdown-item" href="#">Categorie 2</a></li>
                    <li><a class="dropdown-item" href="#">Categorie 3</a></li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/shops">Boutique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">Faq</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    @if (Auth::check())
                        @if (Auth::user()->role_id == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="/a/dashboard" class="link">Dashboard</a>
                            </li>
                        @endif
                    @endif
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">

                    <a href="#" class="link"><i class="fas fa-phone-alt">&nbsp;</i>+221 77 789 45
                        61</a>
                </ul>
            </div>
        </nav>
    </div>
</div>
{{-- Auth::user()->with('shop')->find(Auth::id())->shop->slug --}}
