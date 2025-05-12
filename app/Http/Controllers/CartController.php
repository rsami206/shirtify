<?php

namespace App\Http\Controllers;

use App\Models\Shirt;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        // dd($cart);

        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $shipping = 20;
        $total = $subtotal + $shipping;

        return view('blog.cart', compact('cart', 'subtotal', 'shipping', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Shirt::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            if (empty($cart[$id]['image'])) {
                $cart[$id]['image'] = $product->image_path;
            }
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image_path,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $newQty = max(1, (int)$request->quantity); // Ensure minimum quantity = 1
            $cart[$id]['quantity'] = $newQty;
        }
        session()->put('cart', $cart);
        return redirect()->back();
    }
}
