<?php

namespace App\Http\Controllers\Cart;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Costomer;
use App\Models\Product;
use App\Models\User;
use App\Notifications\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Notification;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $carts = Order::all();
        return view('pages.cart.index', [
            'carts' => $carts,
            'categorys' => category::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carts = Order::all();
        return view('Home.product-detail', [
            'carts' => $carts,
            'categorys' => category::all(),
            'products' => Product::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $products = Order::where('product_id', $product->id)->get();
        $cart = Order::create([
            'costomer_id' => auth('costomer')->user()->id,
            'user_id' => 1,
            'categorie_id' => $request->category_id,
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'color' => $request->color
        ]);
        $users = Costomer::where('id', '=', auth('costomer')->user()->id)->get();
        $create_order = auth('costomer')->user()->name;

        Notification::send($users, new Cart($cart->id, $create_order, $cart->product_id));

        return redirect()->route('home')->with([
            'success' => 'Add To Cart'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('pages.cart.show', [
            'order' => $order,
            'categorys' => category::all(),
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('pages.cart.edit', [
            'order' => $order,
            'categorys' => category::all(),
            'products' => Product::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::find($request->id);
        $order->update([
            'amount' => $request->amount,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'color' => $request->color
        ]);
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Request $request)
    {
        Order::destroy($request->id);
        $order->notifications()->delete();
        return redirect()->route('orders.index')->with([
            'success' => 'DELETE'
        ]);
    }
}
