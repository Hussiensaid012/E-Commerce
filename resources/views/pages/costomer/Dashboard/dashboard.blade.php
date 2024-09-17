<!DOCTYPE html>
<html lang="en">

<head>
    @include('Home.layouts.headcss')
</head>

<body style="scroll-behavior: smooth;">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        support@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->

        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            {{-- <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a> --}}
                            <a href="product-list.html" class="nav-item nav-link">Products</a>
                            <a href="product-detail.html" class="nav-item nav-link">Product Detail</a>
                            {{-- <a href="{{ route('cart.index') }}" class="nav-item nav-link">Cart</a> --}}
                            <a href="checkout.html" class="nav-item nav-link">Checkout</a>
                            <a href="my-account.html" class="nav-item nav-link">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                    <a href="{{ route('selection') }}" class="dropdown-item">Login & Register</a>
                                    <a href="contact.html" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        {{-- ########################################################################################### --}}
                        <div class="antialiased">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User
                                    Account</a>
                                <div class="dropdown-menu">
                                    <div
                                        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                                        @if (Route::has('login'))
                                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                                @if (auth('costomer')->check())
                                                    <form method="GET" action="{{ route('logout', 'costomer') }}">
                                                    @else
                                                        <form method="GET" action="{{ route('logout', 'web') }}">
                                                @endif
                                                @csrf
                                                <x-dropdown-link :href="route('logout', 'type')"
                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ############################################################################# --}}
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            {{-- <a href="{{ route('home') }}"> --}}
                            <img src="/temp/img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            @auth('costomer')
                                @if (auth('costomer')->user())
                                    <a href="{{ route('showcart.index') }}" class="btn cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>{{ auth('costomer')->user()->unreadNotifications->count() }}</span>
                                    @else
                                        <span>(0)</span>
                                @endif
                                </a>
                            @endauth
                            {{-- <a href="{{ route('showcart.index') }}" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <span>{{ auth('costomer')->user()->unreadNotifications->count() }}</span>
                    </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->



        @include('Home.layouts.sidbar')
        <!--=================================
     Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
                                    class="default-color">{{ __('E-Commerce') }}</a></li>
                            <li class="breadcrumb-item active">@yield('PageTitle')</li>
                        </ol>
                    </div>
                </div>


                @yield('content')

                @include('Home.layouts.footer')
            </div><!-- main content wrapper end-->
        </div>
    </div>
    </div>



    <!--=================================
     footer -->


</body>

</html>
