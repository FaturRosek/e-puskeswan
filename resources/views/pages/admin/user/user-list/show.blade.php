@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                        readonly>
                </div>
                {{-- <div class="mb-3">
                    <label for="role" class="form-label">Roles</label>
                    <input type="Role" class="form-control" id="Role" name="Role" value="{{ $roles->name }}"
                        readonly>
                </div> --}}
                <div class="mb-3">
                    <label for="" class="form-label">Created_At</label>
                    <input type="created_at" class="form-control" id="created_at" name="created_at"
                        value="{{ $user->created_at }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Updated_At</label>
                    <input type="updated_at" class="form-control" id="updated_at" name="updated_at"
                        value="{{ $user->updated_at }}" readonly>
                </div>
            </div>
            <a href="{{ route('user-list.index') }}" class="btn btn-secondary ms-2">Back</a>
        </div>
    </div>
@endsection
