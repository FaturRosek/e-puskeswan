@extends('layouts.app', ['id' => 'barang'])
 
@section('content')
<h1 class="mb-0">Tambah Barang</h1>
    <hr />
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="goods_name" class="form-control" placeholder="nama barang" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">jenis Barang</label>
                <select name="goods_type" class="form-select" required>
                    <option value="" selected disabled>Pilih jenis barang</option>
                    <option value="medicine">medicine</option>
                    <option value="medical equipment">medical equipment</option>
                </select>
            </div>
        </div>           
        <div class="row text-center">
            <div class="col">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('barang.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>

@endsection