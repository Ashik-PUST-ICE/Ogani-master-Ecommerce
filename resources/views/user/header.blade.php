

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>ashik.200607@s.pust.ac.bd</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ asset('img/language.png') }}" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="{{ url('/') }}">Bangla</a></li>
                                    <li><a href="{{ url('/') }}">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth" >
                                @if (Route::has('login'))
                                    @auth
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-user"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                    <a href="{{ route('login') }}" >
                                        <i class="fa fa-user"></i> Login
                                    </a>
                                    <a href="{{ route('register') }}">
                                        <i class="fa fa-user"></i> Register
                                    </a>
                                    @endauth
                                @endif
                            </div>



                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/shop') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">

                                    <li><a href="{{ url('mycart') }}">Shoping Cart</a></li>
                                    <li><a href="{{ url('checkout') }}">Check Out</a></li>
                                    <li><a href="{{ url('product_details') }}">Product Details</a></li>
                                    <li><a href="{{ url('/myorders') }}">My Order</a></li>
                                    <li><a href="">About Me</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{ url('mycart') }}"><i class="fa fa-shopping-bag"></i> <span>[{{ $count }}]</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
