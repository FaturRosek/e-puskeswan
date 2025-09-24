@extends('layouts.app', ['id' => 'barang'])
 
@section('content')
<h1 class="mb-0">Edit Barang</h1>
    <hr />
    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="goods_name" class="form-control" placeholder="nama barang" value="{{ $barang->goods_name }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Jenis Barang</label>
                <input type="text" name="goods_type" class="form-control" placeholder="jenis barang" value="{{ $barang->goods_type }}">
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <button class="btn btn-warning me-2">Update</button>
                <a href="{{ route('barang.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>
@endsection