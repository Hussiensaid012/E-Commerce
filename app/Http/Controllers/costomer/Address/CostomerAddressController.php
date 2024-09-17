<?php

namespace App\Http\Controllers\Costomer\Address;

use Illuminate\Http\Request;
use App\Models\Costumer_address;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\category;
use App\Models\Citie;
use App\Models\City;
use App\Models\Costomer_Address;
use App\Models\Countrie;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use App\Models\State;

class CostomerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costomer_address = Costomer_Address::all();
        return view('Home.checkout', [
            'costomer_address' => $costomer_address,
            'categories' => category::all(),
            'countries' => Country::all(),
            'cities' => City::all(),
            'states' => State::all(),
            'products' => Product::all(),
            'orders' => Order::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costomer_address = Costomer_Address::all();
        return view('Home.checkout', [
            'costomer_address' => $costomer_address,
            'categories' => Category::all(),
            'countries' => Country::all(),
            'cities' => City::all(),
            'states' => State::all()
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
        // return $request;
        Costomer_Address::create([

            'costomer_id' => $request->costomer_id,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->citie_id,
            'address_title' => $request->address_title,
            'default_address' => $request->default_address,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'zib_code' => $request->zib_code,
            'po_box' => $request->po_box,
        ]);
        return redirect()->route('DashboardCostomer');

        // return redirect()->back()->with([
        //     'success' => 'The Address Create success'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Costumer_address  $costumer_address
     * @return \Illuminate\Http\Response
     */
    public function show(Costomer_address $costumer_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costumer_address  $costumer_address
     * @return \Illuminate\Http\Response
     */
    public function edit(Costomer_address $costumer_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costumer_address  $costumer_address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costomer_address $costumer_address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costumer_address  $costumer_address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costomer_address $costumer_address)
    {
        //
    }
}
