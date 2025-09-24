@extends('layouts.app', ['id' => 'profile'])
 
@section('content')
<h1 class="mb-0">Tambah Profil Puskeswan</h1>
    <hr />
    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama Puskeswan</label>
                <input type="text" name="title" class="form-control" placeholder="Nama Puskeswan" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Photo Puskeswan</label>
                <input type="file" name="photo" class="form-control" placeholder="Masukan Poto Profile Puskeswan" required>      
            </div>
        </div>    
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Deskripsi Puskeswan</label>
                <input type="text" name="description" class="form-control" placeholder="Jelaskan Tentang Puskeswan" required>      
            </div>
        </div>           
        <div class="row text-center">
            <div class="col">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('profile.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>

@endsection
