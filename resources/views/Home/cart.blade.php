@extends('Home.home')
@section('css')

@section('title')
    Home
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Home
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Cart</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>date</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <?php $total = 0; ?>
                            @foreach ($orders as $order)
                                <?php $total += $order['amount'] * $order['quantity']; ?>
                            @endforeach
                            @foreach ($orders as $order)
                                <tbody class="align-middle">
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="#"><img
                                                        src="{{ URL::asset('attachments/upload_attachments/' . $order->products->image) }}"
                                                        alt="Image"></a>
                                                <p>{{ $order->products->name }}</p>
                                            </div>
                                        </td>
                                        <td>{{ $order->amount }}</td>
                                        <td>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" name="quantity" value="{{ $order->quantity }}">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        {{-- total --}}
                                        <td>
                                            {{ $order->quantity * $order->amount }}
                                        </td>
                                        <td>
                                            {{ $order->created_at->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);"
                                                onclick="if (confirm('Are you sure to delete this Order?'))
                                                {document.getElementById('delete-order-{{ $order->id }}').submit();} else {return false;}"
                                                class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form action="{{ route('showcart.destroy', $order) }}" method="POST"
                                                id="delete-order-{{ $order->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $order->id }}">
                                            </form>
                                        </td>
                                    </tr>

                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coupon">
                                <input type="text" placeholder="Coupon Code">
                                <button>Apply Code</button>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span>{{ $order->count() * $totalAmount }}</span></p>
                                    <p>Shipping Cost<span>{{ $order->id }}</span></p>
                                    <h2>Grand Total<span>
                                            <p>
                                                <strong>Total: ${{ $total }}</strong>
                                            </p>
                                        </span></h2>
                                </div>
                                <div class="cart-btn">
                                    <button>Update Cart</button>
                                    <a class="btn" href="{{ route('costomer_address.index') }}"> Checkout</a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Cart End -->

@endsection
@section('js')
<script>
    // ************************************************
    // Shopping Cart API
    // ************************************************

    var shoppingCart = (function() {
        // =============================
        // Private methods and propeties
        // =============================
        cart = [];

        // Constructor
        function Item(name, price, count) {
            this.name = name;
            this.price = price;
            this.count = count;
        }

        // Save cart
        function saveCart() {
            sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
        }

        // Load cart
        function loadCart() {
            cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
        }
        if (sessionStorage.getItem("shoppingCart") != null) {
            loadCart();
        }


        // =============================
        // Public methods and propeties
        // =============================
        var obj = {};

        // Add to cart
        obj.addItemToCart = function(name, price, count) {
            for (var item in cart) {
                if (cart[item].name === name) {
                    cart[item].count++;
                    saveCart();
                    return;
                }
            }
            var item = new Item(name, price, count);
            cart.push(item);
            saveCart();
        }
        // Set count from item
        obj.setCountForItem = function(name, count) {
            for (var i in cart) {
                if (cart[i].name === name) {
                    cart[i].count = count;
                    break;
                }
            }
        };
        // Remove item from cart
        obj.removeItemFromCart = function(name) {
            for (var item in cart) {
                if (cart[item].name === name) {
                    cart[item].count--;
                    if (cart[item].count === 0) {
                        cart.splice(item, 1);
                    }
                    break;
                }
            }
            saveCart();
        }

        // Remove all items from cart
        obj.removeItemFromCartAll = function(name) {
            for (var item in cart) {
                if (cart[item].name === name) {
                    cart.splice(item, 1);
                    break;
                }
            }
            saveCart();
        }

        // Clear cart
        obj.clearCart = function() {
            cart = [];
            saveCart();
        }

        // Count cart
        obj.totalCount = function() {
            var totalCount = 0;
            for (var item in cart) {
                totalCount += cart[item].count;
            }
            return totalCount;
        }

        // Total cart
        obj.totalCart = function() {
            var totalCart = 0;
            for (var item in cart) {
                totalCart += cart[item].price * cart[item].count;
            }
            return Number(totalCart.toFixed(2));
        }

        // List cart
        obj.listCart = function() {
            var cartCopy = [];
            for (i in cart) {
                item = cart[i];
                itemCopy = {};
                for (p in item) {
                    itemCopy[p] = item[p];

                }
                itemCopy.total = Number(item.price * item.count).toFixed(2);
                cartCopy.push(itemCopy)
            }
            return cartCopy;
        }

        // cart : Array
        // Item : Object/Class
        // addItemToCart : Function
        // removeItemFromCart : Function
        // removeItemFromCartAll : Function
        // clearCart : Function
        // countCart : Function
        // totalCart : Function
        // listCart : Function
        // saveCart : Function
        // loadCart : Function
        return obj;
    })();


    // *****************************************
    // Triggers / Events
    // *****************************************
    // Add item
    $('.add-to-cart').click(function(event) {
        event.preventDefault();
        var name = $(this).data('name');
        var price = Number($(this).data('price'));
        shoppingCart.addItemToCart(name, price, 1);
        displayCart();
    });

    // Clear items
    $('.clear-cart').click(function() {
        shoppingCart.clearCart();
        displayCart();
    });


    function displayCart() {
        var cartArray = shoppingCart.listCart();
        var output = "";
        for (var i in cartArray) {
            output += "<tr>" +
                "<td>" + cartArray[i].name + "</td>" +
                "<td>(" + cartArray[i].price + ")</td>" +
                "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-name=" +
                cartArray[i].name + ">-</button>" +
                "<input type='number' class='item-count form-control' data-name='" + cartArray[i].name + "' value='" +
                cartArray[i].count + "'>" +
                "<button class='plus-item btn btn-primary input-group-addon' data-name=" + cartArray[i].name +
                ">+</button></div></td>" +
                "<td><button class='delete-item btn btn-danger' data-name=" + cartArray[i].name + ">X</button></td>" +
                " = " +
                "<td>" + cartArray[i].total + "</td>" +
                "</tr>";
        }
        $('.show-cart').html(output);
        $('.total-cart').html(shoppingCart.totalCart());
        $('.total-count').html(shoppingCart.totalCount());
    }

    // Delete item button

    $('.show-cart').on("click", ".delete-item", function(event) {
        var name = $(this).data('name')
        shoppingCart.removeItemFromCartAll(name);
        displayCart();
    })


    // -1
    $('.show-cart').on("click", ".minus-item", function(event) {
        var name = $(this).data('name')
        shoppingCart.removeItemFromCart(name);
        displayCart();
    })
    // +1
    $('.show-cart').on("click", ".plus-item", function(event) {
        var name = $(this).data('name')
        shoppingCart.addItemToCart(name);
        displayCart();
    })

    // Item count input
    $('.show-cart').on("change", ".item-count", function(event) {
        var name = $(this).data('name');
        var count = Number($(this).val());
        shoppingCart.setCountForItem(name, count);
        displayCart();
    });

    displayCart();
</script>
@endsection
