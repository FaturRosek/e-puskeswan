@extends('layouts.app', ['id' => 'serahTerimaBarang'])
 
@section('content')
<h1 class="mb-0">Add Book</h1>
    <hr />
    <form action="{{ route('serahTerimaBarang.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Nama Barang</label>
                <select name="goods_id" class="form-select" required>
                    <option value="" selected disabled>Pilih Barang</option>
                    @foreach($goods as $good)
                        <option value="{{ $good->id }}">{{ $good->goods_name }}</option>
                    @endforeach
                </select>
            </div>            
        </div>   
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Satuan</label>
                <select name="unit_id" class="form-select" required>
                    <option value="" selected disabled>Pilih Satuan</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->unit_type }}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Pengadaan</label>
                <select name="procurement_id" class="form-select" required>
                    <option value="" selected disabled>Pilih Pengadaan</option>
                    @foreach($procurements as $procurement)
                        <option value="{{ $procurement->id }}">{{ $procurement->procurement_type }}</option>
                    @endforeach
                </select>
            </div>    
        </div>        
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Jumlah Barang</label>
                <input type="varchar" name="goods_amount" class="form-control" placeholder="Jumlah Barang">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">No BAST</label>
                <input type="varchar" name="BAST_number" class="form-control" placeholder="No BAST ">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">File BAST</label>
                <input type="varchar" name="file_BAST" class="form-control" placeholder="File BAST ">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Tanggal Diterima</label>
                <input type="date" name="date_received" class="form-control" placeholder="Tanggal Diterima" required>
            </div>
        </div>        
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Dasar Penerimaan</label>
                <input type="text" name="description" class="form-control" placeholder="Dasar Penerimaan" required>
            </div>
        </div>   
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Tanggal Exp Date</label>
                <input type="date" name="tgl_exp_date" class="form-control" placeholder="Tanggal Exp Date" required>
            </div>
        </div>        
        <div class="row text-center">
            <div class="col">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('serahTerimaBarang.index') }}" class="btn btn-success me-2">Kembali</a>
            </div>
        </div>
    </form>

@endsection