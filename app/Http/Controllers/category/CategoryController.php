<?php

namespace App\Http\Controllers\Category;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Product;

class categoryController extends Controller
{

    use AttachFilesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        category::create([
            'name' => $request->name,
            'image' => $request->file('image')->getClientOriginalName(),

        ]);
        $this->uploadFile($request, 'image', 'upload_attachments');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $categories = category::find($id);
        // return view('Home.product-detail', compact('categories'));

        $products = Product::where('category_id', $id)->get();
        return view('Home.product-list', [

            'products' => $products,
            'categories' => Category::all(),
            'showProduct' => Product::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);
        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $category = category::find($request->id);
        $category->update([
            'name' => $request->name
        ]);

        if ($request->hasFile('image')) {
            $this->deleteFile($category->image);

            $this->uploadFile($request, 'image', 'upload_attachments');
            $image_new = $request->file('image')->getClientOriginalName();
            $category->image = $category->image !== $image_new ? $image_new : $category->image;
        }
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category, Request $request)
    {
        $this->deleteFile($request->file_name);
        $category = category::find($request->id);
        $category->destroy($request->id);
        if ($request->hasFile('image')) {
            $this->deleteFile($category->image);

            $image_new = $request->file('image')->getClientOriginalName();
            $category->image = $category->image !== $image_new ? $image_new : $category->image;
        }
        return redirect()->back();
    }
}
