@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="card-title fw-semibold mb-4">Menu</h1>
        <div class="card" style="background: #67e7b642">
            <div class="card-body">
                <a href="{{ route('pilihans.create') }}" class="btn btn-primary mb-3">Tambah Pilihan</a>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>URL</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pilihans as $pilihan)
                    <tr>
                        <td>{{ $pilihan->id }}</td>
                        <td>{{ $pilihan->nama }}</td>
                        <td>{{ $pilihan->url }}</td>
                        <td>
                            <a href="{{ route('pilihans.show', $pilihan->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('pilihans.edit', $pilihan->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('pilihans.destroy', $pilihan->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
