<?php

namespace App\Http\Controllers\Address;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $countries = Country::all();
        return view('pages.address.country.index', [
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Countries = Country::all();
        return view('pages.address.Country.create', [
            'Countries' => $Countries,
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
        Country::create([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->route('countries.index')->with(['success' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $Country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);
        return view('pages.address.Country.edit', [
            'country' => $country
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $Country)
    {
        $Country = Country::find($request->id);
        $Country->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->route('countries.index')->with([
            'success' => 'Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $Country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Country::destroy($request->id);
        return redirect()->back()->with([
            'warning' => 'Delete'
        ]);
    }
}
