@extends('layouts.app', ['id' => 'pengadaan'])
 
@section('content')
<h1 class="mb-0">Detail Product</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Jenis Perolehan</label>
        <input type="text" name="procurement_type" class="form-control" placeholder="Jenis Perolehan" value="{{ $pengadaan->procurement_type }}" readonly>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $pengadaan->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $pengadaan->updated_at }}" readonly>
    </div>
</div>
<div class="row text-center">
    <div class="col">
        <a href="{{ route('pengadaan.index') }}" class="btn btn-success me-2">Kembali</a>
    </div>
</div>
@endsection