<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpeg,bmp,png',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required'
        ]);

        $featured = $request->image;
        $featured_new_name = time().'_'.$featured->getClientOriginalName();
        $featured->move('img/products', $featured_new_name);

        $product = new Product;

        $product->name = $request->name;
        $product->image = $featured_new_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('products')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('dashboard.products.edit')->with('product', $product);
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        if($request->image != "") {
            $featured = $request->image;
            $featured_new_name = time().'_'.$featured->getClientOriginalName();
            $featured->move('img/products', $featured_new_name);

            $product->image = $featured_new_name;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->category_id = 1;

        $product->save();

        return redirect()->route('products')->with('success', 'Product Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}
