@extends('layouts.app', ['id' => 'gudang'])
 
@section('content')
<h1 class="mb-0">Detail Gudang</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Gudang</label>
        <input type="text" name="warehouse_name" class="form-control" placeholder="Gudang" value="{{ $gudang->warehouse_name }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" name="location" class="form-control" placeholder="Lokasi" value="{{ $gudang->location }}" readonly>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $gudang->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $gudang->updated_at }}" readonly>
    </div>
</div>
<div class="row text-center">
    <div class="col">
        <a href="{{ route('gudang.index') }}" class="btn btn-success me-2">Kembali</a>
    </div>
</div>
@endsection