<?php

namespace App\Http\Controllers;

use App\Models\Shirt;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $products = Shirt::all();
        return view('blog.index',['products'=>$products]);
    }
    public function detail($slug){
        $product = Shirt::with('category')->where('slug', $slug)->firstOrFail();
        // dd($product);
        return view('blog.detail',['product'=>$product]);
    }
}
