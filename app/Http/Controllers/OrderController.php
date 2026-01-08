<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::with('product')->findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status
        ]);

        return redirect('/orders')->with('success', 'Status pesanan berhasil diupdate');
    }
}
