@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('pencatatan.update', $pencatatan->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="mb-6">
                        <x-atoms.form-label required>Nama Barang</x-atoms.form-label>
                        <x-atoms.input id="goods_name" name="goods_name" type="text" class="form-control"
                            value="{{ $pencatatan->goods_name }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Barang Masuk</x-atoms.form-label>
                        <x-atoms.input id="goods_entry" name="goods_entry" type="text" class="form-control"
                            value="{{ $pencatatan->goods_entry }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Barang Keluar</x-atoms.form-label>
                        <x-atoms.input id="goods_out" name="goods_out" type="text" class="form-control"
                            value="{{ $pencatatan->goods_out }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
                        <x-atoms.textarea name="description" id="description"
                            class="form-control">{{ $pencatatan->description }}</x-atoms.textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"></a>Save</button>
                    <a href="{{ route('pencatatan.index') }}" class="btn btn-secondary ms-2">Back</a>
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
