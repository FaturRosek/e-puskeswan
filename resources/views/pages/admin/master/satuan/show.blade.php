@extends('layouts.app', ['id' => 'satuan'])
 
@section('content')
<h1 class="mb-0">Detail Satuan</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Satuan</label>
        <input type="text" name="unit_type" class="form-control" placeholder="Jenis Perolehan" value="{{ $satuan->unit_type }}" readonly>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $satuan->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $satuan->updated_at }}" readonly>
    </div>
</div>
<div class="row text-center">
    <div class="col">
        <a href="{{ route('satuan.index') }}" class="btn btn-success me-2">Kembali</a>
    </div>
</div>
@endsection