<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index() {
        $products = Product::where('user_id', auth()->id())->get();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Product::create([
            'user_id' => auth()->id(),
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'gambar' => $imagePath
        ]);

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validasi
        $request->validate([
           'nama_produk' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'gambar' => $request->isMethod('post')
                ? 'required|image'
                : 'nullable|image',
        ]);

        $data = $request->only(['nama_produk', 'harga', 'kategori']);

        // Jika ada gambar baru, upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Simpan gambar baru
            $data['gambar'] = $request->file('image')->store('images', 'public');
        }

        $product->update($data);

        return redirect('/products')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect('/products')->with('success', 'Produk berhasil dihapus!');
    }
}
