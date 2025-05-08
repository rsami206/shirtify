<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shirt;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        return view("admin.index");
    }

    public function products() 
    {
        $shirts = Shirt::all();
    //    dd($shirts);
        return view("admin.products.index", ['products' => $shirts]);
    }

    public function orders() 
    {
        return view("admin.orders.index");
    }
    public function category() 
    {
        $cats = Category::all();
        return view("admin.category.index" ,['cats' => $cats]);
        // return view("admin.category.index");
    }
}
