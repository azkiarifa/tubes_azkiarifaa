@extends('layouts.app')

@section('content')
<div class="container">

    <h2 class="fw-bold mb-4">Seller Dashboard</h2>

    {{-- STATISTIC CARDS --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body text-center">
                    <h5 class="text-muted mb-2">Total Produk</h5>
                    <h2 class="fw-bold text-success">{{ \App\Models\Product::count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body text-center">
                    <h5 class="text-muted mb-2">Pesanan Masuk</h5>
                    <h2 class="fw-bold text-primary">{{ \App\Models\Order::count() }}</h2>
                </div>
            </div>
        </div>

    </div>

    {{-- ACTION BUTTONS --}}
    <div class="mb-4">
        <a href="/products" class="btn btn-success me-2">Kelola Produk</a>
        <a href="/orders" class="btn btn-primary">Kelola Pesanan Pembeli</a>
    </div>

    {{-- LASTEST PRODUCTS --}}
    <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
        <div class="card-body">
            <h4 class="fw-bold mb-3">Produk Terbaru</h4>

            <div class="row">
                @foreach (\App\Models\Product::latest()->take(3)->get() as $p)
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 mb-3" style="border-radius: 12px;">
                        <img src="{{ asset('storage/'.$p->gambar) }}" 
                             class="card-img-top" 
                             style="height: 180px; object-fit: cover; border-radius: 12px 12px 0 0;">
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $p->nama_produk }}</h5>
                            <p class="text-muted">{{ Str::limit($p->deskripsi, 60) }}</p>
                            <span class="fw-bold text-success">Rp {{ number_format($p->harga) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

</div>
@endsection
