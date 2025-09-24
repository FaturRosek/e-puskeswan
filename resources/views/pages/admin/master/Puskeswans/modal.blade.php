<x-mollecules.modal size="lg" id="add-goods_modal" action="{{ route('puskeswans.store') }}" method="POST"
    data-table-id="goods-table" tableId="goods-table" hasCloseBtn="true">
    @csrf <!-- Add CSRF token -->
    <x-slot:title>Tambah Puskeswan</x-slot:title>
    
    <x-slot:iconClose>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-outline ki-cross fs-2"></i>
        </div>
    </x-slot:iconClose>
    
    <x-slot:footer>
        <!-- Save Button -->
        <button id="saveButton" class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    
    <div>
        <input type="hidden" name="uuid" id="uuid">
        @php
        $users = App\Models\User::where('role_id', 2)->get();
        @endphp
        <div class="mb-6">
            <x-atoms.form-label required>Nama Puskeswan</x-atoms.form-label>
            <x-atoms.select id="name" name="name" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->name }}" data-user-id="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </x-atoms.select>
        </div>
        
        <input type="hidden" name="user_id" id="user_id">
        
        <div class="mb-6">
            <x-atoms.form-label required>Alamat</x-atoms.form-label>
            <x-atoms.input id="address" name="address" type="text" class="form-control" required />
        </div>
        
        <div class="mb-6">
            <x-atoms.form-label required>Kelurahan/Desa</x-atoms.form-label>
            <x-atoms.input id="kelurahan" name="kelurahan" type="text" class="form-control" required />
        </div>
        
        <div class="mb-6">
            <x-atoms.form-label required>Kecamatan</x-atoms.form-label>
            <x-atoms.input id="kecamatan" name="kecamatan" type="text" class="form-control" required />
        </div>
        
        <div class="mb-6">
            <x-atoms.form-label required>Latitude</x-atoms.form-label>
            <x-atoms.input id="latitude" name="latitude" type="text" class="form-control" required />
        </div>
        
        <div class="mb-6">
            <x-atoms.form-label required>Longitude</x-atoms.form-label>
            <x-atoms.input id="longitude" name="longitude" type="text" class="form-control" required />
        </div>
        
        <!-- Leaflet map container -->
        <div id="map" style="height: 400px;" class="mb-6"></div>

        <input type="hidden" name="created_at" id="created_at" value="{{ now() }}">
        <input type="hidden" name="updated_at" id="updated_at" value="{{ now() }}">
    </div>

    <!-- Success message -->
    <div id="successMessage" class="alert alert-success alert-dismissible fade show position-fixed top-50 start-50 translate-middle" role="alert" style="display: none;">
        Data telah disimpan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

</x-mollecules.modal>

<!-- Include Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle form submission
        document.getElementById('add-goods_modal').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from being submitted directly

            if (confirm('Apakah Anda yakin ingin menyimpan data ini?')) {
                this.submit(); // Submit the form
            } else {
                return false;
            }

            // Show success message
            $('#successMessage').fadeIn();

            // Hide success message after 3 seconds
            setTimeout(function() {
                $('#successMessage').fadeOut();
            }, 3000);
        });

        // Initialize map
        var map = L.map('map').setView([-8.095, 112.168], 13); // Default coordinates

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        var marker;

        // Ensure the map is resized correctly when the modal is shown
        $('#add-goods_modal').on('shown.bs.modal', function () {
            map.invalidateSize();
        });

        // Update marker on map click
        function updateMarker(lat, lng) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lng]).addTo(map);
            map.setView([lat, lng], map.getZoom());
        }

        // Handle map click
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;

            updateMarker(lat, lng);
        });

        // Update marker based on latitude input change
        document.getElementById('latitude').addEventListener('input', function() {
            var lat = parseFloat(this.value);
            var lng = parseFloat(document.getElementById('longitude').value);
            if (!isNaN(lat) && !isNaN(lng)) {
                updateMarker(lat, lng);
            }
        });

        // Update marker based on longitude input change
        document.getElementById('longitude').addEventListener('input', function() {
            var lat = parseFloat(document.getElementById('latitude').value);
            var lng = parseFloat(this.value);
            if (!isNaN(lat) && !isNaN(lng)) {
                updateMarker(lat, lng);
            }
        });

        // Function to zoom the map based on kelurahan and kecamatan
        function zoomMap(kelurahan, kecamatan) {
            var searchQuery = kelurahan + ', ' + kecamatan + ', Indonesia';

            L.Control.Geocoder.nominatim().geocode(searchQuery, function(results) {
                if (results && results.length > 0) {
                    var latLng = [parseFloat(results[0].center.lat), parseFloat(results[0].center.lng)];
                    map.setView(latLng, 15);
                }
            });
        }

        // Handle kelurahan input change
        document.getElementById('kelurahan').addEventListener('input', function() {
            var kelurahan = this.value.trim();
            var kecamatan = document.getElementById('kecamatan').value.trim();

            if (kelurahan !== '' && kecamatan !== '') {
                zoomMap(kelurahan, kecamatan);
            }
        });

        // Handle kecamatan input change
        document.getElementById('kecamatan').addEventListener('input', function() {
            var kelurahan = document.getElementById('kelurahan').value.trim();
            var kecamatan = this.value.trim();

            if (kelurahan !== '' && kecamatan !== '') {
                zoomMap(kelurahan, kecamatan);
            }
        });

        // Update user_id based on selected name
        document.getElementById('name').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var userId = selectedOption.getAttribute('data-user-id');
            document.getElementById('user_id').value = userId;
        });
    });
</script>
