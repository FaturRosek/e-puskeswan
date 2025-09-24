@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Serah Terima Barang</h1>
                <hr />
                <div class="border p-3 mb-4">
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Tanggal Diterima</label>
                            <p class="form-control">{{ $umum->date_received }}</p>
                        </div>
                        <div class="col">
                            <label class="form-label">Nomor BAST</label>
                            <p class="form-control">{{ $umum->no_bast }}</p>
                        </div>
                        <div class="col">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" readonly>{{ $umum->description }}</textarea>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Pengadaan</th>
                                    <th>Jumlah Barang</th>
                                    <th>Tanggal Expired</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($handoverDetails as $detail)
                                    <tr>
                                        <td>{{ $barang->firstWhere('id', $detail->goods_id)->goods_name }}</td>
                                        <td>{{ $unit->firstWhere('id', $detail->unit_id)->unit_type }}</td>
                                        <td>{{ $pengadaan->firstWhere('id', $detail->procurement_id)->procurement_type }}
                                        </td>
                                        <td>{{ $detail->goods_amount }}</td>
                                        <td>{{ $detail->tgl_exp_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('serahterima.index') }}" class="btn btn-secondary ms-2">Back</a>
            </div>
        </div>
    </div>
@endsection
