<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('pages.admin.analytics', compact('products', 'orders'));
    }
}
