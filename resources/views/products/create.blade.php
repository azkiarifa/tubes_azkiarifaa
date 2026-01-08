@extends('layouts.app')

@section('content')
<h3 class="fw-bold mb-3">Tambah Produk</h3>

<form action="/products" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label>Foto Produk</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>

@endsection
