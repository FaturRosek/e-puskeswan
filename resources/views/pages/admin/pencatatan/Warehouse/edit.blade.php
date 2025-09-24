@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('gudang.update', $gudang->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="mb-6">
                        <x-atoms.form-label required>Nama Gudang</x-atoms.form-label>
                        <x-atoms.input id="warehouse_name" name="warehouse_name" type="text" class="form-control"
                            value="{{ $gudang->warehouse_name }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Lokasi</x-atoms.form-label>
                        <x-atoms.input id="location" name="location" type="text" class="form-control"
                            value="{{ $gudang->location }}" />
                    </div>
                    <button type="submit" class="btn btn-primary"></a>Save</button>
                    <a href="{{ route('gudang.index') }}" class="btn btn-secondary ms-2">Back</a>
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
