<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
public function index()
{
    $orders = Order::with(['items']) // eager load order items
        ->where('user_id', auth()->id())
        ->orderBy('created_at')
        ->get();

    return view('orders.show', compact('orders'));
}

    public function placeOrder(Request $request)
{
    $userId = auth()->id();

    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return back()->with('error', 'Cart is empty!');
    }

    DB::beginTransaction();

    try {
        // Calculate total
        $totalAmount = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Create Order
        $order = Order::create([
            'user_id' => $userId,
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);
        

        // Create Order Items
        foreach ($cart as $shirtId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'shirt_id' => $shirtId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear session cart
        session()->forget('cart');

        DB::commit();

        return redirect()->route('orders.index', $order->id)->with('success', 'Order placed successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Failed to place order. Please try again.');
    }
}
public function show($id)
{
    $order = Order::with('items')->where('id', $id)->where('user_id', auth()->id())->firstOrFail();

    return view('orders.item', compact('order'));
}
}
