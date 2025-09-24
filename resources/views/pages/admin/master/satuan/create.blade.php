@extends('layouts.app', ['id' => 'satuan'])
 
@section('content')
<h1 class="mb-0">Add Book</h1>
    <hr />
    <form action="{{ route('satuan.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Satuan</label>
                <input type="text" name="unit_type" class="form-control" placeholder="satuan">
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('satuan.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>

@endsection