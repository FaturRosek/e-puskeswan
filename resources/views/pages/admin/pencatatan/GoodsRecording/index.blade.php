@extends('layouts.app')

@section('content')
    <div class="container-xxl" style="max-width: 1560px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="background: #67e7b642">
                    <div class="card-body">
                        <h1 class="card-title fw-semibold mb-4">Pencatatan Barang</h1>
                        {{-- <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-goodsrecording_modal"
                            data-action="edit" data-url="{{ route('pencatatan.store') }}"
                            data-target="#add-goodsrecording_modal" id="createNewGoodsRecording">+ Tambah Data</a>
                    </div> --}}
                    </div>
                </div>
                <div class="search-box mb-3">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="goodsrecording-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search Pencatatan" />
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('export') }}" class="btn btn-success">
                        <i class="fas fa-file-excel"></i>
                    </a>
                </div>

                {{-- <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div> --}}
                @include('pages.admin.pencatatan.GoodsRecording.table', $data)
            </div>
        </div>


        {{-- @include('pages.admin.pencatatan.GoodsRecording.modal') --}}

        {{-- @push('scripts')
            {{ $dataTable->scripts() }}
            <script>
                const tableId = 'goodsrecording-table';

                $(document).ready(function() {
                    $('[data-kt-user-table-filter="search"]').on('input', function() {
                        window.LaravelDataTables[`${tableId}`].search($(this).val()).draw();
                    });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                });
            </script>
        @endpush --}}
    @endsection
