@extends('layouts.app', ['id' => 'berita'])
 
@section('content')
<h1 class="mb-0">Edit Berita</h1>
    <hr />
    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" name="title" class="form-control" placeholder="judul berita" value="{{ $berita->title }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control" placeholder="Thumbnail"  value="{{ $berita->thumbnail }}">      
                </div>
            </div>    
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Isi Berita</label>
                    <input type="text" name="description" class="form-control" placeholder="isi berita" value="{{ $berita->description }}" required>      
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
