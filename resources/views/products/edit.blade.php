@extends('layouts.app')

@section('content')
<h3 class="fw-bold mb-3">Edit Produk</h3>

<form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" value="{{ $product->kategori }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" value="{{ $product->harga }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ $product->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
        <label>Foto Produk</label>
        <input type="file" name="image" class="form-control" value="{{ $product->gambar }}">
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection
