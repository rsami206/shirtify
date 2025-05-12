<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class ContectController extends Controller
{
    public function show()
    {
        return view('blog.contect');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:unique',
            'message' => 'required',
        ]);
        return back()->with('success','Thanks for contacting us! We will get back to you soon.');
    }
}
