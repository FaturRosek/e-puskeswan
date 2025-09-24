@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Puskeswan</h1>
                <hr />
                <div uuid="map-container" style="width: 100%; height: 400px; border-radius: 10px; overflow: hidden;">
                    <div uuid="map" style="width: 100%; height: 100%;"></div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Nama Puskeswan:</label>
                            <p class="form-control">{{ $puskeswan->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat:</label>
                            <p class="form-control">{{ $puskeswan->address }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelurahan:</label>
                            <p class="form-control">{{ $puskeswan->kelurahan }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Kecamatan:</label>
                            <p class="form-control">{{ $puskeswan->kecamatan }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Latitude:</label>
                            <p class="form-control">{{ $puskeswan->latitude }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Longitude:</label>
                            <p class="form-control">{{ $puskeswan->longitude }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('puskeswans.index') }}" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection

@section('head')
    <!-- Tambahkan CSS Leaflet di sini -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
    <style>
        /* Mengatur ukuran peta menjadi kotak kecil */
        [uuid="map"] { width: 100%; height: 100%; }
        /* Mengatur margin atas pada judul */
        h1 { margin-top: 20px; }
        /* Mengatur margin atas pada tombol kembali */
        .btn-secondary { margin-top: 20px; }
        /* Mengatur tombol kembali agar tetap di kanan */
        .btn-secondary { float: right; }
    </style>
@endsection

@push('scripts')
    <!-- Tambahkan JavaScript Leaflet di sini -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi peta Leaflet dengan langsung mengarahkan ke latitude dan longitude yang diberikan
            var map = L.map(document.querySelector('[uuid="map"]')).setView([{{ $puskeswan->latitude }}, {{ $puskeswan->longitude }}], 13);

            // Tambahkan layer peta tile dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Tambahkan marker dengan ikon kustom
            var redIcon = new L.Icon({
                iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.5.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            // Tambahkan marker dengan label nama jalan
            var marker = L.marker([{{ $puskeswan->latitude }}, {{ $puskeswan->longitude }}], {icon: redIcon}).addTo(map);

            // Tambahkan teks label nama jalan
            var customPopup = `<b>Nama Puskeswan:</b> {{ $puskeswan->name }}<br/><b>Alamat:</b> {{ $puskeswan->address }}<br/><b>Kelurahan:</b> {{ $puskeswan->kelurahan }}<br/><b>Kecamatan:</b> {{ $puskeswan->kecamatan }}`;
            marker.bindPopup(customPopup).openPopup();
        });
    </script>
@endpush
