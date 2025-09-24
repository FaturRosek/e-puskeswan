<!-- resources/views/pages/admin/setting/pilihans/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Pilihan</h1>
    <form action="{{ route('pilihans.update', $pilihan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pilihan->nama }}">
        </div>
        <div class="form-group">
            <label for="url">URL:</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ $pilihan->url }}">
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
