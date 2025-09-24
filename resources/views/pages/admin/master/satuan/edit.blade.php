@extends('layouts.app', ['id' => 'satuan'])
 
@section('content')
<h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('satuan.update', $satuan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Satuan</label>
                <input type="text" name="unit_type" class="form-control" placeholder="satuan" value="{{ $satuan->unit_type }}">
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <button class="btn btn-warning me-2">Update</button>
                <a href="{{ route('satuan.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>
@endsection