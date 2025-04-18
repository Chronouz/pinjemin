{{-- filepath: d:\GitHub\pinjemin\resources\views\home\home.blade.php --}}
@extends('layout.app')

@section('title', 'Home')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endpush
    <section class="carousel" aria-label="Gallery">
        <ol class="carousel__viewport">
          <li id="carousel__slide1"
              tabindex="0"
              class="carousel__slide">
            <div class="carousel__snapper">
              <a href="#carousel__slide4"
                 class="carousel__prev">Go to last slide</a>
              <a href="#carousel__slide2"
                 class="carousel__next">Go to next slide</a>
            </div>
          </li>
          <li id="carousel__slide2"
              tabindex="0"
              class="carousel__slide">
            <div class="carousel__snapper"></div>
            <a href="#carousel__slide1"
               class="carousel__prev">Go to previous slide</a>
            <a href="#carousel__slide3"
               class="carousel__next">Go to next slide</a>
          </li>
          <li id="carousel__slide3"
              tabindex="0"
              class="carousel__slide">
            <div class="carousel__snapper"></div>
            <a href="#carousel__slide2"
               class="carousel__prev">Go to previous slide</a>
            <a href="#carousel__slide4"
               class="carousel__next">Go to next slide</a>
          </li>
          <li id="carousel__slide4"
              tabindex="0"
              class="carousel__slide">
            <div class="carousel__snapper"></div>
            <a href="#carousel__slide3"
               class="carousel__prev">Go to previous slide</a>
            <a href="#carousel__slide1"
               class="carousel__next">Go to first slide</a>
          </li>
        </ol>
        <aside class="carousel__navigation">
          <ol class="carousel__navigation-list">
            <li class="carousel__navigation-item">
              <a href="#carousel__slide1"
                 class="carousel__navigation-button">Go to slide 1</a>
            </li>
            <li class="carousel__navigation-item">
              <a href="#carousel__slide2"
                 class="carousel__navigation-button">Go to slide 2</a>
            </li>
            <li class="carousel__navigation-item">
              <a href="#carousel__slide3"
                 class="carousel__navigation-button">Go to slide 3</a>
            </li>
            <li class="carousel__navigation-item">
              <a href="#carousel__slide4"
                 class="carousel__navigation-button">Go to slide 4</a>
            </li>
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
    

    <section class="menu-container">
      <div class="menuselection">
          <div class="menuselect">
              <div class="card">
                  <div class="card-image">
                      <img src="assets/img/logo.png" class="menu">
                  </div>
                  <div class="card-content">
                      <h3>Title</h3>
                      <p>Subtitle</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <div class="card-buttons">
                          <button class="detail-btn">Detail</button>
                          <button class="available-btn">Tersedia</button>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="menuselect">
              <div class="card">
                  <div class="card-image">
                      <img src="assets/img/logo.png" class="menu">
                  </div>
                  <div class="card-content">
                      <h3>Title</h3>
                      <p>Subtitle</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      <div class="card-buttons">
                          <button class="detail-btn">Detail</button>
                          <button class="available-btn">Tersedia</button>
                      </div>
                  </div>
              </div>
          </div>

          <div class="menuselect">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/logo.png" class="menu">
                </div>
                <div class="card-content">
                    <h3>Title</h3>
                    <p>Subtitle</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-buttons">
                        <button class="detail-btn">Detail</button>
                        <button class="available-btn">Tersedia</button>
                    </div>
                </div>
            </div>
        </div>

          <div class="menuselect">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/logo.png" class="menu">
                </div>
                <div class="card-content">
                    <h3>Title</h3>
                    <p>Subtitle</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-buttons">
                        <button class="detail-btn">Detail</button>
                        <button class="available-btn">Tersedia</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="menuselect">
          <div class="card">
              <div class="card-image">
                  <img src="assets/img/logo.png" class="menu">
              </div>
              <div class="card-content">
                  <h3>Title</h3>
                  <p>Subtitle</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  <div class="card-buttons">
                      <button class="detail-btn">Detail</button>
                      <button class="available-btn">Tersedia</button>
                  </div>
              </div>
          </div>
      </div>

          <div class="menuselect">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/logo.png" class="menu">
                </div>
                <div class="card-content">
                    <h3>Title</h3>
                    <p>Subtitle</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-buttons">
                        <button class="detail-btn">Detail</button>
                        <button class="available-btn">Tersedia</button>
                    </div>
                </div>
            </div>
        </div>

          <div class="menuselect">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/logo.png" class="menu">
                </div>
                <div class="card-content">
                    <h3>Title</h3>
                    <p>Subtitle</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-buttons">
                        <button class="detail-btn">Detail</button>
                        <button class="available-btn">Tersedia</button>
                    </div>
                </div>
            </div>
        </div>

          <div class="menuselect">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/logo.png" class="menu">
                </div>
                <div class="card-content">
                    <h3>Title</h3>
                    <p>Subtitle</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="card-buttons">
                        <button class="detail-btn">Detail</button>
                        <button class="available-btn">Tersedia</button>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>
  
  <script src="/assets/js/scripts.js"></script>
@endsection