@extends('layouts.app')

@section('title', 'Shop')

@section('styles')
<style>
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }
    .product-card-search {
        border: 1px solid #eee;
        border-radius: 5px;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }
    .product-card-search:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .product-card-search .image-holder {
        width: 100%;
        height: 200px; /* Fixed height for consistency */
        overflow: hidden;
    }
    .product-card-search .image-holder img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the area without distortion */
    }
    .product-card-search .card-detail {
        padding: 1rem;
    }
    .product-card-search .btn-lihat-produk {
        width: 100%;
        margin-top: 0.5rem;
    }
</style>
@endsection

@section('content')
<section id="shop-products" class="product-store padding-large">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="display-7 text-dark text-uppercase text-center mb-5">Our Products</h2>
                <div class="mb-4">
                    <input type="text" id="product-search" class="form-control" placeholder="Search for products...">
                </div>
                <div class="product-grid">
                    @foreach($products as $product)
                        <div class="product-card-search" data-name="{{ $product->name }}">
                            <div class="image-holder">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                            </div>
                            <div class="card-detail text-center">
                                <h3 class="card-title text-uppercase h5">
                                    <a href="#">{{ $product->name }}</a>
                                </h3>
                                <p class="item-price text-primary">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('product.detail', $product->id) }}" class="btn btn-primary btn-lihat-produk">Lihat Produk</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('product-search');
    const productCards = document.querySelectorAll('.product-card-search');

    searchInput.addEventListener('keyup', function() {
        const searchTerm = searchInput.value.toLowerCase();

        productCards.forEach(card => {
            const productName = card.dataset.name.toLowerCase();
            if (productName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>
@endsection