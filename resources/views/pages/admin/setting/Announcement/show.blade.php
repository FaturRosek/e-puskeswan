@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Pengumuman</h1>
                <hr />
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Judul</x-atoms.form-label>
                        <x-atoms.input id="judul" name="judul" type="text" class="form-control"
                            value="{{ $announcement->judul }}" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
                        <x-atoms.input id="deskripsi" name="deskripsi" type="text" class="form-control"
                            value="{{ $announcement->deskripsi }}" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label>Gambar</x-atoms.form-label>
                        @if($announcement->image)
                            <div class="mb-3">
                                <img src="{{ Storage::url($announcement->image) }}" alt="Gambar announcement" style="max-width: 200px;">
                            </div>
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                </div>
                <a href="{{ route('announcement.index') }}" class="btn btn-secondary ms-2">Back</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
