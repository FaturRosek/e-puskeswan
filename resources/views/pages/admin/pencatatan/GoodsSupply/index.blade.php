@extends('layouts.app')

@section('content')
    <div class="container-xxl" style="max-width: 1560px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="background: #67e7b642">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Stok Barang</h5>
                        @if(Auth::user()->role_id == 1)
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-goodsrecording_modal"
                            data-action="edit" data-url="{{ route('stokBarang.create') }}"
                            data-target="#add-goodsrecording_modal" id="createNewGoodsRecording">+ Tambah Data</a>
                        @endif
                    </div>
                </div>
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="goodsrecording-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search Persediaan" />
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border-top">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Lokasi</th>
                            <th>Stok Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stok as $d)
                            <tr class="text-nowrap">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->goods->goods_name }}</td>
                                <td>{{ $d->unit->unit_type }}</td>
                                <td>{{ $d->user->name }}</td>
                                <td>{{ $d->stock }}</td>
                            </tr>
                        @empty
                            <tr class="text-nowrap">
                                <td colspan="5" class="text-center">Belum ada data tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @include('pages.admin.pencatatan.GoodsSupply.create')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#searchBox').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush
