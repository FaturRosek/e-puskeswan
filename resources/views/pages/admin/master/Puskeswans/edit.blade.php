@extends('layouts.app')

@section('content')
    <div class="py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <form uuid="updateForm" method="POST" action="{{ route('puskeswans.update', $puskeswan->uuid) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <x-atoms.form-label required>Nama Puskeswan:</x-atoms.form-label>
                        <x-atoms.input uuid="name" name="name" type="text" class="form-control" value="{{ $puskeswan->name }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Alamat:</x-atoms.form-label>
                        <x-atoms.input uuid="address" name="address" type="text" class="form-control" value="{{ $puskeswan->address }}" />
                    </div>
                    <div class="col-md-6 mb-6">
                        <x-atoms.form-label required>Kelurahan:</x-atoms.form-label>
                        <x-atoms.input uuid="kelurahan" name="kelurahan" type="text" class="form-control" value="{{ $puskeswan->kelurahan }}" />
                    </div>
                    <div class="col-md-6 mb-6">
                        <x-atoms.form-label required>Kecamatan:</x-atoms.form-label>
                        <x-atoms.input uuid="kecamatan" name="kecamatan" type="text" class="form-control" value="{{ $puskeswan->kecamatan }}" />
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <x-atoms.form-label required>Longitude:</x-atoms.form-label>
                            <x-atoms.input uuid="longitude" name="longitude" type="text" class="form-control" value="{{ $puskeswan->longitude }}" />
                        </div>
                        <div class="col-md-6 mb-6">
                            <x-atoms.form-label required>Latitude:</x-atoms.form-label>
                            <x-atoms.input uuid="latitude" name="latitude" type="text" class="form-control" value="{{ $puskeswan->latitude }}" />
                        </div>
                        <div id="map" style="height: 400px; margin-top: 20px;"></div>
                    </div>
                    <!-- Div tersembunyi untuk created_at -->
                    <div style="display:none;">
                        <x-atoms.input uuid="created_at" name="created_at" type="text" class="form-control" value="{{ $puskeswan->created_at }}" />
                    </div>
                    <button type="button" class="btn btn-primary" uuid="saveButton">Save</button>
                    <a href="{{ route('puskeswans.index') }}" class="btn btn-secondary ms-2">Back</a>
                </form>
            </div>
        </div>
       
    </div>

    <!-- Modal -->
    <div class="modal fade" uuid="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" uuid="confirmationModalLabel">Confirm Save</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah yakin Buat Menggantinya?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" uuid="confirmSaveButton">Ya, Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endpush

@push('scripts')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.querySelector('[uuid="saveButton"]').addEventListener('click', function() {
            var confirmationModal = new bootstrap.Modal(document.querySelector('[uuid="confirmationModal"]'));
            confirmationModal.show();
        });

        document.querySelector('[uuid="confirmSaveButton"]').addEventListener('click', function() {
            document.querySelector('[uuid="updateForm"]').submit();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var lat = {{ $puskeswan->latitude }};
            var lng = {{ $puskeswan->longitude }};
            var map = L.map('map').setView([lat, lng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup('<b>{{ $puskeswan->name }}</b><br>{{ $puskeswan->address }}')
                .openPopup();
        });
    </script>
@endpush
