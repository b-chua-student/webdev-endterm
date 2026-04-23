<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $users    = User::all();
        $products = Product::all();
        return view('admin.orders.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'      => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'status'       => 'required|string',
        ]);

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Order created.');
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'total_amount' => 'required|numeric',
            'status'       => 'required|string',
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Order updated.');
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted.');
    }
}
