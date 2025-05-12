<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shirt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


    public function create()
    {

        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
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
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('shirts', 'public');
        }

        Shirt::create($validated);

        return redirect()->route('admin.products')->with('success', 'Shirt created successfully.');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Shirt::findOrFail($id);
        return view('admin.products.edit_product', ['product' => $product, 'categories' => $categories]);
    }



    // update product


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id'       => 'required|exists:categories,id',
            'name'              => 'required|string|max:255',
            'slug'              => 'required|string|max:255',
            'description'       => 'nullable|string',
            'price'             => 'required|numeric|min:0',
            'discounted_price'  => 'nullable|numeric|min:0|lte:price',
            'stock'             => 'required|integer|min:0',
            'size'              => 'required|in:S,M,L,XL',
            'color'             => 'nullable|string|max:100',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // dd($validated);??/
        $product = Shirt::findOrFail($id);
        // dd($product);
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        $product->price = $request->input('price');
        $product->discounted_price = $request->input('discounted_price');


        // update image
        if($request->hasFile('image')){
            if($product->image_path && Storage::disk('public')->exists($product->image_path)){
                Storage::disk('public')->delete($product->image_path);
            }
            $product->image_path  = $request->file('image')->store('shirts', 'public');
            // dd($product->image_path);

        }
         $product->save();
        return redirect()->route('admin.products')->with('success', 'Shirt update successfully.');


    }


    // delete product

    public function delete($id)
    {
        $post = Shirt::findOrFail($id);
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        if ($post != null) {
            $post->delete();
            return redirect()->route("admin.products")->with("success", "successfully deleted");
        }
    }




    public function categoryProducts($id)
{
    $category = Category::findOrFail($id);
    $products = $category->products()->get(); // assumes a hasMany relation

    return view('shop.category', compact('category', 'products'));
}
}
