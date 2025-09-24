@extends('layouts.app')

@section('content')
    <div class="container-xxl" style="max-width: 1560px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card" style="background: #67e7b642">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Serah Terima Barang</h5>
                        <a href="{{ route('serahterima.create') }}" class="btn btn-success">
                            <span class="ms-2">
                                + Tambah Data
                            </span>
                        </a>
                    </div>
                </div>
                <div class="search-box">
                    <label class="position-absolute " for="searchBox">
                        <i class="fal fa-search fs-3"></i>
                    </label>
                    <input type="text" data-table-id="goodshandover-table" id="searchBox" data-action="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                </div>
                <div class="d-flex justify-content-end mt-2 mb-2">
                    <a href="{{ route('serahTerima.export') }}" class="btn btn-success">
                        <i class="fas fa-file-excel"></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border-top">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Penerimaan</th>
                            <th>Nomor BAST</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($serahTerima as $d)
                            <tr class="text-nowrap">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->date_received }}</td>
                                <td>{{ $d->no_bast }}</td>
                                <td>{{ $d->description }}</td>
                                <td>
                                        <a href="{{ route('serahterima.show', $d->id) }}" class="btn btn-secondary "><i
                                                class="ti ti-eye fs-1"></i></a>
                                        <a href="{{ route('serahterima.export_pdf', $d->id) }}" class="btn btn-danger" target="_blank" download>
                                            <i class="fas fa-file-pdf fs-1"></i>
                                        </a>
                                            <a href="{{ route('serahterima.edit', $d->id) }}" class="btn btn-warning "><i
                                                class="ti ti-edit fs-1"></i>
                                            </a>
                                        <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('serahterima.destroy', $d->id) }}"
                                            data-action="delete" data-table-id="goodshandover-table" class="btn btn-danger ">
                                            <i class="ti ti-trash fs-1"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-nowrap">
                                <td colspan="4" class="text-center">Belum ada data tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
