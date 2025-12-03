<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductManageController extends Controller
{
    // Tampilkan halaman daftar produk & form tambah
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $categories = Category::all();
        return view('pages.admin.productmanage', compact('products', 'categories'));
    }

    // Tampilkan form tambah produk
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.add.addproduct', compact('categories'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'year' => $request->year, // tambahkan ini
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('productmanage')->with('success', 'Produk Berhasil Ditambahkan!');
    }

    // Edit produk
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.admin.edit.editproduct', compact('product', 'categories'));
    }

    // Update produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = $request->only(['name', 'category_id', 'year', 'description', 'price', 'stock']);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        // Alert sukses edit
        return redirect()->route('productmanage')->with('updated', 'Produk berhasil diupdate!');
    }

    // Hapus produk satuan
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        // Alert sukses delete
        return redirect()->route('productmanage')->with('deleted', 'Produk Berhasil Dihapus!');
    }
}
