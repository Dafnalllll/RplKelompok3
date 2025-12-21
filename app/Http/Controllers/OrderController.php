<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            // ...validasi lain...
        ]);

        // Ambil produk
        $product = Product::find($request->product_id);

        // Cek stok cukup
        if ($product && $product->stock >= $request->qty) {
            // Simpan order, status default "Pending"
            Order::create([
                'order_code' => uniqid('ORD-'),
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'tanggal_order' => now(),
                'total_harga' => $product->price * $request->qty,
                'metode_bayar' => $request->payment,
                'status' => 'Pending',
                // ...field lain...
            ]);

            // TIDAK ADA pengurangan stok di sini!
            return redirect()->route('order.success')->with('success', 'Order berhasil!');
        } else {
            // Stok tidak cukup
            return back()->with('error', 'Stok tidak cukup!');
        }
    }

    public function uploadProof(Request $request, Order $order)
    {
        $request->validate([
            'proof' => 'required|image|mimes:jpg,jpeg,png,pdf|max:4096',
        ]);
        $path = $request->file('proof')->store('proofs', 'public');
        $order->payment_proof = $path;
        $order->save();

        // Redirect ke halaman history setelah upload
        return redirect()->route('history')->with('status', 'Bukti pembayaran berhasil dikirim!');
    }
}
