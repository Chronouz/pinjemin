@extends('layout.app')

@section('title', 'Daftar Barang')

@section('content')
<h1>Daftar Barang</h1>
<div class="barang-list">
    @foreach ($barangs as $barang)
        <div class="barang-item">
            <img src="{{ asset($barang->image_path) }}" alt="{{ $barang->name }}">
            <h2>{{ $barang->name }}</h2>
            <p>{{ $barang->description }}</p>
            <p>Harga: Rp{{ number_format($barang->cost, 0, ',', '.') }}</p>
            <a href="{{ route('barang.show', $barang) }}" class="detail-button">Lihat Detail</a>
        </div>
    @endforeach
</div>
@endsection