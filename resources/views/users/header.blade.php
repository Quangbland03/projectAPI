<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
<!-- TOP HEADER -->
<div id="top-header">
<!-- TOP HEADER -->
<div id="top-header">
    @if (Route::has('login'))
    <div class="container">
        <ul class="header-links pull-right">
            @auth
            <li><a href="{{ url('/profile') }}"><i class="fa fa-user-o"></i> {{ Auth::user()->name }}</a></li>
            <li><a href="{{ url('logout') }}"><i class="fa fa-user-o"></i> Log out</a></li>
            @else
            <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Log in</a></li>
            @if (Route::has('register'))
            <li><a href="{{ route('register') }}"><i class="fa fa-user-o"></i> Register</a></li>
            @endif
        @endauth
        </ul>
    </div>
</div>
@endif
<!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here" id="searchok">
                            <button class="search-btn" id="showsearch">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">s
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="/cart">
                                <i class="fa fa-heart-o"></i>
                                <span>MyCart</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->



                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
<<<<<<< HEAD
<<<<<<< HEAD
                <li class="active"><a href="{{route('home')}}">Home</a></li>
=======
                <li class="active"><a href="">Home</a></li>
>>>>>>> quang
                <li><a href="#">Hot Deals</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Laptops</a></li>
=======
                <li class=""><a href="">Home</a></li>
                {{-- <li><a href="#">Hot Deals</a></li> --}}
                {{-- <li><a href="#">Categories</a></li> --}}
                <li><a href="/laptop">Laptops</a></li>
>>>>>>> quang
                <li><a href="{{route('smartphone')}}">Smartphones</a></li>
                <li><a href="{{route('camera')}}">Cameras</a></li>
                <li><a href="{{route('accessories')}}">Accessories</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
