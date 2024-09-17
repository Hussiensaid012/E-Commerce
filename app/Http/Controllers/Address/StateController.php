<?php

namespace App\Http\Controllers\Address;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countrie;
use App\Models\Country;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        return view('pages.address.state.index', [
            'states' => $states,
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
        $states = State::all();
        return view('pages.address.state.create', [
            'states' => $states,
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
        State::create([
            'name' => $request->name,
            'country_id' => $request->countrie_id
        ]);
        return redirect()->route('states.index')->with([
            'success' => 'This States Create success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);
        return view('pages.address.state.edit', [
            'state' => $state
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $state = State::find($request->id);
        $state->update([
            'name' => $request->name,
        ]);
        return redirect()->route('states.index')->with([
            'success' => 'This States Update success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        State::destroy($request->id);
        return redirect()->back()->with([
            'success' => 'DELETE success'
        ]);
    }
}
