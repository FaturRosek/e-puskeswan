@extends('layouts.app', ['id' => 'pengadaan'])
 
@section('content')
<h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('pengadaan.update', $pengadaan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Pengadaan</label>
                <input type="text" name="procurement_type" class="form-control" placeholder="pengadaan" value="{{ $pengadaan->procurement_type }}">
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <button class="btn btn-warning me-2">Update</button>
                <a href="{{ route('pengadaan.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>
@endsection