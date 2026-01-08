@extends('layouts.app')

@section('content')
<h2 class="mb-4">Kelola Pesanan Pembeli</h2>

<div class="row">
    @foreach ($orders as $order)
    <div class="col-md-4">
        <div class="card shadow-sm mb-3 border-0" style="border-radius: 12px;">
            <div class="card-body">

                <h5 class="fw-bold">{{ $order->buyer_name }}</h5>
                <p class="mb-1 text-muted">Produk: {{ $order->product->nama_produk }}</p>

                <span class="badge 
                    @if ($order->status == 'pending') bg-warning 
                    @elseif ($order->status == 'diproses') bg-primary 
                    @elseif ($order->status == 'selesai') bg-success 
                    @else bg-secondary 
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>

                <hr>

                <p class="fw-bold">Rp {{ number_format($order->product->harga) }}</p>

                <a href="/orders/{{ $order->id }}" class="btn btn-success w-100">Lihat Detail</a>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
