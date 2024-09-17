<?php

namespace App\Http\Controllers\Costomer;

use App\Models\Costomer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CostomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costomers = Costomer::all();
        return view('pages.costomer.index', compact('costomers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.costomer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Costomer::class],
        //     'password' => ['required', 'confirmed', Password::defaults()],
        // ]);

        Costomer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('costomer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function show(Costomer $costomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costomer = Costomer::find($id);
        return view('pages.costomer.Edit', compact('costomer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $costomer = Costomer::find($request->id);
        $costomer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('costomer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costomer $costomer, $id, Request $request)
    {
        $costomer = Costomer::destroy($request->id);
        return redirect()->back();
    }
}
