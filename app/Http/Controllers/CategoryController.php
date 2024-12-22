<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Retrieve all categories (static method for utility use).
     */
    public static function getCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }

    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Display products by category ID.
     */
    public function productsByCategory(int $id)
    {
        $category = Category::with('products')->find($id);

        if (!$category) {
            return redirect()->route('categories.index')->withErrors('Category not found.');
        }

        return view('categories.products', compact('category'));
    }

    /**
     * Display products by category name.
     */
    public function showProductsByCategory(string $name)
    {
        $category = Category::where('name', $name)->with('products')->first();

        if (!$category) {
            return redirect()->route('categories.index')->withErrors('Category not found.');
        }

        $products = $category->products;

        return view('categories.products', compact('category', 'products'));
    }

    /**
     * Fetch products dynamically by selected categories.
     */
    public function filter(Request $request)
    {
        // Ambil kategori yang dipilih dari request
        $selectedCategories = $request->input('categories', []);

        // Jika kategori dipilih, filter produk berdasarkan kategori
        if (!empty($selectedCategories)) {
            $products = Product::whereHas('category', function ($query) use ($selectedCategories) {
                $query->whereIn('id', $selectedCategories);
            })->get();
        } else {
            // Jika tidak ada kategori yang dipilih, tampilkan semua produk
            $products = Product::all();
        }

        // Ambil semua kategori untuk ditampilkan di sidebar
        $categories = Category::all();

        // Return view dengan produk dan kategori
        return view('search', compact('products', 'categories', 'selectedCategories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateCategory($request);

        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories.index')->withErrors('Category not found.');
        }

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories.index')->withErrors('Category not found.');
        }

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, int $id)
    {
        $validatedData = $this->validateCategory($request, $id);

        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories.index')->withErrors('Category not found.');
        }

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories.index')->withErrors('Category not found.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    /**
     * Validate category data.
     */
    private function validateCategory(Request $request, int $id = null): array
    {
        $rules = [
            'name' => 'required|string|max:255|unique:categories,name,' . ($id ?? 'NULL') . ',id',
        ];

        return $request->validate($rules);
    }
}
