@extends('layouts.app', ['id' => 'serahTerimaBarang'])
 
@section('content')
<h1 class="mb-0">Detail serahTerimaBarang</h1>
<hr />
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
        <input type="text" name="goods_amount" class="form-control" placeholder="Jumlah Barang" value="{{ $serahTerimaBarang->goods_amount }}" readonly>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <label class="form-label">BAST Number</label>
        <input type="text" name="BAST_number" class="form-control" placeholder="No BAST" value="{{ $serahTerimaBarang->BAST_number }}" readonly>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <label class="form-label">Link Download</label>
        <input type="text" name="file_BAST" class="form-control" placeholder="File BAST" value="{{ $serahTerimaBarang->file_BAST }}" readonly>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label class="form-label">Tanggal Diterima</label>
        <input type="date" name="date_received" class="form-control" placeholder="Tanggal Diterima" value="{{ $serahTerimaBarang->date_received }}" readonly>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label class="form-label">Dasar Penerimaan</label>
        <input type="text" name="description" class="form-control" placeholder="Dasar Penerimaan" value="{{ $serahTerimaBarang->description }}" readonly>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label class="form-label">Tanggal Exp Date</label>
        <input type="date" name="tgl_exp_date" class="form-control" placeholder="Tanggal Exp Date" value="{{ $serahTerimaBarang->tgl_exp_date }}" readonly>
    </div>
</div>

<div class="row text-center">
    <div class="col">
        <a href="{{ route('serahTerimaBarang.index') }}" class="btn btn-success me-2">Kembali</a>
    </div>
</div>
@endsection