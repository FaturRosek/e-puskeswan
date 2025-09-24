@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Jenis Barang</h5>
        <form action="{{ route('jenis.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name_type" class="form-label">Nama Jenis Barang</label>
                <input type="text" class="form-control" id="name_type" name="name_type" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection
