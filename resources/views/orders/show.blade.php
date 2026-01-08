@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Detail Pesanan</h2>

<div class="card shadow-sm p-4">

    <h4 class="fw-bold">{{ $order->buyer_name }}</h4>

    <p class="text-muted mb-1">Produk:</p>
    <p class="fw-bold fs-5">{{ $order->product->nama_produk }}</p>

    <img src="{{ asset('storage/' . $order->product->gambar) }}" 
         class="img-fluid mb-3 rounded" 
         alt="Product Image">

    <p><strong>Harga:</strong> Rp {{ number_format($order->product->harga) }}</p>

    <p><strong>Deskripsi Produk:</strong> <br>
        {{ $order->product->deskripsi }}
    </p>

    <p><strong>Status Pesanan:</strong> 
        <span class="badge bg-primary">{{ ucfirst($order->status) }}</span>
    </p>

    <a href="/orders/{{ $order->id }}/edit" class="btn btn-success">Ubah Status</a>
    <a href="/orders" class="btn btn-secondary mt-4">Kembali</a>

</div>
@endsection
