<!DOCTYPE html>
<html lang="en">

<head>
    @include('Home.layouts.headcss')
</head>

<body style="scroll-behavior: smooth;">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">



        @include('Home.layouts.head')
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
