<?php

namespace App\Http\Controllers\Address;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countrie;
use App\Models\Country;
use App\Models\State;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('pages.address.city.index', [
            'cities' => $cities,
            'states' => State::all(),
            'countries' => Country::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('pages.address.City.create', [
            'cities' => $cities,
            'states' => State::all(),
            'countries' => Country::all(),
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
        City::create([
            'name' => $request->name,
            'status' => $request->status,
            'state_id' => $request->state_id
        ]);
        return redirect()->route('cities.index')->with([
            'success' => 'This City Create success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function show(City $City)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        return view('pages.address.City.edit', [
            'city' => $city,
            'state' => State::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $City)
    {
        $city = City::find($request->id);
        $city->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
        return redirect()->route('cities.index')->with([
            'success' => 'This City Update success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        City::destroy($request->id);
        return redirect()->back()->with([
            'success' => 'DELETE success'
        ]);
    }
}
