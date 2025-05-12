<?php

namespace App\Http\Controllers;

use App\Models\Shirt;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    

   public function about(){
      return view('blog.about');
   }
   public function services(){
      return view('blog.services');
   }
   public function testimonial(){
      return view('blog.testimonial');
   }
}
