@extends('layouts.app', ['id' => 'gudang'])
 
@section('content')
<h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('gudang.update', $gudang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama Gudang</label>
                <input type="text" name="warehouse_name" class="form-control" placeholder="nama gudang" value="{{ $gudang->warehouse_name }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Lokasi</label>
                <input type="text" name="location" class="form-control" placeholder="Lokasi" value="{{ $gudang->location }}">
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <button class="btn btn-warning me-2">Update</button>
                <a href="{{ route('gudang.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>
@endsection