<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class UserHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product.category'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('pages.user.history', compact('orders'));
    }
}
