<x-guest-layout>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    {{-- <x-input-error class="mb-4" :errors="$messages" /> --}}
    <div class="wrapper">

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url('{{ asset('temp/img/slider-3.jpg') }}');">
            {{-- Admin --}}
            <div class="container text-center">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 50%;" class=" col-lg-8 col-md-8 bg-white">
                        <div
                            class="mb-30 d-flex align-items-center login-fancy pb-40 clearfix flex items-center justify-center mt-4">
                            <button>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <h3 style="font-family: 'Cairo', sans-serif" class="mb-30 d-flex align-items-center"><a
                                        href="{{ route('login.show', 'admin') }}" class="btn btn-primary">

                                        Admin
                                    </a></h3>
                            </button>
                            <div class="form-inline">
                                <a class="btn btn-default col-lg-12" title="Admin"
                                    href="{{ route('login.show', 'admin') }}">
                                    <img alt="user-img" width="100px;"
                                        src="{{ URL::asset('assets/images/admin.png') }}">
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 50%;" class=" col-lg-8 col-md-8 bg-white">
                        <div
                            class="mb-30 d-flex align-items-center login-fancy pb-40 clearfix flex items-center justify-center mt-4">
                            <button>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <h3 style="font-family: 'Cairo', sans-serif" class="mb-30 d-flex align-items-center"><a
                                        href="{{ route('login.show', 'costomer') }}" class="btn btn-primary">

                                        costomer
                                    </a></h3>
                            </button>
                            <div class="form-inline">
                                <a class="btn btn-default col-lg-12" title="costomer"
                                    href="{{ route('login.show', 'costomer') }}">
                                    <img alt="user-img" width="100px;"
                                        src="{{ URL::asset('assets/images/ECommerce.png') }}">
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </section>

        <!--=================================
 login-->

    </div>
</x-guest-layout>
