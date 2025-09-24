@extends('layouts.app', ['id' => 'gudang'])
 
@section('content')
<h1 class="mb-0">Add Gudang</h1>
    <hr />
    <form action="{{ route('gudang.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama Gudang</label>
                <input type="text" name="warehouse_name" class="form-control" placeholder="masukan nama gudang">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Lokasi</label>
                <input type="text" name="location" class="form-control" placeholder="masukan lokasi gudang">
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('gudang.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>

@endsection