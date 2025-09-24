<!-- resources/views/pages/admin/setting/pilihans/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Pilihan Baru</h1>
    <form action="{{ route('pilihans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
            <label for="url">URL:</label>
            <input type="text" class="form-control" id="url" name="url">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
