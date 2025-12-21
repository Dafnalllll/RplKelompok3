<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Filter search
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        // Filter kategori
        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->whereRaw('LOWER(name) = ?', [strtolower($request->category)]);
            });
        }
        // Filter tahun
        if ($request->year) {
            $query->where('year', $request->year);
        }
        // Filter harga
        if ($request->price == '1') {
            $query->where('price', '<', 60000);
        } elseif ($request->price == '2') {
            $query->whereBetween('price', [60000, 100000]);
        } elseif ($request->price == '3') {
            $query->where('price', '>', 100000);
        }

        $products = $query->get();

        return view('pages.user.product', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.user.rent', compact('product'));
    }
}
