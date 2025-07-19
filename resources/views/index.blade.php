@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-md-6">
                  <div class="banner-content">
                    <h1 class="display-2 text-uppercase text-dark pb-5">Your Products Are Great.</h1>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="image-holder">
                    <img src="{{ asset('images/banner-image.png') }}" alt="banner">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="container">
              <div class="row d-flex flex-wrap align-items-center">
                <div class="col-md-6">
                  <div class="banner-content">
                    <h1 class="display-2 text-uppercase text-dark pb-5">Studio Flower</h1>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="image-holder">
                    <img src="{{ asset('images/banner-image.png') }}" alt="banner">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-icon swiper-arrow swiper-arrow-prev">
        <svg class="chevron-left">
          <use xlink:href="#chevron-left" />
        </svg>
      </div>
      <div class="swiper-icon swiper-arrow swiper-arrow-next">
        <svg class="chevron-right">
          <use xlink:href="#chevron-right" />
        </svg>
      </div>
    </section>
    <section id="company-services" class="padding-large">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="cart-outline">
                  <use xlink:href="#cart-outline" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Free delivery</h3>
                <p>Free Pengantaran.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="quality">
                  <use xlink:href="#quality" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Quality guarantee</h3>
                <p>Kualitas Bahan Terbaik.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="price-tag">
                  <use xlink:href="#price-tag" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">Daily offers</h3>
                <p>Banyak Diskon Special.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
              <div class="icon-box-icon pe-3 pb-3">
                <svg class="shield-plus">
                  <use xlink:href="#shield-plus" />
                </svg>
              </div>
              <div class="icon-box-content">
                <h3 class="card-title text-uppercase text-dark">100% secure payment</h3>
                <p>Pembayaran Terpercaya</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @foreach($categories as $category)
    <section id="{{ Str::slug($category->name) }}" class="product-store position-relative padding-large no-padding-top" data-direction="{{ $loop->odd ? 'ltr' : 'rtl' }}">
      <div class="container">
        <div class="row">
          <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">{{ $category->name }}</h2>
            <div class="btn-right">
              <a href="{{ url('/shop') }}" class="btn btn-medium btn-normal text-uppercase">See All My Product </a>
            </div>
          </div>
          <div class="swiper product-swiper">
            <div class="swiper-wrapper">
              @foreach($category->products as $product)
              <div class="swiper-slide">
                <div class="product-card position-relative">
                  <div class="image-holder">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                  </div>
                  <div class="cart-concern position-absolute">
                    <div class="cart-button d-flex">
                      <a href="https://wa.me/6289509808564?text={{ urlencode('Halo, saya ingin memesan produk: ' . $product->name . '. Apakah masih tersedia?') }}" class="btn btn-medium btn-success wa-order-btn" type="button" target="_blank">
                          Order By WA
                          <svg class="whatsapp-icon" width="20" height="20">
                            <use xlink:href="#whatsapp"></use>
                          </svg>
                        </a>
                    </div>
                  </div>
                  <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                    <h3 class="card-title text-uppercase">
                      <a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a>
                    </h3>
                    <span class="item-price text-primary">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="swiper-pagination swiper-pagination-{{ $loop->index }}"></div>
        </div>
      </div>
    </section>
    @endforeach
    <section id="latest-blog" class="padding-large">
      <div class="container">
        <div class="row">
          <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Latest Posts</h2>
            <div class="btn-right">
              <a href="{{ url('/blog') }}" class="btn btn-medium btn-normal text-uppercase">Read Blog</a>
            </div>
          </div>
          <div class="post-grid d-flex flex-wrap justify-content-between">
            <div class="col-lg-4 col-sm-12">
              <div class="card border-none me-3">
                <div class="card-image">
                  <img src="{{ asset('images/graduation.jpg') }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">September 31, 2023</span>
                  <span class="meta-category">- Graduation</span>
                </div>
                <h3 class="card-title">
                  <a href="#">Special moment graduation in 2023</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="card border-none me-3">
                <div class="card-image">
                  <img src="{{ asset('images/ultah-cake.jpg') }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">DECEMBER 02, 2024</span>
                  <span class="meta-category">- SPECIAL BIRTHDAY</span>
                </div>
                <h3 class="card-title">
                  <a href="#">Sweet Moment Girlfriend or Boyfriend</a>
                </h3>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="card border-none me-3">
                <div class="card-image">
                  <img src="{{ asset('images/mom.jpg') }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="card-body text-uppercase">
                <div class="card-meta text-muted">
                  <span class="meta-date">DECEMBER 25, 2024</span>
                  <span class="meta-category">-SPECIAL MOTHER'S DAY</span>
                </div>
                <h3 class="card-title">
                  <a href="#">GIFT FOR YOUR MOM</a>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials" class="position-relative">
      <div class="container">
        <div class="row">
          <div class="review-content position-relative">
            <div class="swiper-icon swiper-arrow swiper-arrow-prev position-absolute d-flex align-items-center">
              <svg class="chevron-left">
                <use xlink:href="#chevron-left" />
              </svg>
            </div>
            <div class="swiper testimonial-swiper">
              <div class="quotation text-center">
                <svg class="quote">
                  <use xlink:href="#quote" />
                </svg>
              </div>
              <div class="swiper-wrapper">
                <div class="swiper-slide text-center d-flex justify-content-center">
                  <div class="review-item col-md-10">
                    <i class="icon icon-review"></i>
                    <blockquote>“Let's Give The Most Beautiful Gift for Your Moment”</blockquote>
                    <div class="rating">
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-half">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-empty">
                        <use xlink:href="#star-half"></use>
                      </svg>
                    </div>
                    <div class="author-detail">
                      <div class="name text-dark text-uppercase pt-2">Alisa</div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide text-center d-flex justify-content-center">
                  <div class="review-item col-md-10">
                    <i class="icon icon-review"></i>
                    <blockquote>“The flower that blooms in adversity is the rarest and most beautiful of all..”</blockquote>
                    <div class="rating">
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-fill">
                        <use xlink:href="#star-fill"></use>
                      </svg>
                      <svg class="star star-half">
                        <use xlink:href="#star-half"></use>
                      </svg>
                      <svg class="star star-empty">
                        <use xlink:href="#star-empty"></use>
                      </svg>
                    </div>
                    <div class="author-detail">
                      <div class="name text-dark text-uppercase pt-2">Jennie Blackpink</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-icon swiper-arrow swiper-arrow-next position-absolute d-flex align-items-center">
              <svg class="chevron-right">
                <use xlink:href="#chevron-right" />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </section>
    <section id="instagram" class="padding-large overflow-hidden no-padding-top">
      <div class="container">
        <div class="row">
          <div class="display-header text-uppercase text-dark text-center pb-3">
            <h2 class="display-7">Shop Our Instagram</h2>
          </div>
          <div class="d-flex flex-wrap">
            @foreach ($instagramPosts as $post)
            <figure class="instagram-item pe-2">
              <a href="{{ $post->link }}" class="image-link position-relative">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="instagram" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
              </a>
            </figure>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <section id="map-location" class="padding-small">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="display-header text-uppercase text-dark text-center pb-3">
                        <h2 class="display-7">Our Location</h2>
                    </div>
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // WhatsApp Button Script
        const whatsappNumber = '6289509808564';
        const waButtons = document.querySelectorAll('.wa-order-btn');
        waButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productName = this.closest('.product-card').querySelector('.card-title a').innerText;
                const message = `Halo, saya ingin memesan produk: ${productName}. Apakah masih tersedia?`;
                const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            });
        });

        // Leaflet Map Script
        if (document.getElementById('map')) {
            var map = L.map('map').setView([-7.365748533016786, 112.67537678180541], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marker = L.marker([-7.365748533016786, 112.67537678180541]).addTo(map)
                .bindPopup('<b>Studio Flower</b><br>Our lovely store is here.')
                .openPopup();

            marker.on('click', function() {
                window.open('https://www.google.com/maps/search/?api=1&query=-7.365748533016786,112.67537678180541', '_blank');
            });
        }
    });
</script>
@endsection