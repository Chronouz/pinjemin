@extends('layout.main')

@section('title', 'Home')

@section('content')
    {{-- Section Gallery --}}
    <section class="carousel" aria-label="Gallery">
        <ol class="carousel__viewport">
            @php
                $slides = [
                    ['id' => 'carousel__slide1', 'prev' => 'carousel__slide4', 'next' => 'carousel__slide2'],
                    ['id' => 'carousel__slide2', 'prev' => 'carousel__slide1', 'next' => 'carousel__slide3'],
                    ['id' => 'carousel__slide3', 'prev' => 'carousel__slide2', 'next' => 'carousel__slide4'],
                    ['id' => 'carousel__slide4', 'prev' => 'carousel__slide3', 'next' => 'carousel__slide1'],
                ];
            @endphp

            @foreach ($slides as $slide)
                <li id="{{ $slide['id'] }}" tabindex="0" class="carousel__slide">
                    <div class="carousel__snapper">
                        <a href="#{{ $slide['prev'] }}" class="carousel__prev">Go to previous slide</a>
                        <a href="#{{ $slide['next'] }}" class="carousel__next">Go to next slide</a>
                    </div>
                </li>
            @endforeach
        </ol>
        <aside class="carousel__navigation">
            <ol class="carousel__navigation-list">
                @foreach ($slides as $slide)
                    <li class="carousel__navigation-item">
                        <a href="#{{ $slide['id'] }}" class="carousel__navigation-button">Go to {{ $slide['id'] }}</a>
                    </li>
                @endforeach
            </ol>
        </aside>
    </section>
      
    <section class="category-container">
        <div class="category">
            <a href="/catalogue/electronics/html/index.html" class="circle">Electronics</a>
            <a href="#" class="circle">Accesories</a>
            <a href="#" class="circle">Clothes</a>
            <a href="#" class="circle">Handphones</a>
            <a href="#" class="circle">Others</a>
        </div>
    </section>
    

    {{-- Section Menu Container --}}
    <section class="menu-container">
        <div class="menuselection">
            @foreach ($menus as $menu)
                <div class="menuselect">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ asset($menu->image_path) }}" class="menu">
                        </div>
                        <div class="card-content">
                            <h3>{{ $menu->name }}</h3>
                            <p>Kategori: {{ $menu->category }}</p>
                            <p>Stok: {{ $menu->stock }}</p>
                            <p>Status: {{ $menu->stock > 0 ? 'Tersedia' : 'Habis' }}</p>
                            <div class="card-buttons">
                                <button class="detail-btn">Detail</button>
                                <button class="available-btn">Tersedia</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
  
    <script src="/assets/js/scripts.js"></script>
@endsection