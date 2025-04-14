@extends('layout.app')

@section('title', 'Detail Barang')

@section('content')
<div class="left-box">
    <!-- Gambar atau konten visual -->
    <div class="image-placeholder">
        <img src="{{ asset($barang->image_path) }}" alt="{{ $barang->name }}">
    </div>
</div>
<div class="right-box">
    <ul class="info-list">
        <li><strong>{{ $barang->name }}</strong></li>
        <li>{{ $barang->description }}</li>
        <li>Harga: Rp{{ number_format($barang->cost, 0, ',', '.') }}</li>
        <li>Lokasi: {{ $barang->location }}</li>
        <li>Kategori: {{ $barang->category }}</li>
        <li>Stok: {{ $barang->stock }} buah</li>
        <li>Kondisi: {{ $barang->condition }}</li>
    </ul>
    <a href="{{ $barang->link }}" class="whatsapp-button">
        📞 Lanjutkan ke WhatsApp
    </a>
</div>
@endsection
