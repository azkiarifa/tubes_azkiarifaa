@extends('layouts.app')

@section('content')

<h3 class="mb-4 fw-bold">Daftar Produk</h3>

<a href="/products/create" class="btn btn-success mb-3">+ Tambah Produk</a>

<div class="row g-4">

    @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card product-card shadow-sm">
                
                @if($product->gambar)
                    <img src="{{ asset('storage/'.$product->gambar) }}" class="card-img-top" style="height: 180px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/300x180?text=No+Image" class="card-img-top">
                @endif

                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $product->nama_produk }}</h5>
                    <p class="text-muted mb-1">{{ $product->kategori }}</p>
                    <p class="fw-semibold text-success">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                    <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                    <form action="/products/{{ $product->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection
