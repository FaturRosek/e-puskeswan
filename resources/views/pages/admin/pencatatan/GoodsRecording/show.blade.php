@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Pencatatan Barang</h1>
                <hr />
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Nama Barang</x-atoms.form-label>
                        @foreach ($barang as $b)
                            <x-atoms.input id="goods_name" name="goods_name" type="text" class="form-control"
                                value="{{ $b->goods_name }}" readonly />
                        @endforeach
                    </div>
                    <div class="col">
                        <x-atoms.form-label required>Barang Masuk</x-atoms.form-label>
                        <x-atoms.input id="goods_entry" name="goods_entry" type="text" class="form-control"
                            value="{{ $pencatatan->goods_entry }}" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Barang Keluar</x-atoms.form-label>
                        <x-atoms.input id="goods_out" name="goods_out" type="text" class="form-control"
                            value="{{ $pencatatan->goods_out }}" readonly />
                    </div>
                    <div class="col">
                        <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
                        <x-atoms.textarea name="description" id="description" class="form-control"
                            readonly>{{ $pencatatan->description }}</x-atoms.textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <x-atoms.form-label required>Created_At</x-atoms.form-label>
                        <x-atoms.input id="created_at" name="created_at" type="text" class="form-control"
                            value="{{ $pencatatan->created_at }}" readonly />
                    </div>
                    <div class="col">
                        <x-atoms.form-label required>Updated_At</x-atoms.form-label>
                        <x-atoms.input id="updated_at" name="updated_at" type="text" class="form-control"
                            value="{{ $pencatatan->updated_at }}" readonly />
                    </div>
                </div>
            </div>
            <a href="{{ route('pencatatan.index') }}" class="btn btn-secondary ms-2">Back</a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
