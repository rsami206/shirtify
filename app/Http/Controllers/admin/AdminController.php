<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        return view("admin.index");
    }

    public function products() 
    {
        return view("admin.products.index");
    }

    public function orders() 
    {
        return view("admin.orders.index");
    }
}
