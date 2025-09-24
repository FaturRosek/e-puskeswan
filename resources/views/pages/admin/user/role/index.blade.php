@extends('layouts.app')

@section('content')
    <div class="container-xxl" style="max-width: 1560px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="card" style="background: #67e7b642">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Role</h5>
                        {{-- <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-goodsrecording_modal" data-action="edit"
                        data-url="{{route('pencatatan.store')}}" data-target="#add-goodsrecording_modal" id="createNewGoodsRecording">+ Tambah Data</a> --}}
                        <a href="{{ route('role.create') }}" class="btn btn-success">
                            <span class="ms-2">
                                + Tambah Role
                            </span>
                        </a>
                    </div>
                </div>
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="roles-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search Role" />
                </div>
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
@endsection
