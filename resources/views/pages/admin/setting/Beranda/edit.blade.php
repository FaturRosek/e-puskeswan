@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('beranda.update', $beranda->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $beranda->id }}">
                    <div class="mb-6">
                        <x-atoms.form-label required>Judul</x-atoms.form-label>
                        <x-atoms.input id="judul" name="judul" type="text" class="form-control"
                            value="{{ $beranda->judul }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Sub Judul</x-atoms.form-label>
                        <x-atoms.input id="sub_judul" name="sub_judul" type="text" class="form-control"
                            value="{{ $beranda->sub_judul }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Gambar</x-atoms.form-label>
                        @if($beranda->image)
                            <div class="mb-3">
                                <img src="{{ asset($beranda->image) }}" alt="Gambar Beranda" style="max-width: 200px;">
                            </div>
                        @endif
                        <x-atoms.input id="image" name="image" type="file" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('beranda.index') }}" class="btn btn-secondary ms-2">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
