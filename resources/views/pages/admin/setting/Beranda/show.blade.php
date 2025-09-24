@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Beranda</h1>
                <hr />
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Judul</x-atoms.form-label>
                        <x-atoms.input id="judul" name="judul" type="text" class="form-control"
                            value="{{ $beranda->judul }}" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Sub Judul</x-atoms.form-label>
                        <x-atoms.input id="sub_judul" name="sub_judul" type="text" class="form-control"
                            value="{{ $beranda->sub_judul }}" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label>Gambar</x-atoms.form-label>
                        @if($beranda->image)
                            <div class="mb-3">
                                <img src="{{ asset($beranda->image) }}" alt="Gambar Beranda" style="max-width: 200px;">
                            </div>
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Created At</x-atoms.form-label>
                        <x-atoms.input id="created_at" name="created_at" type="text" class="form-control"
                            value="{{ $beranda->created_at }}" readonly />
                    </div>
                    <div class="col">
                        <x-atoms.form-label required>Updated At</x-atoms.form-label>
                        <x-atoms.input id="updated_at" name="updated_at" type="text" class="form-control"
                            value="{{ $beranda->updated_at }}" readonly />
                    </div>
                </div>
                <a href="{{ route('beranda.index') }}" class="btn btn-secondary ms-2">Back</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
