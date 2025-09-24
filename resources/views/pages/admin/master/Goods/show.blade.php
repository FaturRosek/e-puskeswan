@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Barang</h1>
                <hr />
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Nama Barang</x-atoms.form-label>
                        <x-atoms.input id="goods_name" name="goods_name" type="text" class="form-control"
                            value="{{ $barang->goods_name }}" readonly />
                    </div>
                    <div class="col">
                        <x-atoms.form-label required>Jenis Barang</x-atoms.form-label>
                        <x-atoms.input id="goods_type" name="goods_type" type="text" class="form-control"
                            value="{{ $barang->goods_type }}" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Created_At</x-atoms.form-label>
                        <x-atoms.input id="created_at" name="created_at" type="text" class="form-control"
                            value="{{ $barang->created_at }}" readonly />
                    </div>
                    <div class="col">
                        <x-atoms.form-label required>Updated_At</x-atoms.form-label>
                        <x-atoms.input id="updated_at" name="updated_at" type="text" class="form-control"
                            value="{{ $barang->updated_at }}" readonly />
                    </div>
                </div>
            </div>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary ms-2">Back</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
