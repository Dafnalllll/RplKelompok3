<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderUser;
use App\Models\Product;
use Carbon\Carbon;

class OrderManageController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'userOrders'])->latest()->get();
        return view('pages.admin.ordermanage', compact('orders'));
    }

    public function bulkAction(Request $request)
    {
        foreach ($request->input('actions', []) as $orderId => $status) {
            $order = Order::find($orderId);
            if ($order && in_array($status, ['Pending', 'Diterima', 'Ditolak'])) {
                $prevStatus = $order->status;
                $order->status = $status;
                $order->save();

                // Update status di tabel user_orders juga
                foreach ($order->userOrders as $userOrder) {
                    $userOrder->status = $status;
                    $userOrder->save();
                }

                // Jika status berubah ke Diterima dari selain Diterima, kurangi stok
                if ($prevStatus !== 'Diterima' && $status === 'Diterima') {
                    if ($order->product && $order->qty) {
                        $order->product->decrement('stock', $order->qty);
                    }

                    // Set end_date ke 24 jam dari sekarang
                    $userOrder = $order->userOrders->first();
                    if ($userOrder) {
                        $userOrder->end_date = Carbon::now('Asia/Jakarta')->addDay(); // atau sesuai zona waktu lokal kamu
                        $userOrder->save();
                    }
                }

                // Jika status berubah dari Diterima ke Ditolak, kembalikan stok
                if ($prevStatus === 'Diterima' && $status === 'Ditolak') {
                    if ($order->product && $order->qty) {
                        $order->product->increment('stock', $order->qty);
                    }
                }
            }
        }
        return back()->with('status', 'Order Berhasil Diperbarui!');
    }
}
