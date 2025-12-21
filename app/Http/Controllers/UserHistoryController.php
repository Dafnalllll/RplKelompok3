<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderUser; // ganti dari use App\Models\Order;
use App\Models\Order; // Tambahkan import model Order
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class UserHistoryController extends Controller
{
    public function index()
    {
        $orders = OrderUser::with(['product.category', 'user'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pages.user.history', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id'   => 'required|exists:products,id',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
            'total_price'  => 'required|numeric|min:0',
            'status'       => 'required|string',
            'payment'      => 'required|string',
        ]);

        $lastOrder = OrderUser::orderBy('id', 'desc')->first();
        $nextNumber = $lastOrder ? intval($lastOrder->order_code) + 1 : 1;
        $orderCode = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // Simpan ke tabel user_orders
        OrderUser::create([
            'order_code'   => $orderCode,
            'user_id'      => Auth::id(),
            'product_id'   => $request->product_id,
            'start_date'   => $request->start_date,
            'end_date'     => $request->end_date,
            'total_price'  => $request->total_price,
            'status'       => $request->status,
            'payment'      => $request->payment,
            'detail'       => $request->detail,
        ]);

        // Simpan ke tabel orders (untuk admin)
        Order::create([
            'order_code'    => $orderCode,
            'user_id'       => Auth::id(),
            'product_id'    => $request->product_id, // TAMBAHKAN INI
            'qty'           => $request->qty ?? 1,   // TAMBAHKAN INI (atau ambil dari request)
            'tanggal_order' => now(),
            'total_harga'   => $request->total_price,
            'metode_bayar'  => $request->payment,
            'status'        => $request->status,
            'payment_proof' => $request->payment_proof ?? null, // atau sesuai upload file
        ]);

        // Kurangi stok produk
        $product = Product::find($request->product_id);
        if ($product && $product->stock >= $request->qty) {
            $product->stock -= $request->qty;
            $product->save();
        }

        return redirect()->route('history')->with('status', 'Order Berhasil!');
    }
}
