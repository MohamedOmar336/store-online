<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <h2>Sixteen <em>Clothing</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/home') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('product') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/product') }}">Our Products</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                                @if(app()->isLocale('ar'))
                                    <span>Arabic</span>
                                @endif
                                @if(app()->isLocale('en'))
                                    <span>English</span>
                                @endif
                            </a>
                            <div style="text-align:center" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @if(app()->isLocale('ar'))
                                <a class="dropdown-item" href="{{route('change.lang', 'en')}}">
                                    English
                                </a>
                                @endif
                                @if(app()->isLocale('en'))
                                <a class="dropdown-item" href="{{route('change.lang', 'ar')}}">
                                    Arabic
                                </a>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>