@extends('layouts.app')

@section('title', $product->name)

@section('content')
<section id="product-detail" class="product-store padding-large">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image-holder">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-info">
                    <h2 class="display-5 text-dark text-uppercase">{{ $product->name }}</h2>
                    <p class="lead">{{ $product->description }}</p>
                    <p class="item-price text-primary">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="https://wa.me/6289509808564?text={{ urlencode('Halo, saya ingin memesan produk: ' . $product->name . '. Apakah masih tersedia?') }}" class="btn btn-success wa-order-btn" target="_blank">Order By WA</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection