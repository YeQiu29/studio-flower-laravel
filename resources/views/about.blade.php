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

<section id="map-location" class="padding-large">
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
    document.addEventListener('DOMContentLoaded', function () {
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
