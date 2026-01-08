<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_produk', 'deskripsi', 'harga', 'kategori', 'gambar'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function index()
    {
        $products = Product::all(); // ambil semua produk
        return view('/products', compact('products'));
    }
}
