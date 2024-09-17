@extends('Home.home')
@section('css')

@section('title')
    Checkout
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Checkout
@stop
<!-- breadcrumb -->
@endsection
@section('content')

<!-- Checkout Start -->
<div class="checkout">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-inner">
                    <div class="billing-address">
                        <div class="row">
                            <div class="col-md-6">
                                <h3> Select The title Address</h3>
                                <select name="" id="">
                                    <option selected disabled>select Address</option>
                                    @foreach ($costomer_address as $address)
                                        <option value="{{ $address->id }}">{{ $address->address_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h3>or create </h3>
                        <h2>Billing Address</h2>
                        <div class="row">
                            <form class="row" action="{{ route('costomer_address.store') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <label> address_title</label>
                                    <input class="form-control" name="address_title" type="text"
                                        placeholder="address_title">
                                </div>
                                <div class="col-md-6">
                                    <label> default_address</label>
                                    <input class="form-control" name="default_address" type="checkbox" value="0">
                                </div>
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" name="first_name" type="text"
                                        placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input class="form-control" name="last_name" type="text" placeholder="Last Name">
                                    <input type="hidden" name="costomer_id" value="{{ auth('costomer')->user()->id }}">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="user_id"> Countries : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="country_id">
                                            <option selected disabled>Countries ...</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="user_id"> states : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="state_id">
                                            <option selected disabled>states ...</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="user_id"> Cities : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="citie_id">
                                            <option selected disabled>Cities ...</option>
                                            @foreach ($cities as $citie)
                                                <option value="{{ $citie->id }}">{{ $citie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="email" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" name="phone" type="text" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" name="address" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>ZIP Code</label>
                                    <input class="form-control" name="zib_code" type="text" placeholder="ZIP Code">
                                </div>
                                <div class="col-md-6">
                                    <label>po_box</label>
                                    <input class="form-control" name="po_box" type="text" placeholder="po_box">
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Create an account</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="shipto">
                                        <label class="custom-control-label" for="shipto">Ship to different
                                            address</label>
                                    </div>
                                </div>
                                <button>Next</button>
                            </form>
                        </div>
                    </div>

                    <div class="shipping-address">
                        <h2>Shipping Address</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label>Last Name"</label>
                                <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="E-mail">
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="Mobile No">
                            </div>
                            <div class="col-md-12">
                                <label>Address</label>
                                <input class="form-control" type="text" placeholder="Address">
                            </div>
                            <div class="col-md-6">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected>United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="City">
                            </div>
                            <div class="col-md-6">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="State">
                            </div>
                            <div class="col-md-6">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="ZIP Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-inner">
                    <div class="checkout-summary">
                        <h1>Cart Total</h1>
                        @php
                            $count = App\Models\Order::count();
                            $totel = 0;
                        @endphp
                        @foreach ($orders as $order)
                            <p>{{ $order->products->name }}<span>$
                                    {{ $totel += $order['amount'] * $order['quantity'] }}</span></p>
                        @endforeach
                        <p class="sub-total">Sub Total<span>$ {{ $totel * $count }}</span></p>
                        <p class="ship-cost">Shipping Cost<span>$1</span></p>
                        <p><span>Tax 10%</span></p>
                        <h2>Grand Total<span>${{ $totel * $count + 1 + 10 }}</span></h2>
                    </div>

                    <div class="checkout-payment">
                        <div class="payment-methods">
                            <h1>Payment Methods</h1>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-1"
                                        name="payment">
                                    <label class="custom-control-label" for="payment-1">Paypal</label>
                                </div>
                                <div class="payment-content" id="payment-1-show">
                                    <p>
                                    <div>Totel ${{ $totel * $count + 1 + 10 }}</div>
                                    <button><a href="{{ route('payment.index') }}">Pay New</a></button>
                                    </p>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-2"
                                        name="payment">
                                    <label class="custom-control-label" for="payment-2">Stripe</label>
                                </div>
                                <div class="payment-content" id="payment-2-show">
                                    <p>
                                        {{-- <a class="btn" href="{{ route('stripe.index') }}">Pay New</a> --}}
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate cumque vel
                                        perferendis expedita aspernatur deserunt dolorem, totam libero velit placeat,
                                        necessitatibus iure eveniet exercitationem? Neque, assumenda voluptates!
                                        Aspernatur, ex dicta!
                                    </p>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-3"
                                        name="payment">
                                    <label class="custom-control-label" for="payment-3">Check Payment</label>
                                </div>
                                <div class="payment-content" id="payment-3-show">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac
                                        eros volutpat maximus lacinia quis diam.
                                    </p>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-4"
                                        name="payment">
                                    <label class="custom-control-label" for="payment-4">Direct Bank Transfer</label>
                                </div>
                                <div class="payment-content" id="payment-4-show">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac
                                        eros volutpat maximus lacinia quis diam.
                                    </p>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-5"
                                        name="payment">
                                    <label class="custom-control-label" for="payment-5">Cash on Delivery</label>
                                </div>
                                <div class="payment-content" id="payment-5-show">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac
                                        eros volutpat maximus lacinia quis diam.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-btn">
                            <button>Place Order</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->
@endsection
@section('js')

@endsection
