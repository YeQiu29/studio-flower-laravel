@extends('layouts.app')

@section('title', 'About Us')

@section('content')
{{-- Menambahkan style inline untuk memperbaiki tumpang tindih dengan header --}}
<section class="py-5" style="padding-top: 100px !important;">
    <div class="container">
        <h1 class="display-4 text-center mb-4">About Studio Flower</h1>
        <p class="lead text-center">We are dedicated to providing the most beautiful and fresh flowers for every special moment in your life.</p>
        <div class="row mt-5">
            <div class="col-md-6">
                <h3>Our Mission</h3>
                <p>To bring joy and beauty to our customers' lives through exquisite floral arrangements and exceptional service.</p>
            </div>
            <div class="col-md-6">
                <h3>Our Vision</h3>
                <p>To be the leading floral provider, recognized for our creativity, quality, and customer satisfaction.</p>
            </div>
        </div>
        <div class="text-center mt-5">
            <p>For more information, feel free to <a href="{{ url('/contact') }}">contact us</a>.</p>
        </div>
    </div>
</section>
@endsection
