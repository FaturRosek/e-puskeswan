@extends('layouts.app')

@section('content')
    <div class="container-xxl" style="max-width: 1560px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="background: #67e7b642">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">jenis</h5>
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-goodsType_modal" data-action="edit"
                        data-url="{{route('jenis.store')}}" data-target="#add-goodsType_modal" id="createNewGoodsType">+ Tambah Data</a>
                    </div>
                </div>
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="goodsType-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search jenis" />
                </div>
            </div>
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>    

    @include('pages.admin.master.GoodsType.modal')

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            const tableId = 'goodsType-table';

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
    @endpush
@endsection

