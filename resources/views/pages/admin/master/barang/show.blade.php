@extends('layouts.app', ['id' => 'barang'])
 
@section('content')
<h1 class="mb-0">Detail Barang</h1>
<hr />
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Nama Barang</label>
        <input type="text" name="goods_name" class="form-control" placeholder="Nama Barang" value="{{ $barang->goods_name }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Jenis Barang</label>
        <input type="text" name="goods_type" class="form-control" placeholder="Jenis Barang" value="{{ $barang->goods_type }}" readonly>
    </div>
</div>
<div class="row">
    <div class="col mb-3">
        <label class="form-label">Created At</label>
        <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $barang->created_at }}" readonly>
    </div>
    <div class="col mb-3">
        <label class="form-label">Updated At</label>
        <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $barang->updated_at }}" readonly>
    </div>
</div>
<div class="row text-center">
    <div class="col">
        <a href="{{ route('barang.index') }}" class="btn btn-success me-2">Kembali</a>
    </div>
</div>
@endsection