<!-- resources/views/pages/admin/setting/pilihans/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Pilihan</h1>
    <ul>
        <li><strong>ID:</strong> {{ $pilihan->id }}</li>
        <li><strong>Nama:</strong> {{ $pilihan->nama }}</li>
        <li><strong>URL:</strong> {{ $pilihan->url }}</li>
    </ul>
    <a href="{{ route('pilihans.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
