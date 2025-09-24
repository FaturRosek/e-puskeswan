@extends('layouts.app', ['id' => 'pengadaan'])
 
@section('content')
    <div class="card" style="background: #67e7b642">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Jenis Perolehan</h5>
          <a href="{{ route('pengadaan.create') }}" class="btn btn-success">+ Tambah Data</a>
        </div>
    </div>
    <div class="card">  
      <table class="table table-hover">
          <thead class="table-primary">
            <tr>
              <th>Jenis Perolehan</th>
              <th>Action</th>
            </tr>
          </thead>
          @if(Session::has('success'))
             <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
              </div>
          @endif
          <tbody>
            @if($pengadaan->count() > 0)
              @foreach($pengadaan as $rs)
                <tr>
                  <td>{{ $rs->procurement_type }}</td>
                  <td>
                    <a href="{{ route('pengadaan.show', $rs->id) }}" class="btn btn-secondary me-2">
                      <i class="ti ti-eye fs-4"></i>
                      <span>Detail</span></a>
                    <a href="{{ route('pengadaan.edit', $rs->id)}}" class="btn btn-warning me-2">
                      <i class="ti ti-edit fs-4"></i>
                      <span>Edit</span>
                    </a>
                    <form action="{{ route('pengadaan.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0 me-2" onsubmit="return confirm('Delete?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger m-0"><i class="ti ti-trash fs-4"></i> <span>Delete</span> </button>
                    </form>
                  </td>
                </tr>
            @endforeach
            @else
            <tr>
              <td class="text-center" colspan="5">pengadaan not found</td>
            </tr>
            @endif
        </tbody>
      </table>  
    </div>
@endsection