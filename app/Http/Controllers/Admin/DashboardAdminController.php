<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalOrder = Order::count();
        $users = User::latest()->take(5)->get(); // ambil 5 user terbaru
        $orders = Order::with('user')->latest()->take(5)->get(); // ambil 5 order terbaru
        $products = Product::latest()->take(5)->get(); // ambil 5 produk terbaru
        $totalProducts = Product::count();
        $totalRevenue = Order::where('status', 'Diterima')->sum('total_harga');

        return view('pages.admin.dashboardadmin', compact('totalUser', 'totalOrder', 'users', 'orders', 'products', 'totalProducts', 'totalRevenue'));
    }
}
