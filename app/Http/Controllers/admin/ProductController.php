<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shirt;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    

    public function create() {

        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);

    }

    public function store(Request $request) {

        $validated = $request->validate([
            'category_id'       => 'required|exists:categories,id',
            'name'              => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:shirts,slug',
            'description'       => 'nullable|string',
            'price'             => 'required|numeric|min:0',
            'discounted_price'  => 'nullable|numeric|min:0|lte:price',
            'stock'             => 'required|integer|min:0',
            'size'              => 'required|in:S,M,L,XL',
            'color'             => 'nullable|string|max:100',
            'image'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
    
        // Handle file upload
        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image')->store('shirts', 'public');
        }
    
        Shirt::create($validated);
    
        return redirect()->route('admin.products')->with('success', 'Shirt created successfully.');

    }

    public function edit() {

    }

    public function delete() {
        
    }
}
