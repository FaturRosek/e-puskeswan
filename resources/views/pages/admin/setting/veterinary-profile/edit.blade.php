@extends('layouts.app', ['id' => 'profile'])
 
@section('content')
<h1 class="mb-0">Edit Profile Puskeswan</h1>
    <hr />
    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Nama Puskeswan</label>
                    <input type="text" name="title" class="form-control" placeholder="Edit Nama Puskeswan" value="{{ $profile->title }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Photo Puskeswan</label>
                    <input type="file" name="photo" class="form-control" placeholder="Edit Photo"  value="{{ $profile->photo }}">      
                </div>
            </div>    
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Deskripsi Puskeswan</label>
                    <input type="text" name="description" class="form-control" placeholder="Jelaskan Tentang Puskeswan" value="{{ $profile->description }}" required>      
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
