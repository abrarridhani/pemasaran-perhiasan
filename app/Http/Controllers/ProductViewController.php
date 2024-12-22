<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductViewController extends Controller
{
    // Method untuk menampilkan semua produk
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk dari database
        return view('products.index', compact('products'));
    }

    // Method untuk menampilkan detail produk dan produk terkait
    public function show($id)
    {
        $product = Product::findOrFail($id); // Produk utama berdasarkan ID
        $categories = Category::with('products')->get(); // Semua kategori beserta produk mereka
        return view('products.show', compact('product', 'categories'));
    }

    // Method opsional untuk menampilkan produk berdasarkan kategori
    public function groupedByCategory()
    {
        $categories = Category::with('products')->get(); // Semua kategori beserta produk mereka
        return view('products.grouped', compact('categories')); // View khusus untuk kategori
    }

    public function productsByCategoryAjax(Request $request)
    {
        $category = $request->input('category');

        if ($category === 'all') {
            $products = Product::with('category')->get();
        } else {
            $products = Product::whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            })->with('category')->get();
        }

        // Debug: Log the response to check
        return response()->json(['products' => $products]);
    }
}
