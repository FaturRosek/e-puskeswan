@extends('layouts.app', ['id' => 'serahTerimaBarang'])
 
@section('content')
    <div class="card" style="background: #67e7b642">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Serah Terima Barang</h5>
          <a href="{{ route('serahTerimaBarang.create') }}" class="btn btn-success">+ Tambah Data</a>
        </div>
    </div>
    <div class="card">  
      <table class="table table-hover">
          <thead class="table-primary">
            <tr>
              <th>Barang</th>
              <th>Satuan</th>
              <th>Pengadaan</th>
              <th>Jmlh Barang</th>
              <th>No BAST</th>
              <th>Unduh</th>
              <th>Tgl Exp Date</th>
              <th>Action</th>
            </tr>
          </thead>
          @if(Session::has('success'))
             <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
              </div>
          @endif
          <tbody>
            @if($serahTerimaBarang->count() > 0)
              @foreach($serahTerimaBarang as $rs)
                <tr>
                  <td>{{ $rs->goods->goods_name }}</td>
                  <td>{{ $rs->units->unit_type }}</td>
                  <td>{{ $rs->procurements->procurement_type }}</td>
                  <td>{{ $rs->goods_amount }}</td>
                  <td>{{ $rs->BAST_number }}</td>
                  <td>{{ $rs->file_BAST }}</td>
                  <td>{{ $rs->tgl_exp_date }}</td>
                  <td>
                    <a href="{{ route('serahTerimaBarang.show', $rs->id) }}" class="btn btn-secondary btn-sm me-2 mt-2">
                      <i class="ti ti-eye fs-4"></i>
                      <span>Detail</span>
                  </a>
                  <a href="{{ route('serahTerimaBarang.edit', $rs->id)}}" class="btn btn-warning btn-sm me-2 mt-2">
                      <i class="ti ti-edit fs-4"></i>
                      <span>Edit</span>
                  </a>
                  <a href="{{ route('serahTerimaBarang.export', $rs->id)}}" class="btn btn-warning btn-sm me-2 mt-2">
                    <i class="ti ti-printer fs-4"></i>
                    <span>Export</span>
                </a>
                  <form action="{{ route('serahTerimaBarang.destroy', $rs->id) }}" method="POST" class="m-0 me-2 mt-2" onsubmit="return confirm('Delete?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                          <i class="ti ti-trash fs-4"></i>
                          <span>Delete</span>
                      </button>
                  </form>
                  </td>
                </tr>
            @endforeach
            @else
            <tr>
              <td class="text-center" colspan="9">serahTerimaBarang not found</td>
            </tr>
            @endif
        </tbody>
      </table>  
    </div>
@endsection