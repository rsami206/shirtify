<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Shirt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function index()

    {
        $user = User::all()->count();
        $order = Order::all()->count();
        $products = Shirt::all()->count();
        $product=Shirt::latest()->get();
        // dd($product);

        return view("admin.index",compact('products','order','user','product'));
    }

    public function products() 
    {
        $shirts = Shirt::all();
    //    dd($shirts);
        return view("admin.products.index", ['products' => $shirts]);
    }

    public function orders() 
    {
         $orders = Order::with(['user', 'items'])->latest()->get(); // Load related user
    return view('admin.orders.index', compact('orders'));
    }
    public function category() 
    {
        $cats = Category::all();
        return view("admin.category.index" ,['cats' => $cats]);
        // return view("admin.category.index");
    }
}
