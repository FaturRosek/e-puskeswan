@extends('layouts.app', ['id' => 'berita'])
 
@section('content')
<h1 class="mb-0">Tambah Berita</h1>
    <hr />
    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Judul Berita</label>
                <input type="text" name="judul_berita" class="form-control" placeholder="judul berita" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control" placeholder="Thumbnail" required>      
            </div>
        </div>    
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Isi Berita</label>
                <input type="text" name="isi_berita" class="form-control" placeholder="isi berita" required>      
            </div>
        </div>           
        <div class="row text-center">
            <div class="col">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('berita.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>

@endsection
