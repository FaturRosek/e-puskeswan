@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('announcement.update', $announcement->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $announcement->id }}">
                    <div class="mb-6">
                        <x-atoms.form-label required>Judul</x-atoms.form-label>
                        <x-atoms.input id="judul" name="judul" type="text" class="form-control"
                            value="{{ $announcement->judul }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
                        <x-atoms.input id="deskripsi" name="deskripsi" type="text" class="form-control"
                            value="{{ $announcement->deskripsi }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Gambar</x-atoms.form-label>
                        @if($announcement->image)
                            <div class="mb-3">
                                <img src="{{ Storage::url($announcement->image) }}" alt="Gambar announcement" style="max-width: 200px;">
                            </div>
                        @endif
                        <x-atoms.input id="image" name="image" type="file" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('announcement.index') }}" class="btn btn-secondary ms-2">Back</a>
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
