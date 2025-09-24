@extends('layouts.app', ['id' => 'serahTerimaBarang'])
 
@section('content')
<h1 class="mb-0">Edit Serah Terima Barang</h1>
    <hr />
    <form action="{{ route('serahTerimaBarang.update', $serahTerimaBarang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama Barang</label>
                <select name="goods_id" class="form-select" required readonly>
                    <option value="" selected disabled>Pilih Barang</option>
                    @foreach($goods as $good)
                        <option value="{{ $good->id }}" {{ $good->id == $serahTerimaBarang->goods_id ? 'selected' : '' }}>{{ $good->goods_name }}</option>
                    @endforeach
                </select>
            </div>            
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Satuan</label>
                <select name="unit_id" class="form-select" required readonly>
                    <option value="" selected disabled>Pilih Satuan</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ $unit->id == $serahTerimaBarang->unit_id ? 'selected' : '' }}>{{ $unit->unit_type }}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Pengadaan</label>
                <select name="procurement_id" class="form-select" required readonly>
                    <option value="" selected disabled>Pilih Pengadaan</option>
                    @foreach($procurements as $procurement)
                        <option value="{{ $procurement->id }}" {{ $procurement->id == $serahTerimaBarang->procurement_id ? 'selected' : '' }}>{{ $procurement->procurement_type }}</option>
                    @endforeach
                </select>
            </div>    
        </div>     
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Jumlah Barang</label>
                <input type="varchar" name="goods_amount" class="form-control" placeholder="Jumlah Barang" value="{{ $serahTerimaBarang->goods_amount }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">BAST Number</label>
                <input type="varchar" name="BAST_number" class="form-control" placeholder="No BAST" value="{{ $serahTerimaBarang->BAST_number }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">File BAST</label>
                <input type="varchar" name="file_BAST" class="form-control" placeholder="File BAST" value="{{ $serahTerimaBarang->file_BAST }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Tanggal Diterima</label>
                <input type="date" name="date_received" class="form-control" placeholder="Tanggal Diterima" value="{{ $serahTerimaBarang->date_received }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Dasar Penerimaan</label>
                <input type="text" name="description" class="form-control" placeholder="Tanggal Diterima" value="{{ $serahTerimaBarang->description }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Tanggal Exp Date</label>
                <input type="date" name="tgl_exp_date" class="form-control" placeholder="Tanggal Exp Date" value="{{ $serahTerimaBarang->tgl_exp_date }}" required>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <button class="btn btn-warning me-2">Update</button>
                <a href="{{ route('serahTerimaBarang.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>
@endsection