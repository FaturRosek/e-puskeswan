@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Serah Terima Barang</h1>
                <hr />
                <form action="{{ route('handover.update', $handover->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="border p-3 mb-4">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Tanggal Diterima</label>
                                <input type="date" name="date_received" class="form-control"
                                    value="{{ $handover->date_received }}" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Nomor BAST</label>
                                <input type="text" name="no_bast" class="form-control" value="{{ $handover->no_bast }}"
                                    required>
                            </div>
                            <div class="col">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control" required>{{ $handover->description }}</textarea>
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
                                            <td>
                                                <select name="goods_id[]" class="form-control" required>
                                                    @foreach ($barang as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $detail->goods_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->goods_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="unit_id[]" class="form-control" required>
                                                    @foreach ($unit as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $detail->unit_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->unit_type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="procurement_id[]" class="form-control" required>
                                                    @foreach ($pengadaan as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $detail->procurement_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->procurement_type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="warehouse_id[]" class="form-control" required>
                                                    @foreach ($warehouse as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $detail->warehouse_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->warehouse_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="goods_amount[]" class="form-control"
                                                    value="{{ $detail->goods_amount }}" required>
                                            </td>
                                            <td>
                                                <input type="date" name="tgl_exp_date[]" class="form-control"
                                                    value="{{ $detail->tgl_exp_date }}" required>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div>
                            <button type="submit" class="btn btn-success d-inline">Update Data</button>
                            <a href="{{ route('serahterima.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
