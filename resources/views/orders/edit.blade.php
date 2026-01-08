@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Ubah Status Pesanan</h2>

<div class="card shadow-sm p-4">

    <h4 class="fw-bold mb-2">{{ $order->buyer_name }}</h4>
    <p class="text-muted">Produk: <strong>{{ $order->product->nama }}</strong></p>

    <form method="POST" action="/orders/{{ $order->id }}">
        @csrf
        @method('PUT')

        <label class="form-label fw-bold">Status</label>
        <select name="status" class="form-control mb-3">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>

        <button class="btn btn-success w-100">Simpan Perubahan</button>
    </form>

</div>
@endsection
