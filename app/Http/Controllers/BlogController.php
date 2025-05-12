<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shirt;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request){
        // dd($request);
        $category_name = $request->query('category');
        // dd($category_name);
        if($category_name){
            $category = Category::where('name',$category_name)->first();
            // dd($category);
            $products = Shirt::where('category_id',$category->id)->get();
        }else{
            $products = Shirt::latest()->get();
        }
        

        return view('blog.index',['products'=>$products,'category'=>$category_name]);
    } 
    public function detail($slug){
        $product = Shirt::with('category')->where('slug', $slug)->firstOrFail();
        // dd($product);
        return view('blog.detail',['product'=>$product]);
    }
}
