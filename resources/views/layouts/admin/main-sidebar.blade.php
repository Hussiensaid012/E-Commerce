<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ __('E-Commerce') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">Dashboard 01</a> </li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul>
                    </li>
                    <!--facultie -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('E-Commerce') }}</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('category') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('category.index') }}">category</a></li>
                            <li><a href="{{ route('category.create') }}">Create category</a></li>

                        </ul>
                    </li>
                    {{-- start Product sidbar --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#costomer">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('Products') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="costomer" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('product.index') }}">product</a></li>
                            <li><a href="{{ route('product.create') }}">Create product</a></li>

                        </ul>
                    </li>

                    {{-- start Product sidbar --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#costomer">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('Costomer') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="costomer" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('costomer.index') }}">Show costomer</a></li>
                            <li><a href="{{ route('costomer.create') }}">Create costomer</a></li>

                        </ul>
                    </li>
                    {{-- End Product sidbar --}}
                    {{-- Start Orders --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#order">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('Orders') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="order" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('orders.index') }}">orders</a></li>
                            {{-- <li><a href="{{ route('orders.create') }}">Create orders</a></li> --}}

                        </ul>
                    </li>
                    {{-- End Orders --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#address">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('countries') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="address" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('countries.index') }}">countries</a></li>
                            <li><a href="{{ route('countries.create') }}">Create countries</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#state">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('states') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="state" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('states.index') }}">states</a></li>
                            <li><a href="{{ route('states.create') }}">Create states</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#cities">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('cities') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="cities" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('cities.index') }}">cities</a></li>
                            <li><a href="{{ route('cities.create') }}">Create cities</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
