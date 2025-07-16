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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var map = L.map('map').setView([-7.365748533016786, 112.67537678180541], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([-7.365748533016786, 112.67537678180541]).addTo(map)
            .bindPopup('<b>Studio Flower</b><br>Our lovely store is here.')
            .openPopup();

        // Open in Google Maps
        marker.on('click', function() {
            window.open('https://www.google.com/maps/search/?api=1&query=-7.365748533016786,112.67537678180541', '_blank');
        });
    });
</script>
@endpush