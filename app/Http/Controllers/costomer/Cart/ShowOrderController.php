<?php

namespace App\Http\Controllers\Costomer\Cart;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        $totalAmount = 0;

        foreach ($orders as $item) {
            $totalAmount += $item['amount'] * $item['quantity'];
        }
        return view('Home.cart', [
            'orders' => $orders,
            'categories' => category::all(),
            'product' => Product::all(),
            'totalAmount' => $totalAmount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Request $request)
    {
        Order::destroy($request->id);
        $order->notifications()->delete();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->back()->with('success', 'This Item is Delete');
    }
}
