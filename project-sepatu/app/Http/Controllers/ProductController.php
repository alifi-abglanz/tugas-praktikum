<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua kategori untuk dropdown form input produk baru
    $category = category::all();

    // Mengambil semua produk beserta kategori terkait
    $products = product::with('category')->get();

    // Mengirim data produk ke view
    return view('product', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validateData = $request->validate([
        'product_name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,category_id',
        'product_price' => 'required|numeric',
        'product_stock' => 'required|integer'
    ]);

    Product::create($validateData);

    return redirect()->route('products')->with('success', 'Produk berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
