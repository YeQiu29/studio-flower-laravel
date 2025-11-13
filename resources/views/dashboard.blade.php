@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h2">Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daily Visitors</h5>
                    <p class="card-text">{{ $dailyVisitors }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monthly Visitors</h5>
                    <p class="card-text">{{ $monthlyVisitors }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Visitors (Last 30 Days)</h5>
                    <canvas id="visitorsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitorsChart').getContext('2d');

    // --- 1. Buat Gradasi Warna (Gradient) ---
    // Ini akan membuat warna dari biru (di atas) ke transparan (di bawah)
    const gradient = ctx.createLinearGradient(0, 0, 0, 400); // 400 adalah tinggi canvas
    gradient.addColorStop(0, 'rgba(0, 123, 255, 0.4)'); // Warna atas (biru)
    gradient.addColorStop(1, 'rgba(0, 123, 255, 0)');  // Warna bawah (transparan)

    const visitorsChart = new Chart(ctx, {
        type: 'line', // Tipe tetap 'line'
        data: {
            // Ambil labels dari Controller
            labels: {!! json_encode($chartData['labels'] ?? []) !!},
            
            // --- 2. Cukup 1 Dataset ---
            datasets: [
                {
                    label: 'Total Visitors', // Label umum
                    // Ambil data dari Controller
                    data: {!! json_encode($chartData['data'] ?? []) !!}, 
                    
                    // --- 3. Styling Area Chart ---
                    fill: true,                         // 👈 Mengisi area
                    backgroundColor: gradient,          // 👈 Pakai gradasi
                    borderColor: 'rgba(0, 123, 255, 1)', // Garis biru
                    borderWidth: 2,
                    tension: 0.4,                       // 👈 Ini membuat garisnya melengkung (curvy)
                    pointRadius: 0,                     // Sembunyikan titik di garis
                    pointHoverRadius: 6,                // Tampilkan titik saat di-hover
                    pointBackgroundColor: 'rgba(0, 123, 255, 1)'
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    // Sembunyikan legend karena hanya ada 1 data, agar lebih bersih
                    display: false 
                }
            },
            // Ini membuat tooltip tetap muncul saat hover
            interaction: {
                mode: 'index', 
                intersect: false
            }
        }
    });
</script>
@endsection