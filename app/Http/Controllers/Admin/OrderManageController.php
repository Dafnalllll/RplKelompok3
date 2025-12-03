<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderManageController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('pages.admin.ordermanage', compact('orders'));
    }

    public function bulkAction(Request $request)
    {
        foreach ($request->input('actions', []) as $orderId => $action) {
            $order = Order::find($orderId);
            if (!$order) continue;

            if ($action === 'Diterima') {
                $order->status = 'Diterima';
                $order->save();
            } elseif ($action === 'Ditolak') {
                $order->status = 'Ditolak';
                $order->save();
            }
        }
        return back()->with('status', 'Order berhasil diperbarui.');
    }
}
