<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index() {
        $lastProducts = Product::take(4)->get();
        return view('index')->with([
            'lastProducts' => $lastProducts
        ]);
    }

    public function categories() {
        return view('category');
    }

    public function product($id) {
        $product = Product::find($id);
        return view('product')->with('product', $product);
    }
}
